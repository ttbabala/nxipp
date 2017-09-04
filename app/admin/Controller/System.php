<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;

class System extends Adminbase{
    public function index(){
        return $this ->fetch();
    }
}
