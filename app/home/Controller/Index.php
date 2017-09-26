<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\admin\Model\System;
use app\admin\Model\Article;


class Index extends Homebase{
    
    public function index(){
        $st = new System();         
        $hddata = $st -> column('huandengimg');
        $at = new Article();
        $articleData = $at -> order('article_date','desc') -> paginate(15);//分页
        $page = $articleData -> render();                       //渲染分页样式上
        $hdData= explode("|",$hddata[0]);
        for($i=0;$i<count($hdData);$i++){    
               $hdarray2[$i] = explode(",",$hdData[$i]);  //再得到每一项中的值
               $hdarrayStr[$i] = implode(",",$hdarray2[$i]); //数组转字符串
               $hdarray3[$i] = explode(",",$hdarrayStr[$i]); //再转成最终的数组
        }
        $this -> assign('hdData',$hdarray3);
        $this -> assign('articleData',$articleData);
        $this -> assign('page',$page);
        return $this -> fetch();
    }  
    
}
