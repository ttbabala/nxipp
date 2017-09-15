<?php
return array(
     'template'=> [
        // 模板路径
        'view_path'    => ROOT_PATH.'template'.'/home'.DS,
        'tpl_replace_string' => [
            '__home__' => PUBLIC_PATH.'home',//自定义后台公共文件页面
        ],
         // 开启模板布局
        'layout_on'     =>  true,
        'layout_name'   =>  'Layout/common',
    ]
);

