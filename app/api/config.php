<?php
return array(
     'template'=> [
        // 模板路径
        'view_path'    => ROOT_PATH.'template'.'/api'.DS,
        'tpl_replace_string' => [
            '__api__' => PUBLIC_PATH.'api',//自定义后台公共文件页面
        ],
         // 开启模板布局
        'layout_on'     =>  true,
        'layout_name'   =>  'Layout/common',
    ]
);

