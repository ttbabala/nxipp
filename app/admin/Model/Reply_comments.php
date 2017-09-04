<?php
namespace app\admin\Model;
use think\Model;
class Reply_comments extends Model{
    protected $pk = 'rid';
    
    public function delData($id){
         /**
         * 删除数据
         */
        $ResNum = $this -> where('rid',$id) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
}


