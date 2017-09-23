<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"E:\www\web\nxipp.\template/home\login\index.html";i:1506061437;}*/ ?>

<!DOCTYPE html>
<head>
<title>会员登陆</title>
<link rel="stylesheet" href="http://localhost/nxipp/public/home/css/public.css">
<script type="text/javascript" src="http://localhost/nxipp/public/home/js/jquery.min.js"></script>
</head>
<body>
<div id="signup-modal">
  <form name="loginForm" id="loginForm" enctype="multipart/form-data" >
      <table class="tableBasic" style="font-size:14px">
          <tr>
              <td align="right" width="25%">用户名：</td>
              <td width="60%"><input name="username" type="text" class="inpMain" /></td>
              <td><span style="color: red;margin-left: 0px">*</span></td>
          </tr>
          <tr>
              <td align="right" width="25%">密  码：</td>
              <td width="60%"><input name="password" type="password" size="35px" class="inpMain" /></td>
              <td><span style="color: red;margin-left: 0px">*</span></td>
          </tr>
          <tr>
              <td align="right" width="25%">验证码：</td>
              <td width="60%" height="40px"><input name="code" type="text" size="5px" class="inpMain" /><img title="点击刷新验证码" src="<?php echo url('Login/get_captcha'); ?>" style="vertical-align:middle;" class="code-img" /></td>
              <td><span style='color: red;margin-left: 0px'>*</span></td>
          </tr>
          <tr>
              <td align="right" width="25%"></td>
              <td width="60%">
                  <input type="hidden" name="ip" value="<?php echo $MemberIp; ?>"/>
                  <input type="submit" name="submit" class="btn" value="马上登陆" /></td>
              <td></td>
          </tr>
      </table>
  </form>
</div>
  <script type="text/javascript" src="http://localhost/nxipp/public/home/plugins/jquery-1.8.3.min.js"></script>
  <script src="http://localhost/nxipp/public/home/plugins/layer/layer.min.js"></script>
  <script type="text/javascript">
     $(function(){
         $(".code-img").on('click',function(){
             this.src = '<?php echo url("Login/get_captcha"); ?>?d='+Math.random();
         });
     });
     
     $(function(){
                $("#loginForm").submit(function(){
                    var datas = $("#loginForm").serialize();
                    $.post('<?php echo url("Login/index"); ?>',datas,function(data){
                       if (data.status) {
                           layer.msg(data.msg, {icon: 1,time: 1500},function(){
                               layer.close();
                               window.parent.location.reload();
                           });
                       }else {
                           layer.msg(data.msg, {icon: 2,time: 1500});
                       }
                       
                    },'json');
                    //阻止表单刷新提
                    return false;
                });
    });
</script>
</body>
</html>
