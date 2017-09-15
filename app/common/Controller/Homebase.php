<?php
namespace app\common\Controller;
use think\Controller;
use app\admin\Model\Lanmu;
use app\admin\Model\System;
use app\admin\Model\Members;
use think\Session;
use think\Loader;


class Homebase extends Controller{
    public function _initialize() {
        $mid = Session::get('mid');
        $mb = new Members();
        $mbData = $mb -> where('mid',$mid) -> find();
           if(count($mbData)){
              $this -> assign('headpic',$mbData['headpic']);
              $this -> assign('mname',$mbData['mname']);
              if($mbData['status'] == 0){
                $this->error('该账号已被锁定，请联系管理员哦^_^',url('Index/index')); 
              }
           }
        $data = $this -> getLanmuData();
        $st = new System();
        $webname = $st -> column('webname');
        $this -> assign('mid',$mid);
        $this -> assign('webname',$webname);
        $this -> assign('lanmuData',$data);
    }
    
    public function getLanmuData(){
        $lanmu = new Lanmu();
        $lanmuData = $lanmu -> order('sort','asc') -> select();
        //导入Data库类  获得树状图形
        Loader::import('org\Data', EXTEND_PATH);
        $d = new \org\Data();
        $datalist = $d -> channelLevel($lanmuData,0,'&nbsp;','id','pid');
        //$dl = $d -> channelList($lanmuData,0,'&nbsp;','id','pid');
        return $datalist;
    }
}

