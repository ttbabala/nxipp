<?php
namespace app\admin\Model;
use think\Model;

class Auth_rule extends Model{
    protected $pk = 'id';
    
    public function addData($p){
        /**
         * 添加数据
         */
        if( $p==1 ){  /*判断为批量添加*/
           $data = input('post.');
           if (!$data['title']){
                exit(json_encode(array('status'=>0,'msg'=>'规则对应名称不能为空哦^_^'))); 
           }
           if (!$data['content']){
                 exit(json_encode(array('status'=>0,'msg'=>'该项不能为空哦^_^')));
           }
           if ($data['status'] == 'nal'){
                 exit(json_encode(array('status'=>0,'msg'=>'必须选择状态哦^_^')));
           }
           $titleDatalist = explode("|",substr($data['title'],0,-1));
           $contentDatalist = explode("|",substr($data['content'],0,-1));
           for($i=0;$i<count($contentDatalist);$i++){
               $titleArray[$i] = $titleDatalist[$i]; 
               $nameArray[$i] = $contentDatalist[$i];
               if($this -> where('title',$titleArray[$i]) -> find()){
                   exit(json_encode(array('status'=>0,'msg'=>'规则名称为'.$titleArray[$i].'的记录已添加哦^_^'))); 
               }
               if($this -> where('name',$nameArray[$i]) -> find()){
                   exit(json_encode(array('status'=>0,'msg'=>$nameArray[$i].'的规则已添加哦^_^'))); 
               }
               $dataList[$i] = ([
                 'name' => $nameArray[$i],
                 'title' => $titleArray[$i],
                 'type' => '1',
                 'status' => '1',
                 'condition' => ''
               ]); 
           }
           
           if($this -> saveAll($dataList)){
               return true;
           }
           return false;
            
        }else{ /*逐条添加*/
           $data = input('post.');
           if (!$data['title']){
                exit(json_encode(array('status'=>0,'msg'=>'规则名称不能为空哦^_^'))); 
           }
           if ($data['controller'] == 'nal'){
                 exit(json_encode(array('status'=>0,'msg'=>'必须选择应用规则中的栏目英文名称^_^')));
           }
           if ($data['function'] == 'nal'){
                 exit(json_encode(array('status'=>0,'msg'=>'栏目下的对应操作名不能为空哦^_^')));
           }
           if ($data['status'] == 'nal'){
                 exit(json_encode(array('status'=>0,'msg'=>'必须选择状态哦^_^')));
           }
           if( $this -> where('name',$data['controller'].'-'.$data['function']) -> find()){
               exit(json_encode(array('status'=>0,'msg'=>'规则名称为'.$data['controller'].'-'.$data['function'].'的记录已添加哦^_^'))); 
           }
           $this -> data([
             'name'=> $data['controller']."-".$data['function'],
             'title' => $data['title'],
             'type' => $data['type'],
             'status' => $data['status'],
             'condition' => $data['condition']
           ]);
           if($this -> save()){
               return true;
           }
           return false;
        }
        
    }
    
    public function editData($id){
        /**
         * 编辑数据
         */
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
