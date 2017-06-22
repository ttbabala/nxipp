<div id="contact">
   <div id="contact_in">
       <span>
         <b class="tell"><?php echo get_option('mytheme_tell');  ?></b>
         <b class="mail"><?php echo get_option('mytheme_email');  ?></b>
       </span>
       <?php $word_t24=get_option('mytheme_word_t24');
			$word_t25=get_option('mytheme_word_t25'); ?>
     <div class="btm_contact">
        <p><?php if($word_t25!=""){echo $word_t25;}else{echo '请在工作日时间拜访和电话联系,工作时间：9:30am ~ 6:00 pm';}  ?></p>
        <a> <?php if($word_t24!=""){echo $word_t24;}else{echo '马上联系我们';}  ?></a>
     </div>
   
   </div>

</div>