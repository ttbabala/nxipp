<?php
namespace app\admin\Model;
use think\Model;
use think\Loader;

class Cats extends Model{
    protected $pk = 'catid';
    
    /**
     * 获取分类数据
     */
    public function getCatData(){
        $data = $this -> order('catsort') -> select();
        //导入Data库类  获得树状图形
        Loader::import('org\Data', EXTEND_PATH);
        $d = new \org\Data();
        $datalist = $d -> tree($data,'catname','catid','parentid');
        return $datalist;
    }
    
    /**
     * 添加分类数据
     */
    public function addData(){
        $data = input('post.');
        $catsort = input('catsort');
        $catid = input('catid');
        if (!$data['catname']) {
            exit(json_encode(array('status'=>0,'msg'=>'分类名称不能为空哦^_^')));
        }
        $this ->data = ([
            'catname' => $data['catname'],
            'isshow' => isset($data['isshow']) ? $data['isshow'] : 0 ,
            'catsort' => $catsort,
            'parentid' => isset($catid) ? $catid : 0
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
    }
    
    /**
     * 编辑分类数据
     */
    public function editData($cid){
        $data = input('post.');
        $catid = $cid;
        if (!$data['catname']) {
            exit(json_encode(array('status'=>0,'msg'=>'分类名称不能为空哦^_^')));
        }
        $datas = [
           'catname' => $data['catname'],
           'isshow' => isset($data['isshow']) ? $data['isshow'] : 0 ,
           'catsort' => $data['catsort']
        ];
        if( $this -> isUpdate(true) -> save($datas,['catid' => $catid]) ){
            return true;
        }
        return false;
    }
    
    /**
     * 删除分类数据
     */
    public function delData($cid){
        $ResNum = $this -> where('catid',$cid) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
    
}

