<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Members as tMembers;
use think\Request;

class Members extends Adminbase{
    public function index(){
        $mb = new tMembers();
        $mdata = $mb -> order('mid','asc') -> paginate(10);
        $page = $mdata -> render();
        $this -> assign('page',$page);
        $this -> assign('membersData',$mdata);
        return $this -> fetch();
    }
    
    public function addMember(){
        $Request = Request::instance();
        if($Request->isAjax()){
            $mb = new tMembers();
            $result = $mb -> addData();
            if($result){
                return json(['status'=>1,'msg'=>'提交成功^_^','url'=>url('Members/index')]);
            }
            return json(['status'=>0,'msg'=>'提交失败^_^']);
        }
        return $this -> fetch();
    }
    
    public function editMember(){
        $Request = Request::instance();
        $mid = input('mid');  //用于模板渲染的会员id
        $mb = new tMembers();
        if($Request -> isAjax()){
            $mid = input('post.mid');  //模板渲染后通过表单post传递的会员id
            $Result = $mb ->editData($mid);
            if($Result) {
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Members/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $memberData = $mb -> where("mid",$mid) -> find();
        $this -> assign('memberData',$memberData);
        return $this -> fetch();
    }
    
    public function delMember(){
       $Request = Request::instance();
       $mid = input('mid');     
       if($Request -> isAjax()){
            $mb = new tMembers();
            $Result = $mb ->delData($mid);
            if($Result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    
}
