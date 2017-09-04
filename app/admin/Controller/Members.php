<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Members as tMembers;
use think\Request;

class Members extends Adminbase{
    public function index(){
        $Request = Request::instance();
        if($Request -> isAjax()){
            $param_array = [];
            $datas = input('post.');
            if(count($datas) == 2){       
                if($datas['cat_id'] == 'user_id'){
                    if(!$datas['article_name']){
                       exit(json_encode(array('status'=>0,'msg'=>'会员id不能为空哦^_^')));
                    }
                    if(!preg_match("/^\d*$/",$datas['article_name'])){   //正则判断用户ID是否为数字
                       exit(json_encode(array('status'=>0,'msg'=>'会员id必须为数字哦^_^'))); 
                    }
                    $param_array = ['cat_id' => 'user_id','article_name' => $datas['article_name']];
                }
                if($datas['cat_id'] == 'user_name'){
                    if(!$datas['article_name']){
                       exit(json_encode(array('status'=>0,'msg'=>'会员名称不能为空哦^_^')));
                    }
                     $param_array = ['cat_id' => 'user_name','article_name' => $datas['article_name']];
                }
                if($datas['cat_id'] == 'register_time'){
                    if(!$datas['timearea']){
                       exit(json_encode(array('status'=>0,'msg'=>'时间范围不能为空哦^_^')));
                    }              
                    $param_array = ['cat_id' => 'register_time','timearea' => $datas['timearea']];
                }
                if($datas['cat_id'] == 'gmt_time'){
                    if(!$datas['timearea']){
                       exit(json_encode(array('status'=>0,'msg'=>'时间范围不能为空哦^_^')));
                    }
                    $param_array = ['cat_id' => 'gmt_time','timearea' => $datas['timearea']];
                }
                return json(['status'=>1,'msg'=>'筛选成功,正在显示筛选结果^_^','url'=>urldecode(url('Members/index',$param_array))]);  
                //问题：URL编码导致不能筛选数据  => 解决：利用urldecode函数对URL解码;
                
            }
            return json(['status'=>0,'msg'=>'筛选异常,您可能没有选择筛选条件^_^']);
        }
        $where = "1 = 1"; //初始化where条件
        $filterStyle = input('cat_id');  //筛选类型
        $term = input('article_name');  //会员ID,会员名称
        //$time = input('timearea');          //日期范围
        $time = $Request ->param('timearea');
        if(isset($time)){
            $timearr= explode('|',$time); 
        }
        if(isset($filterStyle)){
            switch($filterStyle){
                case 'user_id':
                    $where = "mid = $term";
                    break;
                case 'user_name':
                    $where = "mname like '%$term%'";
                    break;
                case 'register_time':
                    $where = "UNIX_TIMESTAMP(register_time) >= '".strtotime($timearr[0])."' "
                        . "and UNIX_TIMESTAMP(register_time) < '".strtotime($timearr[1])."'"; //选择UNIX_TIMESTAMP先将date类型转化为时间戳，然后再进行比较
                    break;
                case 'gmt_time':
                    $where = "UNIX_TIMESTAMP(gmt_time) >= '".strtotime($timearr[0])."' "
                        . "and UNIX_TIMESTAMP(gmt_time) < '".strtotime($timearr[1])."'";
                    break;                  
            }
        }
        
        $mb = new tMembers();
        $mdata = $mb -> where($where) -> order('mid','asc') -> paginate(10);
        $page = $mdata -> render();
        $this -> assign('page',$page);
        $this -> assign('membersData',$mdata);
        return $this -> fetch();
    }
    
    public function addMember(){
        $Request = Request::instance();
        if($Request->isAjax()){
            $mb = new tMembers();
            $result = $mb -> addData();
            if($result){
                return json(['status'=>1,'msg'=>'提交成功^_^','url'=>url('Members/index')]);
            }
            return json(['status'=>0,'msg'=>'提交失败^_^']);
        }
        return $this -> fetch();
    }
    
    public function editMember(){
        $Request = Request::instance();
        $mid = input('mid');  //用于模板渲染的会员id
        $mb = new tMembers();
        if($Request -> isAjax()){
            $mid = input('post.mid');  //模板渲染后通过表单post传递的会员id
            $Result = $mb ->editData($mid);
            if($Result) {
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Members/index')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $memberData = $mb -> where("mid",$mid) -> find();
        $this -> assign('memberData',$memberData);
        return $this -> fetch();
    }
    
    public function delMember(){
       $Request = Request::instance();
       $mid = input('mid');     
       if($Request -> isAjax()){
            $mb = new tMembers();
            $Result = $mb ->delData($mid);
            if($Result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
    public function clMembers(){
        //批量删除会员、批量移动会员至黑名单
        $post_str = input('post_str');
        $postArray = explode("|",$post_str);
        if($postArray[0] == 'del_all'){
          $mb = new tMembers();
          if( strpos($postArray[1],",") == false){
              $ResultNum = $mb -> where('mid',$postArray[1]) -> delete();
          }
          $ResultNum = $mb -> where('mid','in',explode(",",$postArray[1])) -> delete();
          if($ResultNum >= 1){
             return json(['status'=>1,'msg'=>'删除成功^_^']);
          }
          return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
    
    /* public function test(){
       $param_array = ['cat_id' => 'gmt_time','timearea' => '2017-08-01+00%3A00%3A00+%7C+2017-09-01+00%3A00%3A00'];
       echo 'http://localhost'.url('Members/index?catid="'.$param_array["cat_id"].'"&timearea="'.$param_array["timearea"].'"')."</br>";
       $root = 'http://localhost'.url('Members/index');
       $root .= "?cat_id=register_time&timearea=2017-08-01+00%3A00%3A00+%7C+2017-09-01+00%3A00%3A00";
       echo $root;
    } */
    

}
