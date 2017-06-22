<div id="page_top" <?php if(get_option('mytheme_top_pic')!=""){ echo 'style="background:url('.get_option('mytheme_top_pic').')"';} ?> >
<?php if(is_page()): ?>
<div class="page_top_in">
  <?php     $post_data = get_post($post->ID, ARRAY_A);
			$slug = $post_data['post_name'];
			
			 ?>         
<h3> <?php echo get_the_title() . ' <a>'.$slug .' </a>'?></h3>
 
</div>

<?php elseif(is_single()): ?>
<div class="page_top_in">
   <?php    $cat = get_picimges_id(the_category_ID(false));
                   $category = get_category($cat);?>
                        
<h3> <?php echo $category->name  . ' <a>'.$category->slug.' </a>'?></h3>
  
</div>

<?php elseif(is_category()): ?>

<div class="page_top_in">
   <?php    $cat = get_picimges_id(the_category_ID(false));
		           $cat2 = get_query_var('cat'); 
				   $category2 = get_category($cat2);
                   $category = get_category($cat);
				   ?>    
<h3>    <?php if ( get_category_children($cat) != "" ) { echo $category->name . ' <a>'.$category->slug  .' </a>' ;} else{echo $category2->name . ' <a>'.$category2->slug  .' </a>'; }?> </a></h3>
    
</div>


<?php elseif(is_tag()): ?>

<div class="page_top_in">
   
<h3> <?php $word_t12=get_option('mytheme_word_t12'); if($word_t8!=""){echo $word_t12;}else{echo '找到标签';}  ?>： <?php single_tag_title(); ?></h3>
    
</div>


<?php elseif(is_day()|is_month()| is_year()): ?>

<div class="page_top_in">
   
<h3> <?php the_time('Y/M/D'); ?></h3>
    
</div>

<?php elseif(is_search()): ?>

<div class="page_top_in">
   
<h3><?php $word_t9=get_option('mytheme_word_t9'); ?>
<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); if($word_t9!=""){echo $word_t9;}else{echo '搜索结果:';} ;echo '"'. $key.'"'; wp_reset_query(); ?>

</h3>
    
</div>
<?php endif; ?>
</div>

<div id="page_muen_nav"> 
<?php if(is_single()){$id =get_the_ID();	$bbs_my_page=get_option('bbs_cat_page');$bbs_page_data = get_page($bbs_my_page );  if(get_post_meta($id,"bbs_shoppingbox", true)){
	 ?>
	<b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b>
    <a href="<?php bloginfo('url'); ?>">首页</a>
    <a>></a>
    <a href="<?php echo get_page_link($bbs_my_page);?>"><?php echo $bbs_page_data ->post_title  ?></a><a>></a><a><?php the_title(); ?></a>
	<?php }else{ ?>
 <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{get_bbks();}}
	
	}else{ ?>
 <b><?php if(get_option('mytheme_word_t11')==""){echo '您现在所在的位置';}else{ echo  get_option('mytheme_word_t11');}; ?></b><?php if( is_front_page() || is_home()) {echo "<a>首页</a>";}else{get_bbks();}}?>
 
 </div>