<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\System as tSystem;
use think\Request;
class System extends Adminbase{
    public function index(){
        $Request = Request::instance();
        if($Request -> isAjax()){
           $st = new tSystem();
           $systemData = $st -> select();
           if(count($systemData)){  //更新
              $id = input("isup");
              $Result = $st -> upData($id); 
              if($Result == 1){
                    return json(['status'=>1,'msg'=>'更新成功^_^','url'=>url('System/index')]); 
              }
              //var_dump($Result);exit();
              return json(['status'=>0,'msg'=>'更新失败哦^_^']); 
              //return json(['status'=>0,'msg'=> json_encode($Result)]); 
           }else{       //新增
              $Result = $st -> addData();
              if($Result){
                    return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('System/index')]); 
              }
              return json(['status'=>0,'msg'=>'添加失败哦^_^']); 
           }
        }
        $st = new tSystem();
        $systemData = $st -> find();
        if(count($systemData) == 1){
            if(isset($systemData["huandengimg"])){
                $hdarray = explode(",",$systemData["huandengimg"]);
                $this -> assign('hdarray',$hdarray);
            }
            if(isset($systemData["link"])){
               $linka1 = explode("|",$systemData["link"]);  //先拆分成多个项
               for($i=0;$i<count($linka1);$i++){    
                   $linka2[$i] = explode(",",$linka1[$i]);  //再得到每一项中的值
                   $linkstr[$i] = implode(",",$linka2[$i]); //数组转字符串
                   $linka3[$i] = explode(",",$linkstr[$i]); //再转成最终的数组
               }
               $this -> assign("linkarray",$linka3);
            }
            $this -> assign('systemData',$systemData);
        }else{
            $hdarray = array(null,null,null,null,null);
            $linkarray = array(null,null,null,null,null,null);
            $this -> assign('hdarray',$hdarray);
            $this -> assign('linkarray',$linkarray);
        }
        return $this ->fetch();
    }
}
