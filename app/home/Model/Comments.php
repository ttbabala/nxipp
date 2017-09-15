<?php
namespace app\home\Model;
use think\Model;

class Comments extends Model{
    protected $pk = 'cid';
    
    public function addData($mid){
        $membersId = $mid;
        $datas = input('post.');
        if(isset($datas) /*&& empty($datas) == false*/){
            $this -> data = ([
                'aid' => $datas['aid'],
                'ctext' => $datas['cMessage'],
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

