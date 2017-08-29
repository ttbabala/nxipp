<?php
namespace app\common\Controller;
use think\Controller;
use think\Model;
use think\Session;
use think\auth\Auth;
/**
 *后台基础类
 */
class Adminbase extends Controller{
    public $ma = array();
    
    protected $ctrl = array('adminbase', 'login', 'index', 'system');
    
    public function _initialize(){
        if(!session('userid')){
            $this ->error('请先去登陆哦^_^',url('Login/index'));
        }       
        $admin_name = Model('user') -> where('id',session('userid')) -> find();
        if(!$admin_name['ustatus']){
            $this->error('该账号已被锁定，请联系管理员哦^_^',url('Login/index'));
        }
        $controller = request()->controller();
        $action = request()->action();
        $auth = new Auth();
        /*if(!$auth->check($controller . '-' . $action, session('userid'))){
            $this->error('你没有权限访问');
        }*/
        $this->assign('admin_name',$admin_name['uname']);
    }
    //获取所有控制器名称
    protected function getController($module = 'admin'){
        if(empty($module)) return null;
        $module_path = APP_PATH . '/' . $module . '/Controller/';  //控制器路径
        if(!is_dir($module_path)) return null;
        $module_path .= '/*.php';
        $ary_files = glob($module_path);
        foreach ($ary_files as $file) {
            if (is_dir($file)) {
                continue;
            }else {
                $files[] = basename($file, '.php');
            }
        }
        return $files;
    }
    
    //获取所有方法名称
    protected function getAction($module = 'admin', $controller){
        if(empty($controller)) return null;

        $controllerClass = '\\' . $module . '\\Controller\\'.$controller;
        $functions = get_class_methods($controllerClass);

        //排除部分方法
        $inherents_functions = array('_initialize','__construct','getActionName','isAjax','display','show','fetch','buildHtml','assign','__set','get','__get','__isset','__call','error','success','ajaxReturn','redirect','__destruct','_empty','getController', 'getAction', 'theme', 'uploadImg');
        if(is_array($functions)){    //add
            foreach ($functions as $func){
                $func = trim($func);
                if(!in_array($func, $inherents_functions)){
                    $customer_functions[] = strtolower($func);
                }
            }
            return $customer_functions;
        }
    }
    
    //文件上传类
    /*protected function upload(){
        
    }*/
}

