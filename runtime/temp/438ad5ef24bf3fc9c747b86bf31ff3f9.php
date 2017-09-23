<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:52:"E:\www\web\nxipp.\template/admin\comments\index.html";i:1504517964;s:51:"E:\www\web\nxipp.\template/admin\Layout\common.html";i:1502168098;s:51:"E:\www\web\nxipp.\template/admin\Public\header.html";i:1503941668;s:48:"E:\www\web\nxipp.\template/admin\Public\nav.html";i:1506071735;s:49:"E:\www\web\nxipp.\template/admin\Public\menu.html";i:1506072849;s:51:"E:\www\web\nxipp.\template/admin\Public\footer.html";i:1506069188;}*/ ?>
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
    <div id="urHere">管理中心<b>></b><strong>评论列表</strong> </div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo url('comments/reviewComments'); ?>" class="actionBtn add">评论审核</a>评论列表</h3>
        <div class="filter">
            <form id="formfilter" action="<?php echo url('Comments/index'); ?>" method="get">
                 <select name="cat_id">
                        <option value="0">筛选条件</option>
                        <option value="members_uid">评论发布者ID</option>
                        <option value="comments_aid">评论作品ID</option>
                        <option value="comments_time">评论发布时间</option>
                        <option value="pass">审核通过</option>
                        <option value="nopass">审核不通过</option>
                        <option value="waitpass">待审核</option>
                  </select>
                <input type="text" name="timearea" id="time" size="37" placeholder="请选择日期范围" class="inpMain" style="display:none"/>
                  <input name="article_name" id="article_name" type="text" class="inpMain" value="" size="20" style="display:none"/>
                  <input class="btnGray" type="submit" value="筛选" />
            </form>
            <span>
                <a class="btnGray" href="#">更新评论</a>
                <a class="btnGray" href="#">开始筛选评论</a>
            </span>
        </div>
        <div id="list">
            <form name="action" id="formaction" method="post" action="#">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                 <tr>
                      <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                      <th width="30" align="left">评论ID</th>
                      <th width="30" align="left">作品ID</th>
                      <th width="50" align="left">作品标题</th>
                      <th width="50" align="left">评论内容</th>
                      <th width="60" align="left">评论发布者</th>
                      <th width="60" align="left">评论发布者ip</th>
                      <th width="60" align="left">发布时间</th>
                      <th width="60" align="left">回复评论数</th>
                      <th width="60" align="left">评论状态</th>
                      <th width="60" align="left">审核状态</th>
                      <th width="120" align="center">操作</th>
                 </tr>
                 <?php if(is_array($commentsData) || $commentsData instanceof \think\Collection): $i = 0; $__LIST__ = $commentsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                 <tr>
                      <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $vo['cid']; ?>" /></td>
                      <td align="left"><?php echo $vo['cid']; ?></td>
                      <td align="left"><?php echo $vo['aid']; ?></td>
                      <td align="left"><?php echo $vo['ctitle'][0]; ?></td>
                      <td align="left"><?php echo $vo['ctext']; ?></td>
                      <td align="left"><?php echo $vo['mname'][0]; ?></td>
                      <td align="left"><?php echo $vo['mip']; ?></td>
                      <td align="left"><?php echo $vo['date']; ?></td>
                      <td align="left"><a href="<?php echo url('Replycomments/listReply',['cid' => $vo['cid'],'mname' => $vo['mname'][0]]); ?>">
                           <span style='color:red;font-weight:bold'><?php echo $vo['rnums']; ?></span><?php if($vo['rnums']>0): ?>&nbsp;(查看评论下的回复)<?php endif; ?></a></td>
                      <td align="left">
                          <?php echo !empty($vo['status']=1)?'可见' : '隐藏'; ?>
                      </td>
                      <td align="left">
                          <?php if($vo['review'] == 1): ?><span style="color:green">通过</span><?php endif; if($vo['review'] == 0): ?><span style="color:red">未通过</span><?php endif; if($vo['review'] == 2): ?><span style="color:blue">待审核</span><?php endif; ?>
                      </td>
                      <td align="center">
                          <a href="#" id="<?php echo $vo['cid']; ?>" class="tab_a_link edit_btn">审核</a>
                          <a class="tab_a_link del_btn btn-danger-a" href="javascript:;" id="<?php echo $vo['cid']; ?>"><i class="fa fa-share-square-o">删除</i></a>
                      </td>
                 </tr>
                 <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            <div class="action">
                     <select name="action" id="action" onchange="douAction()">
                          <option value="0">请选择...</option>
                          <option value="del_all">删除</option>
                          <option value="pass">审核通过</option>
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
            $(function(){
                $('.btn-danger-a').on('click',function(){
                    var del =  confirm('确认要删除么？');
                    if (del) {
                        var id =$(this).attr('cid');
                        $.post('<?php echo url("Comments/delComments"); ?>',{id : id}, function(data){
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
            $('.edit_btn').on('click',function(){
                    var id =$(this).attr('id');
                    layer.confirm('审核通过吗？', {
                        btn: ['通过','不通过'] //按钮
                      }, function(){
                            var type = 1;
                            var sensArray = new Array(id,type);
                            var sensString = sensArray.toString();
                            $.post('<?php echo url("Comments/reviewComments"); ?>',{sensid: sensString}, function(data){
                               if (data.status) {
                                    layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                        window.location.reload();
                                  });
                                }else {
                                    layer.msg(data.msg,{icon : 2,time : 2000});
                                }
                         },'json');
                      }, function(){
                            var type = 0;
                            var sensArray = new Array(id,type);
                            var sensString = sensArray.toString();
                            $.post('<?php echo url("Comments/reviewComments"); ?>',{sensid : sensString}, function(data){
                               if (data.status) {
                                    layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                        window.location.reload();
                                  });
                                }else {
                                    layer.msg(data.msg,{icon : 2,time : 2000});
                                }
                         },'json');
                      });
                });  
          });
          
          $(function(){
                $("select[name='cat_id']") .change(function(){
                    $(this).each(function(){
                            var arr = ['comments_time'];
                            if(arr.indexOf($(this).val()) !== -1){
                                  $("#time").show();
                                  $("#time").attr('name','timearea'); //为time添加name属性便于提交
                                  $("#article_name").hide();
                                  $("#article_name").removeAttr('name')
                                  laydate.render({ 
                                     elem: '#time'
                                    ,type: 'datetime'
                                    ,range: '|' //或 range: '~' 来自定义分割字符
                                  });
                            }else{
                                  $("#time").hide();
                                  $('#time').removeAttr('name');    //去掉文本框time的name属性，从而不提交该表单元素内容
                                  $("#article_name").show();
                                  $("#article_name").attr('name','article_name');
                            }
                            if($(this).val() === '0'){
                                $("time").hide();
                                $("time").removeAttr('name');
                                $("#article_name").hide();
                                $("#article_name").removeAttr('name');
                            }
                            if($(this).val() === 'pass' || $(this).val() === 'nopass' || $(this).val() === 'waitpass'){
                                 $("#time").hide();
                                 $('#time').removeAttr('name');    //去掉文本框time的name属性，从而不提交该表单元素内容
                                 $("#article_name").hide();
                                 $("#article_name").removeAttr('name');
                            }
                });
            });
        });  
        
        $(function(){
                $("#formfilter").submit(function(){
                    var datas = $("#formfilter").serialize();
                    //alter('hello');exit();
                    $.post('<?php echo url("Comments/index"); ?>',datas,function(data){
                       if (data.status) {
                           layer.msg(data.msg, {icon: 1,time: 1500},function(){
                              window.location.href = data.url;
                           });
                       }else {
                           layer.msg(data.msg, {icon: 2,time: 1500});
                        }

                    },'json');
                    //阻止表单刷新提
                    return false;
                });
            });
        
        
         $(function(){   //异步批量删除、审核
                 $("#formaction").submit(function(){
                     var chkarray =[]; 
                     var post_str = '';
                     $("input[name='checkbox[]']:checked").each(function(){ 
                        chkarray.push($(this).val()); 
                     });
                     if(chkarray.length < 1 ){      //checkbox数组长度小于1
                         layer.msg('没有选择评论',{icon: 2,time: 5000});
                         exit();
                     }
                     var action = $("#action").val();
                     if( action === 'pass'){
                        var pass = confirm('确认审核通过么？');
                        
                     }
                     if( action === 'del_all'){
                         var del = confirm('确认要删除评论么？');
                     }
                     if(del===true || pass===true){
                         post_str = action +'|'+ chkarray.toString(); 
                         $.post('<?php echo url("Comments/clComments"); ?>',{post_str : post_str}, function(data){
                           if (data.status) {
                                layer.msg(data.msg, {icon: 1,time: 5000},function(){
                                    window.location.reload();
                                });
                            }else {
                                layer.msg(data.msg,{icon : 2,time : 5000});
                            }
                        },'json');
                     }    
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