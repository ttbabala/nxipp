<?php
namespace app\home\Model;
use think\Model;
use app\admin\Model\System;

class Comments extends Model{
    protected $pk = 'cid';
    
    public function addData($mid){
        $membersId = $mid;
        $datas = input('post.');
        $st = new System();
        $senswords =  $st -> column('senswords');
        $sensStr= implode('|',$senswords);
        $sensArr = explode('|',$sensStr);
        if(isset($datas) /*&& empty($datas) == false*/){
            $this -> data = ([
                'aid' => $datas['aid'],
                'ctext' => censor($datas['cMessage'],$sensArr),     //过滤屏蔽词汇
                'mid' => $membersId,
                'mip' => getIP(),
                'date' => date('Y-m-d H:i:s',time()),
            ]);
            if($this -> save()){
                return true;
            }
            return false;
        }
    }
}

