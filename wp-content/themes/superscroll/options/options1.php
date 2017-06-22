<div class="xiaot">
    <input type="checkbox" value="shop_ok" name="theme_shop_open" id="theme_shop_open" <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){echo "checked='checked'";} ?> />
    <label for="theme_shop_open">开启兼容购物盒子插件</label>
    <p>开启购物盒子插件之后，首页调用文章模块中如果文章启用了插件中的是商品模式，会显示价格、原价、包邮等信息。分类目录中的《大图文列表》《图片列表》以及内页《产品展示模板（一栏模式以及默认模式）》均会显示商品信息，内页模板点击购买按钮会出现提交订单表单和商品评分和评价模块。 <br />
购物盒子（shoppingbox）是WEB主题公园开发的一款能够支持在线付款的插件，本主题已经优化兼容，详情请见购物盒子的使用教程：<a target="_blank" href="http://www.themepark.com.cn/shoppingbox-WordPress-plugins">点击弹出查看</a><br />
<strong>请第一次使用这个插件的用户参考教程设置，购物盒子自带前端用户注册、登录和个人中心，需要初始化手动设置之后才能生效。</strong></p>
<p><strong>注意，现在分类目录模板的“图片列表（大图一栏）”和“大图文列表”支持商品模式！ 内页的两个产品模板支持商品模式！</strong></p>
 <b class="bt">社区内页模板选择</b>
               <p>开启社区功能之后，默认是内页模板《默认模板》你可以在这里选择全屏一栏模板</p>
              <?php $bbs_mo =get_option('mytheme_bbs_mo') ?>
              <p>
            <label  for="bbs_mo ">是否显示多重筛选:</label>
                  <select name="bbs_mo" id="bbs_mo">
                   <option value=''<?php if ( $bbs_mo ==="" ) {echo "selected='selected'";}?>>默认模板</option>
                    <option value='none'<?php if ( $bbs_mo ==="none" ) {echo "selected='selected'";}?>>一栏模板</option>
	             </select>  
 
 </div>
 
   <div class="xiaot">
                     <b class="bt">内页布局替换</b><br />
                    <p>你可以调换内页布局左右的位置</p>
                      <?php $left_right =get_option('mytheme_left_right');echo $left_right; ?>
                    <label  for="left_right ">布局调整:</label>
                  <select name="left_right" id="left_right">
                   <option value=''<?php if ( $left_right ==="" ) {echo "selected='selected'";}?>>默认（右边显示主要内容）</option>
                    <option value='yes'<?php if ( $left_right ==="yes" ) {echo "selected='selected'";}?>>对调（左边显示主要内容）</option>
	             </select>  
                 
  </div>

 <div class="xiaot">
 
              <b class="bt">多重筛选模块功能控制</b>
               <p>多重筛选模块，添加了这个模块请在菜单的“<strong>搜索菜单（搜索和标签页面显示）</strong>”中按照要求建立好菜单，教程请看：<a target="_blank" href="http://www.themepark.com.cn/wordpressdzsxgnjs.html">WEB主题公园多筛选功能教程</a></p>
              <?php $list_nmber_nav =get_option('mytheme_list_nmber_nav') ?>
              <p>
            <label  for="list_nmber_nav ">是否显示多重筛选:</label>
                  <select name="list_nmber_nav" id="list_nmber_nav">
                   <option value=''<?php if ( $list_nmber_nav ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='none'<?php if ( $list_nmber_nav ==="none" ) {echo "selected='selected'";}?>>不显示</option>
	             </select>  
</p>

<p>多重筛选结果模板选择<strong>[小贴士：可以进行多重筛选的分类目录最好统一使用一个分类目录模板，并且你可以在下方指定多重筛选结果模板，将这些需要进行多重筛选的页面统一模板，这样多重筛选将会更加统一规范，给用户带来更加专业的感受！]</strong></p>
<p><?php $tags_m= get_option('mytheme_tags_m');  ?>  
 <label  for="tags_m">多重筛选结果模板选择（搜索结果和标签结果显示模式）:</label>
                  <select name="tags_m" id="tags_m">
                   <option value=''<?php if ( $tags_m ==="" ) {echo "selected='selected'";}?>>默认模板</option>
                    <option value='category-pic_001_full'<?php if ( $tags_m ==="category-pic_001_full" ) {echo "selected='selected'";}?>>图片列表（大图一栏）</option>
                    <option value='category-pic_text'<?php if ( $tags_m ==="category-pic_text" ) {echo "selected='selected'";}?>>大图文列表</option>
                 
                       <option value='category-text'<?php if ( $tags_m ==="category-text" ) {echo "selected='selected'";}?>>纯文字列表</option>
	             </select>  

</p>
              
              </div>
              
               <div class="xiaot">
                      <b class="bt">选择色系</b><br />
                      <p>这款主题提供了4种颜色可选，请选择颜色</p>
                  <?php $theme_color= get_option('mytheme_theme_color');  ?>   
               </select>
    
    
                  <label  for="theme_color ">是否连接到文章:</label>
                  <select name="theme_color" id="theme_color">
	     
          <option value=''<?php if ( $theme_color ==="" ) {echo "selected='selected'";}?>>绿色（默认）</option>
          <option value='/css/red.css'<?php if ( $theme_color ==="/css/red.css" ) {echo "selected='selected'";}?>>橙色</option>
           <option value='/css/purple.css'<?php if ( $theme_color ==="/css/purple.css" ) {echo "selected='selected'";}?>>蓝色</option>
           <option value='/css/cafe.css'<?php if ( $theme_color ==="/css/cafe.css" ) {echo "selected='selected'";}?>>咖啡色</option>
		
	</select>
    
               </div>
               
                <div class="up">
                 
                     
                    <b class="bt">ICO图标上传</b>
                    <input type="text" size="80"  name="ico" id="ico" value="<?php echo get_option('mytheme_ico'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p><a href="http://www.themepark.com.cn/icotpssmrhzzicowj.html" target="_blank">ico是什么？ico图片制作教程</a></p>
                </div>       
                
                
                
				<div class="up">
                  <b class="bt">LOGO的图片地址</b>
                     <div class="yulan">
                  <?php if (get_option('mytheme_logo')!=""): ?>
                    <img title="logo预览" src="<?php echo get_option('mytheme_logo'); ?>"alt="logo预览" /> 
                 <?php else : ?>
                    <img title="上传图片，这里可以预览" src="<?php bloginfo('template_url'); ?>/images/xuanxiang/yulan2.gif"alt="上传图片，这里可以预览"/>
                    <?php endif; ?>  
                    
                     </div>
                    <input type="text" size="80"  name="logo" id="logo" value="<?php echo get_option('mytheme_logo'); ?>"/>   
                    <input type="button" name="upload_button" value="上传" id="upbottom"/>   
                    <p>请上传logo图片，图片格式为PNG,或者带有深色底色的jpg和gif均可（ 高度为100px，宽度自定，宽度请勿上传太大，以防止导航位置不够。）</p>
                </div>    
                
                
                
              <?php include_once("pic.php"); ?>
                
                
                
                	
                
            
              <div class="xiaot">
                      <b class="bt">首页模块调用数据选项</b><br />
                      <p><strong style="color:#F00;">请注意</strong>：你建立了一些分类和页面，想要他们调用在首页上，程序傻傻分不清楚，所以你要手动选择一下，在选择之前，一定要记得建立好分类和页面哦！<strong>小提示：在此处指定好分类，程序就会知道调用那些分类的文章去这些模块，你可以再布局设置中设置他们的位置，如果不需要某些模块，这里的分类可以不需要选择</strong>你可以点击这里对照演示主题的样式：<a  target="_blank" href="http://www.themepark.com.cn/demo/?themedemo=simplepark-yanshi">首页演示</a></p>
                    
                      </p>
                        </div>
                  
                  
                  <div class="xiaot">
                     <b class="bt">服务项目模块设定</b><br />
                       
                    <p>请按照提示，选择一个分类目录，这将会调用在首页上的“服务项目模块”，你至少需要增加6篇文章（必须设置特色图片），这样“服务项目的这个模块就能正确的显示在首页上，你也可以使用文章编辑内的自定义url选项自定义这些图文显示模块的链接地址。”</p>
                    <?php 
	                 $service=get_option('mytheme_service'); 
					 $service_title=get_option('mytheme_service_title'); 
					 $service_title_en=get_option('mytheme_service_title_en'); 
					 $service_content=get_option('mytheme_service_content'); 
					?>

              <label  for="service">请选择分类目录:</label>
                  <select name="service" id="service">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $service== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select><br /><br />

      <label  for="service_title">中文标题:</label>
     <input type="text" size="80"  name="service_title" id="service_title" value="<?php if($service_title !=""){ echo $service_title;}else{echo '我们所提供的服务';} ?>"/> <br /><br />
     <label  for="service_title_en">英文标题:</label>
     <input type="text" size="80"  name="service_title_en" id="service_title_en" value="<?php if($service_title_en !=""){ echo $service_title_en;} else{ echo'Service Items';} ?>"/> <br /><br />
      
     <label  for="service_content">描述文字:</label>
     <textarea name="service_content" cols="86" rows="3" id="service_content"><?php if($service_content !=""){ echo $service_content;} else{ echo "追求完美品质是我们的目标，超轻量级绚丽动画，兼容性强大，为你打造令人过目难忘的网站效果，给您带来更多客户！";} ?></textarea>    <br /><br />
    </div>
                  
                  
                      
  
            <div class="xiaot">
                     <b class="bt">关于我们</b><br />
                    
                    <p>这个模块可以调用一个页面的链接和内容，作为企业介绍等内容，需要你在下面选择一个页面发送到首页上，并且支持上传一个视频，视频需要你上传一张略缩图，这样会让动画更加流畅，加载更快！</p>
                    
                    <?php  
					        $about=get_option('mytheme_about');
						    $about_title=get_option('mytheme_about_title');
							$about_en=get_option('mytheme_about_en');
							$about_pic=get_option('mytheme_about_pic');
							$about_pic2=get_option('mytheme_about_pic2');
						
							
			       
			 ?>
              <label  for="team">请选择页面:</label>
                 <select name="about" id="about">
	            <option value=''>请选择</option>
		<?php 
		 $pages = get_pages();
		 $about= get_option('mytheme_about');
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		  	$about_pic2=get_option('mytheme_about_pic2');
		?>
      
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $about == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $page_name; ?></option>
		<?php } ?>
	</select>
     <p>标题：<br />
              <label  for="about_title">中文：</label>        
            <input type="text" size="40"  name="about_title" id="about_title" value="<?php if($about_title!=""){echo $about_title;}else {echo '+关于我们';} ?>"/> <br />
            <label  for="about_en">英文：</label>        
           <input type="text" size="40"  name="about_en" id="about_en" value="<?php if($about_en!=""){echo $about_en;}else {echo 'what we ca do for you';} ?>"/> 
             
             </p>
         <div class="up">
              <p>背景图片上传，图片尺寸为1920X1080(请尽量压缩图片至最小，100KB左右最佳)<a target="_blank" href="http://www.themepark.com.cn/sqzykflhdwtxw.html">如何压缩图片？点击查看教程</a></p>
           <input type="text" size="60"  name="about_pic2" id="about_pic2" value="<?php echo $about_pic2 ; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/>   
        </div>      
       
              <div class="up">
              <p>视频略缩图图上传，图片的尺寸为411*417 （像素）</p>
           <input type="text" size="60"  name="about_pic" id="about_pic" value="<?php echo $about_pic; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/>   
        </div>  
        
          <p>视频[视频请复制优酷等通用视频代码粘贴在此，此处也支持html代码]</p>
            <textarea name="video" cols="86" rows="4" id="video"><?php echo stripslashes(get_option('mytheme_video')); ?></textarea>    
                      </div>
     
      
      
               
                      
                       <div class="xiaot">
                     <b class="bt">产品展示（图片滑块）</b><br />
                     
                     <p>产品展示可以调用1个滑动展示的最新产品,你可以在这里指定他们的分类。</p>
             <?php  

			         $case1=get_option('mytheme_case1'); 
					 $case_title=get_option('mytheme_case_title'); 
					 $case_content=get_option('mytheme_case_content'); 
					  $case_pic=get_option('mytheme_case_pic'); 
				  
			 ?>	

      <label  for="case1">选择分类目录以3张大图轮播形式</label>
                  <select name="case1" id="case1">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));

		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $case1== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select><br />

 
            <label  for="case_title">标题:</label>
     <input type="text" size="80"  name="case_title" id="case_title" value="<?php if($case_title !=""){ echo $case_title;}else{echo '最新推荐产品';} ?>"/> <br /><br />
     <label  for="case_content">副标题:</label>
     <input type="text" size="80"  name="case_content" id="case_content" value="<?php if($case_content !=""){ echo $case_content;} else{ echo'查看我们的产品，以便了解我们的实力';} ?>"/> <br /><br />
         
        <div class="up">
              <p>背景图片上传，图片尺寸为1920X1080(请尽量压缩图片至最小，100KB左右最佳)<a target="_blank" href="http://www.themepark.com.cn/sqzykflhdwtxw.html">如何压缩图片？点击查看教程</a></p>
           <input type="text" size="60"  name="case_pic" id="case_pic" value="<?php echo $case_pic ; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/>   
        </div>     
         
                      </div>    
            
        <div class="xiaot">
                     <b class="bt">新闻模块（两栏模块）</b><br />
                     
                     <p>新闻中心可以调用2个分类目录的最新文章最为首页显示</p>
             <?php  

			         $news1=get_option('mytheme_news1'); 
					 $news2=get_option('mytheme_news2'); 
					 $news_title1=get_option('mytheme_news_title1'); 
					 $news_title2=get_option('mytheme_news_title2'); 
					 $news_title_en1=get_option('mytheme_news_title_en1'); 
					 $news_title_en2=get_option('mytheme_news_title_en2'); 
				  
			 ?>	

      <label  for="news1">选择分类目录(左边新闻模块)</label>
                  <select name="news1" id="news1">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));

		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $news1== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select><br />

 
            <label  for="news_title1">中文标题:</label>
     <input type="text" size="80"  name="news_title1" id="news_title1" value="<?php if($news_title1 !=""){ echo $news_title1;}else{echo '公司新闻';} ?>"/> <br /><br />
     <label  for="news_title_en1">英文标题:</label>
     <input type="text" size="80"  name="news_title_en1" id="news_title_en1" value="<?php if($news_title_en1 !=""){ echo $news_title_en1;} else{ echo'Company news';} ?>"/> <br /><br />
     
     
      <label  for="news2">选择分类目录(右边新闻模块)</label>
                  <select name="news2" id="news2">
	 <option value=''>请选择</option>
		<?php 
		 $categorys = get_categories(array('hide_empty' => 0));

		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if (  $news2== $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select><br />

 
            <label  for="news_title2">中文标题:</label>
     <input type="text" size="80"  name="news_title2" id="news_title2" value="<?php if($news_title2 !=""){ echo $news_title2;}else{echo '招聘职位';} ?>"/> <br /><br />
     <label  for="news_title_en2">英文标题:</label>
     <input type="text" size="80"  name="news_title_en2" id="news_title_en2" value="<?php if($news_title_en2 !=""){ echo $news_title_en2;} else{ echo'job';} ?>"/> <br /><br />
         
         
         
                      </div>    
            
            
            
            <div class="xiaot">
                     <b class="bt">合作客户</b><br />
                     
                    <p>这个模块可以调用一个页面的内容，并且支持将页面所有的图片提取出来放在下面的列表中，这样你就能够通过一个页面将合作品牌发送到首页上了！</p>
                    
                    <?php  
					        $band=get_option('mytheme_band');
						    $band_title=get_option('mytheme_band_title');
							$band_en=get_option('mytheme_band_en');
							$band_pic=get_option('mytheme_band_pic');
			 ?>
              <label  for="team">请选择页面:</label>
                 <select name="band" id="band">
	            <option value=''>请选择</option>
		<?php 
		 $pages = get_pages();
		 $band= get_option('mytheme_band');
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		  	$band_pic2=get_option('mytheme_band_pic2');
		?>
      
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $band == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $page_name; ?></option>
		<?php } ?>
	</select>
     <p>
              <label  for="band_title">标题：</label>        
            <input type="text" size="40"  name="band_title" id="band_title" value="<?php if($band_title!=""){echo $band_title;}else {echo '合作客户';} ?>"/> <br />
            <label  for="band_en">副标题：</label>        
           <input type="text" size="40"  name="band_en" id="band_en" value="<?php if($band_en!=""){echo $band_en;}else {echo 'Our Clients';} ?>"/> 
             
             </p>
       
               <div class="up">
              <p>背景图片上传，图片尺寸为1920X1080(请尽量压缩图片至最小，100KB左右最佳)<a target="_blank" href="http://www.themepark.com.cn/sqzykflhdwtxw.html">如何压缩图片？点击查看教程</a></p>
           <input type="text" size="60"  name="band_pic" id="band_pic" value="<?php echo $band_pic ; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/>   
        </div> 
       
                      </div>
            
            
  
            
           <div class="xiaot">
            <b class="bt">联系我们</b><br />
            <p>网站首页底部联系我们的一些设定</p>
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
					
		               ?>
            
       
          <p>
           
           <label  for="contact_title">右侧模块标题：</label>        
            <input type="text" size="20"  name="contact_title" id="contact_title" value="<?php if($contact_title!=""){echo $contact_title;}else {echo 'contact us';} ?>"/>  
             <label  for="contact_title_2">右侧模块副标题：</label>        
          <input type="text" size="20"  name="contact_title_2" id="contact_title_2" value="<?php if($contact_title_2!=""){echo $contact_title_2;}else {echo '联系我们';} ?>"/>   
        </p>
            
            <p>
           
           <label  for="message_title">左侧模块标题：</label>        
            <input type="text" size="20"  name="message_title" id="message_title" value="<?php if($message_title!=""){echo $message_title;}else {echo 'Leave a message';} ?>"/>  
             <label  for="message_title_2">左侧模块副标题：</label>        
          <input type="text" size="20"  name="message_title_2" id="message_title_2" value="<?php if($message_title_2!=""){echo $message_title_2;}else {echo '在线留言';} ?>"/>   
        </p>
               
            
              <div class="up">
            <label  for="maps">地图小图上传(尺寸：239*339)：</label>     
           <input type="text" size="60"  name="maps" id="maps" value="<?php echo $maps; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/><br />

            <label  for="maps_link">地图链接：</label>        
            <input type="text" size="60"  name="maps_link" id="maps_link" value="<?php echo $maps_link; ?>"/>     
           <p>你可以使用百度地图截取一段你的地址所在位置的图片，也可以自己制作一张图片，这张图片可以设定一个链接跳转到百度地图或者谷歌地图的准确位置，详情可以见演示<a href="http://www.themepark.com.cn/rhhdbddtdwzlj.html" target="_blank">如何获得我的地址链接？</a></p>
           
           
             <label  for="contact_beijing">背景图片上传（注意这个背景是平铺重复的，可以上传一个可平铺的图片，或者上传1920*960的图片）：</label>     
           <input type="text" size="60"  name="contact_beijing" id="contact_beijing" value="<?php echo get_option('mytheme_contact_beijing'); ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/><br />
           
        </div>
            
            
            <div class="xiaot">
                    
            <p>按照默认的格式填写以下资料，如果你是外文网站，可以使用这个格式填写外文，如“tel：010 000000”，中文如 “电话:0731-85787193”</p>
                  
            <p> <label  for="case2_bt">联系电话：</label> 
           <input type="text" size="60"  name="tell" id="tell" value="<?php if($tell !==""){ echo $tell;}else{echo "联系电话：";} ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">电子邮箱：</label> 
           <input type="text" size="60"  name="email" id="email" value="<?php if($email !==""){ echo $email;}else{echo "电子邮箱：";} ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">传真：</label> 
           <input type="text" size="60"  name="fax" id="fax" value="<?php if($fax !==""){ echo $fax;}else{echo "传真：";} ?>"/  />
            </p>
            
              <p> <label  for="case2_bt">联系地址：</label> 
           <input type="text" size="60"  name="address" id="address" value="<?php if($address !==""){ echo $address;}else{echo "联系地址：";} ?>"/  />
            </p>
            
               <p> <label  for="case2_bt">ICP备案号：</label> 
           <input type="text" size="60"  name="icp_b" id="icp_b" value="<?php echo get_option('mytheme_icp_b');  ?>"/  />
            </p>
                  
  
   
    
         <p>
                      <?php $themepark= get_option('mytheme_themepark'); ?>
                         <label  for="themepark">显示WEB主题公园的技术支持:</label>
                         <select name="themepark" id="themepark">
	                      <option value='' <?php if ($themepark=='') {echo "selected='selected'";}?>>显示中文</option>
                          <option value='en' <?php if ($themepark=='en') {echo "selected='selected'";}?>>显示英文</option>
                         <option value='none' <?php if ($themepark=='none') {echo "selected='selected'";}?>>不显示</option>
	                  </select><br />
                      <a>WEB主题公园的主题下方会有一个“技术支持：WEB主题公园”的信息，如果你给予了保留，那么我们将会非常感激！</a>
                      </p>
      
                  
         <b class="bt">二维码上传</b><br />
      <label  for="two_code_title">标题：</label>        
         <input type="text" size="60"  name="two_code_title" id="two_code_title" value="<?php if($two_code_title!=""){echo $two_code_title;}else {echo '扫描二维码关注官方微信';} ?>"/>  
        <P>上传二维码，可以使你的微信图片，你也可以上传一张广告图片，图片尺寸为130*130</P>
           <div class="up">
           <input type="text" size="60"  name="two_code" id="two_code" value="<?php echo $two_code; ?>"/  /> 
           <input type="button" name="upload_button" value="上传" id="upbottom"/>   
        </div>
                  
</div>
            
    </div>                    