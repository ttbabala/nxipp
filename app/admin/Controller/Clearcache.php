<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Article;
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
            $predis = new \Predis\Client();
            $keys = $predis -> keys('post:*');  //获取所有文章浏览量的键
            $at = new Article();
            foreach($keys as $key){             //遍历每一个键
                $aid = substr($key,5);
                $viewcount = $predis -> hget('post:'.$aid,'viewcount'); //从中取出每一个键的字段（viewcount）对应的值
                $datas = ([
                   'viewcount' => $viewcount 
                ]);
                $at -> save($datas,['aid'=>$aid]);              //将对应的值（浏览量）转存至数据库中
                $predis -> hdel('post:'.$aid,'viewcount');      //删除所有匹配的键
            }
            if($this->_deleteDir($R)){
                return json(['status'=>1,'msg'=>'缓存删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'缓存删除失败哦^_^']);
        } 
    }
}

