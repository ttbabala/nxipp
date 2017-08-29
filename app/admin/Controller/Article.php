<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Article as tArticle;
use app\admin\Model\Cats;

class Article extends Adminbase{
    public function articleList(){ 
        $article = Model('Article');
        $ResultArray = $article -> select();   //查询用户总记录数
        $count = count($ResultArray);  //统计查询结果条目
        $articlelist = $article -> order('aid','asc') -> paginate(10);
        $page = $articlelist->render();
        $cats = new Cats();
        $columnName = '作品列表';
        for($i=0;$i<count($articlelist);$i++){
           $articlelist[$i]['cname'] = $cats -> where('catid',$articlelist[$i]['cid']) -> column('catname');       
        }
        $this -> assign('articlelist',$articlelist);
        $this -> assign('columnName',$columnName);
        $this -> assign('page',$page);
        return $this -> fetch();    
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
        $cats = new Cats();
        $catslist = $cats -> getCatData(); 
        $this -> assign('catslist',$catslist);
        return $this -> fetch();  
    }
    
    public function editArticle(){
        //编辑作品
        $Request = Request::instance();
        $aid = input('aid');
        $article = new tArticle();
        if($Request -> isAjax()){
            $articleId = input('post.aid');
            $article = new tArticle();
            $Result = $article ->editData($articleId);
            if($Result){
                return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Article/articleList')]);
            }
            return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $articleData = $article -> where('aid',$aid) -> find();
        $cats = new Cats();
        $catslist = $cats -> getCatData(); 
        $this -> assign('catslist',$catslist);
        $this -> assign('articleData',$articleData);
        return $this -> fetch();
    }
    
    public function delArticle(){
        //删除作品
       $Request = Request::instance();
       $aid = input('post.aid');     
       if($Request -> isAjax()){
            $article = new tArticle();
            $Result = $article ->delData($aid);
            if($Result) {
                return json(['status'=>1,'msg'=>'删除成功^_^']);
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
        return json(['status'=>0,'msg'=>'数据异常请重试哦^_^']);  
    }
    
       
}

