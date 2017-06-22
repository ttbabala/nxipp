  <?php   
					 $contact_title= get_option('mytheme_contact_title');
					 $contact_title_2= get_option('mytheme_contact_title_2');
					 $tell = get_option('mytheme_tell');
					 $email= get_option('mytheme_email');
					 $fax =get_option('mytheme_fax');
					$address=get_option('mytheme_address');
					$icp_b=get_option('mytheme_icp_b');
					$two_code_title=get_option('mytheme_two_code_title');
					$two_code=get_option('mytheme_two_code');
					 $maps=get_option('mytheme_maps');
					 $maps_link=get_option('mytheme_maps_link');
					  $message_title= get_option('mytheme_message_title');
					 $message_title_2= get_option('mytheme_message_title_2'); 
					  $themepark= get_option('mytheme_themepark');
					  $contact_beijing= get_option('mytheme_contact_beijing');
					  
		               ?>
 <div id="pages7" class="page" <?php if($contact_beijing !=""){ echo 'style=" background:center url('. $contact_beijing.')"'; }?>>
 
    <div class="contact">
         <div class="contact_left">
           <span class="ditusss">
           <a href="<?php echo $maps_link; ?>" target="_blank" rel="nofollow">如何到达</a>
           <img src="<?php if($maps !=""){echo $maps;}else{ echo  get_bloginfo('template_url').'/images/contact_45.jpg';}?>" />
           </span>
           <div class="wenzi">
           <b><?php echo $contact_title; ?></b>
           <a><?php echo $contact_title_2; ?></a>
           <p><?php echo $tell; ?></p>  
           <p><?php echo $fax; ?></p> 
           <p><?php echo $address; ?></p>  
           <p><?php echo $email; ?></p>
           <em><?php if($two_code_title!=""){echo $two_code_title;}else {echo '扫描二维码关注官方微信';} ?></em>    
           <img src="<?php if($two_code !=""){echo $two_code;}else{ echo  get_bloginfo('template_url').'/images/weixin.gif';};?>" />
           </div>
            <p> <?php if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; bloginfo('name'); 
		   if($icp_b !=="") {echo ' |   <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp_b.'</a>'; };
		   if($themepark =="") {echo ' |  技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		   else if($themepark =="en") {echo ' |  Theme by ： <a target="_blank" href="http://www.themepark.com.cn">themepark</a>'; }
		    echo ' |  '.stripslashes(get_option('mytheme_analytics')); ?> </p>
         </div>
         
          <div class="contact_right">
           <b><?php if($message_title!=""){echo $message_title;}else {echo 'Leave a message';} ?></b>
           <a><?php if($message_title_2!=""){echo $message_title_2;}else {echo '在线留言';} ?></a>
         <?php get_template_part( 'index/Contac_form' ); ?>
         
          </div>
           <div class="link">
         <?php wp_nav_menu(array( 'theme_location' => 'link-menu2','menu_class'=> 'link-menu2' ) ); ?> 
    
    </div>
    
    </div>
  
 
 
 </div>