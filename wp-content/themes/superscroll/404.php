<?php get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()){
	get_template_part( 'move/404' );
	}
elseif($detect->isTablet()){
	get_template_part( 'move/404' );
}else{ 
get_template_part( 'page_single/top' );
?>
<div id="content">
<div class="left_mian"> 
<?php get_sidebar(); ?>
</div>
<div class="right_mian">


   <div class="title_page"><h1><?php if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';} echo $word_t10 ; ?> </h1></div>
  
  
</div>
</div>
    
<?php };get_footer(); ?>