<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\admin\Model\Article;
use app\admin\Model\Comments;
use app\admin\Model\Reply_comments as Reply;
use app\admin\Model\Single as tSingle;
use app\admin\Model\Members;
use app\home\Model\Votes;
use app\admin\Model\Cats;
use app\admin\Model\System;
use think\Db;
use PDO;
//use think\Log;

class Single extends Homebase{
    public function index(){
        $aid = input('aid');
        if(isset($aid)){
            $at = new Article();
            $articleData = $at -> where('aid',$aid) -> find();
            $predis = new \Predis\Client();
            if($predis -> hexists('post:'.$aid,'viewcount') == false){  //判断post:$aid 字段是否存在，如不存在则创建，并初始化
                if($articleData['viewcount'] == 0){                      //文章第一次调用
                    $predis -> hset('post:'.$aid,'viewcount',1);      
                }else{
                    $predis -> hset('post:'.$aid,'viewcount',$articleData['viewcount']+1); 
                }       
            }else{
                $predis -> hincrby('post:'.$aid,'viewcount',1);         //为viewcount字段自增1
            }
            $keys = $predis -> keys('post:'.$aid);
            $prv_sql = "select * from article where aid = (select aid from article where aid < $aid order by aid desc limit 1)"; //上一篇文章
            $prvData = Db::query($prv_sql);
            $next_sql = "select * from article where aid = (select aid from article where aid > $aid order by aid asc limit 1)";   //下一篇文章
            $nextData = Db::query($next_sql);
            $this -> assign('prvData',$prvData);
            $this -> assign('nextData',$nextData);
            $pid = getCatParent($articleData['cid'])[0];            //获取父类id
            $cat = new Cats();
            $pname = $cat -> where('catid',$pid) -> column('catname');  //获取父类名称
            $cname = $cat -> where('catid',$articleData['cid']) -> column('catname'); //获取当前类名称
            $current = $pname[0].'-'.$cname[0];                         //拼接成当前位置
            $viewcount = $predis -> hget('post:'.$aid,'viewcount');
            $this -> assign('viewcount',$viewcount);
            $this -> assign('current',$current);
            $this -> assign('articleData',$articleData);
        }
        $cm = new Comments();
        $rc = new Reply();
        $st = new System();
        $opencomments = $st -> column('opencomments')[0];
        if($opencomments){  //是否开启了评论审核 1为开启，0为关闭
            $commentsData = $cm -> where('aid',$aid) -> where('review',1) -> order('date','asc') -> paginate(10); //每篇文章有几条评论+
        }else{
            $commentsData = $cm -> where('aid',$aid) -> order('date','asc') -> paginate(10); //每篇文章有几条评论+ 
        }
        if(count($commentsData) > 0){       //评论数大于0
            $mb = new Members();
            $rc = new Reply();
            for($i=0;$i<count($commentsData);$i++){
                $commentsData[$i]['mname'] = $mb -> where('mid',$commentsData[$i]['mid']) -> column('mname');
                $commentsData[$i]['headpic'] = $mb -> where('mid',$commentsData[$i]['mid']) -> column('headpic');
                $commentsData[$i]['nums'] = count($rc -> where('cid',$commentsData[$i]['cid']) -> select()); //每条评论有几条回复
                if($commentsData[$i]['nums'] == 0){                                                 //对应评论下没有回复
                    $ReplyNum[$i] = 0;
                }else{
                    $ReplyNum[$i] = $commentsData[$i]['nums'];
                    if($ReplyNum[$i] > 0){
                        $commentsData[$i]['reply'] = $rc -> where('cid',$commentsData[$i]['cid']) -> select();
                        for($k=0;$k<count($commentsData[$i]['reply']);$k++)
                        {
                           $fromUserName[$i][$k] = $mb -> where('mid',$commentsData[$i]['reply'][$k]['fromUserid']) -> column('mname');//获取回复留言的会员姓名
                           $fromUserHp[$i][$k] = $mb -> where('mid',$commentsData[$i]['reply'][$k]['fromUserid']) -> column('headpic');//获取回复留言的会员头像 
                        } 
                    }                   
                }        
            }
            $sum = 0;
            foreach($ReplyNum as $nr){
                    $sum+=$nr;  //累加计算该文章下一共有多少回复
            }
            if($sum > 0){        //回复数大于0
              $this -> assign('ReplyNums',1);  //前台开通回复调用
              $this -> assign('fromUserName',$fromUserName);
              $this -> assign('fromUserHp',$fromUserHp);
            }else{
               $this -> assign('ReplyNums',0); //前台关闭回复调用
            }
            $page = $commentsData -> render();
            $this -> assign('page',$page);
            $this -> assign('commentsData',$commentsData); 
            $this -> assign('commentsNums',count($commentsData));

        }else{                                  //评论数等于0
          $this -> assign('commentsNums',0);  
        }
        $votes = new Votes();           
        $voteData = $votes -> where('id',$aid) -> find();       //取出单条点赞记录
        if(count($voteData)){
            $voteData['like_percent'] = $voteData['likes']==0?0:round($voteData['likes']/($voteData['likes']+$voteData['unlikes']),3)*100;
            $voteData['unlike_percent'] = $voteData['unlikes']==0?0:100-$voteData['like_percent'];
            $this -> assign('voteData',$voteData);              //为点赞赋值
        } 
        $this -> assign('aid',$aid);
        return $this -> fetch();
    }
    
    public function zan(){
        $action = input('action');
        $id = input('id'); //文章ID
        $ip = getIP();
        if($action == 'likes'){//顶 
            $this -> likes(1,$id,$ip); 
        }elseif($action == 'unlike'){//踩 
            $this -> likes(0,$id,$ip); 
        }else{ 
            return $this -> jsons($id);
        } 
    }
    
    public function likes($type,$id,$ip){
       // Log::write('pdoBegin');
        global $pdo;
        $pdo =  new PDO("mysql:host=localhost;dbname=nxipp","root","deze");
        $sql = "SELECT id FROM votes_ip WHERE vid=:vid AND ip=:ip";
        $stmt = $pdo->prepare($sql);         //生成查询对象
        $stmt->execute(array( 
            ':vid' => $id, 
            ':ip' => $ip 
        )); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //Log::write('pdoEnd');
      /*  if(is_array($row)){
            $row = implode(",",$row);           //此处$row为数组类型，??
        }*/
	if ($row) { 
            $msg = $type==1?'您已经顶过了':'您已经踩过了'; 
            $arr['success'] = 0; 
            $arr['msg'] = $msg; 
            echo json_encode($arr);
        } else { 
            try { 
                //开启事务 
                $pdo ->beginTransaction();  
                if($type == 1){//顶
                    $sql_update = "UPDATE votes SET likes=likes+1 WHERE id=:id"; 
                }else{//踩 
                    $sql_update = "UPDATE votes SET unlikes=unlikes+1 WHERE id=:id"; 
                } 
                $stmt_update = $pdo->prepare($sql_update); 
                $stmt_update->execute(array( 
                    ':id' => $id 
                )); 

                $sql_insert = "INSERT INTO votes_ip (vid,ip) VALUES (:id,:ip)"; 
                $stmt = $pdo->prepare($sql_insert); 
                $stmt->execute(array( 
                    ':id' => $id, 
                    ':ip' => $ip 
                )); 
                $insert_id = $pdo->lastinsertid(); 
                //提交事务 
                $pdo->commit(); 
                if ($insert_id > 0) { 
                    echo $this -> jsons($id); 
                } else { 
                    $arr['success'] = 0; 
                    $arr['msg'] = '操作失败，请重试'; 
                    echo json_encode($arr);  
                } 
            } catch (Exception $e) { 
                //回滚事务 
                $pdo->rollBack(); 

                $arr['success'] = 0; 
                $arr['msg'] = '操作异常，请重试'; 
                echo json_encode($arr);  
            }   
        }
    }
    
   public function jsons($id){
        global $pdo;
        $pdo =  new PDO("mysql:host=localhost;dbname=nxipp","root","deze");
        $sql = "SELECT * FROM votes WHERE id=:id"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->execute(array( 
            ':id' => $id 
        )); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC); ;
	$like = $row['likes'];
	$unlike = $row['unlikes'];
	$arr['status']=1;
	$arr['like'] = $like;
	$arr['unlike'] = $unlike;
	$like_percent = round($like/($like+$unlike),3)*100;
	$arr['like_percent'] = $like_percent.'%';
	$arr['unlike_percent'] = (100-$like_percent).'%';
	return json_encode($arr);
    }
    
    public function page(){
        $id = input('id');
        $single = new tSingle();
        $singleData = $single -> where('id',$id) -> find();
        $this -> assign('singleData',$singleData);
        return $this -> fetch();
    }
}

