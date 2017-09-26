<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\admin\Model\Article;

class Search extends Homebase{
    public function index(){
        $keywords = input('keywords');
        $article = new Article();
        $atlist = $article -> where('article_title','like','%'.$keywords.'%') 
                -> whereOr('article_keywords','like','%'.$keywords.'%')-> paginate(10);
        if(count($atlist) > 0){
            $page = $atlist -> render();
            $countNum = count($atlist);
            $this -> assign('page',$page);
            $this -> assign('atlist',$atlist);
        }else{
            $countNum = 0;         
        } 
        $this -> assign('countNum',$countNum);
        $this -> assign('keywords',$keywords);
        return $this -> fetch();
    }
}
