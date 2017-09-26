<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\System as tSystem;
use app\admin\Model\Single;
use app\admin\Model\Article;
use think\Request;
use think\Db;
class System extends Adminbase{
    public function index(){
        $Request = Request::instance();
        if($Request -> isAjax()){
           $st = new tSystem();
           $systemData = $st -> select();
           if(count($systemData)){  //更新
              $id = input("isup");
              $Result = $st -> upData($id); 
              if($Result){
                    return json(['status'=>1,'msg'=>'更新成功^_^','url'=>url('System/index')]); 
              }
              //var_dump($Result);exit();
              return json(['status'=>0,'msg'=>'更新失败哦^_^']); 
              //return json(['status'=>0,'msg'=> json_encode($Result)]); 
           }else{       //新增
              $Result = $st -> addData();
              if($Result){
                    return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('System/index')]); 
              }
              return json(['status'=>0,'msg'=>'添加失败哦^_^']); 
           }
        }
        $st = new tSystem();
        $systemData = $st -> find();
        if(count($systemData) == 1){
            if(isset($systemData["huandengimg"])){
                $hdarray1 = explode("|",$systemData["huandengimg"]);
                 for($i=0;$i<count($hdarray1);$i++){    
                   $hdarray2[$i] = explode(",",$hdarray1[$i]);  //再得到每一项中的值
                   $hdarrayStr[$i] = implode(",",$hdarray2[$i]); //数组转字符串
                   $hdarray3[$i] = explode(",",$hdarrayStr[$i]); //再转成最终的数组
                }
                $this -> assign('hdarray',$hdarray3);
            }
            if(isset($systemData["link"])){
               $linka1 = explode("|",$systemData["link"]);  //先拆分成多个项
               for($i=0;$i<count($linka1);$i++){    
                   $linka2[$i] = explode(",",$linka1[$i]);  //再得到每一项中的值
                   $linkstr[$i] = implode(",",$linka2[$i]); //数组转字符串
                   $linka3[$i] = explode(",",$linkstr[$i]); //再转成最终的数组
               }
               $this -> assign("linkarray",$linka3);
            }
            $this -> assign('systemData',$systemData);
        }else{
            $hdarray = array(null,null,null,null,null);
            $linkarray = array(null,null,null,null,null,null);
            $this -> assign('hdarray',$hdarray);
            $this -> assign('linkarray',$linkarray);
        }
        $this -> assign('alinkUrl',url('Home/Single/index'));
        $this -> assign('slinkUrl',url('Home/Single/page'));
        return $this ->fetch();
    }
    
    public function delLink(){
        $link = input('link');
        $st = new tSystem();
        $linkIdArray = explode('|',$link);              //包含ID的数组
        /*if($linkIdArray[1] == 'null,null'){}*/        //判断‘网址,logo'组合是否为空
        $where = "update system set link=REPLACE(link,'".$linkIdArray[2]."','null,null')";  //sql原生替换，将'网址,logo'的组合，替换为'null,null',意为清空
        //$where = "update system set link=REPLACE(link,'www.nxipp.com,http://localhost/nxipp/public/uploads/logo/20170907/e6b0cb9d82b93842da0887bc7b6a9859.gif','null,null')";
        $Result = Db::execute($where);          
        if($Result){
           return json(['status'=>1,'msg'=>'清空成功^_^']); 
        }
        return json(['status'=>0,'msg'=>'清空失败哦^_^']); 
    }
    
    public function selSingelorArticle(){
        $type = input('type');
        $hid = input('hid');
        if($type == 'single'){
            $single = new Single();
            $singleData = $single -> order('id','asc') -> select();
            $this -> assign('hid',$hid);
            $this -> assign('singleData',$singleData);
            return $this -> fetch('selSingle');
        }
        else if($type == 'article'){
            $article = new Article();
            $articleData = $article -> order('article_date','desc') -> select();
            $this -> assign('hid',$hid);
            $this -> assign('articleData',$articleData);
            return $this -> fetch('selArticle');
        }
        
    }
    
    public function autolink(){
            $Request = Request::instance();
            if($Request ->isAjax()){
                $datas = input('post.');
                if($datas['seltype'] == 'article'){             //选择文章作为幻灯链接
                 $predis = new \Predis\Client();            //实例化Redis
                 $aid = $datas['sel'];                      //文章aid
                 $hid = $datas['hid'];                      //幻灯id
                 if( $predis -> hexists('hd:'.$hid,'sid') ){           //判断sid字段是否存在
                     $predis -> hdel('hd:'.$hid,'sid');             //删除sid字段
                 } 
                 $redisResult = $predis->hset('hd:'.$hid,'aid',$aid);   //哪个幻灯对应哪篇文章 hd:1 aid
                 if($redisResult == 1 || $redisResult == 0){            //1为插入 0为更新
                     return json(['status'=>1,'msg'=>'链接生成成功^_^']); 
                 }
               }
                if($datas['seltype'] == 'single'){             //选择单页作为幻灯链接
                 $predis = new \Predis\Client();            //实例化Redis
                 $sid = $datas['sel'];                      //单页sid
                 $hid = $datas['hid'];                      //幻灯id
                 if( $predis -> hexists('hd:'.$hid,'aid') ){           //判断aid字段是否存在
                     $predis -> hdel('hd:'.$hid,'aid');             //删除aid字段
                 } 
                 $redisResult = $predis->hset('hd:'.$hid,'sid',$sid);   //哪个幻灯对应哪则单页 hd:1 sid
                 if($redisResult == 1 || $redisResult == 0){         //1为插入 0为更新
                     return json(['status'=>1,'msg'=>'链接生成成功^_^']); 
                 }
               }
            }
           
    }
    
    
}
