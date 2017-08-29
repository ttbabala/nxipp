<?php
namespace app\admin\Model;
use think\Model;

class Columns extends Model{
    protected $pk = 'id';
    
    public function addData(){
        /**
         * 添加数据
         */
        $data = input('post.');       
        if (!$data['ColumnName']) {
            exit(json_encode(array('status'=>0,'msg'=>'栏目名称不能为空哦^_^')));
        } else {
            if(Model('Columns')->where('name',$data['ColumnName'])->find())
            {
                exit(json_encode(array('status'=>0,'msg'=>'栏目已经存在^_^')));
            }
        }
        if (!$data['controllerName']){
           exit(json_encode(array('status'=>0,'msg'=>'控制器名称不能为空哦^_^'))); 
        }
        if (!$data['functionName']){
            exit(json_encode(array('status'=>0,'msg'=>'方法名称不能为空哦^_^')));
        }
        $this ->data = ([
            'name' => $data['ColumnName'],
            'controllerName' => $data['controllerName'],
            'functionName' => $data['functionName'],
            'sort'  => $data['sort']
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
    }
    
    public function editData($id){
        /**
         * 编辑数据
         */
        $data = input('post.');       
        if (!$data['ColumnName']) {
            exit(json_encode(array('status'=>0,'msg'=>'栏目名称不能为空哦^_^')));
        }
        if (!$data['controllerName']){
           exit(json_encode(array('status'=>0,'msg'=>'控制器名称不能为空哦^_^'))); 
        }
        if (!$data['functionName']){
            exit(json_encode(array('status'=>0,'msg'=>'方法名称不能为空哦^_^')));
        }
        $datas = [
            'name' => $data['ColumnName'],
            'controllerName' => $data['controllerName'],
            'functionName' => $data['functionName'],
            'sort'  => $data['sort']
        ];
        
        if($this -> save($datas,['id'=>$id])){
            return true;
        }
        return false;
        
    }
    
    public function delData($id){
       /**
        * 删除数据
        */
        $ResNum = $this -> where('id',$id) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
}


