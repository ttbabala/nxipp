 <div id="pages5" class="page">
   <?php  
			         $news1=get_option('mytheme_news1'); 
					 $news2=get_option('mytheme_news2'); 
					 $news_title1=get_option('mytheme_news_title1'); 
					 $news_title2=get_option('mytheme_news_title2'); 
					 $news_title_en1=get_option('mytheme_news_title_en1'); 
					 $news_title_en2=get_option('mytheme_news_title_en2'); 
				  
			 ?>	
    <div class="news">
    
       <div class="news_left">
          
          <b class="newstitle"><?php if($news_title_en1 !=""){ echo $news_title_en1;} else{ echo'Company news';} ?></b>
          <a class="newstitle"><?php if($news_title1 !=""){ echo $news_title1;}else{echo '公司新闻';} ?></a>
          <ul>
             <?php $posts = get_posts( "category=($news1)&numberposts=3" ); ?>
    <?php if( $posts ) : ?>  
       <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
          <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
             <li>
             <div>
                <span>
                   <a class="pic" title="<?php the_title(); ?>" <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
				   
				   <?php   $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('somlla-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?>   </a>
                   <em><?php the_time('Y/m/d') ?></em>
                </span>
            
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php echo mb_strimwidth(get_the_title(), 0, 100,"...") ?></a></b>
             <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"..."); ?></p>
             </div>
             </li>
         <?php endforeach; ?>                                            
             <?php else:  endif; ?>    
          
          
          </ul>
       
       </div>
    
    
    
    
  <div class="news_right">
         <b class="newstitle"><?php if($news_title_en2 !=""){ echo $news_title_en2;} else{ echo'job';} ?></b>
          <a class="newstitle"><?php if($news_title2 !=""){ echo $news_title2;}else{echo '招聘职位';} ?></a>
          
          <ul>
          
           <?php  $posts = get_posts( "category=($news2)&numberposts=5" );
                     if( $posts ) :
              $counter = 0;foreach( $posts as $post ) : setup_postdata( $post );$counter++;  ?>  
               <?php if ($counter == 1 && get_query_var('paged') < 2):?>  
                 <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
             <li class="first_news"> 
             <div>
            <span> <?php   $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('defent-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> </span>
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>">
			 <?php echo mb_strimwidth(get_the_title(), 0, 100,"...") ?></a></b>
             <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,150,"..."); ?></p>
             </div>
             </li>
              <?php else : ?> 
               <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
             <li><div>   <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php echo mb_strimwidth(get_the_title(), 0, 100,"...") ?></a></b></div></li>
             
                <?php endif; ?>
               <?php endforeach; ?>                                              
               <?php else : ?>
               <?php endif; ?>
          
          
          </ul>
          
          
  </div>  
    
    
    </div>
 
 
 
 </div>