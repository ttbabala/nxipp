<?php
namespace app\admin\Model;
use think\Model;
use think\Request;

class Members extends Model{
    protected $pk = 'mid';
    
    public function addData(){
        $Request = Request::instance();
        $data = input("post.");
        if(!$data['mname']){
             exit(json_encode(array('status'=>0,'msg'=>'会员名不能为空哦^_^')));
        }
        if(!$data['email']){
            exit(json_encode(array('status'=>0,'msg'=>'会员Eamil不能为空哦^_^')));
        }
        if(!$data['pass']){
            exit(json_encode(array('status'=>0,'msg'=>'会员密码不能为空哦^_^')));
        }
        if (!$data['confirm_pass']){
            exit(json_encode(array('status'=>0,'msg'=>'确认密码不能为空哦^_^')));
        }else{
            if( $data['pass'] !== $data['confirm_pass'] ){
                exit(json_encode(array('status'=>0,'msg'=>'两次输入的密码不一致哦^_^')));
            }
        }
        if($data['status'] == '2'){
            exit(json_encode(array('status'=>0,'msg'=>'必须选择会员状态哦^_^')));
        }
        $imgurl = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data['headPic']);
        $this -> data([
            'headpic' => $imgurl,
            'mname' => $data['mname'],
            'pass' => encryption($data['pass']),
            'email' => $data['email'],
            'register_time' => date("Y-m-d H:i:s",time()),
            'gmt_time' => null,
            'gmt_ip' => $Request ->ip(),
            'status' => $data['status']
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
    }
    
    public function editData($mid){
        $data = input("post.");
        if(!$data['mname']){
             exit(json_encode(array('status'=>0,'msg'=>'会员名不能为空哦^_^')));
        }
        if(!$data['email']){
            exit(json_encode(array('status'=>0,'msg'=>'会员Eamil不能为空哦^_^')));
        }
        if(!$data['pass']){
            exit(json_encode(array('status'=>0,'msg'=>'会员密码不能为空哦^_^')));
        }
        if (!$data['confirm_pass']){
            exit(json_encode(array('status'=>0,'msg'=>'确认密码不能为空哦^_^')));
        }else{
            if( $data['pass'] !== $data['confirm_pass'] ){
                exit(json_encode(array('status'=>0,'msg'=>'两次输入的密码不一致哦^_^')));
            }
        }
        if($data['headPic'] !== ''){
            $imgurl = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data['headPic']);   //得到图片完整路径
        }else{
            $imgurl = $data['showpic'];
        }  
        $listData = [
             'headpic' => $imgurl,
             'mname' => $data['mname'],
             'pass' => encryption($data['pass']),
             'email' => $data['email'],
             'status' => $data['status']
        ];     
            if(implode($this -> where('mid',$mid) -> column('pass')) == encryption($data['pass']))//密码未改变
               { 
                    unset($listData['pass']);  //删除数组指定元素，不重建索引
                    $datas = $listData;
               }
            else
               {
                    $datas = $listData;
               }
        if( $this -> save($datas,['mid' => $mid]) ){
            return true;
        }
        return false;      
    }
    
    public function delData($mid){
        $ResNum = $this -> where('mid',$mid) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
}