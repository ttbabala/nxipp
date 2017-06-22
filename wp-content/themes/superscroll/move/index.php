<?php get_header(); 
 $move_yes= get_option('mytheme_move_yes');
 if($move_yes =="1"){ ?>

 <div id="index_ara">

 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-widgets9')) : else : ?>
<?php endif; ?>

</div>
 
 <?php }else{
get_template_part( 'move/index/pic' );
get_template_part( 'move/index/nav' );
 }
get_footer(); ?>