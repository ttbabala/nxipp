<div id="footer">
	 <div class="footer_in">   
  
             <?php      
		 $themepark= get_option('mytheme_themepark');
         $icp_b=get_option('mytheme_icp_b'); 
		 $icon_title =get_option('mytheme_icon_title '); 
		 $icon_title_2= get_option('mytheme_icon_title_2'); 
		 $icon1 =get_option('mytheme_icon1'); 
		 $icon2 =get_option('mytheme_icon2'); 
		 $icon3 =get_option('mytheme_icon3'); 
	     $icon4 =get_option('mytheme_icon4'); 
		 $icon5 =get_option('mytheme_icon5'); 
		 $icon6 =get_option('mytheme_icon6'); 
         $icon_url1 =get_option('mytheme_icon_url1'); 
		 $icon_url2 =get_option('mytheme_icon_url2'); 
		 $icon_url3 =get_option('mytheme_icon_url3'); 
		 $icon_url4 =get_option('mytheme_icon_url4'); 
		 $icon_url5 =get_option('mytheme_icon_url5'); 
		 $icon_url6 =get_option('mytheme_icon_url6'); 
		 $icon_tagert1 =get_option('mytheme_icon_tagert1'); 
		 $two_code=get_option('mytheme_two_code');
			 $tell = get_option('mytheme_tell');
					 $email= get_option('mytheme_email');	     
		    ?>
            <div class="footer_hot">
            <b><a  href="tel:<?php echo $tell ; ?>"><?php echo $tell ; ?></a></b>
            <b><a href="mailto:<?php echo $email ; ?>"><?php echo $email ; ?></a></b>
            	
            
            </div>
     
           
     
     
      </div>
      <div class="footer_bottom">
        <div class="footer_bottom_in">
           <?php wp_nav_menu(array('container' => false, 'theme_location' => 'link-menu2','menu_class'=> 'link-menu2' ) ); $word_t2=get_option('mytheme_word_t2');$themepark= get_option('mytheme_themepark'); $icp = get_option('mytheme_icp_b');?>
           <p> <?php if($word_t2!=""){echo $word_t2;}else{echo '版权所有';}  ?> &copy;<?php echo date("Y"); echo " "; bloginfo('name'); 
		   if($icp !=="") {echo ' |   <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">'.$icp.'</a>'; };
		   if($themepark =="") {echo ' |  技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		   else if($themepark =="en") {echo ' |  Theme by ： <a target="_blank" href="http://www.themepark.com.cn">themepark</a>'; }
		    else if($themepark =="cn") {echo ' |  技术支持： <a target="_blank" href="http://www.themepark.com.cn">WEB主题公园</a>'; }
		    echo ' |  '.stripslashes(get_option('mytheme_analytics')); ?> </p>
        </div>
      </div>
     	
</div>



	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
</body>

</html>
