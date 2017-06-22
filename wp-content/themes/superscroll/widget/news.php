<?php 

class news extends WP_Widget {

	function news()
	{
		$widget_ops = array('classname'=>'news','description' => '移动版新闻模块PC无效');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="news",$name='新闻模块【移动版】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
		 $title = esc_attr($instance['title']);
		 $en_tit = esc_attr($instance['en_tit']);
		 $w_cat = esc_attr($instance['w_cat']);
		 $w_cat2 = esc_attr($instance['w_cat2']);
		 $zhiding = esc_attr($instance['zhiding']);
		 $target = esc_attr($instance['target']);
		 $nnmber = esc_attr($instance['nnmber']);
		 $nav_menu = esc_attr($instance['nav_menu']);
		$jcar = esc_attr($instance['jcar']);
	?>
	<p>此模块调用的特色图片尺寸为：138*138</p>
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('en_tit'); ?>"><?php esc_attr_e('英文标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('en_tit'); ?>" name="<?php echo $this->get_field_name('en_tit'); ?>" type="text" value="<?php echo $en_tit; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认5):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>

<label  for="<?php echo $this->get_field_id('w_cat'); ?>">请选择分类:</label><br />
             <select id="<?php echo $this->get_field_id('w_cat'); ?>" name="<?php echo $this->get_field_name('w_cat'); ?>" >
              <option value=''>请选择</option>
<?php 
		 $categorys =get_categories(array('hide_empty' => 0));
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



<p>   
    <label  for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
             <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" >
              <option value='2'<?php if ($target == "2" ) {echo "selected='selected'";}?> >自身页面转换</option>
	          <option value='1'<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>
		
	</select>

</p>







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
		$title = apply_filters('widget_title', empty($instance['title']) ? __('分类自定义') : $instance['title']);
		$en_tit = apply_filters('widget_title', empty($instance['en_tit']) ? __('news') : $instance['en_tit']);
		$w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('1') : $instance['zhiding']);
		$target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('5') : $instance['nnmber']);
		$nav_menu = apply_filters('widget_title', empty($instance['nav_menu']) ? __('') : $instance['nav_menu']);
	    $jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        $cat= $w_cat;
        $mm= $nnmber;
        $cat_links=get_category_link($cat);
		 $theme_donghua= get_option('mytheme_theme_donghua');  
        if( $target  =="1" ){ $tagerts = 'target="_blank"';}
		 $linkss=get_post_meta($id,"hoturl", true); 
		 
		    $target =get_post_meta($id,"hots_tlye", true);
			 $word_t1=get_option('mytheme_word_t1');
			 if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
			 $args = array( 'cat' => $w_cat , 'showposts' =>$nnmber , 'post__in' =>$post__in );     $query = new WP_Query( $args );          

		?>
        
 <?php $detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){	
 
	?>    
<div id="index_model" class="widget  <?php if(is_home()){ echo "news"; }else{ echo "widget_left";}?> news" >
<?php if(is_home()){  if( $theme_donghua ==""){?>

<div class="over"></div>

<?php }; };?>
   <div id="news">
       <div class="news_hd <?php if( !is_front_page() || !is_home()){ echo "widge_hd"; }?>">
          <span>
          <?php if( is_front_page() ||is_home()){ ?>
          <h2><?php echo $title; ?></h2>
          <b><?php echo $en_tit; ?></b>
          <?php }else{ ?>
          <b><?php echo $title; ?></b>
          <p><?php echo $en_tit; ?></p>
          <?php } ?>
          </span>

       </div>
   
   
   <ul class="news_list">
     <?php
		 $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++;   ?>     
 <?php $tit= get_the_title();$id =get_the_ID();  if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; ?>  
      <?php 
	  if( is_front_page() ||is_home()){
	  if($ashu_i==1):?>   
     <li class="pic_new"><a href="<?php the_permalink() ?>"><?php  if (has_post_thumbnail()) { the_post_thumbnail('product_single-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?></a></li>
     <li class="first_news">
       <b><a <?php echo $tagerts .' '. $target; ?> href="<?php echo $links1 ?>" title="<?php the_title(); ?>">
             <?php $tit= get_the_title(); echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,65,"...",'utf-8'); ?></a></b>
         <em><?php the_time('Y/m/d') ?></em>
         <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,280,"...",'utf-8'); ?></p>
     </li>
       <?php else: ?> 
     
      <li>
      <?php  if (has_post_thumbnail()) { the_post_thumbnail('news-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?>
       <b><a <?php echo $tagerts .' '. $target; ?> href="<?php echo $links1 ?>" title="<?php the_title(); ?>">
             <?php $tit= get_the_title(); echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf-8'); ?></a></b>
       <em><?php the_time('Y/m/d') ?></em>
       <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,100,"...",'utf-8'); ?></p>
     </li>
     
    <?php endif;}else{ ?>
    
     <li>
      <?php  if (has_post_thumbnail()) { the_post_thumbnail('news-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));} ?>
       <b><a <?php echo $tagerts .' '. $target; ?> href="<?php echo $links1 ?>" title="<?php the_title(); ?>">
             <?php $tit= get_the_title(); echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,25,"...",'utf-8'); ?></a></b>
       <em><?php the_time('Y/m/d') ?></em>
       <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,75,"...",'utf-8'); ?></p>
     </li>
    
              <?php }endwhile; ?>
     
     
   
   </ul>
   
   </div>

</div>
        
        
    


        <?php
		
	}}
}
register_widget('news');
?>