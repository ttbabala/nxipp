<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*
 * 公共函数
 */

//加密函数，密码生成位数60
function bcryptHash($rowpw,$rand=8){
    if($rand < 4 || $rand > 31) $rand=8;
    $salt = '$2a$'.str_pad($rand,2,'0',STR_PAD_LEFT).'$';
    $randomValue = openssl_random_pseudo_bytes(16);
    $salt.= substr(strtr(base64_encode($randomValue),'+','.'),0,22);
    return crypt($rowpw,$salt);		
}

//解密函数
function bcryptVerfy($rowpw,$storedHash){
    return crypt($rowpw,$storedHash) == $storedHash;
}

//会员密码加密函数
function encryption($pass){
    $salt = 'www.nxipp.com';
    return md5(md5($pass).$salt);
}

//获取IP
function getIP(){
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow IP";
    return $ip;
}

//返回数组维度

function arrayLevel($arr){
    $al = array(0);
    function aL($arr,&$al,$level=0){
        if(is_array($arr)){
            $level++;
            $al[] = $level;
            foreach($arr as $v){
                aL($v,$al,$level);
            }
        }
    }
    aL($arr,$al);
    return max($al);
}

//返回模块及方法中文
function lang($name){
     $cnArray = [
        '后台管理首页' => 'Index-index',
        '系统设置' => 'System-index',
        '公告管理' => 'Notice','公告管理首页' => 'Notice-index','添加公告' => 'Notice-addNotice','编辑公告' => 'Notice-editNotice','删除公告' => 'Notice-delNotice',
        '用户管理' => 'User','用户管理首页' => 'User-userList','添加用户' => 'User-addUser','编辑用户' => 'User-editUser','删除用户' => 'User-delUser',
        '角色管理' => 'Part','角色管理首页' => 'Part-index','添加角色' => 'Part-addPart','编辑角色' => 'Part-editPart','删除角色' => 'Part-delPart',
        '规则管理' => 'Rule','规则管理首页' => 'Rule-index','逐条添加规则' => 'Rule-addRule','逐条编辑规则' => 'Rule-editRule','删除规则' => 'Rule-delRule','批量添加规则' => 'Rule-addRules',
        '作品管理' => 'Article','作品管理首页' => 'Article-articleList','添加作品' => 'Article-addArticle','编辑作品' => 'Article-editArticle','删除作品' => 'Article-delArticle',
        '作品分类管理' => 'Cats','作品分类管理首页' => 'Cats-index','添加作品分类' => 'Cats-addCategory','编辑作品分类' => 'Cats-editCategory','删除作品分类' => 'Cats-delCategory','添加作品子分类' => 'Cats-addSubclassification',
        '模块管理' => 'Columns','模块管理首页' => 'Columns-index','添加模块' => 'Columns-addColumn','编辑模块' => 'Columns-editColumn','删除模块' => 'Columns-delColumn'
    ]; 
     //判断包含几个字符串字段
    if(substr_count($name,"|") >0){
        $nameArray = explode("|",$name);
        for($i=0;$i<count($nameArray);$i++){
            $endata[$i] = array_search($nameArray[$i],$cnArray);
        }
        return $endata;      
    }
    return null;
}

//获取某个作品分类类的儿子、孙子的id
function getCatGrandson($cid){
    $GLOBALS['catGrandson'] = array();
    $GLOBALS['category_id_arr'] = array();
    $GLOBALS['catGrandson'][] = $cid; // 先把自己的id 保存起来
    $cat = Model('Cats');
    $GLOBALS['category_id_arr'] = $cat -> column('catid','parentid'); //把整张表找出来
    $son_id_arr = $cat -> where('parentid',$cid) -> column('catid');  //先把所有儿子找出来
    foreach($son_id_arr as $k => $v)
    {
        getCatGrandson2($v);
    }
    return $GLOBALS['catGrandson'];
}

/**
 * 递归调用找到 重子重孙
 * @param type $cat_id
 */
function getCatGrandson2($cid)
{
    $GLOBALS['catGrandson'][] = $cid;
    foreach($GLOBALS['category_id_arr'] as $k => $v)
    {
        // 找到孙子
        if($v == $cid)
        {
            getCatGrandson2($k); // 继续找孙子
        }
    }
}

