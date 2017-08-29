<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Auth_group;
use app\admin\Model\Auth_rule;

class Part extends Adminbase{
    public function index(){
        $ag = new Auth_group();
        $aglist = $ag -> order('id','asc') -> paginate(10);
        $page = $aglist -> render();
        $ar = new Auth_rule();
        for($i=0;$i<count($aglist);$i++){
            $arData[$i] = $ar -> where('id','in',explode(",",$aglist[$i]['rules'])) -> order('id', 'asc')-> column('title');
            $aglist[$i]['ruletitle'] = implode('&nbsp|&nbsp',$arData[$i]);
        }
        $this -> assign('page',$page);
        $this -> assign('aglistData',$aglist);
        return $this -> fetch();
    }
    
    public function addPart(){
        $Request = Request::instance();
        if( $Request ->isAjax() ){
            $ag = new Auth_group();
            $Result = $ag ->addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Part/index')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        }
        $ar = new Auth_rule();
        $arlist = $ar -> select();
        $this -> assign('arlist',$arlist);
        return $this -> fetch();
    }
    
    public function editPart(){
        $Request = Request::instance();
        $pid = input('id');  //用于模板渲染的角色ID
        $ag = new Auth_group();
        if( $Request ->isAjax() ){
            $id = input('id');  //模板渲染后通过post表单传递的角色ID
            $Result = $ag -> editData($id);
            if($Result){
               return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Part/index')]); 
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $ar = new Auth_rule();
        $arlist = $ar -> select();
        $this -> assign('arlist',$arlist);
        $agData = $ag -> where('id',$pid) -> find(); // 查询指定ID所对应的权限
        $this -> assign('agData',$agData);
        return $this -> fetch();
        
    }
    
    public function delPart(){
        $Request = Request::instance();
        $id = input('id');
        $ag = new Auth_group();
        if( $Request ->isAjax() ){
            $Result = $ag -> delData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Part/index')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
}
