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

