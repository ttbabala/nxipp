<?php
namespace app\home\Controller;
use think\Controller;
use app\home\Model\Reply_comments;
use think\Request;
use think\Session;

class Reply extends Controller{
    public function index(){
        $Request = Request::instance();
        $to_mid = input('mid');
        $cid = input('cid');
        if(Session::has('mid') == null){        //先判断用户是否登陆
            $sessionMid = null;
        }
        if($Request -> isAjax()){
            $datas = input('post.');
            if($datas['mid'] == null){
                return json(['status'=>0,'msg'=>'登陆后才可回复评论！^_^']);
            }
            $rp = new Reply_comments();
            $Result = $rp ->addData();
            if($Result){
               return json(['status'=>1,'msg'=>'回复成功！^_^',]);   
            }
            return json(['status'=>0,'msg'=>'回复失败哦^_^']);
        }
        $sessionMid = Session::get('mid');  
        $this -> assign('mid',$sessionMid); //回复者的ID
        $this -> assign('to_mid',$to_mid);  //被回复者的ID
        $this -> assign('cid',$cid);        //评论ID
        return $this -> fetch();
    }
}

