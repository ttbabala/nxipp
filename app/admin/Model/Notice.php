<?php
namespace app\admin\Model;
use think\Model;

class Notice extends Model{
    protected $pk = "id";
    
    public function addData(){
        /**
         * 添加数据
         */
        $data = input('post.');
        if(!$data['title']){
            exit(json_encode(array('status'=>0,'msg'=>'标题不能为空哦^_^')));
        }
        if(!$data['excerpt']){
             exit(json_encode(array('status'=>0,'msg'=>'摘要不能为空哦^_^')));
        }
        if(!$data['content']){
            exit(json_encode(array('status'=>0,'msg'=>'内容不能为空哦^_^')));
        }
        $this -> data = ([
           'title' => $data['title'],
           'excerpt' => $data['excerpt'],
           'content' => $data['content'],
           'createtime' => date('Y-m-d H:i:s',time()),
           'updatetime' => '0000-00-00 00:00:00',
           'comments' => $data['comments'],
           'isshow' => $data['isshow'],
           'author' => 'admin'
        ]);
        if($this -> save()){
            return true;
        }
        return false;
    }
    
    public function editData($nid){
        /**
         * 修改数据
         */
        $id = $nid;
        $data = input('post.');       
        if (!$data['title']) {
            exit(json_encode(array('status'=>0,'msg'=>'标题不能为空哦^_^')));
        }
        if (!$data['excerpt']){
           exit(json_encode(array('status'=>0,'msg'=>'摘要不能为空^_^'))); 
        }
        if (!$data['content']){
            exit(json_encode(array('status'=>0,'msg'=>'内容不能为空^_^')));
        }
        $datas = [
           'title' => $data['title'],
           'excerpt' => $data['excerpt'],
           'content' => $data['content'],
           'updatetime' => date("Y-m-d H:i:s",time()),
           'comments' => $data['comments'],
           'isshow' => $data['isshow'],
        ];
        
        if ($this -> save($datas,['id' => $id]) ) {
            return true;
        }
        return false;
        
    }
    
    public function delData($nid){
        /**
         * 删除数据
         */
        $ResNum = $this -> where('id',$nid) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
}

