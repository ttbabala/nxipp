<?php 

/* 
Template Name:品牌列表
*/ 
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/page' );
}else{
get_template_part( 'page_single/top' );
?>
<div id="bandds">
<?php get_template_part( 'page_single/full' );		?>   
  </div>  
<?php };get_footer(); ?>
