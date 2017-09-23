<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Single as tSingle;
use think\Request;

class Single extends Adminbase{
    public function index(){
        $single = new tSingle();
        $singleData = $single -> order('id','asc') -> paginate(10);
        $page = $singleData -> render();
        $this -> assign('page',$page);
        $this -> assign('singleData',$singleData);
        return $this -> fetch();
    }
    
    public function addSingle(){
        $Request = Request::instance();
        if($Request ->isAjax()){
            $single = new tSingle();
            $Result = $single -> addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Single/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
            
        }
        return $this -> fetch();
    }
    
    public function editSingle(){
        $Request = Request::instance();
        $id = input('id');
        $single = new tSingle();
        if($Request ->isAjax()){
            $Result = $single -> editData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Single/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $singleData = $single -> where('id',$id) -> find();
        $this -> assign('singleData',$singleData);
        return $this -> fetch();
    }
    
    public function delSingle(){
       $Request = Request::instance();
       $id = input('id');     
       if($Request -> isAjax()){
            $single = new tSingle();
            $Result = $single ->delData($id);
            if($Result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
}

