<?php
namespace app\home\Model;
use think\Model;
use think\Session;
use app\admin\Model\System;

class Reply_relation extends Model{
    protected $pk = 'rrid';
    
    public function addData(){
        $datas = input('post.');
        $st = new System();
        $senswords = $st -> column('senswords');
        $sensStr= implode('|',$senswords);
        $sensArr = explode('|',$sensStr);
        if(!$datas['reply_text']){
            exit(json_encode(array('status'=>0,'msg'=>'回复内容不能为空哦^_^')));
        }
        if(!$datas['code']){
           exit(json_encode(array('status'=>0,'msg'=>'验证码不能为空哦^_^'))); 
        }else{
            if(strtolower($datas['code']) !== strtolower(Session::get('code','wll_'))){ //验证码不区分大小写
                exit(json_encode(array('status'=>0,'msg'=>'验证码错误哦^_^'))); 
            }
        }
        $this -> data=([
                'cid' => $datas['cid'], 
                'rid' => $datas['rid'],
                'fromUserid' => $datas['mid'], 
                'replytext' => censor($datas['reply_text'],$sensArr),
                'replytime' => date('Y-m-d H:i:s',time()),
                'isshow' => 1,
                'review' => 2
        ]);
       if($this -> save()){
             return true;
       }
       return false;
    }
}
