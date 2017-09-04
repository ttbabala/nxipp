<?php
namespace app\admin\Model;
use think\Model;

class Comments extends Model{
    protected $pk = 'cid';
    
    public function delData($id){
        /**
         * 删除数据
         */
        $ResNum = $this -> where('cid',$id) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
}