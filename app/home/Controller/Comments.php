<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\home\Model\Comments as tComments;
use think\Request;
use think\Session;

class Comments extends Homebase{
    public function addComments(){
         //发布评论
        $Request = Request::instance();
        if(Session::has('mid') == null){
            return json(['status'=>0,'msg'=>'登陆后才可评论！^_^']);
        }
        if($Request -> isAjax()){
            $cm = new tComments();
            $mid = Session::get('mid');
            $Result = $cm -> addData($mid);
            if($Result){
                return json(['status'=>1,'msg'=>'评论发布成功^_^']);
            }
            return json(['status'=>0,'msg'=>'评论发布失败哦^_^']);
        }
    }
}

