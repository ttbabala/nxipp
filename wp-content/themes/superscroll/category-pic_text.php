<?php 
/**
  Category Template:大图文列表
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
 <?php $left_right =get_option('mytheme_left_right'); ?>
<div class="left_mian" <?php if($left_right){echo 'style="float: right;"';} ?> ><?php get_template_part( 'sidebar4' ); ?></div>
<div class="right_mian" <?php if($left_right){echo 'style="float: left;"';} ?>>

 <ul class="news_loop_01" id="pic_text_list">
 <?php if(get_option('mytheme_list_nmber3')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber3');}
  $list_nmber_k2=get_option('mytheme_list_nmber_k2');
$posts = query_posts($query_string . '&showposts='.$nmnber); 
	

	      
	
?>    
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
					   $id=get_the_ID(); 
 $shop_open = get_post_meta($id, 'shop_open', true);
			 ?>
              <li id="big">
             <a <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_001_pic">
            <?php 
			$tit= get_the_title();
	
			 $title_images= get_post_meta($post->ID,"title_images", true);
			 $attachment_id = get_attachment_id_from_src(  $title_images );
			 
	 if($title_images){ echo wp_get_attachment_image( $attachment_id, 'defent-thumb',array('alt'	=>$tit, 'title'=> $tit )); ;}else{
	
			 if (has_post_thumbnail()) { the_post_thumbnail('defent-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}else{?> 
                    <img width="290" height="215" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php if( $list_nmber_k2==""){echo get_bloginfo('template_url').'/images/huise.gif';}else{echo $list_nmber_k2;} ?>" />
                    <?php }} ?> 
	 
	 
			
			
             </a>
              <span>
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php the_title(); ?></a></b>
            <?php  if($shop_open == 'yes'&&get_option('mytheme_theme_shop_open')=="shop_ok")    {
				  $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
			if($original_price){$original=  '<em class="original_price" id="black">'.'原价：￥'.get_post_meta($id,"original_price", true).'</em>';}
				  echo '<p class="ppre"><a id="price">现价：￥'.$price.'</a>'.$original.'</p>'; ?>
            
             <p class="starsss"><?php if(shop_comment_number()){?><a>综合评分(<?php  echo shop_comment_number(); ?>人评分)</a>  <p id="order_stars" class="order_stars_<?php echo shop_comment_stars()?>"></p><?php }else{?><a>暂无评分</a><?php }?></p>
             <div class="tag_pro"><?php the_tags("",""); ?></div>
              <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,250,"...",'utf-8'); ?></p>
          <?php }else{ ?>
          
           <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
             <div class="tag_pro"><?php the_tags("",""); ?></div>
          <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,350,"...",'utf-8'); ?></p>
          
          <?php } ?>
             </span>
           </li>
          <?php endwhile; ?>     
                        <?php else : ?> <p><?php $word_t10=get_option('mytheme_word_t10'); if($word_t10!=""){echo $word_t10;}else{echo '很遗憾，没有找到你要的信息';}  ?><br /></p>
                         <?php  endif; ?>        
           

           </ul>          
            <div class="pager">   <?php par_pagenavi(9); ?>  </div>  

</div>
</div>  
    
<?php };get_footer(); ?>
