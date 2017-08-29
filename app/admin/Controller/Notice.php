<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Notice as tNotice;

class Notice extends Adminbase{
    public function index(){
        /**
         * 公告列表
         */
        $notice = Model('Notice');
        $count = count($notice -> select());
        $noticelist = $notice -> order('id','asc') -> paginate(10);
        $page = $noticelist -> render();
        $this -> assign('noticelist',$noticelist);
        $this -> assign('page',$page); 
        return $this -> fetch();    
    }
    
    public function addNotice(){
        /**
         * 添加公告
         */
        $Request = Request::instance();
        if($Request -> isAjax()){
            $notice = new tNotice();
            $result = $notice -> addData();
            if($result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Notice/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        }
        return $this -> fetch();
    }
    
    public function editNotice(){
        /**
         * 编辑公告
         */
        $Request = Request::instance();
        $nid = input('id');  //模板渲染时用到的公告ID
        $notice = new tNotice();
        if($Request ->isAjax()){
            $id = input('nid');  //通过表单post提交的变量
            $result = $notice -> editData($id);
            if($result){
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Notice/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $noticelist = $notice -> where('id',$nid) -> find();
        $this -> assign('noticelist',$noticelist);
        return $this -> fetch();     
    }
    
    public function delNotice(){
        /**
         * 删除公告
         */
        $Request = Request::instance();
        $nid = input('post.id');
        if($Request -> isAjax()){
            $notice = new tNotice();
            $result = $notice ->delData($nid);
            if($result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Notice/index')]);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);    
        }
    }
}
