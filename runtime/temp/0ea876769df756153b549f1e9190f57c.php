<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:57:"E:\www\web\nxipp.\template/admin\article\articlelist.html";i:1504178021;s:51:"E:\www\web\nxipp.\template/admin\Layout\common.html";i:1502168098;s:51:"E:\www\web\nxipp.\template/admin\Public\header.html";i:1503941668;s:48:"E:\www\web\nxipp.\template/admin\Public\nav.html";i:1506242403;s:49:"E:\www\web\nxipp.\template/admin\Public\menu.html";i:1506072849;s:51:"E:\www\web\nxipp.\template/admin\Public\footer.html";i:1506242424;}*/ ?>
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
    <div id="urHere">管理中心<b>></b><strong><?php echo $columnName; ?></strong> </div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo url('Article/addArticle'); ?>" class="actionBtn add">添加作品</a><?php echo $columnName; ?></h3>
        <div class="filter">
            <form action="<?php echo url('Article/articleList'); ?>" method="get">
                 <select name="cat_id">
                        <option value="0">所有分类</option>
                        <?php if(is_array($catsData) || $catsData instanceof \think\Collection): $i = 0; $__LIST__ = $catsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['catid']; ?>"><?php echo $vo['_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                  </select>
                  <input name="article_name" type="text" class="inpMain" value="" size="20" />
                  <input class="btnGray" type="submit" value="筛选" />
            </form>
            <span>
                <a class="btnGray" href="#">更新作品封面</a>
                <a class="btnGray" href="#">开始筛选首页作品</a>
            </span>
        </div>
        <div id="list">
            <form name="action" id="formaction" method="post" action="#">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                 <tr>
                      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                      <th width="20" align="left">ID</th>
                      <th width="40" align="left">封面</th>
                      <th width="90" align="left">标题</th>
                      <th width="40" align="left">作者</th>
                      <th width="100" align="left">分类</th>
                      <th width="50" align="left">关键词</th>
                      <th width="50" align="left">发布者</th>
                      <th width="60" align="left">发布时间</th>
                      <th width="60" align="left">更新时间</th>
                      <th width="30" align="left">状态</th>
                      <th width="30" align="left">评论</th>
                      <th width="30" align="left">评论数</th>
                      <th width="120" align="center">操作</th>
                 </tr>
                 <?php if(is_array($articlelist) || $articlelist instanceof \think\Collection): $i = 0; $__LIST__ = $articlelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                 <tr>
                      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $article['aid']; ?>" /></td>
                      <td align="left"><?php echo $article['aid']; ?></td>
                      <td align="left"><img src="<?php echo $article['article_photo']; ?>" width="70px" height="70px" class="img"/></td>
                      <td align="left"><?php echo mb_substr($article['article_title'],0,15,'utf-8'); ?></td>
                      <td align="left"><?php echo $article['article_author']; ?></td>
                      <td align="left"><?php echo $article['cpname'][0]; ?>-><?php echo $article['cname'][0]; ?></td>
                      <td align="left"><?php echo $article['article_keywords']; ?></td>
                      <td align="left"><?php echo $article['uname'][0]; ?></td>
                      <td align="left"><?php echo $article['article_date']; ?></td>
                      <td align="left"><?php echo $article['article_date_gmt']; ?></td>
                      <td align="left">
                          <?php echo !empty($article['article_status']=1)?'可见' : '不可见'; ?>
                      </td>
                      <td align="left">
                          <?php echo !empty($article['article_comment']=1)?'开启' : '不开启'; ?>
                      </td>
                      <td align="left">
                          <?php echo $article['commentsNums']; ?>
                      </td>
                      <td align="center">
                          <a href="<?php echo url('Article/editArticle',['aid' => $article['aid']]); ?>" class="tab_a_link edit_btn">修改</a>
                          <a class="tab_a_link del_btn btn-danger-a" href="javascript:;" aid="<?php echo $article['aid']; ?>"><i class="fa fa-share-square-o">删除</i></a>
                      </td>
                 </tr>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="action">
                     <select name="action" id="action" onchange="douAction()">
                          <option value="0">请选择...</option>
                          <option value="del_all">删除</option>
                          <option value="category_move">移动分类至</option>
                     </select>
                     <select name="new_cat_id" id="new_cat_id" style="display:none">
                        <option value="0">所有分类</option>
                        <?php if(is_array($catsData) || $catsData instanceof \think\Collection): $i = 0; $__LIST__ = $catsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['catid']; ?>"><?php echo $vo['_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                     <input name="submit" class="btn" type="submit" value="执行" />
                </div>
                </form>
        </div>
        <div class="pagelist">
                <?php echo $page; ?>
        </div>
    </div>
 </div>
        <!--引入js-->
        <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
        <script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
        <script type="text/javascript">
            onload = function()
            {
             document.forms['action'].reset();
            }
            function douAction()
            {
             var frm = document.forms['action'];
             frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
            }

        </script>
        <script type="text/javascript">  
            $(function(){   //异步删除
                $('.btn-danger-a').on('click',function(){
                    var del =  confirm('确认要删除么？');
                    if (del) {
                        var aid =$(this).attr('aid');
                        $.post('<?php echo url("Article/delArticle"); ?>',{aid : aid}, function(data){
                           if (data.status) {
                                layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                    window.location.reload();
                                });
                            }else {
                                layer.msg(data.msg,{icon : 2,time : 2000});
                            }

                        },'json');
                    }

                });
            });
            
            $(function(){
                $('.img').on('click',function(){
                   var popimg = $(this)[0].src;
                   layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: '300px',
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: "<img src="+popimg+" />"
                      });
                });
            });
            
            $(function(){   //异步批量删除
                 $("#formaction").submit(function(){
                     var chkarray =[]; 
                     var post_str = '';
                     $("input[name='checkbox[]']:checked").each(function(){ 
                        chkarray.push($(this).val()); 
                     });
                     if(chkarray.length < 1 ){      //checkbox数组长度小于1
                         layer.msg('没有选择作品',{icon: 2,time: 5000});
                         exit();
                     }
                     var action = $("#action").val();
                     if( action === 'category_move'){
                         var catid = $("#new_cat_id").val();
                         if( catid === '0'){
                            layer.msg('没有选择分类',{icon: 2,time: 5000});
                            exit();
                         }
                        var move = confirm('确认要移动分类么？');
                        if(move){
                          post_str = action +'|'+ chkarray.toString() + '|'+ catid;   
                        }else{
                            exit();
                        }
                     }
                        var del = confirm('确认要删除作品么？');
                        if(del){
                           post_str = action +'|'+ chkarray.toString(); 
                        }else{
                            exit();
                        }
                        $.post('<?php echo url("Article/clArticles"); ?>',{post_str : post_str}, function(data){
                           if (data.status) {
                                layer.msg(data.msg, {icon: 1,time: 5000},function(){
                                    window.location.reload();
                                });
                            }else {
                                layer.msg(data.msg,{icon : 2,time : 5000});
                            }
                        },'json');             
                 });
            });
        </script>



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
<script type="text/javascript">
    function closes(){
        is_close = 1;
        document.getElementById('ordfoo').style.display = 'none';
    }
    
</script>

</body>
</html>