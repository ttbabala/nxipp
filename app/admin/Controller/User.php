<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Model;
use think\Request;
use app\admin\Model\User as tUser;  //定义别名，防止和控制器名一致而引发冲突
use app\admin\Model\Auth_group as Part;

class User extends Adminbase{
    public function _initialize() {
        parent::_initialize();
    }
    
    public function userList(){
        $User = Model('User');
        $userArray = $User -> select();   //查询用户总记录数
        $count = count($userArray);  //统计查询结果条目
        $userlistData = $User -> order('authorization','asc') -> paginate(10);
        $page = $userlistData -> render();
        $part = new Part();
        $partData = $part -> select();   
        $columnName = '用户列表';
        $this -> assign('page',$page);
        $this -> assign('partData',$partData);
        $this -> assign('userlist',$userlistData);
        $this -> assign('columnName',$columnName);
        return $this -> fetch();    
    }
    
    public function addUser(){
        $Request = Request::instance();      
        if($Request -> isAjax()){
            $user = new tUser();
            $Result = $user ->addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('User/userList')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        }
        $part = new Part();
        $partData = $part -> select();   
        $this -> assign('partData',$partData);
        return $this -> fetch();    
    }
    
    public function delUser(){
       $Request = Request::instance();
       $uid = input('post.userid');     
       if($Request -> isAjax()){
            $user = new tUser();
            $Result = $user ->delData($uid);
            if($Result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    public function editUser(){
        $Request = Request::instance();
        $uid = input('id');  //用于模板渲染的用户id
        $user = new tUser();
        if($Request -> isAjax()){
            $userid = input('post.userid');  //模板渲染后通过表单post传递的用户id
            $Result = $user ->editData($userid);
            if($Result) {
                return json(['status'=>1,'msg'=>'编辑成功^_^']);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $userData = $user -> where('id',$uid) -> find();
        $part = new Part();
        $partData = $part -> select();
        $this -> assign('partData',$partData);
        $this -> assign('userData',$userData);
        return $this -> fetch();     
    }
    

}


