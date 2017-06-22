<?php 

class My_Widget extends WP_Widget {

	function My_Widget()
	{
		$widget_ops = array('description' => '侧边栏的图文模块，可以选择调用一个你建立好的分类，以图文模式显示，显示大图和较小标题');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget(false,$name='大图文分类模块(WEB主题公园)',$widget_ops,$control_ops);  

                //parent::直接使用父类中的方法
                //$name 这个小工具的名称,
                //$widget_ops 可以给小工具进行描述等等。
                //$control_ops 可以对小工具进行简单的样式定义等等。
	}

	function form($instance) { // 给小工具(widget) 添加表单内容
		 $title = esc_attr($instance['title']);
		 $w_cat = esc_attr($instance['w_cat']);
		 $nnmber = esc_attr($instance['nnmber']);
		 $en_tit = esc_attr($instance['en_tit']);
		 $zhiding = esc_attr($instance['zhiding']);
	?>
	
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('en_tit'); ?>"><?php esc_attr_e('英文标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('en_tit'); ?>" name="<?php echo $this->get_field_name('en_tit'); ?>" type="text" value="<?php echo $en_tit; ?>" /></label></p>

<label  for="<?php echo $this->get_field_id('w_cat'); ?>">侧边栏分类模块（图文）:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys = get_categories();
		$sigk_cat2= $w_cat;
		foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		?>
       
			<option 
				value='<?php echo  $category_id; ?>'
				<?php
					if ( $sigk_cat2 == $category_id ) {
						echo "selected='selected'";
					}
				?>><?php echo  $category_name; ?></option>
		<?php } ?>
	</select>
<p>   
    <label  for="<?php echo $this->get_field_id('zhiding'); ?>">是否只显示置顶文章:</label><br />
             <select id="<?php echo $this->get_field_id('zhiding'); ?>" name="<?php echo $this->get_field_name('zhiding'); ?>" >
              <option value='2'<?php if ($zhiding == "2" ) {echo "selected='selected'";}?> >显示最新文章</option>
	          <option value='1'<?php if ($zhiding == "1" ) {echo "selected='selected'";}?>>只显示置顶的文章</option>
		
	</select>

</p>
<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>




	<?php
    }
	function update($new_instance, $old_instance) { // 更新保存
		return $new_instance;
	}
	function widget($args, $instance) { // 输出显示在页面上
	extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('分类自定义') : $instance['title']);
		$w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
		$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('1') : $instance['nnmber']);
	    $en_tit = apply_filters('widget_title', empty($instance['en_tit']) ? __('1') : $instance['en_tit']);
		 $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('1') : $instance['zhiding']);
        $cat= $w_cat;
        $mm= $nnmber;
        $cat_links=get_category_link($cat);
	
		
		?>
       
       <div id="cat_news" class="widget">
       
      <h2> <a href="<?php echo $cat_links; ?>"><?php echo $title; ?><b><?php echo $en_tit; ?></b> </a></h2>
       <ul>
 <?php
if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query = new WP_Query( $args );
          
		//else{$args = array( 'cat' => $w_cat , 'showposts' => $nnmber ,'caller_get_posts' => 1 ,'post__in' => get_option('sticky_posts'),);     $query = new WP_Query( $args );}
	

?>
<?php   while ( $query->have_posts() ) :$query->the_post(); ?>     
             
   <li id="big">
 
        <a target="_blank" class="new_tu_img" href="<?php the_permalink() ?>"  title="<?php the_title(); ?>" >
         
         <?php 
		 $tit= get_the_title();
		 if (has_post_thumbnail()) { the_post_thumbnail('news-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?>
        
          <div class="shuom"> 
       <?php
		$tit=get_the_title();
		 echo mb_strimwidth(strip_tags(apply_filters('the_content', $tit)),  0,28,"..."); ?>   
       </div> 
         </a> 
         
      
         </li>
      

    <?php endwhile; ?>
    
   
    </ul>
       </div>
        <?php
	}
}
register_widget('My_Widget');
?>