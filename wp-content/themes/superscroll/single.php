<?php
 $id =get_the_ID(); 
	   
$bbs_mo =get_option('mytheme_bbs_mo');
if($bbs_mo&&get_post_meta($id,"bbs_shoppingbox", true) ){get_template_part('single-full') ;}else{

 get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	get_template_part( 'move/page' );
	}
else{ 

get_template_part( 'page_single/top' );
get_template_part( 'page_single/content' );	
};get_footer();} ?>
