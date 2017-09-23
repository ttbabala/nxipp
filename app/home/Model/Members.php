<?php
namespace app\home\Model;
use think\Model;
use think\Session;
use think\Request;
use app\admin\Model\System;

class Members extends Model{
    protected $pk = 'mid';
    
    public function addData(){  //添加注册会员
        $datas = input('post.');
        $system = new System();
        $ipData = $system -> column('filterips');
        $ipStr = implode('|',$ipData);
        $ipArr = explode('|',$ipStr);
        if(in_array($datas['ip'],$ipArr)){
            exit(json_encode(array('status'=>0,'msg'=>'您的ip已被管理员禁止访问，请联系管理员开通！^_^')));
        }
        if(!$datas['username']){
            exit(json_encode(array('status'=>0,'msg'=>'会员名不能为空哦^_^')));
        }
        if(!$datas['email']){
            exit(json_encode(array('status'=>0,'msg'=>'会员email不能为空哦^_^')));
        }else{
            $pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i"; //正则验证邮箱格式
            if(!preg_match($pattern,$datas['email'])){
                exit(json_encode(array('status'=>0,'msg'=>'Email格式错误哦^_^')));
            }       
        }
        if(!$datas['password']){
            exit(json_encode(array('status'=>0,'msg'=>'密码不能为空哦^_^')));
        }
        if(!$datas['confirm_password']){
           exit(json_encode(array('status'=>0,'msg'=>'确认密码不能为空哦^_^'))); 
        }else{
            if( $datas['password'] !== $datas['confirm_password'] ){
                exit(json_encode(array('status'=>0,'msg'=>'两次输入的密码不一致哦^_^')));
            }
        }       
        if(!$datas['code']){
           exit(json_encode(array('status'=>0,'msg'=>'验证码不能为空哦^_^'))); 
        }else{
            if(strtolower($datas['code']) !== strtolower(Session::get('code','wll_'))){ //验证码不区分大小写
                exit(json_encode(array('status'=>0,'msg'=>'验证码错误哦^_^'))); 
            }
        }
        $headimgurl = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$datas['headimgUrl']);
        $Request = Request::instance();
        $this -> data([
            'headpic' => $headimgurl,
            'mname' => $datas['username'],
            'pass' => encryption($datas['password']),//自定义加密函数加密
            'email' => $datas['email'],
            'register_time' => date("Y-m-d H:i:s",time()),
            'gmt_time' => null,
            'gmt_ip' => $Request ->ip(),
            'status' => '1'
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
    }
    
    public function checkData(){    //登陆验证
        $datas = input('post.');
        $system = new System();
        $ipData = $system -> column('filterips');
        $ipStr = implode('|',$ipData);
        $ipArr = explode('|',$ipStr);
        if(in_array($datas['ip'],$ipArr)){
            exit(json_encode(array('status'=>0,'msg'=>'您的ip已被管理员禁止访问，请联系管理员开通！^_^')));
        }
        if(!$datas['username']){
            exit(json_encode(array('status'=>0,'msg'=>'会员名不能为空哦^_^')));
        }
        if(!$datas['password']){
            exit(json_encode(array('status'=>0,'msg'=>'密码不能为空哦^_^')));
        }
        if(!$datas['code']){
           exit(json_encode(array('status'=>0,'msg'=>'验证码不能为空哦^_^'))); 
        }else{
            if(strtolower($datas['code']) !== strtolower(Session::get('code','wll_'))){ //验证码不区分大小写
                exit(json_encode(array('status'=>0,'msg'=>'验证码错误哦^_^'))); 
            }
        }
        $ResultData = $this -> where('mname',$datas['username']) -> where('pass',encryption($datas['password'])) -> find();
        if(count($ResultData)){
            //Session::set('mid',$ResultData['mid']);
            return $ResultData['mid'];
        }
        return false;
        
    }
    
}

