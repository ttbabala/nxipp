<?php  
namespace app\api\Controller;  
use think\Controller;  
use think\Request;  
class Image extends Controller  
{  
     public function upload(){
        $Request = Request::instance();
        $file = $Request -> file("file");  
        //给定一个目录  
        $info = $file->move('public' . DS . 'uploads'. DS .'headpic');  
        if($info && $info->getPathname()){ 
            $path = substr_replace($info->getPathname(),'',strpos($info->getPathname(),'.'),1); //替换掉URL中多余的"."
            return json(['status'=>1,'msg' => 'success','src' =>'/nxipp/'.$info->getPathname()]);
           //return show(1,'success','/'.$info->getPathname());  
        }  
        return json(['status'=>0,'msg'=>'upload error']);
        //return show(0,'upload error'); 
    }  
}  