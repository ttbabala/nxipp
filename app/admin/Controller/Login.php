<?php
namespace app\admin\Controller;
use think\Controller;
use think\Model;
use think\Session;


class Login extends Controller{
    //用户登陆前端控制器
    public function index(){
        $title = "用户后台登陆";
        $webtitle = "宁夏大学新闻传播学院新闻原创类作品后台管理系统";
        $this -> assign('webtitle',$webtitle);
        $this -> assign('title',$title);
        return $this -> fetch();
    }
    
    //用户登陆处理控制器
    public function login(){
         $datas = input('post.');
         $user = Model('User');
         $result = $user -> where('uname',$datas['username']) -> find();
         if ( !$result ) {
                echo json_encode(array('status' => 0, 'msg' => '用户不存在^_^'));exit();
           }
           if ( !(bcryptVerfy($datas['pwd'],$result['upass'])) ) {
                echo json_encode(array('status' => 0, 'msg' => '密码错误^_^'));exit();
           }
           if ( $result['ustatus'] == '0') {
                echo json_encode(array('status' => 0, 'msg' => '该账号已被锁定,请联系管理员^_^'));exit();
           }

        $data= array(
            'last_logintime' => date('Y-m-d H:i:s', time()),
            'last_ip'   =>  getIP()
        );

        $user -> where('uname',$datas['username']) -> update($data);

          //$this->ajaxReturn($rv);
        session('userid', $result['id']);
        echo json_encode(array('status' => 1, 'msg' => '登陆成功^_^','url' => url('Index/index')));exit();
    }
    
    //用户退出控制器
    public function logout(){
        session('userid',null);
        $this ->redirect('Login/index');
    }
}