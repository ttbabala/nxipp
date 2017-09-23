<?php
namespace app\admin\Model;
use think\Model;

class Single extends Model{
    protected $pk = 'id';
    
    public function addData(){
        $formdata = input('post.');
        if(!$formdata['singlename']){
            exit(json_encode(array('status'=>0,'msg'=>'单页名称不能为空哦^_^')));
        }
        if(!$formdata['aliasname']){
            exit(json_encode(array('status'=>0,'msg'=>'单页别名不能为空哦^_^')));
        }
        if(!$formdata['description']){
            exit(json_encode(array('status'=>0,'msg'=>'单页描述不能为空哦^_^')));
        }
        if(!$formdata['content']){
            exit(json_encode(array('status'=>0,'msg'=>'详细内容不能为空哦^_^')));
        }
        $this ->data = ([
            'singlename' => $formdata['singlename'],
            'aliasname' => $formdata['aliasname'],
            'content' => $formdata['content'],
            'description' => $formdata['description'],
            'createtime' => date("Y-m-d H:i:s",time()),
            'single_status' => $formdata['single_status']
        ]);
        
        if($this -> save()){
            return true;
        }
        return false;
    }
    
    public function editData($id){
        $formdata = input('post.');
        if(!$formdata['singlename']){
            exit(json_encode(array('status'=>0,'msg'=>'单页名称不能为空哦^_^')));
        }
        if(!$formdata['aliasname']){
            exit(json_encode(array('status'=>0,'msg'=>'单页别名不能为空哦^_^')));
        }
        if(!$formdata['description']){
            exit(json_encode(array('status'=>0,'msg'=>'单页描述不能为空哦^_^')));
        }
        if(!$formdata['content']){
            exit(json_encode(array('status'=>0,'msg'=>'详细内容不能为空哦^_^')));
        }
        $data = ([
            'singlename' => $formdata['singlename'],
            'aliasname' => $formdata['aliasname'],
            'content' => $formdata['content'],
            'description' => $formdata['description'],
            'single_status' => $formdata['single_status']
        ]);
        if($this -> save($data,['id'=>$id])){
            return true;
        }
        return false;    
    }
    
    public function delData($id){
        $ResNum = $this -> where('id',$id) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }

}

