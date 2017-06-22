<div class="swiper-container">
    <div class="swiper-wrapper">
    <?php    
	  $pic_move1=get_option('mytheme_pic_move1');
	  $pic_move2=get_option('mytheme_pic_move2');
	  $pic_move3=get_option('mytheme_pic_move3');
	  $pic_move4=get_option('mytheme_pic_move4'); 
	  $pic_link1=get_option('mytheme_pic_link1'); 
	  $pic_taget1=get_option('mytheme_pic_taget1');  
	  $pic_link2=get_option('mytheme_pic_link2'); 
	  $pic_taget2=get_option('mytheme_pic_taget2'); 
	  $pic_link3=get_option('mytheme_pic_link3'); 
	  $pic_taget3=get_option('mytheme_pic_taget3'); 
	  $pic_link4=get_option('mytheme_pic_link4'); 
	  $pic_taget4=get_option('mytheme_pic_taget4'); 
	  ?>
               
     
    <?php if($pic_move1 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_link1?>" <?php echo  stripslashes($pic_taget1); ?> ><img id="phone_pic" src="<?php echo $pic_move1 ?>"/> </a> </div><?php };?>
    <?php if($pic_move2 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_link2?>" <?php echo  stripslashes($pic_taget2); ?> ><img id="phone_pic" src="<?php echo $pic_move2 ?>"/></a>  </div><?php };?>    
    <?php if($pic_move3 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_link3?>" <?php echo  stripslashes($pic_taget3); ?> ><img id="phone_pic" src="<?php echo $pic_move3 ?>"/> </a> </div><?php };?>
    <?php if($pic_move4 !=""){?> <div class="swiper-slide"><a href="<?php  echo $pic_link4?>" <?php echo  stripslashes($pic_taget4); ?> > <img id="phone_pic" src="<?php echo $pic_move4 ?>"/> </a> </div><?php };?> 
    
     
 </div>
    <div class="pagination"></div>
  </div>

	<script>
  var mySwiper = new Swiper('.swiper-container',{
      pagination: '.pagination',
    paginationClickable: true,
	calculateHeight:true
  })
  </script>




