<?php 
$modle1=get_option('mytheme_modle1');
$modle2=get_option('mytheme_modle2');
$modle3=get_option('mytheme_modle3');
$modle4=get_option('mytheme_modle4');
$modle5=get_option('mytheme_modle5');
$modle6=get_option('mytheme_modle6'); 
$modle7=get_option('mytheme_modle7'); 
$tell = get_option('mytheme_tell');
$language1=get_option('mytheme_language1');
$language2=get_option('mytheme_language2');
$language_link1=get_option('mytheme_language_link1');
$language_link2=get_option('mytheme_language_link2');
?>
<div id="nav_bottom">
   <div class="nav_bottom_in">
         <b class="goto hereis" rel="#pages1" id="top"><?php if($modle1!=""){echo $modle1;}else{echo '顶部区域';}  ?></b>
         <b class="goto" rel="#pages2" id="Service"><?php if($modle2!=""){echo $modle2;}else{echo '服务项目';}  ?></b>
         <b class="goto" rel="#pages3" id="about"><?php if($modle3!=""){echo $modle3;}else{echo '关于我们';}  ?></b>
         <b class="goto" rel="#pages4" id="case"><?php if($modle4!=""){echo $modle4;}else{echo '推荐产品';}  ?></b>
         <b class="goto" rel="#pages5" id="news"><?php if($modle5!=""){echo $modle5;}else{echo '新闻中心';}  ?></b>
         <b class="goto" rel="#pages6" id="band"><?php if($modle6!=""){echo $modle6;}else{echo '合作品牌';}  ?></b>
         <b class="goto" rel="#pages7" id="contact"><?php if($modle7!=""){echo $modle7;}else{echo '联系我们';}  ?></b>
         <span>
            <p><?php if($tell !==""){ echo $tell;}else{echo "联系电话：";} ?></p>
            <p>
               <a target="_blank" href="<?php if($language_link1 !=""){echo $language_link1;}else{echo '#';} ?>">
			   <?php if($language1 !=""){echo $language1;}else{echo '简体中文';} ?>
               </a>/
            
               <a target="_blank" href="<?php if($language_link2 !=""){echo $language_link2;}else{echo '#';} ?>">
			   <?php if($language2 !=""){echo $language2;}else{echo 'English';} ?>
               </a>
               </p>
         
         </span>
   </div>

</div>