<?php
namespace app\home\Controller;
use think\Controller;
use app\home\Model\Reply_relation;
use think\Request;
use think\Session;

class Reply2 extends Controller{
    public function index(){
        $Request = Request::instance();
        $mid = input('mid');
        $cid = input('cid');
        $rid = input('rid');
        if(Session::has('mid') == null){        //先判断用户是否登陆
            $sessionMid = null;
        }
        if($Request -> isAjax()){
            $datas = input('post.');
            if($datas['mid'] == null){
                return json(['status'=>0,'msg'=>'登陆后才可回复评论！^_^']);
            }
            $rp = new Reply_relation();
            $Result = $rp ->addData();
            if($Result){
               return json(['status'=>1,'msg'=>'回复成功！^_^',]);   
            }
            return json(['status'=>0,'msg'=>'回复失败哦^_^']);
        }
        $sessionMid = Session::get('mid');  
        $this -> assign('mid',$sessionMid); //回复者的ID
        $this -> assign('rid',$rid);        //回复的回复id
        $this -> assign('cid',$cid);        //评论ID
        return $this -> fetch();
    }
}