<?php 

class move_nav extends WP_Widget {

	function move_nav()
	{
		$widget_ops = array('classname'=>'move_nav','description' => '可已将默认的移动版图标导航输出到移动版主题上,超级滚轴视频教程移动版图标菜单设置的内容（41分钟左右的内容）');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="move_nav",$name='移动版图标导航【移动版】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
		
	?>
	




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
		
     
$detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){	
		
		?>
       
       
       <div id="move_nva">
 <?php $walker = new Menu_With_Description; ?>
 <?php wp_nav_menu(array( 'theme_location' => 'nva-menu2','menu_class'=> 'nva-menu2','walker' => $walker  ) ); ?>

</div>
 
        <?php
	}}
}
register_widget('move_nav');
?>