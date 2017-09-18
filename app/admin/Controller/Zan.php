<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Votes;
use app\home\Model\Votes_ip;
use app\admin\Model\Article;
use think\Request;
use think\Db;

class Zan extends Adminbase{
    public function  index(){   //点赞列表
        $votes = new Votes();
        $article = new Article();
        $votesData = $votes -> order('likes','desc') -> paginate(10);
        $page = $votesData -> render();
        for($i=0;$i<count($votesData);$i++){
            $votesData[$i]['article_title'] = $article -> where('aid',$votesData[$i]['id']) -> column('article_title');
            $votesData[$i]['article_author'] = $article -> where('aid',$votesData[$i]['id']) -> column('article_author');
            $votesData[$i]['article_date'] = $article -> where('aid',$votesData[$i]['id']) -> column('article_date');
            $votesData[$i]['like_percent'] = $votesData[$i]['likes']==0?0:round($votesData[$i]['likes']/($votesData[$i]['likes']+$votesData[$i]['unlikes']),3)*100;      //点赞数百分比
            $votesData[$i]['unlike_percent'] = $votesData[$i]['unlikes']==0?0:(100 - $votesData[$i]['like_percent']);    //被踩数百分比
        }
        $this -> assign('page',$page);
        $this -> assign('zanData',$votesData);
        return $this -> fetch();
    }
    
    public function initzan(){
        if(Request::instance() -> isAjax()){
           $type = input('type');
           if($type == 'all'){      //全部初始化
              $article = new Article();
              $aidData = $article -> order('aid','desc') -> column('aid');
              $votes = new Votes();
                $sql_votes = 'TRUNCATE TABLE votes';
                Db::query($sql_votes);    //清空votes表
                $sql_votes_ip = 'TRUNCATE TABLE votes_ip';
                Db::query($sql_votes_ip);    //清空votes_ip表
                $article = new Article();
                $aidData = $article -> order('aid','desc') -> column('aid');
                $votes = new Votes();
                foreach($aidData as $key => $insData){
                        $data[] = [
                            'id' => $insData,
                            'likes' => 0,
                            'unlikes' => 0
                        ];
                }
                if(count($aidData) > 0){            //作品表有文章
                    foreach($data as $key => $list){
                        $votes->data($list,true)->isUpdate(false)->save();  
                    }
                    return json(['status'=>1,'msg'=>'初始化完成！^_^','url'=>url('Zan/index')]);
                }else{
                   return json(['status'=>0,'msg'=>'初始化失败，请检查是否发布了作品！^_^']);
                }
           }
           $datas = input('datas');
           if( $datas !== null){       //单个初始化
               $tiArray = explode("|",$datas);
               $votes = new Votes();
               $votes_ip = new Votes_ip();
               $delNum = $votes_ip -> where('vid',$tiArray[1]) -> delete();
               if( $delNum == 0 ){
                   return json(['status'=>0,'msg'=>'初始化异常，请重试！^_^']);
               }
               
               $dt =[
                   'likes' => 0,
                   'unlikes' => 0
               ];
               $Result = $votes -> save($dt,['id' => $tiArray[1]]);
               if($Result){
                   return json(['status'=>1,'msg'=>'初始化完成！^_^','url'=>url('Zan/index')]);
               }
               return json(['status'=>0,'msg'=>'初始化错误，请再试一次！^_^']);
           }
        }

    }
       
}
