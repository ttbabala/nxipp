<?php
/*
Template Name Posts:全屏模板
*/
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/page' );
	}
else{ 
get_template_part( 'page_single/top' );
get_template_part( 'page_single/full' );	
};get_footer(); ?>
