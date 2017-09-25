<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:50:"E:\www\web\nxipp.\template/admin\system\index.html";i:1506304863;s:51:"E:\www\web\nxipp.\template/admin\Layout\common.html";i:1502168098;s:51:"E:\www\web\nxipp.\template/admin\Public\header.html";i:1503941668;s:48:"E:\www\web\nxipp.\template/admin\Public\nav.html";i:1506242403;s:49:"E:\www\web\nxipp.\template/admin\Public\menu.html";i:1506072849;s:51:"E:\www\web\nxipp.\template/admin\Public\footer.html";i:1506242424;}*/ ?>
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
     <div id="urHere">管理中心<b>></b><strong>系统设置</strong> </div>
     <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
         <h3><a href="<?php echo url('System/index'); ?>" class="actionBtn">清空设置</a>系统设置</h3>
          <form id="formaddSystem"   enctype="multipart/form-data">
               <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                   <tr>
                       <td width="90" align="right">站点名称</td>
                       <td><input type="text" name="webname" size="30" class="inpMain" value="<?php if(isset($systemData['webname'])): ?><?php echo $systemData['webname']; endif; ?>"/></td>
                   </tr>
                   <tr>
                       <td width="90" align="right">站点域名</td>
                       <td><input type="text" name="com" size="30" class="inpMain" value="<?php if(isset($systemData['com'])): ?><?php echo $systemData['com']; endif; ?>"/></td>
                   </tr>
                   <tr>
                       <td width="90" align="right">站点标题(Title)</td>
                       <td><input type="text" name="web_title" size="45" class="inpMain" value="<?php if(isset($systemData['web_title'])): ?><?php echo $systemData['web_title']; endif; ?>"/></td>
                   </tr>
                   <tr>
                       <td width="90" align="right">站点描述(Descrition)</td>
                       <td><textarea name="web_description" rows="5" cols="50" class="inpMain"><?php if(isset($systemData['web_description'])): ?><?php echo $systemData['web_description']; endif; ?></textarea></td>
                   </tr>
                   <tr>
                       <td width="90" align="right">是否开启评论</td>
                       <td><select name="opencomments" id="commentsOn">
                            <option value="1">开启</option>
                            <option value="0">不开启</option>
                           </select>
                       <span style="color: red;margin-left: 20px">默认为开启</span></td>
                   </tr>
                   <tr>
                      <td width="90" align="right">屏蔽词汇</td>
                      <td>
                          <textarea name="senswords" rows="5" cols="50" class="inpMain"><?php if(isset($systemData['senswords'])): ?><?php echo $systemData['senswords']; endif; ?></textarea>
                          <span style="color: red;margin-left: 20px">词汇间用"|"分隔</span>
                      </td>
                   </tr>
                   <tr>
                      <td width="90" align="right" >ip黑名单</td>
                      <td>
                          <textarea name="filterIp" id='filterIp' rows="5" cols="30" class="inpMain"><?php if(isset($systemData['filterips'])): ?><?php echo $systemData['filterips']; endif; ?></textarea>
                          <span style="color: red;margin-left: 20px">ip间用"|"分隔</span>
                      </td>
                   </tr>
                   <tr>
                       <td width="90" align="right">首页幻灯片设置</td>
                       <td>
                          <?php if(is_array($hdarray) || $hdarray instanceof \think\Collection): $k = 0; $__LIST__ = $hdarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                          <div id="file_upload_image<?php echo $k-1; ?>" style="margin-bottom: 15px"><img id="upload_org_code_img<?php echo $k-1; ?>" class="img" width="80px" height="80px" src="<?php echo $vo; ?>" style="<?php echo !empty($vo) && $vo!=='null'?'':'display:none;'; ?>margin-top: 15px;" /></div>
                                <div class="uploadify<?php echo $k-1; ?>" style="border-bottom: 1px dotted #778899">
                                <input class="uploadify" id="uploadify<?php echo $k-1; ?>" type="file" multiple="true" value="" class='uploadify-button' />
                                <div style="margin-bottom:15px"><a href="javascript:$('#uploadify<?php echo $k-1; ?>').uploadify('upload')" >现在上传</a> |
                                    <a href="javascript:$('#uploadify<?php echo $k-1; ?>').uploadify('cancel')" >取消上传</a>
                                <span style="color: red;margin-left: 20px">支持.gif .jpg .png图像格式，单张图片大小不能超过2M</span></div>
                                <div style="margin-bottom:5px;">标题：<input type="text" name="" value="" size="50" class="inpMain" style="border-bottom: 1px dotted #C4C4C4;"/></div>
                                <div style="margin-bottom:5px;">链接：<input type="text" name="" value="" size="40" class="inpMain" style="border-bottom: 1px dotted #C4C4C4;"/>
                                    &nbsp;<input style="width: 20px;height: 20px;" type="radio" class="radio" name="autolink" size="5" class="idDisplay" value="article"/>选择作品自动生成链接
                                    &nbsp;<input style="width: 20px;height: 20px;" type="radio" class="radio" name="autolink" size="5" class="idDisplay" value="single"/>选择单页自动生成链接
                                </div>
                                <div style="margin-bottom:5px;">时间：<input type="text" name="" value="" size="20" class="inpMain" style="border-bottom: 1px dotted #C4C4C4;"/></div>
                                </div>
                           <?php endforeach; endif; else: echo "" ;endif; ?>
                          <div id="displayMsg"></div>
                      </td>
                   </tr>
                   <tr>
                       <td width="90" align="right">友情链接</td>
                       <td><!-- <div id="file_upload_logo"><img id="upload_org_code_logo" style="display: none;margin-bottom: 10px;" /></div>
                          <div class="uploadifylogo">
                                <input id="uploadifylogo" type="file" multiple="true" value="" />
                          </div>网址：<input type="text" name="link" size="40" class="inpMain" style="border-bottom: 1px dotted #778899;"/>&nbsp;  -->
                        <table>
                            <tr>
                                <?php if(is_array($linkarray) || $linkarray instanceof \think\Collection): $k = 0; $__LIST__ = $linkarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                        <div style="float:left;margin-left:5px;border-right: 1px dotted #C4C4C4;width:310px;">
                                            <div id="file_upload_logo<?php echo $k-1; ?>"><img id="upload_org_code_logo<?php echo $k-1; ?>" src="<?php echo $vo[1]; ?>" width="150px" height="50px" style="margin-bottom: 10px;" /></div>
                                            <div class="uploadifylogo<?php echo $k-1; ?>"><input class="uploadifylogo" id="uploadifylogo<?php echo $k-1; ?>" type="file" multiple="true" value="" /></div>
                                            网址：<input type="text" name="linktxt<?php echo $k-1; ?>" value="<?php echo $vo[0]; ?>" size="40" class="inpMain" style="border-bottom: 1px dotted #C4C4C4;"/>
                                            <div class="close" value="<?php echo $vo[0]; ?>" style='float:right;margin-top:-125px;margin-right:10px;'><a href="javascript:;" value="<?php echo $systemData['id']; ?>|<?php echo $k-1; ?>|<?php echo $vo[0]; ?>,<?php echo $vo[1]; ?>" style="color:red">×清空</a></div>
                                        </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tr>
                        </table>
                       <td>
                   </tr>
                   <tr>
                       <td></td>
                       <td>
                           <input type="hidden" name="isup" value="<?php if(isset($systemData['id'])): ?><?php echo $systemData['id']; endif; ?>" />
                           <?php if(is_array($hdarray) || $hdarray instanceof \think\Collection): $k = 0; $__LIST__ = $hdarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                           <input type="hidden" name="imgUrl<?php echo $k-1; ?>" value="<?php echo $vo; ?>" />
                           <?php endforeach; endif; else: echo "" ;endif; if(is_array($linkarray) || $linkarray instanceof \think\Collection): $k = 0; $__LIST__ = $linkarray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                           <input type="hidden" name="linkimg<?php echo $k-1; ?>" value=<?php echo $vo[1]; ?> />
                           <?php endforeach; endif; else: echo "" ;endif; ?>
                           <input name="submit" class="btn" type="submit" value="提交" />
                       </td>
                   </tr>
               </table>
          </form>
     </div>
</div>
        <!--引入js-->
        <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="http://localhost/nxipp/public/admin/plugins/uploadify/js/jquery.uploadify.min.js"></script> 
        <script src="http://localhost/nxipp/public/admin/plugins/layer/layer.min.js"></script>
        <script type="text/javascript">
            var articleUrl = "<?php echo url('System/selSingelorArticle',['type','article']); ?>";
            var singleUrl = "<?php echo url('System/selSingelorArticle',['type','single']); ?>";
            $(function(){
                $("#formaddSystem").submit(function(){
                    var datas = $("#formaddSystem").serialize();
                    //layer.msg(datas, {icon: 2,time: 50000});
                    $.post('<?php echo url("System/index"); ?>',datas,function(data){
                        if (data.status) {
                            layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                window.location.href = data.url;
                            });
                        }else {
                            layer.msg(data.msg, {icon: 2,time: 1500});
                        }
                    },'json');
                    //阻止表单刷新提交
                    return false;
                }); 
         }); 
        
        $(function(){
                    //swfobject.embedSWF('http://localhost/nxipp/public/admin/plugins/uploadify/swf/uploadify.swf', "sd_file", "120", "30", "#666");
                    $(".uploadify").each(function(i) { 
                        $(this).uploadify({                            //多按钮上传幻灯片
                            'swf'           :  'http://localhost/nxipp/public/admin/plugins/uploadify/swf/uploadify.swf',
                            'uploader'        : '<?php echo url("api/Image/upload"); ?>',
                            'buttonText'      : '第'+(i+1)+'张图片',  
                            'fileTypeDesc'    : '请选择幻灯图片',  
                            'fileTypeExts'    : '*.gif; *.jpg; *.png',     
                            'fileObjName'     : 'file',
                            'width'           : 80,
                            'height'          : 25,
                            'auto'            : false,
                            'method'          : 'Post',
                            'wmode'           : 'transparent',
                            'multi'          : false,
                            'formData'       : {
                                    'urlfrom' : 'Huandeng',
                            },
                            'onUploadSuccess' : function(file,data,response) {  
                             if(response){ 
                                    var obj =JSON.parse(data);
                                    $('#upload_org_code_img'+i).attr("src",obj.src);  
                                    $('#file_upload_image'+i).attr("value",obj.src);
                                    $('input[name=imgUrl'+i+']').val(obj.src);
                                    $('#upload_org_code_img'+i).show();  
                                } 
                            }
                        }); 
                    });
            });
            
            $(function(){
                $('.img').on('click',function(){
                   var popimg = $(this)[0].src;
                   layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: '500px',
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: "<img src="+popimg+" />"
                      });
                });
            });
            
            $(function(){
                $(".uploadifylogo").each(function(i) {      //多按钮上传logo
                    $(this).uploadify({
                        'swf'           :  'http://localhost/nxipp/public/admin/plugins/uploadify/swf/uploadify.swf',
                        'uploader'        : '<?php echo url("api/Image/upload"); ?>',
                        'buttonText'      : '上传logo',  
                        'fileTypeDesc'    : '请选择logo',  
                        'fileTypeExts'    : '*.gif; *.jpg; *.png',     
                        'fileObjName'     : 'file',
                        'width'           : 80,
                        'height'          : 25,
                        'auto'            : true,
                        'method'          : 'Post',
                        'wmode'           : 'transparent',
                        'multi'          : false,
                        'formData'       : {
				'urlfrom' : 'Logo',
                        },
                        'onUploadSuccess' : function(file,data,response) {  
                         if(response){ 
                                var obj =JSON.parse(data);
                                console.log(obj.src);
                                $('#upload_org_code_logo'+i).attr("src",obj.src);  
                                $('#file_upload_logo'+i).attr("value",obj.src);
                                $('input[name=linkimg'+i+']').val(obj.src);
                                $('#upload_org_code_logo'+i).show();  
                            } 
                        }
                    });
                    
                });
            });
            
            $(function(){
                $('.close').children('a').click(function(){
                    var del =  confirm('确认要清空此项么？');
                    if(del){
                        var link = $(this).attr("value");
                        //alert(link);exit();
                        $.post('<?php echo url("System/delLink"); ?>',{'link':link},function(data){
                            if (data.status) {
                                layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                    window.location.reload();
                                });
                            }else {
                                layer.msg(data.msg, {icon: 2,time: 50000});
                            }

                        },'json');
                    };
                 });
            });
            
            $(function(){
               $('.radio').on('click',function(){
                   var articleUrl = "<?php echo url('System/selSingelorArticle'); ?>?type=article";
                   var singleUrl = "<?php echo url('System/selSingelorArticle'); ?>?type=singleUrl";
                   var type = $(this).attr('value');
                   if( type=='article' ){
                        layer.open({  
                            type: 2,  
                            title: '选择文章',  
                            maxmin: true,  
                            skin: 'layui-layer-lan',  
                            shadeClose: true, //点击遮罩关闭层  
                            area : ['400px' , '380px'],  
                            content:articleUrl
                        }); 
                   }
                   else if( type='single' ){
                       layer.open({
                            type: 1,
                            skin: 'layui-layer-rim', //加上边框
                            area: ['420px', '240px'], //宽高
                            content: singleUrl,
                       });
                   }
               })
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