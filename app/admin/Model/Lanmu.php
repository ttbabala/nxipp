<?php
namespace app\admin\Model;
use think\Model;
use think\Loader;
use think\Log;

class Lanmu extends Model{
    protected $pk = 'id';
    
    public function getLanmuData(){
        $data = $this -> order('sort') -> select();
        Loader::import('org\Data', EXTEND_PATH);
        $d = new \org\Data();
        $datalist = $d -> tree($data,'lname','id','pid');
        return $datalist;
    }
    
    public function addData(){
        //添加数据
        $datas = input('post.');
        $lanmusort = input('lanmusort');
        $id = input('id');
        if(!$datas['lname']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目名称不能为空哦^_^')));
            if($this -> where('lname',$datas['lname']) -> select()){
                exit(json_encode(array('status'=>0,'msg'=>'栏目名称已存在哦^_^')));
            }
        }
        if(!$datas['aliasname']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目别名不能为空哦^_^')));
        }
        if(!$datas['link']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目链接不能为空哦^_^')));
        }
        $this ->data = ([
            'pid' => isset($id) ? $id : 0,
            'lname' => $datas['lname'],
            'aliasname' => $datas['aliasname'],
            'link' => $datas['link'],
            'isshow' => isset($datas['isshow']) ? $datas['isshow'] : 0 ,
            'sort' => $lanmusort,
        ]);
        if($this -> save()){
            return true;
        }
        return false;
    }
    
    public function editData($lid){
        $data = input('post.');
        $id = $lid;
        $lanmusort = input('lanmusort');
        if(!$data['lname']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目名称不能为空哦^_^')));
        }
        if(!$data['aliasname']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目别名不能为空哦^_^')));
        }
        if(!$data['link']){
            exit(json_encode(array('status'=>0,'msg'=>'栏目链接不能为空哦^_^')));
        }
        Log::write('startup');
        $datas = ([
            'lname' => $data['lname'],
            'aliasname' => $data['aliasname'],
            'link' => $data['link'],
            'isshow' => isset($data['isshow']) ? $data['isshow'] : 0 ,
            'sort' => $lanmusort,
        ]);
        
        if( $this -> isUpdate(true) -> save($datas,['id' => $id]) ){
            return true;
        }
        Log::write('endup');
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

