<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;

class Clearcache extends Adminbase{
    private function _deleteDir($R){
    $handle = opendir($R);
    while(($item = readdir($handle)) !== false){
        if($item != '.' and $item != '..'){
            if(is_dir($R.'/'.$item)){
                $this->_deleteDir($R.'/'.$item);
            }else{
            if(!unlink($R.'/'.$item))
                die('error!');
            }
        }
    }
        closedir( $handle );
        return rmdir($R); 
    }
    
    public function clearRuntime(){
        $Request = Request::instance();
        if($Request -> isAjax()){
            $R = RUNTIME_PATH;
            if($this->_deleteDir($R)){
                return json(['status'=>1,'msg'=>'缓存删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'缓存删除失败哦^_^']);
        } 
    }
}

