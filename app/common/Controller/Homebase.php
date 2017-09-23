<?php
namespace app\common\Controller;
use think\Controller;
use app\admin\Model\Lanmu;
use app\admin\Model\System;
use app\admin\Model\Members;
use app\admin\Model\Single;
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
        $rootUrl = getRootUrl();
        $system = new System();
        $link[0] = $system -> column('link');
        $linkStr = implode("|",$link[0]);
        $linkArr = explode("|",$linkStr);
        foreach($linkArr as $key => $linkSingle){       
            $link[$key] = explode(",",$linkSingle); //逐次拆分单项
            foreach($link[$key] as $linklogo){      //单项再次拆分
                if($linklogo == 'null'){
                    unset($link[$key]);     //将对应项为null的数组元素清除
                }
            }
        }
        $linkData = array_values($link); //unset后重建索引
        $single = new Single();
        $description = $single -> where('aliasname','aboutus') -> column('description');
        $this -> assign('description',$description[0]);
        $this -> assign('linkData',$linkData);
        $this -> assign('rootUrl',$rootUrl);
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

