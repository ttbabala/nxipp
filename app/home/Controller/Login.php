<?php
namespace app\home\Controller;
use app\home\Model\Members;
use think\Controller;
use think\Request;
use think\Session;


class Login extends Controller{
     public function index(){
        $Request = Request::instance();
        if($Request ->isAjax()){
            $mb = new Members();
            $mid = $mb -> checkData();      //接收mid
            if($mid !== false){
                 Session::set('mid',$mid); //会员ID存入session
                 return json(['status'=>1,'msg'=>'会员登陆成功^_^']);
            }
            return json(['status'=>0,'msg'=>'用户名或密码错误哦^_^']);
        }
        return $this -> fetch();
    }
    
    //控制器中 获取验证码
    public function get_captcha(){    
        //使用memcheck 设置session    
        Session::init(['prefix'=> 'wll_','type'=> '','auto_start' => true]);
        $captcha = new \other\Captcha(86,48,4);
        echo $captcha->showImg();       
        Session::set('code',$captcha->getCaptcha());
        exit;    
    }
    
    //会员退出
    public function logout(){
        //清空会员session
        $mid = input('mid');
        if(Session::has('mid')){
            if($mid !== ''){
                Session::delete('mid');
                return json(['status'=>1,'msg'=>'您已成功退出网站^_^']);
            }
            return json(['status'=>0,'msg'=>'退出失败哦^_^']);         
        }   
    }
    
}
