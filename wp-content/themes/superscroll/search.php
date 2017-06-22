<?php get_header();
 $detect = new Mobile_Detect();
if ($detect->isMobile()  || $detect->isTablet()){
	include_once("move/category.php"); 
	}
else{ 
get_template_part( 'page_single/top' ); 
?>	

<div id="content">
<?php get_template_part( 'product_nav' );  ?>
<div class="left_mian"><?php get_template_part( 'sidebar2' ); ?></div>
<div class="right_mian">

 <ul class="news_loop_01" id="default">
 
   <?php if(get_option('mytheme_list_nmber2')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber2');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               
                   <?php
    $title = get_the_title();
    $content =mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,300,"...");
   
    $linkss=get_post_meta($post->ID,"hoturl", true); 
    $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
           <li id="fist">
             <a    <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_the_permalink();}; ?>" class="news_001_pic">
              <?php  $tit= get_the_title();
					if (has_post_thumbnail()) { the_post_thumbnail('news-small-thumb' ,array('alt'	=>$tit, 'title'=> $tit ));}?> 
                    
                    </a>
              <span>
             <b><a  <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_the_permalink();}; ?>">
			 
			<?php echo $title; ?></a></b>
             <a class="time">TIME:<?php the_time('Y-m-d') ?></a>
          <p><?php echo $content;?></p>
            
             </span>
           </li>
             <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(); ?>  </div>  

</div>
</div>  
    <script>
(function(a){a.fn.textSearch=function(f,c){var e={divFlag:true,divStr:" ",markClass:"",markColor:"red",nullReport:true,callback:function(){return false}};var d=a.extend({},e,c||{}),b;if(d.markClass){b="class='"+d.markClass+"'"}else{b="style='color:"+d.markColor+";'"}a("span[rel='mark']").each(function(){var g=document.createTextNode(a(this).text());a(this).replaceWith(a(g))});a.regTrim=function(i){var h=/[\^\.\\\|\(\)\*\+\-\$\[\]\?]/g;var g={};g["^"]="\\^";g["."]="\\.";g["\\"]="\\\\";g["|"]="\\|";g["("]="\\(";g[")"]="\\)";g["*"]="\\*";g["+"]="\\+";g["-"]="\\-";g["$"]="$";g["["]="\\[";g["]"]="\\]";g["?"]="\\?";i=i.replace(h,function(j){return g[j]});return i};a(this).each(function(){var j=a(this);f=a.trim(f);if(f===""){return false}else{var g=[];if(d.divFlag){g=f.split(d.divStr)}else{g.push(f)}}var k=j.html();k=k.replace(/<!--(?:.*)\-->/g,"");var i=/[^<>]+|<(\/?)([A-Za-z]+)([^<>]*)>/g;var h=k.match(i),m=0;a.each(h,function(n,o){if(!/<(?:.|\s)*?>/.test(o)){a.each(g,function(q,p){if(p===""){return}var r=new RegExp(a.regTrim(p),"g");if(r.test(o)){o=o.replace(r,"♂"+p+"♀");m=1}});o=o.replace(/♂/g,"<strong rel='mark' "+b+">").replace(/♀/g,"</strong>");h[n]=o}});var l=h.join("");a(this).html(l);if(m===0&&d.nullReport){return false}d.callback()})};a("#default").textSearch("<?php echo wp_specialchars($s);?>")})(jQuery);

    </script>
<?php };get_footer(); ?>
