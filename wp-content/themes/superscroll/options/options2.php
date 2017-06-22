<?php   $top_pic=get_option('mytheme_top_pic'); 
        $news_pics=get_option('mytheme_news_pics');
		$modle1=get_option('mytheme_modle1');
$modle2=get_option('mytheme_modle2');
$modle3=get_option('mytheme_modle3');
$modle4=get_option('mytheme_modle4');
$modle5=get_option('mytheme_modle5');
$modle6=get_option('mytheme_modle6'); 
$modle7=get_option('mytheme_modle7'); 

?>
<div class="xiaot">
 <b class="bt">首页布局</b><br />
 <p>由于首页的动画效果非常多，暂时不能做首页的自定义布局，在以后的版本会增加这个功能，敬请期待！下面请填写首页各个模块的名称，他们会显示在首页底部的导航，请精简词汇不要填写过的文字：</p>
 
  <p> <label  for="modle1">第一模块：</label> 
      <input type="text" size="20"  name="modle1" id="modle1" value="<?php if($modle1!=""){echo $modle1;}else{echo '顶部区域';}  ?>"/  />       
   </p> 
   
   <p> <label  for="modle2">第二模块：</label> 
      <input type="text" size="20"  name="modle2" id="modle2" value="<?php if($modle2!=""){echo $modle2;}else{echo '服务项目';}  ?>"/  />       
   </p>
   <p> <label  for="modle3">第三模块：</label> 
      <input type="text" size="20"  name="modle3" id="modle3" value="<?php if($modle3!=""){echo $modle3;}else{echo '关于我们';}  ?>"/  />       
   </p>
   <p> <label  for="modle4">第四模块：</label> 
      <input type="text" size="20"  name="modle4" id="modle4" value="<?php if($modle4!=""){echo $modle4;}else{echo '推荐产品';}  ?>"/  />       
   </p>
   <p> <label  for="modle5">第五模块：</label> 
      <input type="text" size="20"  name="modle5" id="modle5" value="<?php if($modle5!=""){echo $modle5;}else{echo '新闻中心';}  ?>"/  />       
   </p>
   <p> <label  for="modle6">第六模块：</label> 
      <input type="text" size="20"  name="modle6" id="modle6" value="<?php if($modle6!=""){echo $modle6;}else{echo '合作品牌';}  ?>"/  />       
   </p>
   
   <p> <label  for="modle7">第七模块：</label> 
      <input type="text" size="20"  name="modle7" id="modle7" value="<?php if($modle7!=""){echo $modle7;}else{echo '联系我们';}  ?>"/  />       
   </p>
 
</div>

  <div class="xiaot">
                     <b class="bt">模板微调</b><br />
                    <p>这里你可以设定各个页面、分类目录的显示数量、顶部图片</p>
                 
  </div>
            
            <div class="xiaot">
            <p>内页（页面、分类目录、文章页）的顶部图片设定，顶部图片这里统一为一张图片，这样做可以减少请求，让网站速度更快，并且看起来网站风格比较统一</p>
            <div class="up">
            <label  for="about_pic">背景图片(尺寸：1920*157)</label> 
              <input type="text" size="60"  name="top_pic" id="top_pic" value="<?php echo get_option('mytheme_top_pic'); ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div> 
            
             <div class="up">
               <p>纯文字列表模板顶部有一张图片，你可以在这里替换他，也可以不设定而保留原始设定</p>
            <label  for="news_pics">图片上传（尺寸：650X142）</label> 
              <input type="text" size="58"  name="news_pics" id="news_pics" value="<?php echo $news_pics; ?>"/>   
              <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
            </div>   
            </div>  
             <?php
		    $list_nmber1=get_option('mytheme_list_nmber1');
			$list_nmber2=get_option('mytheme_list_nmber2');
			$list_nmber3=get_option('mytheme_list_nmber3');
			$list_nmber4=get_option('mytheme_list_nmber4');
			$list_nmber5=get_option('mytheme_list_nmber5');
			
			$list_nmber_k1=get_option('mytheme_list_nmber_k1');
			$list_nmber_k2=get_option('mytheme_list_nmber_k2');
			$list_nmber_k3=get_option('mytheme_list_nmber_k3');
			$list_nmber_k4=get_option('mytheme_list_nmber_k4');
			$list_nmber_k5=get_option('mytheme_list_nmber_k5');
			

		    ?>    
                      
              <div class="xiaot">
            <p>显示文章数量自定义，在设定分类目录的列表页现实的数量时，记得要把默认的WordPress数量设为1，否则会出现404错误，设置方法请在 “设置” -- “阅读”中 ，将现实的文章数量设为1，即可。</p>
              <p> <label  for="list_nmber1">纯文字列表模板：</label> 
                <input type="text" size="20"  name="list_nmber1" id="list_nmber1" value="<?php if($list_nmber1!=""){echo $list_nmber1;}else{echo '12';}  ?>"/  /> 
                
                    
              </p>  
              
               <p> <label  for="list_nmber2">默认模板（小图片加上文字）：</label> 
                <input type="text" size="20"  name="list_nmber2" id="list_nmber2" value="<?php if($list_nmber2!=""){echo $list_nmber2;}else{echo '12';}  ?>"/  />
                
                      
              </p> 
              
               <p> <label  for="list_nmber3">大图文列表：</label> 
                <input type="text" size="20"  name="list_nmber3" id="list_nmber3" value="<?php if($list_nmber3!=""){echo $list_nmber3;}else{echo '12';}  ?>"/  />  
                 
              </p> 
              
               <p> <label  for="list_nmber4">图片列表(大)：</label> 
                <input type="text" size="20"  name="list_nmber4" id="list_nmber4" value="<?php if($list_nmber4!=""){echo $list_nmber4;}else{echo '12';}  ?>"/  /> 
                      
              </p> 
              
               <p> <label  for="list_nmber5">图片列表（小）：</label> 
                <input type="text" size="20"  name="list_nmber5" id="list_nmber5" value="<?php if($list_nmber5!=""){echo $list_nmber5;}else{echo '12';}  ?>"/  />   
                
                  <p> <label  for="list_nmber6">图片列表（全屏）：</label> 
                <input type="text" size="20"  name="list_nmber6" id="list_nmber6" value="<?php if($list_nmber6!=""){echo $list_nmber6;}else{echo '12';}  ?>"/  />    
              
              </p> 
            </div>          
             