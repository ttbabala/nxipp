<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"E:\www\web\nxipp.\template/home\reply\index.html";i:1506505184;}*/ ?>

<!DOCTYPE html>
<head>
<title>回复评论</title>
<link rel="stylesheet" href="http://localhost/nxipp/public/home/css/public.css">
<script type="text/javascript" src="http://localhost/nxipp/public/home/js/jquery.min.js"></script>
</head>
<body>
<div id="signup-modal">
  <form id="replyForm" enctype="multipart/form-data" >
      <table class="tableBasic" style="font-size:14px">
          <tr>
              <td align="right" width="25%">评论内容：</td>
              <td width="60%"><textarea style="padding:5px;" name="reply_text" rows="8" cols="35" placeholder="回复内容不超过100个中文字符"></textarea></td>
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
                  <input type="hidden" name="mid" value="<?php echo $mid; ?>" />
                  <input type="hidden" name="to_mid" value="<?php echo $to_mid; ?>" />
                  <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
                  <input type="submit" name="submit" class="btn" value="马上回复" /></td>
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
                $("#replyForm").submit(function(){
                    var datas = $("#replyForm").serialize();
                    $.post('<?php echo url("Reply/index"); ?>',datas,function(data){
                       if (data.status) {
                           layer.msg(data.msg, {icon: 1,time: 1500},function(){
                               layer.close();
                           });
                           window.parent.location.reload();
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
