<?php
/* 
Template Name:移动版首页自定义排版预览
*/  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1" />	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <?php if (get_option('mytheme_eso_jr') == ""){ ?>
   
<meta name="keywords" content=" <?php if(is_front_page() || is_home()) { 
	echo get_option('mytheme_keywords');} else if( is_page()) {
        if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
		echo get_post_meta($post->ID, "关键字",true);
		}
	} else if(is_single()) {
  if(get_post_meta($post->ID, "关键字",true)){
		 if(get_post_meta($post->ID, "关键字",true)){
		echo get_post_meta($post->ID, "关键字",true);}
		else{
			echo get_option('mytheme_keywords');
		}
		}
	// 如果是类目页面, 显示类目表述
	}  else {
		echo get_option('mytheme_keywords');
	}?>   " />
<meta name="description" content="<?php if(is_front_page() || is_home()) { 
	echo get_option('mytheme_description');
 
	// 如果是文章详细页面和独立页面
	}
 else if(is_page() ) {
		if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	// 如果是类目页面, 显示类目表述
	} 
	 else if(is_single() ) {
		 if(get_post_meta($post->ID, "描述",true)){
		echo get_post_meta($post->ID, "描述",true);}
		else{
			echo  substr(strip_tags($post->post_content), 0, 420);
		}
	
	// 如果是类目页面, 显示类目表述
	}  else {
		echo   get_option('mytheme_description');
	}
?>" />
	<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" /> 
	<?php } };?>

<title><?php
		   if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		   if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title($word_t12."&quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo '  - '; }
		      elseif (is_search()) {
		         echo $word_t9.' &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo $word_t10.'- '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
		   ?></title>
	<?php 
	
	$logo= get_option('mytheme_logo') ;
	        $ico= get_option('mytheme_ico');
	
	?>
	<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel='stylesheet' id='stylesheet-css'  href='<?php echo get_bloginfo('template_url').'/css/move.css' ?>' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo get_bloginfo('template_url').'/js/jquery-2.1.1.min.js' ?>'></script>
<script type='text/javascript' src='<?php echo get_bloginfo('template_url').'/js/move.js' ?>'></script>
<script type='text/javascript' src='<?php echo get_bloginfo('template_url').'/js/jquery.easing.1.3.js' ?>'></script>
<script type='text/javascript' src='<?php echo get_bloginfo('template_url').'/js/idangerous.swiper-2.1.min.js' ?>'></script>
<style>

.case1 .caseleft ul li{width:48%; height:auto; margin:0 1% 13px  0; float:left; max-width:231px; }
#servers ul li{ display:block; width:100%; height:auto; float:left;  overflow:hidden;}
#advantage ul li{ width:100%; height: auto; margin:0 0 10px 0; position:relative;  float:left;text-align:center;}
</style>
   
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>


	
</head>

<body style="background:#CCC">
	<?php $logo= get_option('mytheme_logo') ;
	$detects= get_option('mytheme_detects') ;
	if($detects =="value1"){$widths="768px";}elseif($detects =="value2"){$widths="640px";}elseif($detects =="value3"){$widths="480px";}else{$widths="768px";}
	?>
	<div id="page-wrap" style="width:<?php echo $widths;?>; height:auto; margin:35px auto; position:relative; background:#FFF;">

		<div id="header"style=" position:absolute;">

            <div class="header_in">
        
			<a id="logo"  href="<?php bloginfo('url'); ?>" ><img src="<?php $logo= get_option('mytheme_logo') ; if($logo==""){ echo get_bloginfo('template_url').'/images/logo.png';}else{echo $logo; } ?>" /></a>
            
            <div id="nav_btn">
             <a></a>
            </div>
           <div class="menu_nav"style=" position:absolute;"> 
		  
		   <?php wp_nav_menu(array( 'theme_location' => 'header-menu','menu_class'=> 'menu','container' => false ) ); ?></div>
            </div>
		</div>

        
<div id="index_ara">
 <?php dynamic_sidebar('sidebar-widgets9'); ?>
</div>



<div id="footer">
	 <div class="footer_in">   
  
             <?php      
		 $themepark= get_option('mytheme_themepark');
         $icp_b=get_option('mytheme_icp_b'); 
		 $icon_title =get_option('mytheme_icon_title '); 
		 $icon_title_2= get_option('mytheme_icon_title_2'); 
		 $icon1 =get_option('mytheme_icon1'); 
		 $icon2 =get_option('mytheme_icon2'); 
		 $icon3 =get_option('mytheme_icon3'); 
	     $icon4 =get_option('mytheme_icon4'); 
		 $icon5 =get_option('mytheme_icon5'); 
		 $icon6 =get_option('mytheme_icon6'); 
         $icon_url1 =get_option('mytheme_icon_url1'); 
		 $icon_url2 =get_option('mytheme_icon_url2'); 
		 $icon_url3 =get_option('mytheme_icon_url3'); 
		 $icon_url4 =get_option('mytheme_icon_url4'); 
		 $icon_url5 =get_option('mytheme_icon_url5'); 
		 $icon_url6 =get_option('mytheme_icon_url6'); 
		 $icon_tagert1 =get_option('mytheme_icon_tagert1'); 
		 $two_code=get_option('mytheme_two_code');
			 $tell = get_option('mytheme_tell');
					 $email= get_option('mytheme_email');	 	     
		    ?>
            <div class="footer_hot">
            <b><?php if($icon_title!=""){echo $icon_title;}else {echo '功能模块';} ?></b>
            	<ul>
              
                   
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url1; ?>"><img src="<?php echo $icon1; ?>" /></a></li>
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url2; ?>"><img src="<?php echo $icon2; ?>" /></a></li>
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url3; ?>"><img src="<?php echo $icon3; ?>" /></a></li>
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url4; ?>"><img src="<?php echo $icon4; ?>" /></a></li>
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url5; ?>"><img src="<?php echo $icon5; ?>" /></a></li>
                         <li><a <?php echo $icon_tagert1; ?> href="<?php echo $icon_url6; ?>"><img src="<?php echo $icon6; ?>" /></a></li>
    
                      
                </ul>
            
            </div>
     
           <?php wp_nav_menu(array('container' => false, 'theme_location' => 'footer-menu2','menu_class'=> 'footer_mune' ) ); ?>
     
     
      </div>
      <div class="footer_bottom">
        <div class="footer_bottom_in">
           <?php wp_nav_menu(array('container' => false, 'theme_location' => 'link-menu2','menu_class'=> 'link-menu2' ) ); $word_t2=get_option('mytheme_word_t2');$themepark= get_option('mytheme_themepark'); $icp = get_option('mytheme_icp_b');?>
           <p> <?php if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; bloginfo('name'); 
		   if($icp !=="") {echo ' |   <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp.'</a>'; };
		   if($themepark =="") {echo ' |  技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		   else if($themepark =="en") {echo ' |  Theme by ： <a target="_blank" href="http://www.themepark.com.cn">themepark</a>'; }
		    else if($themepark =="cn") {echo ' |  技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		    echo ' |  '.stripslashes(get_option('mytheme_analytics')); ?> </p>
        </div>
      </div>
     	
</div>



	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>
