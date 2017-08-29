<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Columns;
use app\admin\Model\Power as tPower;

class Power extends Adminbase{
    public function index(){
        $power = new tPower();
        $powerlist = $power -> select();
        $columns = new Columns();
        for($i=0;$i<count($powerlist);$i++){
            $columnsList[$i]= $columns -> where('id','in',explode(',',$powerlist[$i]['controllerModel'])) -> column('name');
            $powerlist[$i]['cname'] = implode('&nbsp|&nbsp',$columnsList[$i]);
        }
        $this -> assign('powerlistData',$powerlist);
        return $this -> fetch();
    }
    
    public function addRole(){
        $Request = Request::instance();
        if( $Request ->isAjax() ){
            $power = new tPower();
            $Result = $power ->addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Power/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        }
        $column = new Columns();
        $columnsList = $column -> select();
        $this -> assign('columnsList',$columnsList);
        return $this -> fetch();
    }
    
    public function editPower(){
        $Request = Request::instance();
        $pid = input('id');
        $power = new tPower();
        if( $Request ->isAjax() ){
            $id = input('id');
            $Result = $power -> editData($id);
            if($Result){
               return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Power/index')]); 
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $columns = new Columns();
        $columnData = $columns -> select();  //查询全部栏目
        $powerData = $power -> where('id',$pid) -> find(); // 查询指定ID所对应的权限
        $this -> assign('columnData',$columnData); 
        $this -> assign('powerData',$powerData);
        return $this -> fetch();
        
    }
    
    public function delPower(){
        $Request = Request::instance();
        $pid = input('id');
        $power = new tPower();
        if( $Request ->isAjax() ){
            $Result = $power -> delData($pid);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Power/index')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
}