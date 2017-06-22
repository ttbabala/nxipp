<?php 

class case2 extends WP_Widget {

	function case2()
	{
		$widget_ops = array('classname'=>'case2','description' => '移动版产品展示模块，PC无效。');
		$control_ops = array('width' => 200, 'height' => 300);
		parent::WP_Widget($id_base="case2",$name='产品展示【移动版】',$widget_ops,$control_ops);  

	}

	function form($instance) { 
		 $title = esc_attr($instance['title']);
		 $w_cat = esc_attr($instance['w_cat']);
		 $en_tit = esc_attr($instance['en_tit']);
		 $zhiding = esc_attr($instance['zhiding']);
		 $target = esc_attr($instance['target']);
		 $nnmber = esc_attr($instance['nnmber']);
		 $jcar = esc_attr($instance['jcar']);
	?>
	
<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_attr_e('标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('en_tit'); ?>"><?php esc_attr_e('英文标题:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('en_tit'); ?>" name="<?php echo $this->get_field_name('en_tit'); ?>" type="text" value="<?php echo $en_tit; ?>" /></label></p>

<label  for="<?php echo $this->get_field_id('w_cat'); ?>">请选择:</label><br />
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

<p>   
    <label  for="<?php echo $this->get_field_id('jcar'); ?>">是否启用滑块:</label><br />
             <select id="<?php echo $this->get_field_id('tjcar'); ?>" name="<?php echo $this->get_field_name('jcar'); ?>" >
              <option value='2'<?php if ($jcar == "2" ) {echo "selected='selected'";}?> >不启用滑块</option>
	          <option value='1'<?php if ($jcar == "1" ) {echo "selected='selected'";}?>>启用滑块</option>
		
	</select>

</p>

<p>   
    <label  for="<?php echo $this->get_field_id('target'); ?>">链接方式:</label><br />
             <select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" >
              <option value='2'<?php if ($target == "2" ) {echo "selected='selected'";}?> >自身页面转换</option>
	          <option value='1'<?php if ($target == "1" ) {echo "selected='selected'";}?>>打开新窗口</option>
		
	</select>

</p>

<p><label for="<?php echo $this->get_field_id('nnmber'); ?>"><?php esc_attr_e('显示数量(默认4):'); ?> <input class="widefat" id="<?php echo $this->get_field_id('nnmber'); ?>" name="<?php echo $this->get_field_name('nnmber'); ?>" type="text" value="<?php echo $nnmber; ?>" /></label></p>



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
		$w_cat = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
	    $en_tit = apply_filters('widget_title', empty($instance['en_tit']) ? __('') : $instance['en_tit']);
	    $zhiding  = apply_filters('widget_title', empty($instance['zhiding']) ? __('1') : $instance['zhiding']);
		$target  = apply_filters('widget_title', empty($instance['target']) ? __('2') : $instance['target']);
		$nnmber = apply_filters('widget_title', empty($instance['nnmber']) ? __('4') : $instance['nnmber']);
		$jcar = apply_filters('widget_title', empty($instance['jcar']) ? __('2') : $instance['jcar']);
        $cat= $w_cat;
        $mm= $nnmber;
        $cat_links=get_category_link($cat);

		$detect = new Mobile_Detect();
if(get_option('mytheme_move_index')!=""){$move_index=get_option('mytheme_move_index');}else{ $move_index= "none";};
if ($detect->isMobile()||$detect->isTablet()||is_page($move_index)){	
		?>
       
    <div  id="about">
     
      <div class="a_left">
   <h2>
       <b><a href="<?php echo $cat_links; ?>"><?php echo $title; ?></a></b><em> <?php echo $en_tit ; ?></em>
   </h2>

   </div>

      <div class="caseleft" id="<?php echo "case1-".$w_cat; ?>">
      <ul class="bigpic_loop" id="category_pic_big">
<?php
if( $target  =="1" ){ $tagerts = 'target="_blank"';}
if( $zhiding =="1" ){ $post__in = get_option('sticky_posts');}
 $args = array( 'cat' => $w_cat , 'showposts' => $nnmber , 'post__in' =>$post__in );     $query = new WP_Query( $args );          
		//else{$args = array( 'cat' => $w_cat , 'showposts' => $nnmber ,'caller_get_posts' => 1 ,'post__in' => get_option('sticky_posts'),);     $query = new WP_Query( $args );}
	
?>
<?php  $ashu_i=0; while ( $query->have_posts() ) :$query->the_post(); $ashu_i++; ?>     

       
         <?php 
		 $tit= get_the_title();
		 $id =get_the_ID(); 
	      $content= get_the_content();
		   $linkss=get_post_meta($id,"hoturl", true); 
		  if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    if(get_post_meta($id,"hots_tlye", true)=='rel="nofollow"'){$target =get_post_meta($id,"hots_tlye", true);}else{$target ='';};
		 ?>
 <li>
             <a   href="<?php the_permalink() ?>" class="news_001_pic"> <?php  $tit= get_the_title();
					if (has_post_thumbnail()) { the_post_thumbnail('pp290-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
                    
                    </a>
              <span>
             <b><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></b>
           <?php 
		     $price = get_post_meta($id, 'shop_price', true);
		   if($price){
		  
          	$original_price=get_post_meta($id,"original_price", true);
			if($original_price){$original=  '<p><em class="original_price">'.'原价：￥'.get_post_meta($id,"original_price", true).'</em>';}
			  echo $original.'<a class="price">现价：￥'.$price.'</a></p>'; ?>
		 <p class="starsss"><?php if(shop_comment_number()){?><a>综合评分(<?php  echo shop_comment_number(); ?>人评分)</a>  <div id="order_starsl" class="order_stars_<?php echo shop_comment_stars()?>"></div><?php }else{?><a>暂无评分</a><?php }}?></p>
             <div class="tag_pro"><?php the_tags("",""); ?></div>
            
             
              
          
             </span>
           </li>
    <?php endwhile; ?>
    
   
    </ul>
    

 </div>
       </div>

       
        <?php
	}}
}
register_widget('case2');
?>