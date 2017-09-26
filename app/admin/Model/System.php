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
        $hdlinkArrayimg = [];
        if(!$data['webname']){
             exit(json_encode(array('status'=>0,'msg'=>'站点名称不能为空哦^_^'))); 
        }
        if(!$data['web_title']){
             exit(json_encode(array('status'=>0,'msg'=>'站点标题不能为空哦^_^'))); 
        }
        if(!$data['web_description']){
             exit(json_encode(array('status'=>0,'msg'=>'站点描述不能为空哦^_^'))); 
        }
        if(!$data['senswords']){
             exit(json_encode(array('status'=>0,'msg'=>'屏蔽词汇不能为空哦^_^')));  
        } 
        for($i=0;$i<5;$i++){            //处理幻灯图片路径
                    if($data["imgUrl$i"] !== 'null'){
                        if(strstr($data["imgUrl$i"],$_SERVER['HTTP_HOST'])){
                            $hdlinkArrayimg[$i] = str_replace("\\","/",$data["imgUrl$i"]);
                        }else{
                            $hdlinkArrayimg[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["imgUrl$i"]); 
                        }
                    }else{
                        $hdlinkArrayimg[$i] = $data["imgUrl$i"];
                    }
                    $imgArray[$i] = $data["linkurl$i"].",".$data["linktitle$i"].",".$data["linkdate$i"].",".$hdlinkArrayimg[$i];
        }
        
        for($i=0;$i<4;$i++){            //处理友情链接logo图片路径      
                    if($data["linkimg$i"] !== 'null'){
                         if(strstr($data["linkimg$i"],$_SERVER['HTTP_HOST'])){
                            $linkArrayimg[$i] = str_replace("\\","/",$data["linkimg$i"]);
                         }else{
                            $linkArrayimg[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["linkimg$i"]); 
                         }
                    }else{
                        $linkArrayimg[$i] = $data["linkimg$i"];
                    }
                    $linkArray[$i] = $data["linktxt$i"].",".$linkArrayimg[$i];
        }
        $linkStr = implode("|",$linkArray);
        $imgStr = implode("|",$imgArray);
        $datas = [
          'webname' => $data['webname'],
          'com' => $data['com'],
          'web_title' => $data['web_title'],
          'web_description' => $data['web_description'],
          'opencomments' => $data['opencomments'],
          'senswords' => $data['senswords'],
          'filterips' => $data['filterIp'],
          'huandengimg' => $imgStr,
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
        $linkArray = [];
        $linkArrayimg = [];
        $hdlinkArrayimg = [];
        if(!$data['webname']){
             exit(json_encode(array('status'=>0,'msg'=>'站点名称不能为空哦^_^'))); 
        }
        if(!$data['web_title']){
             exit(json_encode(array('status'=>0,'msg'=>'站点标题不能为空哦^_^'))); 
        }
        if(!$data['web_description']){
             exit(json_encode(array('status'=>0,'msg'=>'站点描述不能为空哦^_^'))); 
        }
        if(!$data['senswords']){
             exit(json_encode(array('status'=>0,'msg'=>'屏蔽词汇不能为空哦^_^')));  
        }
        for($i=0;$i<5;$i++){            //处理幻灯图片路径
                    if($data["imgUrl$i"] !== 'null'){
                        if(strstr($data["imgUrl$i"],$_SERVER['HTTP_HOST'])){
                            $hdlinkArrayimg[$i] = str_replace("\\","/",$data["imgUrl$i"]);
                        }else{
                            $hdlinkArrayimg[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["imgUrl$i"]); 
                        }
                    }else{
                        $hdlinkArrayimg[$i] = $data["imgUrl$i"];
                    }
                    $imgArray[$i] = $data["linkurl$i"].",".$data["linktitle$i"].",".$data["linkdate$i"].",".$hdlinkArrayimg[$i];
        }
        
        for($i=0;$i<4;$i++){            //处理友情链接logo图片路径      
                    if($data["linkimg$i"] !== 'null'){
                         if(strstr($data["linkimg$i"],$_SERVER['HTTP_HOST'])){
                            $linkArrayimg[$i] = str_replace("\\","/",$data["linkimg$i"]);
                         }else{
                            $linkArrayimg[$i] = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data["linkimg$i"]); 
                         }
                    }else{
                        $linkArrayimg[$i] = $data["linkimg$i"];
                    }
                    $linkArray[$i] = $data["linktxt$i"].",".$linkArrayimg[$i];
        }
        $linkStr = implode("|",$linkArray);
        $imgStr = implode("|",$imgArray);
        $this -> data = [
          'webname' => $data['webname'],
          'com' => $data['com'],
          'web_title' => $data['web_title'],
          'web_description' => $data['web_description'],
          'opencomments' => $data['opencomments'],
          'senswords' => $data['senswords'],
          'filterips' => $data['filterIp'],
          'huandengimg' => $imgStr,
          'link' => $linkStr
        ];
        if($this -> save()){
               return true;
           }
        return false;
    }
}
