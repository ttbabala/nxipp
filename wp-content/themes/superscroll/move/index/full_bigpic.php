<?php                $case_show=get_option('mytheme_case_show');
			         $case_title=get_option('mytheme_case_title');
					 $case_title2=get_option('mytheme_case_title2');
					 $case_title3=get_option('mytheme_case_title3');
					 $case_en=get_option('mytheme_case_en');
			         $case1=get_option('mytheme_case1'); 
                     $case3=get_option('mytheme_case3');  
					 
			 ?>
<div id="full_bigpic">
      <div class="full_bigpic_hd">
         <h2><b><?php if( $case_title ==""){echo "最新";} else{echo  $case_title;} ?><a><?php if( $case_title2 ==""){echo "产品";} else{echo  $case_title2;} ?></a><?php if( $case_title3 ==""){echo "展示";} else{echo  $case_title3;} ?></b>
          <p><?php if( $case_en ==""){echo "Our latest work";} else{echo  $case_en;} ?> </p></h2>
          
         <a class="more" href="<?php echo get_category_link($case1);  ?>">more</a>
      </div>
 <?php get_template_part( 'move/index/full_bigpic_x01' );
       if($case3 !==""){get_template_part( 'move/index/full_bigpic_x02' ); }
 ?>
</div>