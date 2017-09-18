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
        $hdData= explode(",",$hddata[0]);
        $this -> assign('hdData',$hdData);
        $this -> assign('articleData',$articleData);
        $this -> assign('page',$page);
        return $this -> fetch();
    }  
}
