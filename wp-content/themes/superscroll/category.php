<?php get_header();
 $detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	include_once("move/category.php"); 
	}
else{ 
get_template_part( 'page_single/top' ); 
?>	

<div id="content">
<?php get_template_part( 'product_nav' );  ?>

 <?php $left_right =get_option('mytheme_left_right'); ?>
<div class="left_mian" <?php if($left_right){echo 'style="float: right;"';} ?> ><?php get_sidebar(); ?></div>
<div class="right_mian" <?php if($left_right){echo 'style="float: left;"';} ?>>


 <ul class="news_loop_01" id="default">
 
   <?php if(get_option('mytheme_list_nmber2')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber2');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
           <li id="fist">
             <a    <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_001_pic">
              <?php  $tit= get_the_title();
					if (has_post_thumbnail()) { the_post_thumbnail('default-list-thumbb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
                    
                    </a>
              <span>
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
			 
			 <?php the_title(); ?></a></b>
             <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
             <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,300,"..."); ?></p>
             <a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_btn">MORE>></a>
             </span>
           </li>
             <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(); ?>  </div>  

</div>
</div>  
    
<?php };get_footer(); ?>
