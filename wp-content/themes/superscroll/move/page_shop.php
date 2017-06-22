<div id="content" class="toppp">

<?php
$word_t14=get_option('mytheme_word_t14');
	
			$word_t15=get_option('mytheme_word_t15');
			$word_t16=get_option('mytheme_word_t16');
 if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<?php if(is_single()):?> 

<div class="title_page"><h1><?php the_title();?></h1></div><div class="des_page"><a>TIME: <?php the_time('Y-m-d')?></a>
 <?php foreach((get_the_category()) as $category) { echo '<a href="'. get_category_link($category->cat_ID).'">' .$category->cat_name .'</a> ';}?>
 
   <?php 
			$tit= get_the_title();
	
			 $title_images= get_post_meta($post->ID,"title_images", true);
			 $attachment_id = get_attachment_id_from_src(  $title_images );
		
                             $post_content = $post->post_content;
                             preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
                             $array_id = $ids;
                             foreach($array_id  as $array_id ){
                             }
							 if($array_id){
                             echo do_shortcode("[gallery ids=". $array_id ."]"); 
							 }else{
	 if($title_images){ echo wp_get_attachment_image( $attachment_id, 'product-thumb',array('alt'	=>$tit, 'title'=> $tit )); ;}else{
	
			 if (has_post_thumbnail()) { the_post_thumbnail('product-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}else{?> 
                    <img  alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php if( $list_nmber_k2==""){echo get_bloginfo('template_url').'/images/huise.gif';}else{echo $list_nmber_k2;} ?>" />
                    <?php }}} ?>
 
<div class="tag_pro">

	  <?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a href="/tag/'.$tag->slug.'">' .$tag->name .'</a>';}};?> </div>
          <?php   $shop_open = get_post_meta($id, 'shop_open', true);
	        $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
	        if($original_price){$original=  '原价：￥'.get_post_meta($id,"original_price", true);}
	     if($shop_open == 'yes')    {  
		 echo '<p><em class="original_price">'.$original.'</em></p><p><b class="price">现价：￥'.$price.'</b></p>';
	if(function_exists('shop_comment_number')){	?>
        <p class="starsss"><?php if(shop_comment_number()){?><b>综合评分：</b>  <b id="order_stars" class="order_stars_<?php echo shop_comment_stars()?>"></b><b>(<?php echo shop_comment_number(); ?>人评分)</b><?php }else{?><b>暂无评分</b><?php }?></p>
        
        
        <?php
	}
		 }
	   
	    ?>
         <?php 
			 if(get_post_meta($post->ID, "cont_read",true)!==""){  $logmeta = wpautop(trim(get_post_meta($post->ID, "cont_read",true)));
			echo $logmeta;};?> 
	   
	
       
       <?php  
	       
			 if($shop_open == 'yes')    { $link=""; }else{
			if(get_post_meta($post->ID,"purview", true) ==""){ $link='href="#respond"';}else{$link='href="'.get_post_meta($post->ID,"links_p", true).'"rel="nofollow"target="_blank"';}
			}
	   
	   ?>   
   <a class="btn"   <?php echo  $link;?>><?php if($word_t15!=""){echo $word_t15;}else{echo '联系咨询';}  ?></a>
</div>

 <?php if(function_exists('shop_form')){echo shop_form();} ?>

<?php endif; ?>

  
 <div class="enter" id="nogallery_enter">
  <span class="enter_cs"><a id="content_shop_btn" class="cutyes"><?php if($word_t16!=""){echo $word_t16;}else{echo '详细参数';}  ?></a> 
                                                             <?php if(function_exists('shop_comment_number')){ ?>   <a id="comment_shop_btn">用户评分(<?php echo shop_comment_number() ?>)</a><?php } ?></span>

   
    <div id="content_shop"> <?php the_content(); ?></div>
   <?php   if($shop_open == 'yes'&&function_exists('shop_comment_number'))    { ?> <div id="comment_shop" style="display:none;">  <?php if(function_exists('shop_comment')){echo shop_comment();} ?></div><?php }?>
</div>
<div id="respond">
 
</div>
 <?php endwhile; endif; ?>


</div>