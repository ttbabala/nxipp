<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Columns as tColumns;

class Columns extends Adminbase{
    public function index(){
        /**
         * 栏目列表
         */
        $Columns = Model('Columns');
        $ResultArray = $Columns -> select();   //查询栏目总记录数
        $count = count($ResultArray);  //统计查询结果条目
        $columnListData = $Columns -> order('sort','asc') -> paginate(10);
        $page = $columnListData -> render();
        $this -> assign('page',$page);
        $this -> assign('columnListData',$columnListData);
        return $this -> fetch();       
    }
    
    public function addColumn(){
        /**
         * 添加栏目
         */
        $Request = Request::instance();
        if($Request ->isAjax()){
            $columns = new tColumns();
            $Result = $columns ->addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Columns/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        } 
        return $this -> fetch();
    }
    
    public function editColumn(){
        /**
         * 编辑栏目
         */
        $Request = Request::instance();
        $id = input('id');
        $column = new tColumns();
        if($Request -> isAjax()){
           $cid = input('post.id');
           $Result = $column -> editData($cid);
           if($Result){
               return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Columns/index')]);
           }
           return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $columnData = $column -> where('id',$id) -> find();
        $this -> assign('columnData',$columnData);
        return $this -> fetch();
        
    }
    
    public function delColumn(){
        /**
         * 删除栏目
         */
        $Request = Request::instance();
        $id = input('id');
        $column = new tColumns();
        if( $Request ->isAjax() ){
            $Result = $column -> delData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Columns/index')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        
    }
}
