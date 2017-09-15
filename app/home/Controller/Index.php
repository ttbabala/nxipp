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
        $articleData = $at -> order('article_date','desc') -> select();
        $hdData= explode(",",$hddata[0]);
        $this -> assign('hdData',$hdData);
        $this -> assign('articleData',$articleData);
        return $this -> fetch();
    }  
}
