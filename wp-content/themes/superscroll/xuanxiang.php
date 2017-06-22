<?php
/*添加主题选项*/
add_action('admin_menu', 'mytheme_page');
function mytheme_page (){
 
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
 
		$options = array (
		'tags_m',
		'search_m',
		'theme_shop_open',
		'title',
		'keywords',
		'title_p',	
		'description_p',
		'keywords_p',	
		'description',
		'analytics',
        'ico',
		'logo',
		'left_right',
		'bbs_mo',
		'pic1',
		'pic_png1',
		'pic_title1',
		'pic_content1',
		'pic_link1',
		'pic_taget1',
		'pic_move1',
		'contact_beijing',
		'pic2',
		'pic_png2',
		'pic_title2',
		'pic_content2',
		'pic_link2',
		'pic_taget2',
		'pic_move2',
		
		'pic3',
		'pic_png3',
		'pic_title3',
		'pic_content3',
		'pic_link3',
		'pic_taget3',
		'pic_move3',
		
		'pic4',
		'pic_png4',
		'pic_title4',
		'pic_content4',
		'pic_link4',
		'pic_taget4',
		'pic_move4',
		
		'wenzi_title1',
		'wenzi_contnt1',
	    'wenzi_link1',
		
		'wenzi_title2',
		'wenzi_contnt2',
	    'wenzi_link2',
		
		'wenzi_title3',
		'wenzi_contnt3',
	    'wenzi_link3',		
		'service',
		'service_title',
		'service_title_en',
		'service_content',
		'list_nmber_nav',
		'fenxiang',
		
		
		'hot_cat',
		'news_pics',
		'pic_b',
		'case1',
		'case_title',
		'case_content',
		'case_pic',
		'about',
		'about_title',
		'about_en',
	    'about_pic',
		'about_pic2',
		'band',
		'band_title',
		'band_en',
		'band_pic',
		'contact_title',
	    'contact_title_2',
		'two_code_title',
		'two_code',
		'maps',
		'maps_link',
		'message_title',
	    'message_title_2',
		
		'news1',
		'news2',
		'news_title1',
		'news_title2',
		'news_title_en1',
		'news_title_en2',
	
	
		'video',
		'modle1',
		'modle2',
		'modle3',
		'modle4',
		'modle5',
		'modle6',
		'modle7',
		'case',
		
		'tell',
		'email',
		'fax',
		'address',
		'themepark',
		'icp_b',
		'word_t1',
		'word_t2',
		'word_t3',
		'word_t4',
		'word_t5',
		'word_t6',
		'word_t7',
		'word_t8',
		'word_t9',
		'word_t10',
		'word_t11',
		'word_t12',
		'word_t13',
		'word_t14',
		'word_t15',
		'word_t16',
		'word_t17',
		'word_t18',
		'word_t19',
		'word_t20',
		'word_t21',
		'word_t22',
	    'word_t23',
		'word_t24',
		'word_t25',
		'word_t26',
		'word_t27',
		'word_t28',
		'word_t40',
		'word_t41',
		'word_t42',
		'word_t43',
		'word_t44',
		'top_pic',
		'list_nmber1',
		'list_nmber2',
		'list_nmber3',
		'list_nmber4',
		'list_nmber5',
		'list_nmber6',
		
		'footer_loop',
		'footer_loop_bt',
		'footer_loop_other',
		'theme_color',
		'footer_ersx_bt',
		'eso_jr',
		'language1',
		'language2',
		'language_link1',
		'language_link2',
			'kefu_weixin',
		'kefu_qq',
		'kefu_on',
		'move_yes',
		'move_index',
		'fenxiang'
		);
 
		foreach ( $options as $opt ){
 
			delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
 
			add_option ( 'mytheme_'.$opt, $_POST[$opt] );	
 
		}
 
	}
 
	add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings');
}
 //加载upload.js文件   
            //加载上传图片的js(wp自带)   
            wp_enqueue_script('thickbox');   
            //加载css(wp自带)   
            wp_enqueue_style('thickbox');  
function mytheme_settings(){?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/upload.js"></script>  
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/xuanxiang.css" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.js"></script> 
<script src="<?php bloginfo('template_url'); ?>/js/jquery.form.js"></script> 
    <script type="text/javascript">
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
$('#submit').click(function() { //When trigger is clicked...   
      
    $('.tishi2').fadeIn('500');
   });  
var options = {
	    
	    success: function() {
	        $(this).ajaxSubmit();
                $('.tishi').fadeIn('500');
			   setTimeout("$('.tishi2').fadeOut('slow')",3000);
			   setTimeout("$('.tishi').fadeOut('slow')",3000);
			   
	    },
		error: function() { 
		$('.tishi2').fadeOut('slow');
		alert("填写错误，重新填写！"); return false;
		                   
		 } 
		};
 
		    $('form.xuanxiangka').ajaxForm(options); 
			  
          
       
        }); 
		
		
 </script> 

   
<div class="wrap">
 
    <div class="tou"></div>
    <div class="shuoming">
      <?php   
	$ct = wp_get_theme();
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';
$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;' ), $ct->display('Name') );
 ?>
        <p><b>主题名称：<?php echo $ct->display('Name'); ?></b> <a class="banben">版本：<?php echo $ct->display('Version'); ?></a> <a  href="http://www.themepark.com.cn/jjyxwordpressqyzt.html" target="_blank" class="jieshao">详细介绍</a> 
        <a href="http://www.themepark.com.cn/jjyxwordpressztjc.html" target="_blank" class="bangzhu">教程和帮助</a></p>
        <p><b>主题出品：</b><a target="_blank" href="http://www.themepark.com.cn"><?php echo $ct->display('Author'); ?></a>  <a href="http://www.themepark.com.cn/jjyxwordpressqyzt.html" target="_blank">付费主题的正版用户可以享受后台一键自动更新</a></p>
    
    </div>
    <div class="biaodan">
<div class="tishi2">
<p class="tishi">提交成功,刷新网页即可看到效果！</p>
<p class="tishi3">正在提交，请勿关闭网页！</p>

</div>
    <div class="biaodan">
        <form method="post" action=""class="xuanxiangka">
 
             <DIV id=con>
                   <UL id=tags>
                       <LI class=selectTag><div class="tb1"></div> <A onClick="selectTag('tagContent1',this)" href="javascript:void(0)">初始化设置</A> </LI>
                     
                       <LI><div class="tb2"></div><A onClick="selectTag('tagContent0',this)" href="javascript:void(0)">布局和微调</A> </LI>
                  
                       <LI><div class="tb4"></div><A onClick="selectTag('tagContent2',this)" href="javascript:void(0)">其他设置</A> </LI>
                       
                       <LI><div class="tb4"></div><A onClick="selectTag('tagContent3',this)" href="javascript:void(0)">多语言</A> </LI>
                       <LI><div class="tb5"></div><A onClick="selectTag('tagContent4',this)" href="javascript:void(0)">移动设备</A> </LI>
                    
                    
                    
                        
                         
                   </UL>
                <DIV id=tagContent>
                
                
                <!--第一栏目：初始化设定-->
                   <DIV class="tagContent selectTag" id=tagContent1><?php include_once("options/options1.php"); ?></DIV>
                    <!--第一栏目：初始化设定-->
                   <DIV class=tagContent id=tagContent0> <?php include_once("options/options2.php"); ?></DIV>
                     <!--第三栏目：SEO-->
                   <DIV class=tagContent id=tagContent2> <?php include_once("options/options3.php"); ?></DIV>
                    <DIV class=tagContent id=tagContent3> <?php include_once("options/options4.php"); ?></DIV>
                    <!--第四栏目：内页设置-->
             <DIV class=tagContent id=tagContent4> <?php include_once("options/options5.php"); ?></DIV>
                     <!--第五栏目：其他设置-->
                 
               </DIV>
            </DIV>
<p>
  <SCRIPT type=text/javascript>
function selectTag(showContent,selfObj){
	// 操作标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 操作内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
	
}
</SCRIPT>
</p>
  
 
  <div class="submit">
 
		           <input type="submit" name="Submit" class="button-primary" value="保存设置"  id="submit"/>
 
	             	 <input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
              
	                 </div>


</form>

</div>

 
<?php }
echo $after_widget;
/*添加主题选项over*/?>