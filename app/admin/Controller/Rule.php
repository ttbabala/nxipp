<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
use app\admin\Model\Auth_rule;
use app\admin\Model\Columns;
use think\Request;
use think\Loader;

class Rule extends Adminbase{
    public function index(){
        $ar = new Auth_rule();
        $RuleArray = $ar  -> select();
        $count = count($RuleArray);
        $RulelistData = $ar -> order('id','asc') -> paginate(8);
        $page = $RulelistData -> render();
        $this -> assign('RulelistData',$RulelistData);
        $this -> assign('page',$page);
        return $this -> fetch();
    }
    
    public function addRules(){ //批量添加规则
        $Request = Request::instance();
        if($Request ->isAjax()){
          $ar = new Auth_rule();
          $params = 1;  //批量添加
          $result = $ar -> addData($params);
          if($result){
               return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Rule/index')]); 
          }
          return json(['status'=>0,'msg'=>'添加失败哦^_^']); 
        }
        $column = new Columns();
        $columnData = $column -> select();
        $this -> assign('columnData',$columnData);
        return $this -> fetch();
    }
    
    public function addRule(){ //逐条添加规则
        $Request = Request::instance();
        if($Request ->isAjax()){
            if(input('controllerName')!==null){
                $controllerName = input('controllerName');
                $column = new Columns();
                $data = $column -> where('controllerName',$controllerName) -> column('functionName');
                $datas = explode(",",$data[0]);
                return json(['status'=>1,'msg'=>$datas]);
            }
                $ar = new Auth_rule();
                $params = 0; //逐条添加
                $result =$ar -> addData($params);
                if($result){
                    return json(['status'=>1,'msg'=>'添加成功^_^','url'=>url('Rule/index')]); 
                }
                return json(['status'=>0,'msg'=>'添加失败哦^_^']);

        }
        $controllersData = $this ->getController('admin');
        $this -> assign('controllersData',$controllersData);
        return $this -> fetch();
    }
   
   public function editRule(){
        $Request = Request::instance();
        $id = input('id');
        $data = [];
        $ar = new Auth_rule();
        if($Request ->isAjax()){
            if(input('controllerName')!==null){
                $controllerName = input('controllerName');
                $column = new Columns();
                $data = $column -> where('controllerName',$controllerName) -> column('functionName');
                $datas = explode(",",$data[0]);
                return json(['status'=>1,'msg'=>$datas]);
            }
            $id = input('id');
            $result = $rule -> editData($id);
            if($result){
               return json(['status'=>1,'msg'=>'编辑成功^_^','url'=>url('Rule/index')]);  
            }
             return json(['status'=>0,'msg'=>'编辑失败哦^_^']);
        }
        $ruleData = $ar -> where('id',$id) -> find();
        $data = explode("-",$ruleData['name']);
        $ruleArray = $ar -> select();
        for($i=0;$i<count($ruleArray);$i++){
            $dataArray[$i] = explode("-",$ruleArray[$i]['name']);
        }
        $this -> assign('dataArray',$dataArray);
        $this -> assign('ruleArray',$ruleArray);
        $this -> assign('data',$data);
        $this -> assign('ruleData',$ruleData);
        return $this -> fetch();
    }
    
    public function delRule(){
        $Request = Request::instance();
        $id = input('id');
        $ar = new Auth_rule();
        if( $Request ->isAjax() ){
            $Result = $ar-> delData($id);
            if($Result){
                return json(['status'=>1,'msg'=>'删除成功^_^','url'=>url('Rule/index')]); 
            }
            return json(['status'=>0,'msg'=>'删除失败哦^_^']);
        }
    }
    
    /* public function test(){  //获取所有方法
        $controllers = $this ->getController();
        foreach ($controllers as $controller) {
          if(!in_array(strtolower($controller), $this->ctrl)) {
              $this->ma[strtolower($controller)] = $this->getAction('admin', $controller);
          }
        }
        var_dump($this->getAction('admin', 'Article'));
        
    }*/
    public function translateName(){
        $Request = Request::instance();
        if($Request -> isAjax()){
            $authData = input('auth');
            $cnStr = implode("|",lang($authData));
            return json(['status'=>1,'msg'=>$cnStr]);
        }
    }
    
    

}
