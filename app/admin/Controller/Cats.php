<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use think\Model;
use app\admin\Model\Cats as tCats;

class Cats extends Adminbase{
    public function index(){
        $cat = new tCats;
        $data = $cat -> getCatData();
        $this -> assign('data',$data);
        return $this -> fetch();
    }
    /**
     * 载入添加分类页面
     */
    public function addCategory(){
        return $this -> fetch();
    }
   
    
    /**
     * 异步添加分类数据
     */
    public function categoryData(){
         $Request = Request::instance();
         if ($Request ->isAjax()) {
            $cat = new tCats();
            $result = $cat ->addData();
            if ($result) {
                 return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Cats/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败请重试哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    /**
     * 添加子分类页面
     */
    public function addSubclassification(){
        $catid = input('catid');
        $this -> assign('catid',$catid);
        return $this -> fetch();
    }
    
    /**
     *  编辑分类
     */
    public function editCategory(){
        $Request = Request::instance();
        $catid = input('catid'); //用于渲染模板时用到的分类ID
        $cat = new tCats();
        if( $Request -> isAjax()){
            $cid = input('catid');  //模板渲染后通过表单post传递的分类id
            $result = $cat ->editData($cid);
            if ($result){
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Cats/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败请重试哦^_^']);
        }    
        $data = $cat -> where('catid',$catid) -> select();
        $this -> assign('data',$data);
        return $this -> fetch();
    }
    
    /**
     *  删除分类
     */
    public function delCategory(){
        $Request = Request::instance();
        $catid = input('catid');
        if($Request -> isAjax()){
            $cat = new tCats();
            $result = $cat ->delData($catid);
            if($result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
}


