<div id="content" class="toppp">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<div class="title_page"><h1><?php if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';} echo $word_t10 ; ?> </h1></div>







  <div class="enter">
  <p> <?php if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';} echo $word_t10 ; ?></p>
  
   </div>

<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
 <?php endwhile; endif; ?>


</div>
