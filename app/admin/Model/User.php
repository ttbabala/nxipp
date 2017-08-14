<?php
namespace app\admin\Model;
use think\Model;
use think\Request;

class User extends Model{
    protected $pk = 'id';
    
    public function addData(){
        $Request = Request::instance();
        $data = input('post.');       
        if (!$data['user_name']) {
            exit(json_encode(array('status'=>0,'msg'=>'用户名不能为空哦^_^')));
        } else {
            if(Model('User')->where('uname',$data['user_name'])->find())
            {
                exit(json_encode(array('status'=>0,'msg'=>'用户名已经存在^_^')));
            }
        }
        if (!$data['user_email']){
           exit(json_encode(array('status'=>0,'msg'=>'用户Email不能为空哦^_^'))); 
        }
        if (!$data['user_password']){
            exit(json_encode(array('status'=>0,'msg'=>'用户密码不能为空哦^_^')));
        }
        if (!$data['user_confirm_password']){
            exit(json_encode(array('status'=>0,'msg'=>'确认密码不能为空哦^_^')));
        }else{
            if( $data['user_password'] !== $data['user_confirm_password'] ){
                exit(json_encode(array('status'=>0,'msg'=>'两次输入的密码不一致哦^_^')));
            }
        }
        if($data['user_status'] == '2'){
            exit(json_encode(array('status'=>0,'msg'=>'您还未选择用户权限^_^')));
        }
        $this ->data = ([
            'uname' => $data['user_name'],
            'upass' => bcryptHash($data['user_password']),
            'uemail' => $data['user_email'],
            'create_time'  => date('Y-m-d H:i:s',time()),
            'last_logintime'  => null,
            'last_ip' => $Request ->ip(),
            'authorization' => '3',
            'ustatus' => $data['user_status']
        ]);
        if ($this -> save()) {
            return true;
        }
        return false;
    }
    
    public function delData($uid){
        $ResNum = $this -> where('id',$uid) -> delete();
        if( $ResNum == 1 ){
            return true;
        }
        return false;
    }
    
    public function editData($uid){
        //$Request = Request::instance();
        $userid = $uid;
        $data = input('post.');       
        if (!$data['user_name']) {
            exit(json_encode(array('status'=>0,'msg'=>'用户名不能为空哦^_^')));
        } 
        if (!$data['user_email']){
           exit(json_encode(array('status'=>0,'msg'=>'用户Email不能为空哦^_^'))); 
        }
        if (!$data['user_password']){
            exit(json_encode(array('status'=>0,'msg'=>'用户密码不能为空哦^_^')));
        }
        if (!$data['user_confirm_password']){
            exit(json_encode(array('status'=>0,'msg'=>'确认密码不能为空哦^_^')));
        }else{
            if( $data['user_password'] !== $data['user_confirm_password'] ){
                exit(json_encode(array('status'=>0,'msg'=>'两次输入的密码不一致哦^_^')));
            }
        }
        if(implode($this -> where('id',$userid) -> column('upass')) == $data['user_password'] ){  //密码未改变
            $datas = [
                'uname' => $data['user_name'],
                'uemail' => $data['user_email'],
                'authorization' => $data['user_auth'],
                'ustatus' => $data['user_status']
            ];
        }else{
            $datas = [       //修改了密码
                 'uname' => $data['user_name'],
                 'upass' => bcryptHash($data['user_password']),
                 'uemail' => $data['user_email'],
                 'authorization' => $data['user_auth'],
                 'ustatus' => $data['user_status']
            ]; 
        }
        if ( $this -> save($datas,['id' => $userid]) ) {
            return true;
        }
        return false;


    }
    
    public function testData($uid){
        if(implode($this -> where('id',$uid) -> column('upass')) == '$2a$08$LfZLAg/Oc2ushRT8QH1sC.SI9X3QpOhc.tXuC58KplqD389nSN6FS')
        return implode($this -> where('id',$uid) -> column('upass'));
    }
    
}

