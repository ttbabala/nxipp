<?php 
/**
  Category Template:图片列表（大图一栏）
 **/
get_header();
$detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	if(get_option('mytheme_theme_shop_open')=="shop_ok"){
	include_once("move/category_shop.php"); }else{
	include_once("move/category.php"); }
	}
else{
 get_template_part( 'page_single/top' ); 
?>	

<div id="content">
<?php get_template_part( 'product_nav' );  ?>
  <div class="case_pic">
         <ul>
         
         
        <?php  if(get_option('mytheme_list_nmber5')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber5');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
						 $title_images= get_post_meta($post->ID,"title_images", true);
			 ?>
        <li> 
              <a title="<?php the_title(); ?>"<?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" >
               <div class="hover_case"> 
			   <?php if(get_post_meta($post->ID, "links_pics",true)!==""){ ?>
               <img src=" <?php echo  get_post_meta($post->ID, "links_pics",true); ?>" alt="<?php echo get_the_title(); ?>"/><?php };?>
              
               
               </div>
                <?php 
				if($title_images){echo '<img src="'.$title_images.'" alt="'.get_the_title().'" />';}
				  $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('defent-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?></a>
                <b><?php echo mb_strimwidth(get_the_title(), 0, 28,"...") ?></b>
                <?php
				 	$price = get_post_meta($id, 'shop_price', true);
	                $original_price=get_post_meta($id,"original_price", true);
				  if($price!=""){?>
                  <span class="prices_p"><em id="price">￥<?php echo $price ?></em>  <?php if($original_price){echo '<em class="original_price">￥'.$original_price.'</em>';} ?></span>
                   <?php if(shop_comment_number()){?>
                    <div id="order_stars" class="ppinfeff order_stars_<?php echo shop_comment_stars()?>"></div><em class="pingfens">综合评分(<?php  echo shop_comment_number(); ?>人评分)</em><?php }else{?><p>暂无评分</p><?php }?>
                   <?php  }else{?>
                <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"..."); ?></p><?php } ?>
            <div class="bottom_tucase"></div>
             </li>
             
       
      <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>     
         
</ul>
           <div class="pager">   <?php par_pagenavi(); ?>  </div>  

</div>
</div>  
    
<?php };get_footer(); ?>
