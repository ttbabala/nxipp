<div id="page_top">
<div class="page_top_in">
  
<h1>   <?php if($word_t12!=""){echo $word_t12;}else{echo '找到标签：';} single_tag_title(); ?></h1>
    <p><?php if($word_t8!=""){echo $word_t8;}else{echo 'Screening using labels article';}  ?></p>
</div>

</div>

<div id="page_muen_nav">  <b><?php if(get_option('mytheme_word_t11')==""){echo  '您现在所在的位置';}else{ echo get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{if (function_exists('get_breadcrumbs')){get_breadcrumbs();}}?></div>

<div id="content">
  <ul class="bigpic_loop" id="category_pic_big">
 <?php if(get_option('mytheme_list_nmber4')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber4');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" class="loop_big_a">
    <?php  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('big-list-thumbb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 

</a>
<b><a  href="<?php the_permalink() ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title',$tit)),  0,30,"..."); ?></a></b>
</li>


 <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>        

</ul> 
           
             <div class="pager">   <?php par_pagenavi(); ?>  </div>  


</div>  
    

