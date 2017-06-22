 <?php $left_right =get_option('mytheme_left_right'); ?>
<div id="content">
<div class="left_mian" <?php if($left_right){echo 'style="float: right;"';} ?> ><?php if(is_single()){get_template_part( 'sidebar2' );}else{get_template_part( 'sidebar6' );}?></div>
<div class="right_mian"<?php if($left_right){echo 'style="float: left;"';} ?>><?php get_template_part( 'page_single/page_right' ); ?>
<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
</div>
</div>