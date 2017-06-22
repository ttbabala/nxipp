<?php 
/*
Template Name Posts:产品展示模板
*/
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/page_shop' );
	}
else{ 
get_template_part( 'page_single/top' );
?>

<div id="content">
<div class="left_mian"> <?php get_template_part( 'sidebar5' );  ?></div>
<div class="right_mian"><?php get_template_part( 'page_single/product' ); ?>
<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
</div>
</div>

<?php }; get_footer(); ?>
