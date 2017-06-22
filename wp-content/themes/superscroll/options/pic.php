      <?php
                     $pic1=get_option('mytheme_pic1'); 
					 $pic_png1=get_option('mytheme_pic_png1'); 
					 $pic_title1=get_option('mytheme_pic_title1'); 
					 $pic_content1=get_option('mytheme_pic_content1'); 
					 $pic_link1=get_option('mytheme_pic_link1'); 
					 $pic_taget1=get_option('mytheme_pic_taget1');  
					 $pic_move1=get_option('mytheme_pic_move1');  
					 
					  $pic2=get_option('mytheme_pic2'); 
					 $pic_png2=get_option('mytheme_pic_png2'); 
					 $pic_title2=get_option('mytheme_pic_title2'); 
					 $pic_content2=get_option('mytheme_pic_content2'); 
					 $pic_link2=get_option('mytheme_pic_link2'); 
					 $pic_taget2=get_option('mytheme_pic_taget2'); 
					  $pic_move2=get_option('mytheme_pic_move2');
					 
					  $pic3=get_option('mytheme_pic3'); 
					 $pic_png3=get_option('mytheme_pic_png3'); 
					 $pic_title3=get_option('mytheme_pic_title3'); 
					 $pic_content3=get_option('mytheme_pic_content3'); 
					 $pic_link3=get_option('mytheme_pic_link3'); 
					 $pic_taget3=get_option('mytheme_pic_taget3'); 
					  $pic_move3=get_option('mytheme_pic_move3');
					  
					  $pic4=get_option('mytheme_pic4'); 
					 $pic_png4=get_option('mytheme_pic_png4'); 
					 $pic_title4=get_option('mytheme_pic_title4'); 
					 $pic_content4=get_option('mytheme_pic_content4'); 
					 $pic_link4=get_option('mytheme_pic_link4'); 
					 $pic_taget4=get_option('mytheme_pic_taget4'); 
					  $pic_move4=get_option('mytheme_pic_move4');
					 ?>

<div class="new_pic">
     <b class="bt">焦点图模块设定</b>
    <span> <a class="chouws" id="pics_1">焦点图1</a> <a id="pics_2">焦点图2</a>  <a id="pics_3">焦点图3</a>  <a id="pics_4">焦点图4</a></span>
    <div class="pocss up opne" id="picss1">
    
     <label  for="pic1">焦点图大背景上传（尺寸1920 X 700）:</label>
     <input type="text" size="80"  name="pic1" id="pic1" value="<?php echo $pic1; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /><br />

     
     <label  for="pic_png1">png小图上传（尺寸 590 X 700）</label>
     <input type="text" size="80"  name="pic_png1" id="pic_png1" value="<?php echo $pic_png1; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
     
      <label  for="pic_move1">移动网站焦点图（整张）（尺寸 1024 X 400）</label>
     <input type="text" size="80"  name="pic_move1" id="pic_move1" value="<?php echo $pic_move1; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
     <label  for="pic_title1">文字标题</label>
     <input type="text" size="80"  name="pic_title1" id="pic_title1" value="<?php echo $pic_title1 ?>"/> <br /><br />
      
     <label  for="pic_content1">文字内容</label>
     <textarea name="pic_content1" cols="86" rows="3" id="pic_content1"><?php echo $pic_content1; ?></textarea>    <br /><br />
      
      <label  for="pic_link1">链接</label>
      <input type="text" size="80"  name="pic_link1" id="pic_link1" value="<?php echo $pic_link1 ?>"/> <br /><br />
       </select>
       <label  for="pic_taget1 ">链接对象:</label>
      <select name="pic_taget1" id="pic_taget1">
	     
          <option value='target="_blank"'<?php if ( $pic_taget1 ==='target="_blank"' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站内）</option>
          <option value='target="_blank" rel="nofollow"'<?php if ( $pic_taget1 ==='target="_blank" rel="nofollow"' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站外 no-follow）</option>
          <option value=''<?php if ( $pic_taget1 ==="" ) {echo "selected='selected'";}?>>自身页面跳转（站内）</option>
          
       
		
	</select>
    </div>            
                
                
    <div class="pocss up" id="picss2">
    
     <label  for="pic2">焦点图大背景上传（尺寸1920 X 700）:</label>
     <input type="text" size="80"  name="pic2" id="pic2" value="<?php echo $pic2; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /><br />

     
     <label  for="pic_png2">png小图上传（尺寸 590 X 700）</label>
     <input type="text" size="80"  name="pic_png2" id="pic_png2" value="<?php echo $pic_png2; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
     <label  for="pic_move2">移动网站焦点图（整张）（尺寸 1024 X 400）</label>
     <input type="text" size="80"  name="pic_move2" id="pic_move2" value="<?php echo $pic_move2; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
     <label  for="pic_title2">文字标题</label>
     <input type="text" size="80"  name="pic_title2" id="pic_title2" value="<?php echo $pic_title2 ?>"/> <br /><br />
      
     <label  for="pic_content2">文字内容</label>
     <textarea name="pic_content2" cols="86" rows="3" id="pic_content2"><?php echo $pic_content2; ?></textarea>    <br /><br />
      
      <label  for="pic_link2">链接</label>
      <input type="text" size="80"  name="pic_link2" id="pic_link2" value="<?php echo $pic_link2 ?>"/> <br /><br />
       </select>
        <label  for="pic_taget2 ">链接对象:</label>
          <select name="pic_taget2" id="pic_taget2">
	     
          <option value='target=_blank'<?php if ( $pic_taget2 ==='target=_blank' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站内）</option>
          <option value='target=_blank rel=nofollow'<?php if ( $pic_taget2 ==='target="_blank" rel="nofollow"' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站外 no-follow）</option>
          <option value=''<?php if ( $pic_taget2 ==="" ) {echo "selected='selected'";}?>>自身页面跳转（站内）</option>
          
       
		
	</select>
    </div>            
    
    
    <div class="pocss up" id="picss3">
    
     <label  for="pic3">焦点图大背景上传（尺寸1920 X 700）:</label>
     <input type="text" size="80"  name="pic3" id="pic3" value="<?php echo $pic3; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /><br />

     
     <label  for="pic_png3">png小图上传（尺寸 590 X 700）</label>
     <input type="text" size="80"  name="pic_png3" id="pic_png3" value="<?php echo $pic_png3; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
     <label  for="pic_move3">移动网站焦点图（整张）（尺寸 1024 X 400）</label>
     <input type="text" size="80"  name="pic_move3" id="pic_move3" value="<?php echo $pic_move3; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
     <label  for="pic_title3">文字标题</label>
     <input type="text" size="80"  name="pic_title3" id="pic_title3" value="<?php echo $pic_title3 ?>"/> <br /><br />
      
     <label  for="pic_content3">文字内容</label>
     <textarea name="pic_content3" cols="86" rows="3" id="pic_content3"><?php echo $pic_content3; ?></textarea>    <br /><br />
      
      <label  for="pic_link3">链接</label>
      <input type="text" size="80"  name="pic_link3" id="pic_link3" value="<?php echo $pic_link3 ?>"/> <br /><br />
       </select>
        <label  for="pic_taget3 ">链接对象:</label>
          <select name="pic_taget3" id="pic_taget3">
	     
          <option value='target=_blank'<?php if ( $pic_taget3 ==='target=_blank' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站内）</option>
          <option value='target=_blank rel=nofollow'<?php if ( $pic_taget3 ==='target=_blank rel=nofollow' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站外 no-follow）</option>
          <option value=''<?php if ( $pic_taget3 ==="" ) {echo "selected='selected'";}?>>自身页面跳转（站内）</option>
          
       
		
	</select>
    </div>            
    
    
    <div class="pocss up" id="picss4">
    
     <label  for="pic4">焦点图大背景上传（尺寸1920 X 700）:</label>
     <input type="text" size="80"  name="pic4" id="pic4" value="<?php echo $pic4; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /><br />

     
     <label  for="pic_png4">png小图上传（尺寸 590 X 700）</label>
     <input type="text" size="80"  name="pic_png4" id="pic_png4" value="<?php echo $pic_png4; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
     <label  for="pic_move4">移动网站焦点图（整张）（尺寸 1024 X 400）</label>
     <input type="text" size="80"  name="pic_move4" id="pic_move4" value="<?php echo $pic_move4; ?>"/>   
     <input type="button" name="upload_button" value="上传" id="upbottom"/>   <br /><br />
    
    
     <label  for="pic_title4">文字标题</label>
     <input type="text" size="80"  name="pic_title4" id="pic_title4" value="<?php echo $pic_title4 ?>"/> <br /><br />
      
     <label  for="pic_content4">文字内容</label>
     <textarea name="pic_content4" cols="86" rows="3" id="pic_content4"><?php echo $pic_content4; ?></textarea>    <br /><br />
      
      <label  for="pic_link4">链接</label>
      <input type="text" size="80"  name="pic_link4" id="pic_link4" value="<?php echo $pic_link4 ?>"/> <br /><br />
       </select>
        <label  for="pic_taget4 ">链接对象:</label>
          <select name="pic_taget4" id="pic_taget4">
	     
          <option value='target=_blank'<?php if ( $pic_taget4 ==='target=_blank' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站内）</option>
          <option value='target=_blank rel=nofollow'<?php if ( $pic_taget4 ==='target=_blank rel=nofollow' ) {echo "selected='selected'";}?>>新开窗口或者新标签（站外 no-follow）</option>
          <option value=''<?php if ( $pic_taget4 ==="" ) {echo "selected='selected'";}?>>自身页面跳转（站内）</option>
          
       
		
	</select>
    </div>  
      
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
</div>
 <div class="xiaot">      
      <b class="bt">焦点图下方三个小文字模块</b>
      <p>请注意，这三个模块是为了让大尺寸分辨率下方不至于空洞而设定的（1080高度），1024*768、1280*768 等分辨率是无法看到此模块的。</p>  
    </div>
	<div id="wenzixiaot">
    
          <span> <a class="chouws" id="pic_1">模块1</a> <a id="pic_2">模块2</a>  <a id="pic_3">模块3</a></span>
    <div class="pocss  opne" id="moke1">
     <label  for="wenzi_title1">文字模块1标题</label>
     <input type="text" size="80"  name="wenzi_title1" id="wenzi_title1" value="<?php echo $wenzi_title1; ?>"/> <br /><br />
      
     <label  for="wenzi_contnt1">文字模块1内容</label>
     <textarea name="wenzi_contnt1" cols="86" rows="3" id="wenzi_contnt1"><?php echo $wenzi_contnt1; ?></textarea>    <br /><br />
      
      <label  for="wenzi_link1">文字模块1链接</label>
      <input type="text" size="80"  name="wenzi_link1" id="wenzi_link1" value="<?php echo $wenzi_link1 ?>"/> <br /><br />
    </div>    
    
    <div class="pocss "id="moke2">
     <label  for="wenzi_title2">文字模块2标题</label>
     <input type="text" size="80"  name="wenzi_title2" id="wenzi_title2" value="<?php echo $wenzi_title2; ?>"/> <br /><br />
      
     <label  for="wenzi_contnt2">文字模块2内容</label>
     <textarea name="wenzi_contnt2" cols="86" rows="3" id="wenzi_contnt2"><?php echo $wenzi_contnt2; ?></textarea>    <br /><br />
      
      <label  for="wenzi_link2">文字模块2链接</label>
      <input type="text" size="80"  name="wenzi_link2" id="wenzi_link2" value="<?php echo $wenzi_link2 ?>"/> <br /><br />
    </div>    
    
      <div class="pocss "id="moke3">
     <label  for="wenzi_title3">文字模块3标题</label>
     <input type="text" size="80"  name="wenzi_title3" id="wenzi_title3" value="<?php echo $wenzi_title3; ?>"/> <br /><br />
      
     <label  for="wenzi_contnt3">文字模块3内容</label>
     <textarea name="wenzi_contnt3" cols="86" rows="3" id="wenzi_contnt3"><?php echo $wenzi_contnt3; ?></textarea>    <br /><br />
      
      <label  for="wenzi_link3">文字模块3链接</label>
      <input type="text" size="80"  name="wenzi_link3" id="wenzi_link3" value="<?php echo $wenzi_link3 ?>"/> <br /><br />
    </div>    
    
     </div>       
                
