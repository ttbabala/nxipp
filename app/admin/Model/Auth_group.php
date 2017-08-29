<?php
namespace app\admin\Model;
use think\Model;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth_group extends Model{
    protected $pk = 'id';
    
     public function addData(){
        $data = input('post.');       
        if (!$data['title']) {
            exit(json_encode(array('status'=>0,'msg'=>'角色名称不能为空哦^_^')));
        } else {
            if($this -> where('title',$data['title']) -> find())
            {
                exit(json_encode(array('status'=>0,'msg'=>'角色名已经存在^_^')));
            }
        }
        if (empty($data['rules'])){
           exit(json_encode(array('status'=>0,'msg'=>'赋权栏目不能为空哦^_^'))); 
        }
        if ($data['status'] == 'nal'){
           exit(json_encode(array('status'=>0,'msg'=>'请选择角色状态^_^'))); 
        }
        
        $rulesId = implode(",",$data['rules']);
        $this ->data = ([
            'title' => $data['title'],
            'status' => $data['status'],
            'rules' => $rulesId 
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
   }
   
   public function editData($id){
        $data = input('post.');
        if (!$data['title']) {
            exit(json_encode(array('status'=>0,'msg'=>'角色名称不能为空哦^_^')));
        }
        if (empty($data['rules'])){
           exit(json_encode(array('status'=>0,'msg'=>'赋权栏目不能为空哦^_^'))); 
        }
        if ($data['status'] == 'nal'){
           exit(json_encode(array('status'=>0,'msg'=>'请选择角色状态^_^'))); 
        }
        $rulesId = implode(",",$data['rules']);  //以“,”的形式将数组分割为字符串
        $datas = [
            'title' => $data['title'],
            'status' => $data['status'],
            'rules' => $rulesId
        ];
        if ($this -> save($datas,['id' => $id])) {
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