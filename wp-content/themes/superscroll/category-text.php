<?php 
/**
  Category Template:纯文字列表
 **/
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	include_once("move/category1.php"); 
	}
else{ 

 get_template_part( 'page_single/top' ); 
   $news_pics=get_option('mytheme_news_pics'); 
?>	
<div id="content">
 <?php $left_right =get_option('mytheme_left_right'); ?>
<div class="left_mian" <?php if($left_right){echo 'style="float: right;"';} ?> ><?php get_template_part( 'sidebar3' ); ?></div>
<div class="right_mian"  id="test_list_b"<?php if($left_right){echo 'style="float: left;"';} ?>>
 <ul class="news_loop_01" id="text_list">
 
   <img class="testlist_pic" src="<?php if( $news_pics !=""){echo  $news_pics;}else{ echo get_bloginfo('template_url').'/images/news.jpg';} ?>" />
        
           <?php if(get_option('mytheme_list_nmber1')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber1');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>     
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
           <li id="fist">
              <span>
             <b><a   <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"> 
			 <?php the_title(); ?></a></b>
             <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
              <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,300,"..."); ?></p>
             </p>
             
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