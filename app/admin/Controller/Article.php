<?php
namespace app\admin\Controller;
use think\Controller;
use think\Request;
use app\admin\Model\Article as tArticle;

class Article extends Controller{
    public function articleList(){ 
        $article = Model('Article');
        $ResultArray = $article -> select();   //查询用户总记录数
        $count = count($ResultArray);  //统计查询结果条目
        $Page = new \think\Page($count,10);
        $Page -> setConfig('prev','← Previous');
        $Page -> setConfig('next','Next →');
        $articlelist = $article -> limit($Page->firstRow,$Page->listRows) -> order('aid','asc') -> select();
        $show = $Page -> show();
        $ArticleListData = array(
            'list' => $articlelist,
            'page' => $show,
            'count'=> $count
        );
        $columnName = '作品列表';
        $this -> assign('articlelist',$articlelist);
        $this -> assign('columnName',$columnName);
        $this -> assign('ArticleListData',$ArticleListData);
        return $this -> fetch();    
    }
    
    public function articleCatList(){ 
        //作品分类列表
    }
    
    public function addArticleCat(){
        //添加作品分类
    }
    
    public function editArticleCat(){
        //编辑作品分类
    }
    
    public function delArticleCat(){
        //删除作品分类
    }
    
    public function addArticle(){
        //添加作品
         $Request = Request::instance();      
        if($Request -> isAjax()){
            $article = new tArticle();
            $Result = $article ->addData();
            if($Result){
                return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Article/articleList')]);
            }
            return json(['status'=>0,'msg'=>'添加失败哦^_^']);
        }
        return $this -> fetch();  
    }
    
    public function editArticle(){
        //编辑作品
    }
    
    public function delArticle(){
        //删除作品
    }
    
       
}

