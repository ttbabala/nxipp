<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1" />	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (get_option('mytheme_eso_jr') == ""){
if(is_single()){
$id=get_the_ID(); 
$description=get_post_meta($id, "描述",true);
$keyworeds=get_post_meta($id, "关键字",true);
$posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { $tagess.=$tag->name.',';}}
$post_excerp= mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"...",'utf-8');
}	
?>
<meta name="keywords" content="<?php  ob_start();if(is_single()&&!$keyworeds){echo $tagess;}else{theme_keyworeds();} ?>" />
<meta name="description" content="<?php  ob_start();if(is_single()&&!$description){echo  mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,200,"",'utf-8');}else{theme_description();}; ?>" />
<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /> <?php } ;?>
<title><?php if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		     if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
			 $singletitle_p =get_post_meta($post->ID, "title_p",true);
			 $singletitle =get_post_meta($post->ID, "title",true);
			 global $wp_query;
	         $detect = new Mobile_Detect();
             $term_id = get_query_var('cat');
             $cat_title=get_option('cat_title_'.$term_id);
             $cat_title_p=get_option('cat_title_p_'.$term_id);
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title($word_t12."&quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
				 if ($detect->isMobile()||$detect->isTablet()){
					 if($cat_title_p){echo $cat_title_p;}elseif( $cat_title){echo  $cat_title;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }else{	 
		        if( $cat_title){echo  $cat_title;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }
				 }
		      elseif (is_search()) {
		         echo $word_t9.' &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		        if ($detect->isMobile()||$detect->isTablet()){
					 if($singletitle_p){echo $singletitle_p;}elseif( $singletitle){echo  $singletitle;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }else{	 
		        if( $singletitle){echo  $singletitle;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }
			    }
		      elseif (is_404()) {
		         echo $word_t10.'- '; }
		      if (is_home()) {
				  
				   if ($detect->isMobile()||$detect->isTablet()){
					 if(get_option('mytheme_title_p')){echo get_option('mytheme_title_p');}elseif(get_option('mytheme_title')){echo get_option('mytheme_title');}else{  bloginfo('name'); echo ' - '; bloginfo('description');  }
					 }else{
						 
		        if(get_option('mytheme_title')){echo get_option('mytheme_title');}else{  bloginfo('name'); echo ' - '; bloginfo('description'); }
					 }
		        }
		      if ($paged>1) {
		         echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
		   ?></title>
<?php } $logo= get_option('mytheme_logo') ;$ico= get_option('mytheme_ico');?>
<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	<?php $theme_shop_open = get_option('mytheme_theme_shop_open') ?>
</head>
<?php $detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/header' );
	}
else{ 

?>

<body <?php body_class(); ?> <?php   if( is_front_page() || is_home()) {echo' style= overflow:hidden;';}?>>
	
    
  <div id="header">
            
            <div id="header_in">
                <a href="<?php bloginfo('url'); ?>" class="logo"><img alt="<?php echo bloginfo('name'); ?>" src="<?php  if($logo==""){ echo get_bloginfo('template_url').'/images/logo.png';}else{echo $logo; } ?>" /></a>
                
                 	<?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){?>
                <span class="login_shops"> 
               
                 <?php
				 	$shop_login = get_option('shop_login');
		            $shop_register = get_option('shop_register');
	      	        $shop_profile = get_option('shop_profile');
					 global $current_user;    get_currentuserinfo();
					  if (is_user_logged_in()) {  ?>
                       <b>个人中心</b>
                    <div id="login_d">
                     <a id="profile_btn"href="<?php echo get_page_link( $shop_login  );?>">我的个人中心</a>
                     <?php wp_loginout(get_bloginfo('url')); ?>
                    </div>
                      
                      
                        <?php }else{?>
               
                 <b>登录网站</b>
                    <div id="login_d">
                     <a id="login_btn"href="<?php echo get_page_link( $shop_login  );?>">登录</a>
                    <a id="register_btn"href="<?php echo get_page_link( $shop_register );?>">创建一个账号</a>
                    </div>
                     <?php } ?> 
                    
               </span>
              <?php } ?> 
                <div id="nav"<?php if($theme_shop_open){echo "class='shop_nav_login'";} ?>> <?php ob_start(); wp_nav_menu(array( 'theme_location' => 'header-menu','menu_class'=> 'menu_nav','container' => false ) ); ?>
               
            </div>
                 </div>
             
            </div>
            
            
		</div>
	
    
<?php } ?>