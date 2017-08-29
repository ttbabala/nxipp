<?php
namespace app\admin\Controller;
use app\common\Controller\Adminbase;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Index extends Adminbase{
    public function index(){
        return $this -> fetch('index');
    }
}
