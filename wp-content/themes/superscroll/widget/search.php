<?php 

class My_Widget4 extends WP_Widget {

	function My_Widget4()
	{
		$widget_ops = array('description' => '这里输入电话号码，将显示带有联系电话的搜索栏目');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='搜索和联系电话(WEB主题公园)',$widget_ops,$control_ops);  

                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}

	function form($instance) { // 给小工具(widget) 添加表单内容
		 $title = esc_attr($instance['title']);
		
	?>
	
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('电话号码:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>



	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('分类自定义') : $instance['title']);
	
        ?>
       <div id="search" class="widget">
        <b> <?php echo $title;  ?></b>
       <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
             <div>
             <div for="s" class="screen-reader-text">站内搜索 Search</div>
             <input type="text" id="s" name="s" value="" />
        
             <input type="submit" value="" id="searchsubmit" />
             </div>
          </form>
      
      
       </div>
        <?php
	}
}
register_widget('My_Widget4');
?>