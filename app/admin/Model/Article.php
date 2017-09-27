<?php
namespace app\admin\Model;
use think\Model;
use think\Request;
use think\Db;
use app\admin\Model\Votes;

class Article extends Model{
    protected $pk = 'aid';
    
    public function addData(){
        $Request = Request::instance();
        $data = input('post.');       
        if (!$data['article_title']) {
            exit(json_encode(array('status'=>0,'msg'=>'标题不能为空哦^_^')));
        }
        if (!$data['article_author']) {
            exit(json_encode(array('status'=>0,'msg'=>'作者不能为空哦^_^')));
        }
        if ($data['article_cat'] == '0'){
           exit(json_encode(array('status'=>0,'msg'=>'必须选择作品所属分类^_^'))); 
        }
        if (!$data['article_excerpt']){
            exit(json_encode(array('status'=>0,'msg'=>'摘要必须填写^_^')));
        }
       $imgurl = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data['imgUrl']);
       $datas = ([
            'article_author' => $data['article_author'],
            'article_keywords' => preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)|(\.)/",',',$data['article_keywords']),    //正则替换中文字符为,
            'article_date' => date('Y-m-d H:i:s',time()),
            'article_date_gmt' => date('Y-m-d H:i:s',time()),
            'article_content'  => $data['article_content'],
            'article_title' => $data['article_title'],
            'article_excerpt' => $data['article_excerpt'],
            'article_status'  => $data['article_status'],
            'article_comment' => $data['article_comment'],
            'cid' => $data['article_cat'],
            'article_photo' => $imgurl,
            'comment_count' => '20',
            'article_pid' => 1,
            'viewcount' => 0
        ]);
        $aid = Db::connect('mysql://root:deze@127.0.0.1:3306/nxipp#utf8') -> name('article') ->insertGetId($datas);       //Db类操作，返回自增主键供Votes表使用

        if ($aid > 0) {
                $vt = new Votes();
                $vt -> data = ([
                  'id' => $aid,
                  'likes' => 0,
                  'unlikes' => 0
                ]);
                if($vt -> save()){  //向Votes表插入该ID的初始记录
                    return true; 
                }
        }
        return false;
    }
    
    public function editData($aid){
        $articleId = $aid;
        $data = input('post.');       
        if (!$data['article_title']) {
            exit(json_encode(array('status'=>0,'msg'=>'标题不能为空哦^_^')));
        }
        if (!$data['article_author']) {
            exit(json_encode(array('status'=>0,'msg'=>'作者不能为空哦^_^')));
        }
        if ($data['article_cat'] == '0'){
           exit(json_encode(array('status'=>0,'msg'=>'必须选择作品所属分类^_^'))); 
        }
        if (!$data['article_excerpt']){
            exit(json_encode(array('status'=>0,'msg'=>'摘要必须填写^_^')));
        }
        if($data['imgUrl'] !== ''){
            $imgurl = 'http://'.str_replace("\\","/",$_SERVER['HTTP_HOST'].$data['imgUrl']);   //得到图片完整路径
        }else{
            $imgurl = $data['showpic'];
        }
        $datas = [
            'article_author' => $data['article_author'],
            'article_keywords' => preg_replace("/(\n)|(\s)|(\t)|(\')|(')|(，)|(\.)/",',',$data['article_keywords']),    //正则替换中文字符为,
            'article_date_gmt' => date('Y-m-d H:i:s',time()),
            'article_content'  => $data['article_content'],
            'article_title' => $data['article_title'],
            'article_excerpt' => $data['article_excerpt'],
            'article_status'  => $data['article_status'],
            'article_comment' => $data['article_comment'],
            'cid' => $data['article_cat'],
            'article_photo' => $imgurl,
            'comment_count' => '20',
            'article_pid' => 1  //发布者id
        ];
        
        if ($this -> save($datas,['aid' => $articleId]) ) {
            return true;
        }
        return false;
    }
    
    public function delData($aid){
        $ResNum = $this -> where('aid',$aid) -> delete();
        if( $ResNum == 1 ){
            $vt = new Votes();
            $vt -> where('id',$aid) -> delete();
            return true;
        }
        return false;
    }
    
}


