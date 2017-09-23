<?php
namespace app\home\Controller;
use think\Controller;
use think\Request;
use think\Session;
use app\home\Model\Members;

class Register extends Controller{
    public function index(){
        $Request = Request::instance();
        if($Request ->isAjax()){
            $mb = new Members();
            $Result = $mb -> addData();
            if($Result){
                 return json(['status'=>1,'msg'=>'恭喜，会员注册成功^_^','url'=>url('Register/index')]);
            }
            return json(['status'=>0,'msg'=>'注册失败哦^_^']);
        }
        $MemberIp = getIP();                        //用于排查是否进入ip黑名单
        $this -> assign('MemberIp',$MemberIp);      
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
    
}
