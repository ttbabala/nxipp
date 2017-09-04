<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Request;
use app\admin\Model\Article as tArticle;
use app\admin\Model\Cats;
use app\admin\Model\Comments;
use app\admin\Model\User;

class Article extends Adminbase{
    public function articleList(){ 
        $where = "1 = 1"; //初始化where条件
        $articleName = input('article_name');
        $cat_id = input('cat_id');
        if($articleName){
            $where = "article_title like '%$articleName%' or article_keywords like '%$articleName%'";
        }
        if ($cat_id>0) {
            $grandson_ids= getCatGrandson($cat_id);
            $where .= " and cid in (". implode(',',$grandson_ids).")";// 初始化搜索条件
        }
        $article = Model('Article');
        $ResultArray = $article -> select();   //查询作品总记录数
        $count = count($ResultArray);  //统计查询结果条目 
        $articlelist = $article -> where($where) -> order('article_date','asc') -> paginate(10);
        $page = $articlelist->render();
        $cats = new Cats();
        $ct = new Comments();
        $user = new User();
        $cat = new Cats();
        $columnName = '作品列表';
        for($i=0;$i<count($articlelist);$i++){
           $articlelist[$i]['cname'] = $cats -> where('catid',$articlelist[$i]['cid']) -> column('catname');  //子类名称
           $articlelist[$i]['cpid'] = $cats -> where('catid',$articlelist[$i]['cid']) -> column('parentid');
           $articlelist[$i]['cpname'] = $cats -> where('catid',$articlelist[$i]['cpid'][0]) -> column('catname'); //父类名称
           $articlelist[$i]['commentsNums'] = count($ct -> where('aid',$articlelist[$i]['aid']) -> select());  //评论数量
           $articlelist[$i]['uname'] = $user -> where('id',$articlelist[$i]['article_pid']) -> column('uname'); //发布者名     
        }
        $catslist = $cats -> getCatData(); 
        //var_dump($catsData);exit();
        $this -> assign('catsData',$catslist);
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
    
    
    public function clArticles(){
        //批量删除作品、批量修改作品分类
        $post_str = input('post_str');
        $postArray = explode("|",$post_str);
        if($postArray[0] == 'del_all'){
          $ar = new tArticle();
          if( strpos($postArray[1],",") == false){
              $ResultNum = $ar -> where('aid',$postArray[1]) -> delete();
          }
          $ResultNum = $ar -> where('aid','in',explode(",",$postArray[1])) -> delete();
          if($ResultNum >= 1){
             return json(['status'=>1,'msg'=>'删除成功^_^']);
          }
          return json(['status'=>0,'msg'=>'删除失败哦^_^']);
    }
        
        
        
    }
       
}

