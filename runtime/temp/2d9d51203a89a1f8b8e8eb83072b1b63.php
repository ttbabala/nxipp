<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:55:"E:\www\web\nxipp.\template/admin\cats\editcategory.html";i:1502963815;s:51:"E:\www\web\nxipp.\template/admin\Layout\common.html";i:1502168098;s:51:"E:\www\web\nxipp.\template/admin\Public\header.html";i:1503941668;s:48:"E:\www\web\nxipp.\template/admin\Public\nav.html";i:1506071735;s:49:"E:\www\web\nxipp.\template/admin\Public\menu.html";i:1506072849;s:51:"E:\www\web\nxipp.\template/admin\Public\footer.html";i:1506069188;}*/ ?>
<!--载入头部-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>后台管理中心</title>
    <meta name="Copyright" content="Douco Design." />
    <link href="http://localhost/nxipp/public/admin/css/public.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/nxipp/public/admin/css/laydate.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/nxipp/public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://localhost/nxipp/public/admin/plugins/uploadify/css/uploadify.css" rel="stylesheet" type="text/css">
  
    <!--<link href="__PLUGINS__/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
    <!--<link href="__PLUGINS__/bootstrap-3.3.5/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">-->
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/js/global.js"></script>
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/js/laydate.js"></script>
    <script type="text/javascript" src="http://localhost/nxipp/public/admin/js/laydate.dev.js"></script>
<style>
 .pagelist {padding:10px 0; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 3px;}
.pagelist span.current{ background:#09F; color:#FFF; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:15px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}
</style>
</head>
<body>



<!--载入头部导航-->
<div id="dcWrap"> <div id="dcHead">
    <div id="head">
        <div class="logo"><a href="index.html"><img src="http://localhost/nxipp/public/admin/images/dclogo.gif" alt="logo"></a></div>
        <div class="nav">
            <ul>
                <li class="M"><a href="JavaScript:void(0);" class="topAdd">添加</a>
                    <div class="drop mTopad"><a href="<?php echo url('Article/addArticle'); ?>">作品</a> <a href="<?php echo url('User/addUser'); ?>">用户</a> <a href="<?php echo url('Members/addMember'); ?>">会员</a> <a href="<?php echo url('Notice/addNotice'); ?>">公告</a> <a href="<?php echo url('Cats/addCategory'); ?>">分类</a> <a href="<?php echo url('Columns/addColumn'); ?>">模块</a></div>
                </li>
                <li><a href="/" target="_blank">查看站点</a></li>
                <li><a id="clear_cache" href="javascript:;">清除缓存</a></li>
                <li><a id="help" href="JavaScript:;" >帮助</a></li>
                <li class="noRight"><a href="#">Hqiot</a></li>
            </ul>
            <ul class="navRight">
                <li class="M noLeft"><a href="JavaScript:void(0);">您好，<?php echo $admin_name; ?></a>
                    <div class="drop mUser">
                        <a href="JavaScript:;">编辑我的个人资料</a>
                        <a href="JavaScript:;">设置云账户</a>
                    </div>
                </li>
                <li class="noRight Sign-out"><a href="<?php echo url('Login/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
<script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
<script type='text/javascript'>
     $(function(){
        $('#clear_cache').on('click',function(){

            if(confirm('确定要删除全站缓存吗？')){
               $.post('<?php echo url("Clearcache/clearRuntime"); ?>',{clearcache : 1},function(data){
                               if (data.status) {
                                   layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                      window.location.reload();
                                   });
                               }else {
                                   layer.msg(data.msg, {icon: 2,time: 1500});
                               }

                           },'json');
                           //阻止表单刷新提
                    return false; 
                }
            });
        });  
    
    $(function(){
         $('#help').on('click',function(){
          layer.open({
                type: 1
                ,title: false //不显示标题栏
                ,closeBtn: false
                ,area: '300px;'
                ,shade: 0.8
                ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,resize: false
                ,btn: ['查看接口文档', '关闭窗口']
                ,btnAlign: 'c'
                ,moveType: 1 //拖拽模式，0或者1
                ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">\n\
                后台基于thinkphp5开发，服务器端采用LNMP架构，版本号为1.04；\n\
                </br>linux（centos7.0）;</br>nginx(nginx1.3.2);</br>mysql(mysql5.6.37);</br>PHP(5.6.31);</br>对外接口规范及说明另附说明书</br>后台版权：宁夏大学新闻传播学院</div>'
                ,success: function(layero){
                  var btn = layero.find('.layui-layer-btn');
                  btn.find('.layui-layer-btn0').attr({
                    href: 'http://www.hq-smart.net'
                    ,target: '_blank'
                  });
                }
              });
 
         });
    });

</script>
</div>
</div>
</div>
</div>


<!--载入左侧导航栏-->
<div id="dcLeft">
    <div id="menu">
        <ul class="top">
            <li><a href="<?php echo url('Index/index'); ?>"><i class="home"></i><em>管理首页</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('System/index'); ?>"><i class="system"></i><em>系统设置</em></a></li>
            <li><a href="<?php echo url('Notice/index'); ?>"><i class="managerLog"></i><em>公告管理</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('User/userList'); ?>"><i class="user"></i><em>用户列表</em></a></li>
            <!-- <li><a href="<?php echo url('Power/index'); ?>"><i class="nav"></i><em>权限管理</em></a></li> -->
            <li><a href="<?php echo url('Part/index'); ?>"><i class="nav"></i><em>角色管理</em></a></li>
            <li><a href="<?php echo url('Rule/index'); ?>"><i class="case"></i><em>规则管理</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('Article/articleList'); ?>"><i class="article"></i><em>作品列表</em></a></li>
            <li><a href="<?php echo url('Cats/index'); ?>"><i class="articleCat"></i><em>作品分类</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('Single/index'); ?>"><i class="page"></i><em>单页管理</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('Columns/index'); ?>"><i class="product"></i><em>模块列表</em></a></li>
            <li><a href="<?php echo url('Lanmu/index'); ?>"><i class="theme"></i><em>栏目列表</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('Members/index'); ?>"><i class="user"></i><em>会员列表</em></a></li>
            <li><a href="<?php echo url('Comments/index'); ?>"><i class="guestbook"></i><em>会员评论</em></a></li>
        </ul>
        <ul>
            <li><a href="<?php echo url('Zan/index'); ?>"><i class="order"></i><em>点赞管理</em></a></li>
            <li><a href="<?php echo url('User/jiaozilist'); ?>"><i class="guestbook"></i><em>交流空间管理</em></a></li>
        </ul>
        
        <ul>
            <li><a href="<?php echo url('Databackup/bak'); ?>"><i class="backup"></i><em>数据备份</em></a></li>
            <li><a href="<?php echo url('User/jiaozilist'); ?>"><i class="plugin"></i><em>数据统计</em></a></li>
        </ul>
        <!--<ul>-->
            <!--<li><a href="article_category.html"><i class="articleCat"></i><em>文章分类</em></a></li>-->
            <!--<li><a href="article.html"><i class="article"></i><em>文章列表</em></a></li>-->
        <!--</ul>-->
        <!--<ul class="bot">-->
            <!--<li><a href="backup.html"><i class="backup"></i><em>数据备份</em></a></li>-->
            <!--<li><a href="mobile.html"><i class="mobile"></i><em>手机版</em></a></li>-->
            <!--<li><a href="theme.html"><i class="theme"></i><em>设置模板</em></a></li>-->
            <!--<li><a href="manager.html"><i class="manager"></i><em>网站管理员</em></a></li>-->
            <!--<li><a href="manager.php?rec=manager_log"><i class="managerLog"></i><em>操作记录</em></a></li>-->
        <!--</ul>-->
    </div>
</div>

<!--内容主体 START-->
<div id="dcMain">
   <!-- 当前位置 -->
    <div id="urHere">管理中心<b>></b><strong>添加分类</strong> </div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo url('Cats/index'); ?>" class="actionBtn">作品分类</a>编辑分类</h3>
        <form id="submitcategory">
            <?php if(is_array($data) || $data instanceof \think\Collection): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
             <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                 <tr>
                     <td width="80" align="right">分类名称</td>
                     <td><input type="text" name="catname" value="<?php echo $vo['catname']; ?>" size="40" class="inpMain" /></td>
                 </tr>
              <tr>
               <td align="right">是否显示</td>
               <td>
                <input style="width: 20px;height: 20px;" type="checkbox" <?php if($vo['isshow']): ?>checked="checked"<?php endif; ?> name="isshow" value="1" size="5" class="idDisplay" />
               </td>

              </tr>
                <tr>
                     <td align="right">排序</td>
                     <td><input type="text" name="catsort" value="<?php echo $vo['catsort']; ?>" size="5" class="inpMain" /></td>
                </tr>
                <tr>
                     <td></td>
                     <td>
                      <input type="hidden" name="catid" value="<?php echo $vo['catid']; ?>" />
                      <input name="submit" class="btn" type="submit" value="提交" />
                     </td>
                </tr>
             </table>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </form>
         <!--引入js-->
                 <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
                 <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/js/jquery.uploadify.js"></script>
                 <script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $("#submitcategory").submit(function(){
                    var datas = $("#submitcategory").serialize();
                    $.post('<?php echo url("Cats/editCategory"); ?>',datas,function(data){
                        if (data.status) {
                            layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                window.location.href = '<?php echo url("Cats/index"); ?>';
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
    </div>
</div>


<!--载入底部-->
<div class="clear"></div>
<div id="dcFooter">
    <div id="footer">
        <div class="line"></div>
        <ul>
            版权所有 © 2016-2017 宁夏华嵌智能物联网技术有限公司，并保留所有权利。
        </ul>
    </div>
</div>
<div class="clear"></div>
<script>
    var now_num = 0; //现在的数量
    var is_close=0;
    function ajaxOrderNotice(){
        var url = '<?php echo url("Comments/ajaxCommentsNotice"); ?>';
        if(is_close > 0)
            return;
        $.get(url,function(data){
            //有新评论且数量不跟上次相等 弹出提示
            if(data > 0 && data != now_num){
                now_num = data;
                if(document.getElementById('ordfoo').style.display == 'none'){
                $('#orderAmount').text(data);
                $('#ordfoo').show();
                }
            }
        })
//        setTimeout('ajaxOrderNotice()',5000);
    }

//    setTimeout('ajaxOrderNotice()',5000);
</script>

<style type="text/css">
    .fl{ float:left; margin-left:10px; margin-top:4px}
    .fr{ float:right; margin-right:10px; margin-top:3px}
    .orderfoods{ width:200px; border:1px solid #dedede; position:absolute; bottom:50px; z-index:999; right:10px; background-color:#00A65A;opacity:0.8;-webkit-opacity:0.8;filter:alpha(opacity=80);-moz-opacity:0.8;  }
    .dor_head{ border-bottom:1px solid #dedede; height:28px; color:#FFF; font-size:12px}
    .dor_head:after{ content:""; clear:both; display:block}
    .dor_foot{ margin-top:6px; color:#FFF}
    .dor_foot p{ padding:6px 12px}
    .te-in{ text-indent:2em;}
    .dor_foot p span{ color:red}
    .te-al-ce{ text-align:center}
    p{font-size: 14px}
    #ordfoo{position: fixed;bottom:5% }

</style>
<div id="ordfoo" class="orderfoods" style="">
    <div class="dor_head">
        <p class="fl">新评论审核通知</p>
        <p onClick="closes();" id="close" class="fr" style="cursor:pointer">x</p>
    </div>
    <div class="dor_foot">
        <p class="te-in">您有<span id="orderAmount"><?php echo $comments_amount; ?></span>个评论待审核</p>
        <p class="te-al-ce"><a href="<?php echo url('Comments/index'); ?>" target='rightContent'><span>点击查看</span></a></p>
    </div>
</div>
<script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
<script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
<script type="text/javascript">
    function closes(){
        is_close = 1;
        document.getElementById('ordfoo').style.display = 'none';
    }
    
    $('clear_cache').on('click',function(){
        confirm('确定要删除全站缓存吗？');
    })
</script>

</body>
</html>