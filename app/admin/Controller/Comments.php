<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Comments as tComments;
use app\admin\Model\Article;
use app\admin\Model\Members;
use app\admin\Model\Reply_comments as Reply;
use think\Request;
class Comments extends Adminbase{
    public function index(){
        //评论列表
        $Request = Request::instance();
        if($Request -> isAjax()){
            $param_array = [];
            $datas = input('post.');
            if(count($datas)){       
                if($datas['cat_id'] == 'members_uid'){
                    if(!$datas['article_name']){
                       exit(json_encode(array('status'=>0,'msg'=>'评论者id不能为空哦^_^')));
                    }
                    if(!preg_match("/^\d*$/",$datas['article_name'])){   //正则判断评论者ID是否为数字
                       exit(json_encode(array('status'=>0,'msg'=>'评论者id必须为数字哦^_^'))); 
                    }
                    $param_array = ['cat_id' => 'members_uid','article_name' => $datas['article_name']];
                }
                if($datas['cat_id'] == 'comments_aid'){
                    if(!$datas['article_name']){
                       exit(json_encode(array('status'=>0,'msg'=>'评论作品ID不能为空哦^_^')));
                    }
                    if(!preg_match("/^\d*$/",$datas['article_name'])){   //正则判断评论ID是否为数字
                       exit(json_encode(array('status'=>0,'msg'=>'作品id必须为数字哦^_^'))); 
                    }
                    $param_array = ['cat_id' => 'comments_aid','article_name' => $datas['article_name']];
                }
                if($datas['cat_id'] == 'comments_time'){
                    if(!$datas['timearea']){
                       exit(json_encode(array('status'=>0,'msg'=>'时间范围不能为空哦^_^')));
                    }              
                    $param_array = ['cat_id' => 'comments_time','timearea' => $datas['timearea']];
                }
                if($datas['cat_id'] == 'pass'){
                     $param_array = ['cat_id' => 'pass','review' => 1];
                }
                if($datas['cat_id'] == 'nopass'){
                     $param_array = ['cat_id' => 'nopass','review' => 0];
                }
                if($datas['cat_id'] == 'waitpass'){
                     $param_array = ['cat_id' => 'waitpass','review' => 2];
                }
                return json(['status'=>1,'msg'=>'筛选成功,正在显示筛选结果^_^','url'=>urldecode(url('Comments/index',$param_array))]);  
                //问题：URL编码导致不能筛选数据  => 解决：利用urldecode函数对URL解码;
                
            }
            return json(['status'=>0,'msg'=>'筛选异常,您可能没有选择筛选条件^_^']);
        }
        
        $where = "1 = 1"; //初始化where条件
        $filterStyle = input('cat_id');  //筛选类型
        $term = input('article_name');  //评论发布者ID,评论作品名称
        //$time = input('timearea');          //日期范围
        $time = $Request ->param('timearea');
        if(isset($time)){
            $timearr= explode('|',$time); 
        }
        if(isset($filterStyle)){
            switch($filterStyle){
                case 'members_uid':
                    $where = "mid = $term";
                    break;
                case 'comments_aid':
                    $where = "aid = $term";
                    break;
                case 'comments_time':
                    $where = "UNIX_TIMESTAMP(date) >= '".strtotime($timearr[0])."' "
                        . "and UNIX_TIMESTAMP(date) < '".strtotime($timearr[1])."'"; //选择UNIX_TIMESTAMP先将date类型转化为时间戳，然后再进行比较
                    break;
                case 'pass':
                    $where = "review = 1";
                    break;
                case 'nopass':
                    $where = "review = 0";
                    break;
                case 'waitpass':
                    $where = "review = 2";
                    break;
            }
        }
        
        $ct = new tComments();
        $at = new Article();
        $mt = new Members();
        $rt = new Reply();
        $commentsData = $ct -> where($where) -> order('date','asc') -> paginate(10);
        $page = $commentsData -> render();       
        for($i=0;$i<count($commentsData);$i++){
            $commentsData[$i]['ctitle'] = $at -> where('aid',$commentsData[$i]['aid']) -> column('article_title');
            if($commentsData[$i]['ctitle'] == null){
                return $this -> error('还没有对于网站作品的评论哦！');
            }
            $commentsData[$i]['mname'] = $mt -> where('mid',$commentsData[$i]['mid']) -> column('mname');
            $commentsData[$i]['rnums'] = count($rt -> where('cid',$commentsData[$i]['cid']) -> select());
        }
        $this -> assign('page',$page);
        $this -> assign('commentsData',$commentsData);
        return $this -> fetch();
    }
    
    public function reviewComments(){
        //评论审核
        $Request = Request::instance();
        $sensid = explode(",",input('sensid'));
        if($Request -> isAjax()){
           $ct = new tComments();
           if($sensid[1] == 1){
                $data = ([
                  'review' => '1'
                ]);
           }else{
                $data = ([
                  'review' => '0' 
                ]); 
           }
           $Result = $ct -> save($data,['cid'=>$sensid[0]]); 
           if($Result){
               return json(['status'=>1,'msg'=>'评论更新完成！^_^','url'=>url('Comments/index')]); 
           }
           return json(['status'=>0,'msg'=>'评论更新失败哦^_^']);
        }
    }
    
    
    public function delComments(){
        //删除评论
        $Request = Request::instance();
        $id = input('id');
        $ct = new tComments();
        if( $Request ->isAjax() ){
            $Result = $ct -> delData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Comments/index')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
    
    public function ajaxCommentsNotice(){
        //评论审核通知处理
        $cm = new tComments();
        $commentsData = $cm -> where('review',2) -> where('isshow',1) -> select();
        $comments_amount = count($commentsData);
        echo $comments_amount;
    }
    
    public function clComments(){
        //批量删除评论、审核评论
        $post_str = input('post_str');
        $postArray = explode("|",$post_str);
        $cm = new tComments();
        if($postArray[0] == 'del_all'){
          if( strpos($postArray[1],",") == false){
              $ResultNum = $cm -> where('cid',$postArray[1]) -> delete();
          }
          $ResultNum = $cm -> where('cid','in',explode(",",$postArray[1])) -> delete();
          if($ResultNum >= 1){
             return json(['status'=>1,'msg'=>'删除成功^_^']);
          }
          return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        if($postArray[0] == 'pass'){
            $datas = [
              'review' => 1
            ];
            if( strpos($postArray[1],",") == false){        
              $ResultNum = $cm -> save($datas,['cid'=>$postArray[1]]);
            }
            $ResultNum = $cm -> where('cid','in',explode(",",$postArray[1])) -> save($datas);
            if($ResultNum >= 1) {
                return json(['stutus'=>1,'msg'=>'批量审核通过^_^']);
            }
            return json(['status'=>0,'msg'=>'批量审核失败哦^_^']);
        }
        
    }
    
    public function sensitiveWords(){
        //屏蔽敏感词汇
    }
    
    public function fliterIp(){
        //ip过滤
    }
    
}

