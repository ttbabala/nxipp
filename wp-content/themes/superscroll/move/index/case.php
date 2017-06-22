<?php  $case= get_option('mytheme_case'); ?>
<div id="case">
   <b><?php $case_bt=get_option('mytheme_case_bt');  if($case_bt!=""){echo $case_bt;}else {echo '精选客户案例';} ?></b>
   
   <ul class="bigpic_loop" id="case_ul">

  <?php $posts = get_posts( "category=($case)&numberposts=6" ); ?>
    <?php if( $posts ) : ?>                                       
			   <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>     
<li>

<a  href="<?php the_permalink() ?>">
  <?php   $tit= get_the_title();if (has_post_thumbnail()) { the_post_thumbnail('news-sidbar-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?>
  </a>



</li>




 <?php endforeach; ?>                                            
               <?php else : ?>
               <?php endif; ?> 

</ul>

</div>