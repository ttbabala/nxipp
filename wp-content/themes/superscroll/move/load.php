<?php
// 加载主题的各种外置文件 css  js
function themepark_init_css() {
if ( !is_admin()) {
	
	   wp_deregister_script('jquery');
	   wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-2.1.1.min.js", false);
	   wp_enqueue_script('jquery');
   wp_deregister_script('easing');
	   wp_register_script( 'easing',get_template_directory_uri() ."/js/jquery.easing.1.3.js");
	   wp_enqueue_script('easing');
	   
	    wp_deregister_script('swiper');
	   wp_register_script( 'swiper',get_template_directory_uri() ."/js/idangerous.swiper-2.1.min.js");
	   wp_enqueue_script('swiper');

	     wp_deregister_script('script');
	   wp_register_script( 'script', get_template_directory_uri() ."/js/move.js");
	   wp_enqueue_script('script');

	
	    wp_deregister_style('stylesheet');
	   wp_register_style( 'stylesheet', get_template_directory_uri() .'/css/move.css');
	   wp_enqueue_style('stylesheet');
	   

	}}

add_action('wp_print_styles', 'themepark_init_css');?>