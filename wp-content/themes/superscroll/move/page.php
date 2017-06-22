<div id="content" class="toppp">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
<?php if(is_single()):?> 

<div class="title_page"><h1><?php the_title();?></h1></div><div class="des_page"><a>TIME: <?php the_time('Y-m-d')?></a>
 <?php foreach((get_the_category()) as $category) { echo '<a href="'. get_category_link($category->cat_ID).'">' .$category->cat_name .'</a> ';}?>
<div class="tag_pro">
		
		<?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a href="'.get_bloginfo('url').'/?tag='.$tag->slug.'">' .$tag->name .'</a>';}}?> 
        
        </div>

</div>



<?php endif; ?>


  <div class="enter">
   
  
   <?php the_content(); ?></div>

<div id="respond">
 
</div>
 <?php endwhile; endif; ?>


</div>