<?php
namespace app\home\Controller;
use app\common\Controller\Homebase;
use app\admin\Model\Article;
use app\home\Model\Cats;

class Category extends Homebase{
    public function index(){
        $cid = input('cid');
        $cat = new Cats();
        $pid = getCatParent($cid);  //先判断是否是父类
        $at = new Article();
        $cidArray = array_unique($at -> column('cid')); //获取子类id,过滤重复字段
        if(!$pid[0]){                       //如果是父类
            $sonid = getCatGrandson($cid);  //获取该父类下子类的id
            foreach($sonid as $key => $sid){
                if(in_array($sid,$cidArray)){   //如果子类id存在于Article作品中      
                   $last_sid[$key] = $sid;  
                }
            }
            $articleData = $at -> where('cid','in',$last_sid) -> order('article_date','desc') -> paginate(15);
            $page = $articleData -> render();                       //渲染分页样式
        }
        else{
            $articleData = $at -> where('cid',$cid) -> order('article_date','desc') -> paginate(15);//分页
            $page = $articleData -> render();                       
        }
        /* 得到子分类名称及父类名称 */
        $parentid = getCatParent($cid);                               //找爹
        $pname = $cat -> where('catid',$parentid[0]) -> column('catname');
        $cname = $cat -> where('catid',$cid) -> column('catname');
        if(count($pname) == 0){                                 //无父类
            $this -> assign('pname','no');
        }else{
            $this -> assign('pname',$pname[0]);
        }
        $this -> assign('cname',$cname[0]);
        $this -> assign('articleData',$articleData);
        $this -> assign('page',$page);
        return $this -> fetch();
    }
}

