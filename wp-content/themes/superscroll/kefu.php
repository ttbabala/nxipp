<div class="kefu">
   <div class="kefu_d" id="top"> <a href="#"></a></div>
  <?php if(get_option('mytheme_kefu_weixin') !==""){ ?>
   <div class="kefu_d" id="weixin">
      <div><img src="<?php echo get_option('mytheme_kefu_weixin'); ?>" /></div>
   </div>
  <?php }; ?>
  
   <?php if(get_option('mytheme_kefu_qq') !==""){ ?>
   <div class="kefu_d" id="kefu_severs">
       <div class="qq_kefu">
      <?php echo stripslashes(get_option('mytheme_kefu_qq')); ?>
       </div>
         
   </div>
   <?php }; ?>
   
   <div class="kefu_d" id="shoucang"><a class="xfbox"   href="javascript:AddFavorite('<?php bloginfo('url'); ?>','<?php echo bloginfo('name'); ?>')" title="收藏本站" id="fav"></a></div>
   <div class="kefu_d" id="homes"><a href="<?php bloginfo('url'); ?>"></a></div>


</div>