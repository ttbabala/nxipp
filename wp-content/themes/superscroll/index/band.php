      <?php  
					        $band=get_option('mytheme_band');
						    $band_title=get_option('mytheme_band_title');
							$band_en=get_option('mytheme_band_en');
							$page_data = get_page($band);		
						    $excerpt =$page_data->post_excerpt;
							$band_pic=get_option('mytheme_band_pic');			
			 ?>
 <div id="pages6" class="page"<?php if($band_pic !=""){ echo 'style=" background:center  url('. $band_pic.')"'; }?>> 
       
    <div class="band">
         <div class="band_in">
             <b><?php if($band_en!=""){echo $band_en;}else {echo 'Our Clients';} ?></b>
             <a><?php if($band_title!=""){echo $band_title;}else {echo '合作客户';} ?></a>
             <p> <?php    echo  $excerpt;?></p>
          </div>
       
    </div>
    
    <div class="band_logo">
      <div class="band_logo_out">
       <div class="band_logo_in">
       
	
		<?php
	
                             $content = $page_data->post_content;
                             preg_match('/\[gallery.*ids=.(.*).\]/',  $content , $ids);
                             $array_id = $ids;
                             foreach($array_id  as $array_id ){
								
                             }
							 echo do_shortcode("[gallery ids=". $array_id ."]"); 
							
							
		?> 
		
		
          </div>
             <span class="prve"> </span>
<span class="next"> </span>  
          <script>
$(function() {
$(".band_logo_in").jCarouselLite({
btnNext: ".band_logo  .next",
btnPrev: ".band_logo .prve",
auto:3000,
speed:1000,
visible:5,
onMouse:true,
easing: "easeOutBack"
});
});


</script>   
 
    </div>

 </div>
 </div>