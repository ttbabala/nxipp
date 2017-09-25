<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:49:"E:\www\web\nxipp.\template/admin\login\index.html";i:1502169688;}*/ ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
<!--        <link rel="stylesheet" type="text/css" href="http://localhost/nxipp/public/admin/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="http://localhost/nxipp/public/admin/css/supersized.css" />
        <link rel="stylesheet" type="text/css" href="http://localhost/nxipp/public/admin/css/style.css" />-->
        <link rel="stylesheet" href="http://localhost/nxipp/public/admin/css/reset.css">
        <link rel="stylesheet" href="http://localhost/nxipp/public/admin/css/supersized.css">
        <link rel="stylesheet" href="http://localhost/nxipp/public/admin/css/style.css">
    </head>

    <body>

        <div class="page-container">
            <h1><?php echo $webtitle; ?></h1>
            <form id="adminfrom">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="pwd" class="password" placeholder="Password">
                <button type="submit">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <!-- Javascript -->

        <script src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
        <script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
        <script src="http://localhost/nxipp/public/admin/js/supersized.3.2.7.min.js"></script>
        <script src="http://localhost/nxipp/public/admin/js/supersized-init.js"></script>
        <script src="http://localhost/nxipp/public/admin/js/scripts.js"></script>

        <script type="text/javascript">
            var Amind = "http://localhost/nxipp/public/admin";
        </script>
        <script type="text/javascript">
            $(function(){
                $("#adminfrom").on('submit',function(){
                    var datas = $("#adminfrom").serialize();
                    $.post('<?php echo url("Login/login"); ?>', datas, function(data){
                        if (data.status) {
                            layer.msg(data.msg, {icon: 1, time:2000}, function (){
                                window.location.href = data.url;
                            });
                        }else {
                            layer.msg(data.msg,{icon: 5});
                        }
                    }, 'json');
                    //阻止表单刷新提
                    return false;
                });
            });
        </script>
    </body>
</html>

