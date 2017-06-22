                    <?php
                     $pic1=get_option('mytheme_pic1'); 
					 $pic_png1=get_option('mytheme_pic_png1'); 
					 $pic_title1=get_option('mytheme_pic_title1'); 
					 $pic_content1=get_option('mytheme_pic_content1'); 
					 $pic_link1=get_option('mytheme_pic_link1'); 
					 $pic_taget1=get_option('mytheme_pic_taget1');  
					  $pic2=get_option('mytheme_pic2'); 
					 $pic_png2=get_option('mytheme_pic_png2'); 
					 $pic_title2=get_option('mytheme_pic_title2'); 
					 $pic_content2=get_option('mytheme_pic_content2'); 
					 $pic_link2=get_option('mytheme_pic_link2'); 
					 $pic_taget2=get_option('mytheme_pic_taget2');  
					 
					   $pic3=get_option('mytheme_pic3'); 
					 $pic_png3=get_option('mytheme_pic_png3'); 
					 $pic_title3=get_option('mytheme_pic_title3'); 
					 $pic_content3=get_option('mytheme_pic_content3'); 
					 $pic_link3=get_option('mytheme_pic_link3'); 
					 $pic_taget3=get_option('mytheme_pic_taget3');  
					 
					 $pic4=get_option('mytheme_pic4'); 
					 $pic_png4=get_option('mytheme_pic_png4'); 
					 $pic_title4=get_option('mytheme_pic_title4'); 
					 $pic_content4=get_option('mytheme_pic_content4'); 
					 $pic_link4=get_option('mytheme_pic_link4'); 
					 $pic_taget4=get_option('mytheme_pic_taget4'); 
					 ?>

  <div id="pages1" class="page">
 <div id="pic">
 <ul>
<?php if ($pic1 !=""){ ?>
    <li><a <?php echo $pic_taget1; ?> style="background: center url(<?php echo  $pic1;?>)"  href="<?php echo $pic_link1; ?>"  > 
          <div class="pic_in"> 
          <?php if($pic_png1){ ?><div class="png_pic" id="rightpictext"><img src="<?php echo  $pic_png1;?>"/></div><?php  }?>
             <?php if($pic_title1){ ?>  <b><?php echo $pic_title1; ?></b>
               <p> <?php echo  $pic_content1;?></p>
<span> <?php  if($word_t1!=""){echo $word_t1;}else{echo '查看详细>>';}  ?>  </span><?php  }?>
          </div>
         </a>
    </li>
 <?php }; ?>          
   
    
    <?php   if ($pic2 !=""){  ?>   
              <li><a <?php echo $pic_taget2; ?> style="background: center url(<?php echo  $pic2;?>)"  href="<?php echo $pic_link2; ?>"  > 
          <div class="pic_in"> 
            <?php if($pic_png2){ ?> <div class="png_pic" id="rightpictext"><img src="<?php echo  $pic_png2;?>"/></div><?php  }?>
            <?php if($pic_title2){ ?>     <b><?php echo $pic_title2; ?></b>
               <p> <?php echo  $pic_content2;?></p>
<span> <?php  if($word_t2!=""){echo $word_t2;}else{echo '查看详细>>';}  ?>  </span><?php  }?>
          </div>
         </a>
    </li>
    
    <?php  } ;if ($pic3 !=""){  ?>   
              <li><a <?php echo $pic_taget3; ?> style="background: center url(<?php echo  $pic3;?>)"  href="<?php echo $pic_link3; ?>"  > 
          <div class="pic_in"> 
          <?php if($pic_png3) {?>   <div class="png_pic" id="rightpictext"><img src="<?php echo  $pic_png3;?>"/></div><?php  }?>
               <?php if($pic_title3){ ?>   <b><?php echo $pic_title3; ?></b>
               <p> <?php echo  $pic_content3;?></p>
<span> <?php  if($word_t3!=""){echo $word_t3;}else{echo '查看详细>>';}  ?>  </span><?php  }?>
          </div>
         </a>
    </li>
    
    <?php  }if ($pic4 !=""){  ?>   
              <li><a <?php echo $pic_taget4; ?> style="background: center url(<?php echo  $pic4;?>)"  href="<?php echo $pic_link4; ?>"  > 
          <div class="pic_in"> 
            <?php if($pic_png4){ ?> <div class="png_pic" id="rightpictext"><img src="<?php echo  $pic_png4;?>"/></div><?php  }?>
              <?php if($pic_title4){ ?>    <b><?php echo $pic_title4; ?></b>
               <p> <?php echo  $pic_content4;?></p>
<span> <?php  if($word_t4!=""){echo $word_t4;}else{echo '查看详细>>';}  ?>  </span><?php  }?>
          </div>
         </a>
    </li>
    
    <?php  } ; ?>     
    
                    
                
 
 </ul>



<a class="prve"></a>
<a class="next"></a>
</div>
<?php if ($pic1 !=""){ ?>
<script>
$(function() {
$("#pic").jCarouselLite({
btnNext: "#pic .next",
btnPrev: "#pic .prve",
speed:2000,//滚动动画的时间
auto:4000,//滚动间隔时间
visible:1,
onMouse:true,
start:0,
easing: "easeInOutBack",
beforeStart: function(a) {$(".pic_in b").animate({"left":"400px",opacity:0},400,'easeInOutBack');
	                       $(".pic_in p").animate({"left":"400px",opacity:0},800,'easeInOutBack');
							    $(".pic_in span").animate({"left":"400px",opacity:0},1200,'easeInOutBack'); 
						  
							    $(".png_pic").animate({"bottom":"-300px",opacity:0},1000,'easeInOutBack'); 
							       
						  },

afterEnd: function(a) {$(".pic_in b").animate({"left":"0px",opacity:1},600,'easeInOutBack');
	                       $(".pic_in p").animate({"left":"0px",opacity:1},800,'easeInOutBack');
							    $(".pic_in span").animate({"left":"0px",opacity:1},1200,'easeInOutBack');	      
						 
								   $(".png_pic").animate({"bottom":"0px",opacity:1},2000,'easeInOutBack'); 
						  },
});
});

</script>
<?php }; ?>
 <?php
	                 $wenzi_title1=get_option('mytheme_wenzi_title1'); 
					 $wenzi_contnt1=get_option('mytheme_wenzi_contnt1'); 
					 $wenzi_link1=get_option('mytheme_wenzi_link1'); 
					 
					  $wenzi_title2=get_option('mytheme_wenzi_title2'); 
					 $wenzi_contnt2=get_option('mytheme_wenzi_contnt2'); 
					 $wenzi_link2=get_option('mytheme_wenzi_link2'); 
					 
					 $wenzi_title3=get_option('mytheme_wenzi_title3'); 
					 $wenzi_contnt3=get_option('mytheme_wenzi_contnt3'); 
					 $wenzi_link3=get_option('mytheme_wenzi_link3'); 
	 ?>
    <div class="gonggao">
       
             <a href="<?php echo $wenzi_link1; ?>" class="steti">
               <b><?php echo $wenzi_title1 ; ?></b>
               <p><?php echo $wenzi_contnt1 ?></p>
             
             </a>
            
            <a href="<?php echo $wenzi_link2; ?>" class="steti">
               <b><?php echo $wenzi_title2 ; ?></b>
               <p><?php echo $wenzi_contnt2 ?></p>
             
             </a>
              <a href="<?php echo $wenzi_link3; ?>" class="steti">
               <b><?php echo $wenzi_title3 ; ?></b>
               <p><?php echo $wenzi_contnt3 ?></p>
             
             </a>
      </div>

</div>

      
