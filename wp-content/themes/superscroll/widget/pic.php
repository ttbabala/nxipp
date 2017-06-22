<?php 

class pic extends WP_Widget {

	function pic()
	{
		$widget_ops = array('classname'=>'pic','description' => '移动版使用，pc版首页无效');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="pic",$name='焦点图模块【移动版】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
		 $pic_1 = esc_attr($instance['pic_1']);
		 $pic_url_1 = esc_attr($instance['pic_url_1']);
		 $pic_alt_1 = esc_attr($instance['pic_alt_1']);
		 
		  $pic_2 = esc_attr($instance['pic_2']);
		 $pic_url_2 = esc_attr($instance['pic_url_2']);
		 $pic_alt_2 = esc_attr($instance['pic_alt_2']);
		 
		  $pic_3 = esc_attr($instance['pic_3']);
		 $pic_url_3 = esc_attr($instance['pic_url_3']);
		 $pic_alt_3 = esc_attr($instance['pic_alt_3']);
		 
		  $pic_4 = esc_attr($instance['pic_4']);
		 $pic_url_4 = esc_attr($instance['pic_url_4']);
		 $pic_alt_4 = esc_attr($instance['pic_alt_4']);
		 
		  $pic_5 = esc_attr($instance['pic_5']);
		 $pic_url_5 = esc_attr($instance['pic_url_5']);
		 $pic_alt_5 = esc_attr($instance['pic_alt_5']);
		 
		   $d_ids = esc_attr($instance['d_ids']);
		  $speeds = esc_attr($instance['speeds']);
		   $donghua = esc_attr($instance['donghua']);
		    $btn = esc_attr($instance['btn']);
         $target = esc_attr($instance['target']);
	?>
    
<?php    wp_enqueue_media(); ?>
<p><strong>焦点图参数</strong></p>

<p>
  <label  for="<?php echo $this->get_field_id('d_ids'); ?>">自定义id【注意：如果同一个页面设置多个焦点图，请自定义id，id为数字，多个焦点图设置不同的id即可，否则会冲突】:</label><br />
 <input type="text" size="40" value="<?php echo $d_ids; ?>" name="<?php echo $this->get_field_name('d_ids'); ?>" id="<?php echo $this->get_field_id('d_ids'); ?>"/>
 
</p> 

<p>
  <label  for="<?php echo $this->get_field_id('speeds'); ?>">自动播放的间隔时间（秒）默认5秒:</label><br />
 <input type="text" size="40" value="<?php echo $speeds; ?>" name="<?php echo $this->get_field_name('speeds'); ?>" id="<?php echo $this->get_field_id('speeds'); ?>"/>
 </p> 




<p>   
    <label  for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
             <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" >
              <option value='2'<?php if ($target == "2" ) {echo "selected='selected'";}?> >自身页面转换</option>
	          <option value='1'<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>
		
	</select>

</p>


<p>焦点图在PC的首页时，请上传960*336像素的图片,在移动版时，为1024宽度，高度不限，但是你的所有图片高度必须一致（使用一个的范围内）！</p>
<p><strong>焦点图1</strong></p>
<p>
  <label  for="<?php echo $this->get_field_id('pic_1'); ?>">焦点图1:</label><br />
 <input type="text" size="40" value="<?php echo $pic_1; ?>" name="<?php echo $this->get_field_name('pic_1'); ?>" id="<?php echo $this->get_field_id('pic_1'); ?>"/>
 
 <a id="ashu_upload" class="about_upload_button button" href="#">上传</a>
</p> 

<p><label for="<?php echo $this->get_field_id('pic_url_1'); ?>">链接<input class="widefat" id="<?php echo $this->get_field_id('pic_url_1'); ?>" name="<?php echo $this->get_field_name('pic_url_1'); ?>" type="text" value="<?php echo $pic_url_1; ?>" /></label></p>


<p><label for="<?php echo $this->get_field_id('pic_alt_1'); ?>">替换文字<input class="widefat" id="<?php echo $this->get_field_id('pic_alt_1'); ?>" name="<?php echo $this->get_field_name('pic_alt_1'); ?>" type="text" value="<?php echo $pic_alt_1; ?>" /></label></p>
<p>------------------------------------------------------</p>

<p><strong>焦点图2</strong></p>
<p>
  <label  for="<?php echo $this->get_field_id('pic_2'); ?>">焦点图2:</label><br />
 <input type="text" size="40" value="<?php echo $pic_2; ?>" name="<?php echo $this->get_field_name('pic_2'); ?>" id="<?php echo $this->get_field_id('pic_2'); ?>"/>
 
 <a id="ashu_upload" class="about_upload_button button" href="#">上传</a>
</p> 

<p><label for="<?php echo $this->get_field_id('pic_url_2'); ?>">链接<input class="widefat" id="<?php echo $this->get_field_id('pic_url_2'); ?>" name="<?php echo $this->get_field_name('pic_url_2'); ?>" type="text" value="<?php echo $pic_url_2; ?>" /></label></p>


<p><label for="<?php echo $this->get_field_id('pic_alt_2'); ?>">替换文字<input class="widefat" id="<?php echo $this->get_field_id('pic_alt_2'); ?>" name="<?php echo $this->get_field_name('pic_alt_2'); ?>" type="text" value="<?php echo $pic_alt_2; ?>" /></label></p>
<p>------------------------------------------------------</p>

<p><strong>焦点图3</strong></p>
<p>
  <label  for="<?php echo $this->get_field_id('pic_3'); ?>">焦点图3:</label><br />
 <input type="text" size="40" value="<?php echo $pic_3; ?>" name="<?php echo $this->get_field_name('pic_3'); ?>" id="<?php echo $this->get_field_id('pic_3'); ?>"/>
 
 <a id="ashu_upload" class="about_upload_button button" href="#">上传</a>
</p> 

<p><label for="<?php echo $this->get_field_id('pic_url_3'); ?>">链接<input class="widefat" id="<?php echo $this->get_field_id('pic_url_3'); ?>" name="<?php echo $this->get_field_name('pic_url_3'); ?>" type="text" value="<?php echo $pic_url_3; ?>" /></label></p>


<p><label for="<?php echo $this->get_field_id('pic_alt_3'); ?>">替换文字<input class="widefat" id="<?php echo $this->get_field_id('pic_alt_3'); ?>" name="<?php echo $this->get_field_name('pic_alt_3'); ?>" type="text" value="<?php echo $pic_alt_3; ?>" /></label></p>
<p>------------------------------------------------------</p>

<p><strong>焦点图4</strong></p>
<p>
  <label  for="<?php echo $this->get_field_id('pic_4'); ?>">焦点图4:</label><br />
 <input type="text" size="40" value="<?php echo $pic_4; ?>" name="<?php echo $this->get_field_name('pic_4'); ?>" id="<?php echo $this->get_field_id('pic_4'); ?>"/>
 
 <a id="ashu_upload" class="about_upload_button button" href="#">上传</a>
</p> 

<p><label for="<?php echo $this->get_field_id('pic_url_4'); ?>">链接<input class="widefat" id="<?php echo $this->get_field_id('pic_url_4'); ?>" name="<?php echo $this->get_field_name('pic_url_4'); ?>" type="text" value="<?php echo $pic_url_4; ?>" /></label></p>


<p><label for="<?php echo $this->get_field_id('pic_alt_4'); ?>">替换文字<input class="widefat" id="<?php echo $this->get_field_id('pic_alt_4'); ?>" name="<?php echo $this->get_field_name('pic_alt_4'); ?>" type="text" value="<?php echo $pic_alt_4; ?>" /></label></p>
<p>------------------------------------------------------</p>

<p><strong>焦点图5</strong></p>
<p>
  <label  for="<?php echo $this->get_field_id('pic_5'); ?>">焦点图5:</label><br />
 <input type="text" size="40" value="<?php echo $pic_5; ?>" name="<?php echo $this->get_field_name('pic_5'); ?>" id="<?php echo $this->get_field_id('pic_5'); ?>"/>
 
 <a id="ashu_upload" class="about_upload_button button" href="#">上传</a>
</p> 

<p><label for="<?php echo $this->get_field_id('pic_url_5'); ?>">链接<input class="widefat" id="<?php echo $this->get_field_id('pic_url_5'); ?>" name="<?php echo $this->get_field_name('pic_url_5'); ?>" type="text" value="<?php echo $pic_url_5; ?>" /></label></p>


<p><label for="<?php echo $this->get_field_id('pic_alt_5'); ?>">替换文字<input class="widefat" id="<?php echo $this->get_field_id('pic_alt_5'); ?>" name="<?php echo $this->get_field_name('pic_alt_5'); ?>" type="text" value="<?php echo $pic_alt_5; ?>" /></label></p>
<p>------------------------------------------------------</p>

<script>   
    jQuery(document).ready(function(){   
    var theme_upload_frame;   
    var value_id; 
	
    jQuery('.about_upload_button').on('click',function(event){   
        value_id =jQuery(this).prev('input');      
        
        theme_upload_frame = wp.media({   
            title: '选择图片',   
            button: {   
                text: '选择',   
            }   , multiple: false   
     
			
        });   
           if(theme_upload_frame){
           theme_upload_frame.open();    
		   }
       
        theme_upload_frame.on('select',function(){   
            attachment = theme_upload_frame.state().get('selection').first().toJSON();   
            jQuery(value_id).val(attachment.url);
			jQuery(".supports-drag-drop").remove();     
        });   
           
        
    });   
    });   
    </script>   


	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
	    $id =$instance['id'];
        $before_content = $instance['before_content'];
        $after_content = $instance['after_content'];
		$pic_1  = apply_filters('widget_title', empty($instance['pic_1']) ? __('') : $instance['pic_1']);
		$pic_url_1  = apply_filters('widget_title', empty($instance['pic_url_1']) ? __('#') : $instance['pic_url_1']);
		$pic_alt_1  = apply_filters('widget_title', empty($instance['pic_alt_1']) ? __('#') : $instance['pic_alt_1']);
		$pic_2  = apply_filters('widget_title', empty($instance['pic_2']) ? __('') : $instance['pic_2']);
		$pic_url_2  = apply_filters('widget_title', empty($instance['pic_url_2']) ? __('#') : $instance['pic_url_2']);
		$pic_alt_2  = apply_filters('widget_title', empty($instance['pic_alt_2']) ? __('#') : $instance['pic_alt_2']);
		$pic_3  = apply_filters('widget_title', empty($instance['pic_3']) ? __('') : $instance['pic_3']);
		$pic_url_3  = apply_filters('widget_title', empty($instance['pic_url_3']) ? __('#') : $instance['pic_url_3']);
		$pic_alt_3  = apply_filters('widget_title', empty($instance['pic_alt_3']) ? __('#') : $instance['pic_alt_3']);
		$pic_4  = apply_filters('widget_title', empty($instance['pic_4']) ? __('') : $instance['pic_4']);
		$pic_url_4  = apply_filters('widget_title', empty($instance['pic_url_4']) ? __('#') : $instance['pic_url_4']);
		$pic_alt_4  = apply_filters('widget_title', empty($instance['pic_alt_4']) ? __('#') : $instance['pic_alt_4']);	
		$pic_5  = apply_filters('widget_title', empty($instance['pic_5']) ? __('') : $instance['pic_5']);
		$pic_url_5  = apply_filters('widget_title', empty($instance['pic_url_5']) ? __('#') : $instance['pic_url_5']);
		$pic_alt_5  = apply_filters('widget_title', empty($instance['pic_alt_5']) ? __('#') : $instance['pic_alt_5']);	


$d_ids  = apply_filters('widget_title', empty($instance['d_ids']) ? __('') : $instance['d_ids']);	
$speeds  = apply_filters('widget_title', empty($instance['speeds']) ? __('5') : $instance['speeds']);	
$donghua  = apply_filters('widget_title', empty($instance['donghua']) ? __('1') : $instance['donghua']);	
$target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);	
$btn  = apply_filters('widget_title', empty($instance['btn']) ? __('1') : $instance['btn']);	

if( $target  =="1" ){ $tagerts = 'target="_blank"';}
	$detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){	
		?>
       
 

      
      <div id="move_poc" class="swiper-container swiper<?php echo $d_ids; ?>">
    <div class="swiper-wrapper">
 
    <?php if($pic_1 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_url_1?>" title="<?php echo $pic_alt_1; ?>"<?php echo  stripslashes($tagerts1); ?> ><img id="phone_pic"alt="<?php echo $pic_alt_1; ?>" src="<?php echo $pic_1 ?>"/> </a> </div><?php };?>
    <?php if($pic_2 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_url_2?>" title="<?php echo $pic_alt_2; ?>"<?php echo  stripslashes($tagerts2); ?> ><img id="phone_pic"alt="<?php echo $pic_alt_2; ?>" src="<?php echo $pic_2 ?>"/></a>  </div><?php };?>    
    <?php if($pic_3 !=""){?> <div class="swiper-slide"> <a href="<?php  echo $pic_url_3?>"title="<?php echo $pic_alt_3; ?>" <?php echo  stripslashes($tagerts3); ?> ><img id="phone_pic"alt="<?php echo $pic_alt_3; ?>" src="<?php echo $pic_3 ?>"/> </a> </div><?php };?>
    <?php if($pic_4 !=""){?> <div class="swiper-slide"><a href="<?php  echo $pic_url_4?>"title="<?php echo $pic_alt_4; ?>" <?php echo  stripslashes($tagerts4); ?> > <img id="phone_pic"alt="<?php echo $pic_alt_4; ?>" src="<?php echo $pic_4 ?>"/> </a> </div><?php };?> 
        <?php if($pic_5 !=""){?> <div class="swiper-slide"><a href="<?php  echo $pic_url_5?>"title="<?php echo $pic_alt_5; ?>" <?php echo  stripslashes($tagerts4); ?> > <img id="phone_pic"alt="<?php echo $pic_alt_5; ?>" src="<?php echo $pic_5 ?>"/> </a> </div><?php };?> 
    
     
 </div>
    <div class="pagination"></div>


	<script>
  var mySwiper = new Swiper('.swiper<?php echo $d_ids; ?>',{
    pagination: '.pagination',
    paginationClickable: true,
	calculateHeight:true
  })
  </script>
    </div>
  <?php }else{ ?>    
  


       
        <?php
	}}
}
register_widget('pic');
?>