<?php
namespace app\admin\Model;
use think\Model;
use think\Request;

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
       $this ->data = ([
            'article_author' => $data['article_author'],
            'article_keywords' => $data['article_keywords'],
            'article_date' => date('Y-m-d H:i:s',time()),
            'article_date_gmt' => date('Y-m-d H:i:s',time()),
            'article_content'  => $data['article_content'],
            'article_title' => $data['article_title'],
            'article_excerpt' => $data['article_excerpt'],
            'article_status'  => $data['article_status'],
            'article_comment' => $data['article_comment'],
            'cid' => $data['article_cat'],
            'article_photo' => 'http://127.0.0.1/upload/img/2017/08/12/test.jpg',
            'comment_count' => '20',
            'article_pid' => 1
        ]);
        
        if ($this -> save()) {
            return true;
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
        $datas = [
            'article_author' => $data['article_author'],
            'article_keywords' => $data['article_keywords'],
            'article_date_gmt' => date('Y-m-d H:i:s',time()),
            'article_content'  => $data['article_content'],
            'article_title' => $data['article_title'],
            'article_excerpt' => $data['article_excerpt'],
            'article_status'  => $data['article_status'],
            'article_comment' => $data['article_comment'],
            'cid' => $data['article_cat'],
            'article_photo' => 'http://127.0.0.1/upload/img/2017/08/12/test.jpg',
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
            return true;
        }
        return false;
    }
    
}


