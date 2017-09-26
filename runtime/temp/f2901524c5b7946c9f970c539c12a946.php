<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"E:\www\web\nxipp.\template/admin\system\selArticle.html";i:1506397674;}*/ ?>

<!DOCTYPE html>
<head>
<title>选择文章</title>
<link rel="stylesheet" href="http://localhost/nxipp/public/admin/css/public.css">
<script type="text/javascript" src="http://localhost/nxipp/public/admin/js/jquery.min.js"></script>
</head>
<body>
<div id="signup-modal">
   <!-- 当前位置 -->
    <div class="mainBox" style="height:auto!important;height:250px;min-height:250px;">
        <div id="list">
            <form id="formaction" method="post">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                 <tr>
                      <th width="15%" align="center" style="font-weight:bold">选择</th>
                      <th width="10%" align="left" style="font-weight:bold">ID</th>
                      <th width="50%" align="left" style="font-weight:bold">标题</th>
                      <th width="25%" align="left" style="font-weight:bold">作者</th>
                 </tr>
                 <?php if(is_array($articleData) || $articleData instanceof \think\Collection): $i = 0; $__LIST__ = $articleData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                 <tr>
                      <td align="center"><input style="width: 20px;height: 20px;" type="radio" name="sel" class="idDisplay" value="<?php echo $vo['aid']; ?>" /></td>
                      <td align="left"><?php echo $vo['aid']; ?></td>
                      <td align="left"><?php echo $vo['article_title']; ?></td>
                      <td align="left"><?php echo $vo['article_author']; ?></td>
                 </tr>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div style="margin-top:10px;">
                    <input type="hidden" name="seltype" value="article" />
                    <input type="hidden" name="hid" value="<?php echo $hid; ?>"/>
                    <input name="submit" class="btn" type="submit" value="生成链接" />
                </div>
           </form>
        </div>
    </div>
 </div>
     <!--引入js-->
        <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script> 
        <script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $("#formaction").submit(function(){
                    var datas = $("#formaction").serialize(); 
                    $.post('<?php echo url("System/autolink"); ?>',datas,function(data){
                        if (data.status) {
                            layer.msg(data.msg, {icon: 1,time: 1500});
                            window.parent.location.reload();
                        }else {
                            layer.msg(data.msg, {icon: 2,time: 1500});
                            window.parent.location.reload();
                        }
                    },'json');
                    //阻止表单刷新提交
                    return false;
                }); 
         });      
        </script>
</body>
</html>
