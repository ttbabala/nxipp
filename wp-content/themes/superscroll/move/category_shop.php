<?php 
get_template_part( 'move/moduel/top' );
?>	
<?php get_template_part( 'product_nav' );  ?>
<div id="content">
  <ul class="bigpic_loop" id="category_pic_big">
 
   <?php if(get_option('mytheme_list_nmber2')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber2');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
           <li>
             <a   href="<?php the_permalink() ?>" class="news_001_pic"> <?php  $tit= get_the_title();
					if (has_post_thumbnail()) { the_post_thumbnail('pp290-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
                    
                    </a>
              <span>
             <b><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></b>
           <?php 
		     $price = get_post_meta($id, 'shop_price', true);
		   if($price){
		  
          	$original_price=get_post_meta($id,"original_price", true);
			if($original_price){$original=  '<p><em class="original_price">'.'原价：￥'.get_post_meta($id,"original_price", true).'</em>';}
			  echo $original.'<a class="price">现价：￥'.$price.'</a></p>'; ?>
		 <p class="starsss"><?php if(shop_comment_number()){?><a>综合评分(<?php  echo shop_comment_number(); ?>人评分)</a>  <div id="order_starsl" class="order_stars_<?php echo shop_comment_stars()?>"></div><?php }else{?><a>暂无评分</a><?php }}?></p>
             <div class="tag_pro"><?php the_tags("",""); ?></div>
            
             
              
          
             </span>
           </li>
             <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(); ?>  </div>  


</div>  
    

