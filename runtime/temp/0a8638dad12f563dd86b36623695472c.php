<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:51:"E:\www\web\nxipp.\template/home\category\index.html";i:1505884467;s:50:"E:\www\web\nxipp.\template/home\Layout\common.html";i:1505094327;s:50:"E:\www\web\nxipp.\template/home\Public\header.html";i:1506409492;s:50:"E:\www\web\nxipp.\template/home\Public\footer.html";i:1506590408;}*/ ?>
<!--载入头部-->
<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title><?php echo $webname[0]; ?></title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="http://localhost/nxipp/public/home/css/base.css">
   <link rel="stylesheet" href="http://localhost/nxipp/public/home/css/vendor.css">  
   <link rel="stylesheet" href="http://localhost/nxipp/public/home/css/main.css">
   <link rel="stylesheet" href="http://localhost/nxipp/public/home/css/public.css">
   <link rel="stylesheet" href="http://localhost/nxipp/public/home/css/zan.css">
        

   <!-- script
   ================================================== -->
	<script src="http://localhost/nxipp/public/home/js/modernizr.js"></script>
	<script src="http://localhost/nxipp/public/home/js/pace.min.js"></script>
        <script type="text/javascript" src="http://localhost/nxipp/public/home/plugins/jquery-1.8.3.min.js"></script>
        <script src="http://localhost/nxipp/public/home/plugins/layer/layer.min.js"></script>
        

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header class="short-header">   

   	<div class="gradient-block"></div>	

   	<div class="row header-content">

   		<div class="logo">
	         <a href='<?php echo url("Index/index"); ?>'>Author</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li class="current"><a href='<?php echo url("Index/index"); ?>' title="">首页</a></li>	
                                        <?php if(is_array($lanmuData) || $lanmuData instanceof \think\Collection): $i = 0; $__LIST__ = $lanmuData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="has-children">
						<a href="<?php echo $rootUrl; ?>/<?php echo $vo['link']; ?>" title=""><?php echo $vo['lname']; ?></a>
                                                <ul class="sub-menu">                       
                                                    <?php
                                                    $data = array_merge($vo['_data']);  //数组重新排列下标
                                                        for($i=0;$i<count($data);$i++){
                                                            $linkurl = $rootUrl.$data[$i]["link"];
                                                            echo '<li><a href='.$linkurl.'>'.$data[$i]["lname"].'</a></li>';
                                                        }
                                                    ?>
                                                </ul>
					</li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
                </nav> <!-- end main-nav-wrap -->

			<div class="search-wrap">
				
				<form role="search" method="get" class="search-form" action="<?php echo url('Search/index'); ?>">
					<label>
						<span class="hide-content">立即搜索：</span>
						<input type="search" class="search-field" name="keywords" title="搜索：" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>

				<a href="#" id="close-search" class="close-btn">Close</a>

			</div> <!-- end search wrap -->	
			<div class="triggers">
				<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
				<a class="menu-toggle" href="#"><span>Menu</span></a> &nbsp; 
                                <?php if($mid == ''): ?><a href="javascript:;" class="register">注册</a> | <a href="javascript:;" class="login">登陆</a>
                                <?php else: ?>
                                <span style="font-size:14px;">Hi，<img width="30" height="30" class="avatar" src="<?php echo $headpic; ?>" alt="" style="border-radius:50%;-webkit-border-radius:50%;-moz-border-radius:50%;">
                                    &nbsp;<?php echo $mname; ?>&nbsp;，欢迎登陆！&nbsp;<a href="javascript:;" class="logout">注销</a></span>
                                <?php endif; ?>
			</div> <!-- end triggers -->
   		
   	</div>     		
   	
   </header> <!-- end header -->


<!--内容主体 START-->
   <!-- page header
   ================================================== -->
   <section id="page-header">
   	<div class="row current-cat">
   		<div class="col-full">
                    <div style="background-color:#000;color:#fff">|<?php if($pname == 'no'): ?>&nbsp;<?php else: ?>&nbsp;<?php echo $pname; ?> -> <?php endif; ?><?php echo $cname; ?>&nbsp;|</div>
   		</div>   		
   	</div>
   </section>

<!-- masonry
   ================================================== -->
   <section id="bricks" class="with-top-sep">

   	<div class="row masonry">

   		<!-- brick-wrapper -->
         <div class="bricks-wrapper">

         	<div class="grid-sizer"></div>

         <?php if(is_array($articleData) || $articleData instanceof \think\Collection): $i = 0; $__LIST__ = $articleData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <article class="brick entry format-standard animate-this">

                 <div class="entry-thumb">
                    <a href="<?php echo url('Single/index',array('aid' => $vo['aid'])); ?>" class="thumb-link">
                            <img src="<?php echo $vo['article_photo']; ?>" alt="building">             
                    </a>
                 </div>

                 <div class="entry-text">
                  <div class="entry-header">

                          <div class="entry-meta">
                                  <span class="cat-links">
                                        <?php $kwArray = explode(',',$vo['article_keywords']);
                                          foreach($kwArray as $keywords){ 
                                            echo "<a href='#'>".$keywords."</a>";
                                          }
                                        ?>

                                  </span>			
                          </div>

                      <h1 class="entry-title"><a href="<?php echo url('Single/index',array('aid' => $vo['aid'])); ?>"><?php echo $vo['article_title']; ?></a></h1>

                  </div>
                                                  <div class="entry-excerpt">
                                                          <?php echo $vo['article_excerpt']; ?> 
                                                  </div>
                 </div>

             </article> <!-- end article -->
           <?php endforeach; endif; else: echo "" ;endif; ?>
                
         </div> <!-- end brick-wrapper --> 

   	</div> <!-- end row -->

   	<div class="row">
   		
   		<nav class="pagination">
		      <!--<span class="page-numbers prev inactive">Prev</span>
		   	<span class="page-numbers current">1</span>
		   	<a href="#" class="page-numbers">2</a>
		      <a href="#" class="page-numbers">3</a>
		      <a href="#" class="page-numbers">4</a>
		      <a href="#" class="page-numbers">5</a>
		      <a href="#" class="page-numbers">6</a>
		      <a href="#" class="page-numbers">7</a>
		      <a href="#" class="page-numbers">8</a>
		      <a href="#" class="page-numbers">9</a>
		   	<a href="#" class="page-numbers next">Next</a> -->
                      <?php echo $page; ?>
	      </nav>

   	</div>

   </section> <!-- end bricks -->

   


<!--载入底部-->
 <!-- footer
   ================================================== -->
   <footer>

   	<div class="footer-main">

   		<div class="row">  

	      	<div class="col-four tab-full mob-full footer-info">            

	            <h4>关于我们</h4>

	               <p>
		         <?php echo $description; ?> 	
		       </p>

		      </div> <!-- end footer-info -->

	      	<div class="col-two tab-1-3 mob-1-2 site-links">

	      		<h4>网站栏目</h4>

	      		<ul>
                                <?php if(is_array($lanmuData) || $lanmuData instanceof \think\Collection): $i = 0; $__LIST__ = $lanmuData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <li><a href="<?php echo $rootUrl; ?>/<?php echo $vo['link']; ?>" title=""><?php echo $vo['lname']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

	      	</div> <!-- end site-links -->  

	      	<div class="col-two tab-1-3 mob-1-2 social-links">

	      		<h4>友情链接</h4>

	      		<ul>
                            <?php if(is_array($linkData) || $linkData instanceof \think\Collection): $k = 0; $__LIST__ = $linkData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>    
                            <li><a href="http://<?php echo $linkData[$k-1][0]; ?>"><img src="<?php echo $linkData[$k-1][1]; ?>" width="115px" height="28px"/></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
	      	           	
	      	</div> <!-- end social links --> 

	      	<div class="col-four tab-1-3 mob-full footer-subscribe">

	      		<h4>问题反馈</h4>

	      		<p>如果您对本网站有什么看法，或是有什么好的建议，请在这与我们联系。</p>

	      		<div class="subscribe-form">
	      	
	      			<form id="mc-form" class="group" novalidate="true">

							<input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="完成输入后，直接回车即可提交" required=""> 
	   		
			   			<input type="submit" name="subscribe" >
		   	
		   				<label for="mc-email" class="subscribe-message"></label>
                                                
                                                <input type="hidden" name="mid" value="<?php echo $mid; ?>" >
			
						</form>

	      		</div>	      		
	      	           	
	      	</div> <!-- end subscribe -->         

	      </div> <!-- end row -->

   	</div> <!-- end footer-main -->

      <div class="footer-bottom">
      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright Abstract styleshout 2016</span> 
		         	<span>宁夏华嵌智能物联网技术有限公司</span>		         	
		         </div>

		         <div id="go-top">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
		         </div>         
	      	</div>

      	</div> 
      </div> <!-- end footer-bottom -->  

   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="http://localhost/nxipp/public/home/js/jquery-2.1.3.min.js"></script>
   <script src="http://localhost/nxipp/public/home/js/plugins.js"></script>
   <script src="http://localhost/nxipp/public/home/js/jquery.appear.js"></script>
   <script src="http://localhost/nxipp/public/home/js/main.js"></script>
   <script type="text/javascript">
       var UserRegisterUrl = "<?php echo url('Register/index'); ?>";
       var UserLoginUrl = "<?php echo url('Login/index'); ?>";
       var UserReplyUrl = "<?php echo url('Reply/index'); ?>"; 
       var UserReply2Url = "<?php echo url('Reply2/index'); ?>";
         $(function(){
             $('.register').on('click',function(){
                 layer.open({  
                     type: 2,  
                     title: '会员注册',  
                     maxmin: true,  
                     skin: 'layui-layer-lan',  
                     shadeClose: true, //点击遮罩关闭层  
                     area : ['400px' , '380px'],  
                     content:UserRegisterUrl//弹框显示的url  
                 }); 
             });
         });

         $(function(){
             $('.login').on('click',function(){
                 layer.open({  
                     type: 2,  
                     title: '会员登陆',  
                     maxmin: true,  
                     skin: 'layui-layer-lan',  
                     shadeClose: true, //点击遮罩关闭层  
                     area : ['410px' , '220px'],  
                     content:UserLoginUrl//弹框显示的url  
                 }); 
             });
         });
         
        $(function(){
             $('.reply').on('click',function(){
                 var mname = $(this).attr('value');
                 var mid = $(this).attr('mid');
                 var cid = $(this).attr('cid');
                 layer.open({  
                     type: 2,  
                     title: '@&nbsp;'+mname+'&nbsp;的评论',  
                     maxmin: true,  
                     skin: 'layui-layer-lan',  
                     shadeClose: true, //点击遮罩关闭层  
                     area : ['400px' , '280px'],  
                     content:UserReplyUrl+'?mid='+mid+'&cid='+cid //弹框显示的url  
                 }); 
             });
         });
         
         $(function(){
             $('.reply2').on('click',function(){
                 var mname = $(this).attr('value');
                 var mid = $(this).attr('mid');
                 var cid = $(this).attr('cid');
                 var rid = $(this).attr('rid');
                 layer.open({  
                     type: 2,  
                     title: '@&nbsp;'+mname+'&nbsp;的回复',  
                     maxmin: true,  
                     skin: 'layui-layer-lan',  
                     shadeClose: true, //点击遮罩关闭层  
                     area : ['400px' , '280px'],  
                     content:UserReply2Url+'?mid='+mid+'&cid='+cid+'&rid='+rid //弹框显示的url  
                 }); 
             });
         });
         
        $(function(){
                $('.logout').on('click',function(){
                    var mid =$('input[name="mid"]').val();
                    layer.confirm('您确定要退出网站吗？', {
                        btn: ['退出','再看看'] //按钮
                      }, function(){
                         $.post('<?php echo url("Login/logout"); ?>',{mid: mid}, function(data){
                               if (data.status) {
                                    layer.msg(data.msg, {icon: 1,time: 1500},function(){
                                    window.location.reload();
                                  });
                                }else {
                                    layer.msg(data.msg,{icon : 2,time : 2000});
                               }
                         },'json');
                      }, function(){
                         //什么也不做
                      });
                });  
            });
        
   </script>
</body>
</html>