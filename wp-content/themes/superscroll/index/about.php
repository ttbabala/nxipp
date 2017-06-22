   <?php  
					        $about=get_option('mytheme_about');
						    $about_title=get_option('mytheme_about_title');
							$about_en=get_option('mytheme_about_en');
							$about_pic=get_option('mytheme_about_pic');	
							$about_pic2=get_option('mytheme_about_pic2');	
						    $page_data = get_page($about);		
						    $excerpt =$page_data->post_excerpt;
							$word_t26=get_option('mytheme_word_t26');
			                $word_t27=get_option('mytheme_word_t27');
			       
			 ?>
   
  <div id="pages3" class="page" <?php if($about_pic2 !=""){ echo 'style=" background:center url('. $about_pic2.')"'; }?>>
    
      <div class="about">
      
          <div class="about_in"> 
          <b><?php if($about_en ==""){echo "about us";}else{echo $about_en;} ?></b>
          <em><?php if($about_title ==""){echo "关于我们";}else{echo $about_title;} ?></em>
           <p><?php    echo   mb_strimwidth(strip_tags($excerpt),  0,436,"...");?></p>
         <a href="<?php echo get_page_link( $about ); ?>">Learn more</a>
          
          
          <div class="vedio">
            <div class="diandian"> <span><li><?php if($word_t26!=""){echo $word_t26;}else{echo '播放视频';}  ?></li></span></div>
          <img src="<?php if($about_pic ==""){echo  get_bloginfo('template_url').'/images/images/vedio.jpg';}else{echo $about_pic;};?>" />
          </div>
          <div class="play">
          <div class="closed"><?php if($word_t27!=""){echo $word_t27;}else{echo '关闭视频';}  ?></div>
          <?php if(get_option('mytheme_video') !=""){ echo stripslashes(get_option('mytheme_video'));}else{ ?>
          <embed src="http://player.youku.com/player.php/Type/Folder/Fid/21271008/Ob/1/sid/XNzE0MzkwMjgw/v.swf" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
          <?php }; ?>
          </div>
          
          </div>
      
      </div>
 
  <div class="about_in"> 
     <div class="shadow_1"></div>
  
  </div>
 
 
 </div>
