

<div id="right_news">
   <div class="video">
   <?php if(get_option('mytheme_video') !=""){echo stripslashes(get_option('mytheme_video'));}else { ?>
   <iframe height=498 width=510 src="http://player.youku.com/embed/XNjg5ODI4MzY0" frameborder=0 allowfullscreen></iframe>
   <?php }; ?>
   
   </div>
   </div>
   
    <?php             $news1= get_option('mytheme_news1');
                 
                     $category1 = get_category($news1);
				
		    ?>

<div id="left_news">
    <div class="left_news_hd">
       
        <a id="cs1" class="inopen"><?php echo $category1->name; ?></a>
     
      </div>
      
      <ul class="news_loop_02 show" id="ss1">
          
             <?php  $posts = get_posts( "category=($news1)&numberposts=10" );
                     if( $posts ) :
              foreach( $posts as $post ) : setup_postdata( $post ); ?>  
             
         
            <li id="fistnopic">
         
              <span>
             <b><a href="<?php the_permalink() ?>"> <?php echo mb_strimwidth(get_the_title(), 0, 45,"...") ?></a> </b>
            

             </span>
           </li>

           
           
               <?php endforeach; ?>                                              
               <?php else : ?>
               <?php endif; ?>
  
      
      
      </ul>
      
    </div>
