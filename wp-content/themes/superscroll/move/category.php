<?php 
get_template_part( 'move/moduel/top' );
?>	
<?php get_template_part( 'product_nav' );  ?>
<div id="content">
  <ul class="bigpic_loop" id="category_pic_big">
 <?php if(get_option('mytheme_list_nmber4')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber4');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" class="loop_big_a">
    <?php  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('pp290-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 

</a>
<b><a  href="<?php the_permalink() ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$tit)),  0,30,"...",'utf-8'); ?></a></b>
</li>


 <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>        

</ul> 
          <div class="pager">   <?php par_pagenavi(); ?>  </div>  


</div>  
    

