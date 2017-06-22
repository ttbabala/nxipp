<?php 
/**
  Category Template:正方形图文列表
 **/
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	include_once("move/category1.php"); 
	}
else{ 

 get_template_part( 'page_single/top' ); 
?>	

<div id="content">
 <?php $left_right =get_option('mytheme_left_right'); ?>
<div class="left_mian" <?php if($left_right){echo 'style="float: right;"';} ?> ><?php get_template_part( 'sidebar2' ); ?></div>
<div class="right_mian" <?php if($left_right){echo 'style="float: left;"';} ?>>


 <ul class="news_loop_01" id="pic_text_list">
 <?php if(get_option('mytheme_list_nmber3')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber3');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>    
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
              <li id="big">
             <a <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_001_pic" id="fang">
            <?php  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('news-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
             </a>
              <span id="fang_span">
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php the_title(); ?></a></b>
             <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
             <div class="tag_pro"><?php the_tags("",""); ?></div>
             <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,350,"..."); ?></p>
          
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
