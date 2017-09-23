<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:49:"E:\www\web\nxipp.\template/home\single\index.html";i:1505790959;s:50:"E:\www\web\nxipp.\template/home\Layout\common.html";i:1505094327;s:50:"E:\www\web\nxipp.\template/home\Public\header.html";i:1505900478;s:50:"E:\www\web\nxipp.\template/home\Public\footer.html";i:1505906233;}*/ ?>
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
	         <a href="index.html">Author</a>
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
				
				<form role="search" method="get" class="search-form" action="#">
					<label>
						<span class="hide-content">Search for:</span>
						<input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="s" title="Search for:" autocomplete="off">
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
 <!-- content
   ================================================== -->
   <section id="content-wrap" class="blog-single">
   	<div class="row">
   		<div class="col-twelve">

   			<article class="format-standard">  

   				<div class="content-media">
						<div class="post-thumb">
							<img src="<?php echo $articleData['article_photo']; ?>"> 
						</div>  
					</div>

					<div class="primary-content">

						<h1 class="page-title"><?php echo $articleData['article_title']; ?></h1>	

						<ul class="entry-meta">
							<li class="date"><?php echo $articleData['article_date']; ?></li>
                                                        <li class="date"><?php echo $articleData['article_author']; ?></li>	
							<li class="cat"><?php $keywordsArray = explode(',',$articleData['article_keywords']); for($i=0;$i<count($keywordsArray);$i++){ echo "<a href='#'>$keywordsArray[$i]</a>";}?></li>				
						</ul>						

						<p class="lead"><?php echo $articleData['article_excerpt']; ?></p> 

                                                <p><?php echo $articleData['article_content']; ?></p>
	
						<p class="tags">
		  			     	<span>如果你喜欢这篇文章，快为它点赞:</span>
		  				  	<div class="digg"> 
                                                            <div id="dig_up" class="digup" aid="<?php echo $articleData['aid']; ?>">
                                                                    <span id="num_up"><?php echo $voteData['likes']; ?></span>
                                                                    <p>赞</p>
                                                                <div id="bar_up" class="bar"><span style="width:<?php echo $voteData['like_percent']; ?>"></span><i></i></div>
                                                            </div>
                                                            <div id="dig_down" class="digdown" aid="<?php echo $articleData['aid']; ?>">
                                                                    <span id="num_down"><?php echo $voteData['unlikes']; ?></span>
                                                                    <p>踩</p>
                                                                <div id="bar_down" class="bar"><span style="width:<?php echo $voteData['unlike_percent']; ?>"></span><i></i></div>
                                                            </div>
                                                            <div id="msg"></div>
                                                       </div>
                                                </p>
                                                <div class="bdsharebuttonbox">  
                                                    <a href="#" class="bds_more" data-cmd="more"></a>  
                                                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>  
                                                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>  
                                                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>  
                                                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>  
                                                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>  
                                                </div>  
                                                <script>  
                                                        window._bd_share_config={  
                                                                "common":{  
                                                                    "bdPopTitle":"您的自定义pop窗口标题",  
                                                                    "bdSnsKey":{},  
                                                                    "bdText":"此处填写自定义的分享内容",   
                                                                    "bdMini":"2",  
                                                                    "bdMiniList":false,  
                                                                    "bdPic":"http://localhost/centlight/public/attachment/201410/24/14/5449ef39574f5_282x220.jpg", /* 此处填写要分享图片地址 */  
                                                                    "bdStyle":"0",  
                                                                    "bdSize":"16"  
                                                                    },  
                                                                "share":{}  
                                                        };  
                                                        with(document)0[  
                                                                        (getElementsByTagName('head')[0]||body).  
                                                                        appendChild(createElement('script')).  
                                                                        src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)  
                                                        ];  
                                                </script>  
					</div> <!-- end entry-primary -->		  			   

	  			   <div class="pagenav group">
		  			   <div class="prev-nav">
                                               <?php if(empty($prvData) == true): ?>
                                               没有了
                                               <?php else: ?>
		  			   	<a href="<?php echo url('Single/index',array('aid' => $prvData[0]['aid'])); ?>" rel="prev">
		  			   		<span>上一篇</span>
                                                        <?php echo $prvData[0]['article_title']; ?>
		  			   	</a>
                                                <?php endif; ?>
		  			   </div>
		  				<div class="next-nav">
                                                    <?php if(empty($nextData) == true): ?>
                                                    没有了
                                                    <?php else: ?>
                                                    <a href="<?php echo url('Single/index',array('aid' => $nextData[0]['aid'])); ?>" rel="next">
                                                        <span>下一篇</span>
                                                        <?php echo $nextData[0]['article_title']; ?>
                                                     </a>
                                                    <?php endif; ?>
		  				</div>  				   
	  				</div>

				</article>

			</div> <!-- end col-twelve -->
   	</div> <!-- end row -->
		<div class="comments-wrap">
			<div id="comments" class="row">
				<div class="col-full">

               <h3><?php echo $commentsNums; ?> 条评论</h3>

               <!-- commentlist -->
               <?php if($commentsNums > 0): ?>
               <ol class="commentlist">
                  <?php if(is_array($commentsData) || $commentsData instanceof \think\Collection): $i = 0; $__LIST__ = $commentsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <li class="thread-alt depth-1">

                     <div class="avatar">
                        <img width="50" height="50" class="avatar" src="<?php echo $vo['headpic'][0]; ?>" alt="">
                     </div>

                     <div class="comment-content">

	                     <div class="comment-info">
	                        <cite><?php echo $vo['mname'][0]; ?></cite>

	                        <div class="comment-meta">
	                           <time class="comment-time" datetime="2014-07-12T24:05"><?php echo $vo['date']; ?></time>
                                   <span class="sep">/</span><a href="javascript:;" style="color:#ff0202" class="replyView" cid="<?php echo $vo['cid']; ?>"><?php echo $vo['nums']; ?></a>&nbsp;<a class="reply" href="javascript:;" value="<?php echo $vo['mname'][0]; ?>" mid="<?php echo $vo['mid']; ?>" cid="<?php echo $vo['cid']; ?>">回复</a>
	                        </div>
	                     </div>

	                     <div class="comment-text">
	                        <p><?php echo $vo['ctext']; ?></p>                        
	                     </div>
	             </div>
                      <?php if($ReplyNums > 0): ?>
                      <ul class="children" style="display:none" id="<?php echo $vo['cid']; ?>">
                        <?php if(is_array($commentsData[$i-1]['reply']) || $commentsData[$i-1]['reply'] instanceof \think\Collection): if( count($commentsData[$i-1]['reply'])==0 ) : echo "" ;else: foreach($commentsData[$i-1]['reply'] as $k=>$rp): ?>
                        <li class="depth-2">
                            
                           <div class="avatar-son">
                              <img width="30" height="30" style="margin-left:120px;border-radius:50%;-webkit-border-radius:50%;-moz-border-radius:50%;" src="<?php echo $fromUserHp[$i-1][$k][0]; ?>" alt="">
                           </div>

                           <div class="comment-content">

	                           <div class="comment-info">
	                              <cite><?php echo $fromUserName[$i-1][$k][0]; ?></cite>

	                              <div class="comment-meta">
	                                 <time class="comment-time" datetime="2014-07-12T25:05"><?php echo $rp['replyTime']; ?></time>
	                                 <span class="sep">/</span><a class="reply" href="#">回复</a>
	                              </div>
	                           </div>

	                           <div class="comment-text">
	                              <p><?php echo $rp['reply_text']; ?></p>
	                           </div>

                           </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endif; ?>
                  </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>

               </ol> <!-- Commentlist End -->					
                <?php endif; ?>
               <!-- respond -->
               <div class="respond">

               	<h3>发表评论</h3>

                  <form id="contactForm" enctype="multipart/form-data">
  					   <fieldset>
                     <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message" ></textarea>
                     </div>
                     <input type='hidden' name='aid' value="<?php echo $aid; ?>" />
                     <button type="submit" class="submit button-primary">立即评论</button>

  					   </fieldset>
                 </form> <!-- Form End -->

               </div> <!-- Respond End -->

         	</div> <!-- end col-full -->
         </div> <!-- end row comments -->
		</div> <!-- end comments-wrap -->

   </section> <!-- end content -->
  <script src="http://localhost/nxipp/public/home/js/jquery.min.js"></script>
  <script src="http://localhost/nxipp/public/home/plugins/layer/layer.min.js"></script>
  <script type='text/javascript'>  
    $(function(){
                $("#contactForm").submit(function(){
                    var datas = $("#contactForm").serialize();
                    $.post('<?php echo url("Comments/addComments"); ?>',datas,function(data){
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
                });
            });
            
      $(function(){
                $(".replyView").on('click',function(){
                    var id = $(this).attr('cid');
                    if($('#'+id).css("display")=="none"){
                      $('#'+id).show();
                    }else{
                      $('#'+id).hide();
                    }
                });
        });  
  </script>
  <script type='text/javascript'>  
        $(function(){
		$("#dig_up").hover(function(){
			$(this).addClass("digup_on");
		},function(){
			$(this).removeClass("digup_on");
		});
		$("#dig_down").hover(function(){
			$(this).addClass("digdown_on");
		},function(){
			$(this).removeClass("digdown_on");
		});
		
		getdata("<?php echo url('Single/zan'); ?>",$(this).attr('aid'));
			
		$("#dig_up").click(function(){
			getdata("<?php echo url('Single/zan'); ?>?action="+'likes',$(this).attr('aid'));
		});
		
		$("#dig_down").click(function(){
			getdata("<?php echo url('Single/zan'); ?>?action="+'unlike',$(this).attr('aid'));
		});       
    }); 
    
    function getdata(url,aid){
	$.getJSON(url,{id:aid},function(data){
		if(data.status){
                        $("#num_up").html(data.like);
			$("#bar_up span").css("width",data.like_percent);
			$("#bar_up i").html(data.like_percent);
			$("#num_down").html(data.unlike);
			$("#bar_down span").css("width",data.unlike_percent);
			$("#bar_down i").html(data.unlike_percent);
		}else{
			$("#msg").html(data.msg).show().css({'opacity':1,'top':'40px'}).animate({top:'-50px',opacity:0}, "slow");
		}
	});
    };
  </script>


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