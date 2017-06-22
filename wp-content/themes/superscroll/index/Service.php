 <?php 
	                 $service=get_option('mytheme_service'); 
					 $service_title=get_option('mytheme_service_title'); 
					 $service_title_en=get_option('mytheme_service_title_en'); 
					 $service_content=get_option('mytheme_service_content');
					  $word_t1=get_option('mytheme_word_t1'); 
					?>
 <div id="pages2" class="page"> 
      <div class="sercive">
          <div class="sercive_hold"> </div>    
            <ul class="sercive_ul">
        
              
              
              
            <?php $posts = get_posts( "category=($service)&numberposts=6" ); ?>
    <?php if( $posts ) : ?>  
       <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
    
             <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
      <li><div>  <span> <b title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 28,"...") ?></b><p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"..."); ?></p> <a <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"> <?php if($word_t1!=""){echo $word_t1;}else{echo '查看详细';}  ?></a> </span>
      <?php   $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('defent-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?>
           </div>
         </li>
               
     <?php endforeach; ?>                                            
             
              <?php else : ?>
      
        <?php endif; ?>               
               
            
            </ul>
      
         
      
      
      
      </div>
     <div class="sercive_title_out">
        <div class="sercive_title">
             <span> <b> <?php echo $service_title_en; ?></b>  <a><?php echo $service_title; ?></a></span>
             <p><?php echo $service_content; ?></p>
          </div>
                
     </div>    
          
 </div>