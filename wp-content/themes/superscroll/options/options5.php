<p>超级门户WordPress主题目前自带了由WEB主题公园所开发的《掌上公园》（movepark）2.0版本，可以自由自定义移动版首页，<br />
使用方法：<strong>你需要建立一个预览页面，预览页面选择模板“移动版首页自定义排版预览”，然后在下方选择“自定义排版方式”，最后在你的导航菜单中发送这个页面到导航上，进入外观--自定义，点击导航上的页面链接，进入页面进行自定义排版，排版完成之后，可以删除这个页面，也可以保留页面。1.16版本所更新的2个自定义排版也会自动显示为移动版，具体可以查看我们补发的一段视频介绍：<a href="http://www.themepark.com.cn/movepark20jrdlydwzsd.html" target="_blank">Movepark2.0升级使用方法</a></strong></p>
<div class="xiaot">
  <label  for="move_index">请选择预览的页面:</label>
                 <select name="move_index" id="move_index">
	            <option value=''>请选择</option>
		<?php 
		 $pages = get_pages();
		  $move_yes= get_option('mytheme_move_yes');
		 $move_index= get_option('mytheme_move_index');
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		?>
      
			<option 
				value='<?php echo  $page_id; ?>'
				<?php
					if ( $move_index == $page_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $page_name; ?></option>
		<?php } ?>
	</select>
 </div>
<div class="xiaot">
  <label  for="move_yes">是否使用自定义的移动版首页</label>
                 <select name="move_yes" id="move_yes">
	            <option value=''<?php if ( $move_yes == "" ) {echo "selected='selected'";} ?>>默认简洁版首页</option>
                <option value='1'<?php if ( $move_yes == "1" ) {echo "selected='selected'";} ?>>自定义首页</option>
	
	</select>
    <p>如果你选择自定义，那么请按照步骤自定义移动版首页，否则还会显示默认的简洁的移动版首页。，可参见视频教程：<a href="http://www.themepark.com.cn/cjjjwordpressqyzt.html">Movepark2.0升级使用方法</a></p>
    </div>


