<?php 

class vedios extends WP_Widget {

	function vedios()
	{
		$widget_ops = array('description' => '关于我们，可以设置一个视频显示出来，仅用于移动版，PC无效。');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='关于我们和视频【移动版】',$widget_ops,$control_ops);  

                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}

	function form($instance) { // 给小工具(widget) 添加表单内容
		 $title = esc_attr($instance['title']);
		  $title2 = esc_attr($instance['title2']);
		 $w_cat = esc_attr($instance['w_cat']);
		 $en_tit = esc_attr($instance['en_tit']);
		 $zhiding = esc_attr($instance['zhiding']);
		 $target = esc_attr($instance['target']);
		 $vedios = esc_attr($instance['vedios']);
		 $pic_png = esc_attr($instance['pic_png']);
		 $pic_ba= esc_attr($instance['pic_ba']);
		 $jcar = esc_attr($instance['jcar']);
	?>
<p>此模块调用的特色图片尺寸为(小图)：154*100</p>	
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('title2'); ?>"><?php esc_attr_e('英文标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title2'); ?>" name="<?php echo $this->get_field_name('title2'); ?>" type="text" value="<?php echo $title2; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('en_tit'); ?>"><?php esc_attr_e('描述（输出空行请输入</br>）:'); ?> 
 <textarea style="width:98%;" name="<?php echo $this->get_field_name('en_tit'); ?>" cols="50" rows="4" id="<?php echo $this->get_field_id('en_tit'); ?>"><?php echo $en_tit; ?></textarea>   
</label></p>




<p><label for="<?php echo $this->get_field_id('vedios'); ?>"><?php esc_attr_e('视频代码'); ?> 

<textarea style="width:98%;" id="<?php echo $this->get_field_id('vedios'); ?>" name="<?php echo $this->get_field_name('vedios'); ?>"cols="52" rows="4" ><?php echo stripslashes($vedios); ?></textarea>    
</label>
</p>








	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('关于我们') : $instance['title']);
		 $title2 = apply_filters('widget_title', empty($instance['title2']) ? __('what we can do for you') : $instance['title2']);
		$w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	    $vedios = apply_filters('widget_title', empty($instance['vedios']) ? __('') : $instance['vedios']);
	    $en_tit = apply_filters('widget_title', empty($instance['en_tit']) ? __(' WEB主题公园是禁止设计艺术工作室倾力打造的一个以网页模板，网页主题为核心的商务平台。我们有着经验丰富，而且成熟的团队，我们专注于开发视觉精美，功能完善的原创中文网站主题和网站模板。禁止拙劣的设计；禁止平庸的想法，这是我们严于律己的标准 。这个逆向思维的概念，时刻的提醒着我们，我们是拒绝拙劣平庸，拒绝敷衍，一定要用最好的想法和最用心的作风来证明我们的座右铭—-禁止拙劣！禁止平庸！
工作室在这些年的不断发展中，积累了大量的') : $instance['en_tit']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('1') : $instance['zhiding']);
		$target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$pic_png = apply_filters('widget_title', empty($instance['pic_png']) ? __(get_bloginfo('template_url').'/images/about_png.png') : $instance['pic_png']);
		$pic_ba = apply_filters('widget_title', empty($instance['pic_ba']) ? __('') : $instance['pic_ba']);
		$jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        
	    $cat= $w_cat;
      
        $cat_links=get_category_link($cat);
	
		 $theme_donghua= get_option('mytheme_theme_donghua');  
	$detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){		
		?>
 

<div id="index_model" class="widget  <?php if(is_home()){ echo "about"; }else{ echo "widget_left";}?>" >


<div id="about">

<div id="about_in">

 <?php  	$detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){ ?>

<div class="vidio_ship"> <?php echo html_entity_decode( $vedios); ?></div>
<?php } ?>
  <div class="a_left">
       <h2>
       <b><?php echo $title; ?></b>
        
       <em><?php echo $title2; ?></em>
        </h2>
       <p>
       <?php echo html_entity_decode($en_tit); ?>
       </p>
     
  
  </div>
 
<?php   if(is_home()){if ($detect->isMobile()|| $detect->isTablet()|| is_page($move_index)){ }else{ ?>  <a class="a_png"><img src="<?php echo $pic_png ; ?>" /></a>
 
                         <div class="vidio_ship"> <?php echo html_entity_decode( $vedios); ?></div>

<?php }; };?>
</div>
<div class="about_bottom"></div>
</div>
</div>
 
  
 
        <?php
	}}
}
register_widget('vedios');
?>