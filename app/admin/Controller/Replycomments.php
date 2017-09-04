<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Reply_comments as Reply;
use app\admin\Model\Members;
use app\admin\Model\Comments;
use app\admin\Model\Article;
use think\Request;

class Replycomments extends AdminBase{
    public function index(){
        
    }
    
    public function listReply(){
        //处理针对某一条评论的回复
        $cid = input('cid');
        $mname = input('mname');
        $ctitle = input('ctitle');
        $rp = new Reply();
        $mb = new Members();
        $cm = new Comments();
        $at = new Article();
        $replyData = $rp -> where('cid',$cid) -> order('replyTime','desc') -> paginate(10);
        for($i=0;$i<count($replyData);$i++){
            $replyData[$i]['fromname'] = $mb -> where('mid',$replyData[$i]['fromUserid']) -> column('mname');
            $replyData[$i]['toname'] = $mb -> where('mid',$replyData[$i]['toUserid']) -> column('mname');
        }
        $page = $replyData -> render();
        $this -> assign('mname',$mname);
        $this -> assign('page',$page);
        $this -> assign('replyData',$replyData);
        return $this -> fetch();   
    }
    
    public function reviewReply(){
        //评论回复审核
        $Request = Request::instance();
        $sensid = explode(",",input('sensid'));
        if($Request -> isAjax()){
           $cr = new Reply();
           if($sensid[1] == 1){
                $data = ([
                  'review' => '1'
                ]);
           }else{
                $data = ([
                  'review' => '0' 
                ]); 
           }
           $Result = $cr -> save($data,['rid'=>$sensid[0]]); 
           if($Result){
               return json(['status'=>1,'msg'=>'评论回复更新完成！^_^','url'=>url('Replycomments/listReply')]); 
           }
           return json(['status'=>0,'msg'=>'评论回复更新失败哦^_^']);
        }
    }
    
    public function delReply(){
        //删除评论回复
        $Request = Request::instance();
        $id = input('id');
        $rp = new Reply();
        if( $Request ->isAjax() ){
            $Result = $rp -> delData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Replycomments/listReply')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
}