<?php
namespace app\admin\Model;
use think\Model;

class System extends Model{
    protected $pk = 'id';
    
    public function upData($id){
        //更新数据
        $data = input("post.");
        $imgArray = [];
        $linkArray = [];
        $linkArrayimg = [];
        if(!$data['webname']){
             exit(json_encode(array('status'=>0,'msg'=>'站点名称不能为空哦^_^'))); 
        }
        if(!$data['senswords']){
             exit(json_encode(array('status'=>0,'msg'=>'屏蔽词汇不能为空哦^_^')));  
        }
        for($i=0;$i<5;$i++){            //处理幻灯图片路径
                    if($data["imgUrl$i"] == 'null'){
                        $imgArray[$i] == 'null';
                    }
                    if(strstr($data["imgUrl$i"],$_SERVER['HTTP_HOST'])){
                        $imgArray[$i] = str_replace("\\","/",$data["imgUrl$i"]);
                    }else{
                       $imgArray[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["imgUrl$i"]); 
                    }
        }
        
        for($i=0;$i<4;$i++){            //处理友情链接logo图片路径
                    if($data["linktxt$i"] == ''){
                        $data["linktxt$i"] == 'null';
                    }
                    if($data["linkimg$i"] == ''){
                        $linkArrayimg[$i] == 'null';
                    }           
                    
                    if(strstr($data["linkimg$i"],$_SERVER['HTTP_HOST'])){
                        $linkArrayimg[$i] = str_replace("\\","/",$data["linkimg$i"]);
                    }else{
                       $linkArrayimg[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["linkimg$i"]); 
                    }
                    $linkArray[$i] = $data["linktxt$i"].",".$linkArrayimg[$i];
        }
        $linkStr = implode("|",$linkArray);
        $datas = [
          'webname' => $data['webname'],
          'com' => $data['com'],
          'opencomments' => $data['opencomments'],
          'senswords' => $data['senswords'],
          'filterips' => $data['filterIp'],
          'huandengimg' => implode(",",$imgArray),
          'link' => $linkStr
        ];
        if ($this -> save($datas,['id' => $id]) ) {
            return true;
        }
        return false;

    }
    
    public function addData(){
        //新增数据
        $data = input("post.");
        $imgArray = [];
        if(!$data['webname']){
             exit(json_encode(array('status'=>0,'msg'=>'站点名称不能为空哦^_^'))); 
        }
        if(!$data['senswords']){
             exit(json_encode(array('status'=>0,'msg'=>'屏蔽词汇不能为空哦^_^')));  
        }
        for($i=0;$i<5;$i++){
                 if($data["imgUrl$i"] !== ''){
                     $imgArray[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["imgUrl$i"]);
                 }else{
                   $imgArray[$i] = 'null';  
                 }
        }
        $this -> data = [
          'webname' => $data['webname'],
          'com' => $data['com'],
          'opencomments' => $data['opencomments'],
          'senswords' => $data['senswords'],
          'filterips' => $data['filterIp'],
          'huandengimg' => implode(",",$imgArray),
          'link' => 'http://www.sohu.com/'
        ];
        if($this -> save()){
               return true;
           }
        return false;
    }
}
