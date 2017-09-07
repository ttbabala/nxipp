<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use think\Model;
use app\admin\Model\Reply_comments as Rcomments;
//use think\Log;
//use think\Debug;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Index extends Adminbase{
    public function index(){
        //评论数量
        $commentsNums = count(Model('Comments') -> select());
        //作品数量
        $articleNums = count(Model('Article') -> select());
        //会员数量
        $membersNums = count(Model('Members') -> select());
        
        //今日作品
        $todayStart = strstr(date('Y-m-d h:i:s',time()),' ',TRUE).' '.'00:00:00';
        $where = "UNIX_TIMESTAMP(article_date) >= '".strtotime($todayStart)."' "
                        . "and UNIX_TIMESTAMP(article_date) < '".strtotime("now")."'"; //选择UNIX_TIMESTAMP先将date类型转化为时间戳，然后再进行比较
        $todayArticleNums = count(Model("Article") -> where($where) -> order('article_date','desc') -> select());
        
        //新增会员
        $where = "UNIX_TIMESTAMP(register_time) >= '".strtotime($todayStart)."' "
                        . "and UNIX_TIMESTAMP(register_time) < '".strtotime("now")."'"; //选择UNIX_TIMESTAMP先将date类型转化为时间戳，然后再进行比较
        $todayMemberNums = count(Model("Members") -> where($where) -> order('register_time','desc') -> select());
        
        //待审评论
        $cNums = count(Model("Comments") -> where('review',2) -> select()); //评论待审数量
        $cm = new Rcomments();
        $rcNums = count($cm -> where('review',2) -> select());//回复评论待审数量
        $reviewNums = $cNums+$rcNums;
        
        //获取模块数量
        $columnsNums = count(Model("Columns") -> select());
        //获取mysql版本
        $cdata = Model('Columns') -> Query("select VERSION()");
        $mysqlVersion = $cdata[0]['VERSION()'];
        
        //管理员操作记录
        $udata = Model('User') -> order('last_logintime','desc') -> limit(0,5)-> select();
        //Debug::remark('begin');
        $this -> assign('commentsNums',$commentsNums);
        $this -> assign('articleNums',$articleNums);
        $this -> assign('membersNums',$membersNums);
        $this -> assign('todayArticleNums',$todayArticleNums);
        $this -> assign('todayMemberNums',$todayMemberNums);
        $this -> assign('reviewNums',$reviewNums);
        $this -> assign('columnsNums',$columnsNums);
        $this -> assign('mysqlVersion',$mysqlVersion);
        $this -> assign('udata',$udata);
        //Debug::remark('end');
        //echo Debug::getRangeMem('begin', 'end').'kb';
        //echo Debug::getRangeTime('begin', 'end').'s';
        
        
        //Log::record('测试日志信息); //非实时保存
        //Log::write('测试日志信息，这是警告级别，并且实时写入','notice');
       
        return $this -> fetch('index');
    }
}
