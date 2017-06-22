<?php  
			         $case1=get_option('mytheme_case1'); 
					 $case_title=get_option('mytheme_case_title'); 
					 $case_content=get_option('mytheme_case_content'); 
				    $case_pic=get_option('mytheme_case_pic');
			 ?>	
 <div id="pages4" class="page"<?php if($case_pic !=""){ echo 'style=" background:center  url('. $case_pic.')"'; }?>>
   
     <div class="case">
     
         <div class="case_title">
           <b> <?php if($case_title !=""){ echo $case_title;}else{echo '最新推荐产品';} ?></b>
           <p><?php if($case_content !=""){ echo $case_content;} else{ echo'查看我们的产品，以便了解我们的实力';} ?></p>
         </div>
     
       <div class="case_pic">
         <ul>
         
         
             <?php $posts = get_posts( "category=($case1)&numberposts=12" ); ?>
    <?php if( $posts ) : ?>  
       <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
        <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
        <li> 
              <a title="<?php the_title(); ?>" <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" >
              
                <?php   $tit= get_the_title();
				
				 $title_images= get_post_meta($post->ID,"title_images", true);
			 $attachment_id = get_attachment_id_from_src(  $title_images );
				 if($title_images){ echo wp_get_attachment_image( $attachment_id, 'defent-thumb',array('alt'	=>$tit, 'title'=> $tit )); ;}else{
				if (has_post_thumbnail()) { the_post_thumbnail('defent-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}}?></a>
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
             </li>
             
       
       <?php endforeach; ?>                                            
             
              <?php else : ?>
         
             <li> 
              <a> <img src="<?php echo  get_bloginfo('template_url').'/images/images/Service_04.jpg'?>" /></a>
                <b>产品演示1</b>
                <p>WEB主题公园是禁止设计艺术工作室倾力打造的一个以网页模板，网页主题为核心的商务平台。我们有着经验丰富，而且成熟的团队，我们专注于开发视觉精美</p>
             </li>
             
              <li> 
              <a> <img src="<?php echo  get_bloginfo('template_url').'/images/images/Service_06.jpg'?>" /></a>
                <b>产品演示1</b>
                <p>WEB主题公园是禁止设计艺术工作室倾力打造的一个以网页模板，网页主题为核心的商务平台。我们有着经验丰富，而且成熟的团队，我们专注于开发视觉精美</p>
             </li>
             
             
              <li> 
              <a> <img src="<?php echo  get_bloginfo('template_url').'/images/images/Service_08.jpg'?>" /></a>
                <b>产品演示1</b>
                <p>WEB主题公园是禁止设计艺术工作室倾力打造的一个以网页模板，网页主题为核心的商务平台。我们有着经验丰富，而且成熟的团队，我们专注于开发视觉精美</p>
             </li>
       
          <?php endif; ?>               
         
         </ul>
       
 
         

<script>
$(function() {
$(".case_pic").jCarouselLite({
btnNext: ".case  .next",
btnPrev: ".case .prve",
auto:3000,
speed:1000,
visible:3,
onMouse:true,
easing: "easeOutBack"
});
});


</script>     
     </div>
              <div class="loop_big_caj_nav">
<a class="prve"> < prev</a>
<a class="next"> next > </a>
 
</div>
  </div>
 
 </div>