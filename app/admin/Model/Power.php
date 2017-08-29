<?php
namespace app\admin\Model;
use think\Model;

class Power extends Model{
   protected $pk = "id"; 
   
    public function getStatusAttr($value){   
        /**
         * 自动获取数据库字段值
         */
        //$columnsData = Model('Columns') -> column('name') -> select();
        $status = [-1=>'删除',0=>'禁用',1=>'正常',2=>'待审核'];
        return $status[$value];
    }
    
    public function addData(){
        $data = input('post.');       
        if (!$data['name']) {
            exit(json_encode(array('status'=>0,'msg'=>'角色名称不能为空哦^_^')));
        } else {
            if(Model('Power')->where('name',$data['name'])->find())
            {
                exit(json_encode(array('status'=>0,'msg'=>'角色名已经存在^_^')));
            }
        }
        $model_id = implode(',',$data['model']);  //以“,”的形式
        if (empty($data['model'])){
           exit(json_encode(array('status'=>0,'msg'=>'赋权栏目不能为空哦^_^'))); 
        }
        $this ->data = ([
            'name' => $data['name'],
            'controllerModel' => $model_id,
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
   }
   
   public function editData($id){
        $data = input('post.');
        if (!$data['name']) {
            exit(json_encode(array('status'=>0,'msg'=>'角色名称不能为空哦^_^')));
        }
        if (empty($data['model'])){
           exit(json_encode(array('status'=>0,'msg'=>'赋权栏目不能为空哦^_^'))); 
        }
        $model_id = implode(',',$data['model']);  //以“,”的形式将数组分割为字符串
        $datas = [
            'name' => $data['name'],
            'controllerModel' => $model_id
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