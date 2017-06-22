<body <?php body_class(); ?>>
	<?php $logo= get_option('mytheme_logo') ;?>
	<div id="page-wrap">

		<div id="header">

            <div class="header_in">
        
			<a id="logo"  href="<?php bloginfo('url'); ?>" ><img src="<?php $logo= get_option('mytheme_logo') ; if($logo==""){ echo get_bloginfo('template_url').'/images/logo.png';}else{echo $logo; } ?>" alt="<?php  bloginfo('name') ?>" /></a>
            
            <div id="nav_btn">
             <a></a>
            </div>
           <div class="menu_nav">
            <?php   
			$language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');
			   $shop_login = get_option('shop_login');
		      $shop_register = get_option('shop_register');
	      	$shop_profile = get_option('shop_profile');
			?> 
		  <div class="yuyan">
            <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){?>
                     <?php
					 global $current_user;    get_currentuserinfo();
					  if (is_user_logged_in()) {  ?>
                      <a  href="<?php echo get_page_link( $shop_profile );?>">欢迎！<?php echo $current_user->display_name; ?></a>
                         <?php wp_loginout(get_bloginfo('url')); ?>
                      <a class="btn_login" href="<?php echo get_page_link( $shop_profile );?>">我的个人中心</a>
                     
                     <?php }else{?>
                      <a class="btn_login" href="<?php echo get_page_link( $shop_login  );?>">登录</a>
                      <a class="btn_login" href="<?php echo get_page_link( $shop_register );?>">注册</a>  
            <?php } }else{?>
                <a href="<?php if($language_link1==""){echo "#";}else{ echo $language_link1;}; ?>"><?php if($language1 ==""){echo "简体中文" ;}else{ echo $language1; }; ?></a>
                <a href="<?php if($language_link2==""){echo "#";}else{ echo $language_link2;}; ?>"><?php if($language2 ==""){echo "English" ;}else{ echo $language2; }; ?></a>
              <?php } ?>
            </div>
		   <?php  ob_start();  wp_nav_menu(array( 'theme_location' => 'header-menu','menu_class'=> 'menu','container' => false ) ); ?></div>
            </div>
		</div>

