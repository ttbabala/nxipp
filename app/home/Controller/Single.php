<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\admin\Model\Article;
use app\admin\Model\Comments;
use app\admin\Model\Reply_comments as Reply;
use app\admin\Model\Members;

class Single extends Homebase{
    public function index(){
        $aid = input('aid');
        if(isset($aid)){
            $at = new Article();
            $articleData = $at -> where('aid',$aid) -> select();
            $this -> assign('articleData',$articleData);
        }
        $cm = new Comments();
        $rc = new Reply();
        $commentsData = $cm -> where('aid',$aid) -> where('review',1) -> order('date','asc') -> select(); //每篇文章有几条评论+
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
                    $commentsData[$i]['reply'] = $rc -> where('cid',$commentsData[$i]['cid']) -> select();
                    for($k=0;$k<count($commentsData[$i]['reply']);$k++){
                        $fromUserName[$i][$k] = $mb -> where('mid',$commentsData[$i]['reply'][$k]['fromUserid']) -> column('mname');//获取回复留言的会员姓名
                        $fromUserHp[$i][$k] = $mb -> where('mid',$commentsData[$i]['reply'][$k]['fromUserid']) -> column('headpic');//获取回复留言的会员头像 
                    }
                }

                
            }

            foreach($ReplyNum as $key => $nr){
                    $nr+=$nr;  //计算该文章下一共有多少回复
            }
            if($nr > 0){        //回复数大于0
              $this -> assign('ReplyNums',1);  //前台开通回复调用
              $this -> assign('fromUserName',$fromUserName);
              $this -> assign('fromUserHp',$fromUserHp);
            }else{
               $this -> assign('ReplyNums',0); //前台关闭回复调用
            }
            $this -> assign('commentsData',$commentsData);
            $this -> assign('commentsNums',count($commentsData));
            $this -> assign('commentsNums',count($commentsData));

        }else{                                  //评论数等于0
          $this -> assign('commentsNums',0);  
        }
        $this -> assign('aid',$aid);
        return $this -> fetch();
    }
}

