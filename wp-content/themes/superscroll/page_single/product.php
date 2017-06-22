<?php 
	$word_t14=get_option('mytheme_word_t14');
			$word_t15=get_option('mytheme_word_t15');
			$word_t16=get_option('mytheme_word_t16');
if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<div class="product">
<div class="product_text">
       <h1><?php the_title(); ?></h1>
   
       <div class="product_text">
    
      
       <span><?php if($word_t14!=""){echo $word_t14;}else{echo '简介参数';}  ?></span>
       <div class="de_product">
       <?php   
	   $id=get_the_ID(); 
	   $shop_open = get_post_meta($id, 'shop_open', true);
	        $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
	if($original_price){$original=  '原价：￥'.get_post_meta($id,"original_price", true);}
	     if($shop_open == 'yes')    {  
		 echo '<p><em class="original_price">'.$original.'</em></p><p><b class="price">现价：￥'.$price.'</b></p>';
		
		 ?>
            <p class="starsss"><?php if(shop_comment_number()){?><b>综合评分：</b>  <b id="order_stars" class="order_stars_<?php echo shop_comment_stars()?>"></b><b>(<?php echo shop_comment_number(); ?>人评分)</b><?php }else{?><b>暂无评分</b><?php }?></p>
        <?php 
		 }
	   
	    ?>
        <div class="tag_pro"><b>标签：</b><?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a target="_blank" href="'.get_bloginfo('url').'/tag/'.$tag->slug.'">' .$tag->name .'</a>';}}?>  </div>
	     <?php if(get_post_meta($post->ID, "cont_read",true)!==""){ 
            $logmeta = wpautop(trim(get_post_meta($post->ID, "cont_read",true)));
			echo $logmeta;};?> 
	
	   </div>
       
       <?php  
	        if($shop_open == 'yes')    { $link=""; }else{
			if(get_post_meta($post->ID,"purview", true) ==""){ $link='href="#respond"';}else{$link='href="'.get_post_meta($post->ID,"links_p", true).'"rel="nofollow"target="_blank"';}
			}
	   ?>
      
       <a class="btn"   <?php echo  $link;?>><?php if($word_t15!=""){echo $word_t15;}else{echo '联系咨询';}  ?></a>
     
      
       
          
    </div>
       
</div>
    <a class="product_pic">
    <div class="loading"></div>
     <?php   
	
			
	
	 if (has_post_thumbnail()) { the_post_thumbnail('product-thumb' ,array('alt'	=>$tit, 'title'=> get_the_title() ));}
	 
	  ?>
    </a>
    
    
   <?php  if(has_shortcode( $post->post_content, 'gallery' )==true): ?>
    <div class="list">
    <a class="prve">< </a>
    <div class="lsit_hover">
    	 <?php  
                             $post_content = $post->post_content;
                             preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
                             $array_id = $ids;
                             foreach($array_id  as $array_id ){
                             }
                             echo do_shortcode("[gallery ids=". $array_id ."]"); 
                         ?> 
                         </div>
    <a class="next"> ></a>
    
    </div>
<?php endif; ?>



</div>
<?php if(function_exists('shop_form')){echo shop_form();} ?>
  <div class="enter" id="nogallery_enter">
  <?php   if($shop_open == 'yes')    { ?><span class="enter_cs"><a id="content_shop_btn" class="cutyes"><?php if($word_t16!=""){echo $word_t16;}else{echo '详细参数';}  ?></a> 
                                                                <a id="comment_shop_btn">用户评分(<?php echo shop_comment_number(); ?>)</a>
                                                              
                                                                </span> <?php }else{?>
  <span class="enter_cs"><a><?php if($word_t16!=""){echo $word_t16;}else{echo '详细参数';}  ?></a></span>
   <?php }?>
    <div id="content_shop"> <?php the_content(); ?></div>
   <?php   if($shop_open == 'yes')    { ?> <div id="comment_shop" style="display:none;">  <?php if(function_exists('shop_comment')){echo shop_comment();} ?></div><?php }?>
 
  
  
   <?php wp_link_pages('before=<div class="pager">&after=</div>'); ?>
   <div class="bqc">
 <?php  $fenxiang=get_option('mytheme_fenxiang');if( $fenxiang ==""){ ?>
  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
 <?php }else{echo stripslashes(get_option('mytheme_fenxiang')); } ?>
    <?php  	$word_t42=get_option('mytheme_word_t42');
			$word_t43=get_option('mytheme_word_t43');
			 ?>
	
	 <div class="alignleft"><p><?php if (get_next_post()) { next_post_link($word_t42.': %link','%title',true);} ?></p> 
<p><?php if (get_previous_post()) { previous_post_link($word_t43.': %link','%title',true);}?> </p>  </div>
  
  </div>
  </div>
 <?php endwhile; endif; ?>
  <?php if(is_single()){ get_template_part( 'page_single/relevant_right' );} ?>