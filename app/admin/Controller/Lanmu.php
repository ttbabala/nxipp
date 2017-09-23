<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Lanmu as tLanmu;
use app\admin\Model\Cats;
use app\admin\Model\Single;


class Lanmu extends Adminbase{
    public function index(){
        //栏目列表
        $lm = new tLanmu();
        $data = $lm -> getLanmuData();
        $this -> assign('data',$data);
        return $this -> fetch();
    }
    
    public function addLanmu(){
        //载入视图
        $cats = new Cats();
        $catslist = $cats ->getCatData();       //载入分类
        $single = new Single();
        $singlelist = $single -> select();
        $this -> assign('singlelist',$singlelist);
        $this -> assign('catslist',$catslist);
        return $this -> fetch();
    }
    
    public function lanmuData(){
        //添加父栏目
        $Request = Request::instance();
        if($Request ->isAjax()){
            //$data = input("post.");
            $lm = new tLanmu();
            $Result = $lm -> addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Lanmu/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败请重试哦^_^']);           
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    public function addSubLanmu(){
        //添加子栏目
        $id = input('id');
        $cats = new Cats();
        $catslist = $cats ->getCatData();       //载入分类
        $single = new Single();
        $singlelist = $single -> select();
        $this -> assign('singlelist',$singlelist);
        $this -> assign('catslist',$catslist);
        $this -> assign('id',$id);
        return $this -> fetch();
    }
    
    public function editLanmu(){
        //编辑栏目
        $Request = Request::instance();
        $id = input('id'); //用于渲染模板时用到的栏目ID
        $lm = new tLanmu();
        $cats = new Cats();
        $catslist = $cats ->getCatData();       //载入分类
        $single = new Single();
        $singlelist = $single -> select();
        if( $Request -> isAjax()){
            $id = input('id');  //模板渲染后通过表单post传递的栏目id
            $result = $lm ->editData($id);
            if ($result){
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Lanmu/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败请重试哦^_^']);
        }    
        $data = $lm -> where('id',$id) -> find();
        $this -> assign('data',$data);
        $this -> assign('singlelist',$singlelist);
        $this -> assign('catslist',$catslist);
        return $this -> fetch();
    }
    
    public function delLanmu(){
        //删除栏目
        $Request = Request::instance();
        $id = input('id');
        if($Request -> isAjax()){
            $lm = new tLanmu();
            $result = $lm ->delData($id);
            if($result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    
    
    
}

