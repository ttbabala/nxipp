<?php
if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => '【默认】这些小工具会添加在内页的侧边栏，如果你只设置这个小工具那么全部页面的侧边栏将统一，其他小工具设置之后会替换掉这个小工具',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
	
    register_sidebar(array(
    		'name' => 'sidebar-widgets2',
    		'id'   => 'sidebar-widgets2',
    		'description'   => '【正方形图文列表模板（分类目录）】',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
	
		register_sidebar(array(
    		'name' => 'sidebar-widgets3',
    		'id'   => 'sidebar-widgets3',
    		'description'   => '【纯文字列表模板（分类目录）】',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		
		register_sidebar(array(
    		'name' => 'sidebar-widgets4',
    		'id'   => 'sidebar-widgets4',
    		'description'   => '【大图文模板（分类目录）】',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
			register_sidebar(array(
    		'name' => 'sidebar-widgets5',
    		'id'   => 'sidebar-widgets5',
    		'description'   => '【产品展示模板（文章内页）】',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		register_sidebar(array(
    		'name' => 'sidebar-widgets6',
    		'id'   => 'sidebar-widgets6',
    		'description'   => '【页面模板（默认页面）】',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		register_sidebar(array(
    		'name' => 'sidebar-widgets9',
    		'id'   => 'sidebar-widgets9',
    		'description'   => '【移动版首页自定义排版预览】：这个小工具请建立页面，并选择模板移动版自定义排版预览，进入自定义自定义这个页面（进入自定义前，请将页面发送到导航上，进入自定义之后点击这个页面即可开始排版）',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
}

include_once("widget/cat_posts-news1.php");
include_once("widget/cat_posts-news_h.php");
include_once("widget/cat_posts-news2.php");
include_once("widget/cat_posts-news3.php");
include_once("widget/cat_posts-news_smoll.php");
include_once("widget/nav.php");
include_once("widget/pic.php");
include_once("widget/news.php");
include_once("widget/about.php");
include_once("widget/move_nav.php");
include_once("widget/case2.php");
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

function mytheme_customize_register($wp_customize){
	class Ari_Customize_qrcode_Control extends WP_Customize_Control {
  public $type = 'qr-code';
  public function render_content() {

 ?>
 <p>扫描二维码，查看实际展示效果</p>
  <img style="width:80%; height:80%;" src="http://api.qrserver.com/v1/create-qr-code/?size=100×100&data=<?php bloginfo('url'); ?>"/>
<?php 
  }
}
	  $wp_customize->add_section('mytheme_detects_scheme', array(
        'title'    => __('移动版宽度调整', 'mytheme'),
        'description' => ' 移动版宽度调整，你可以选择平板电脑、手机的宽度，查看网站在移动设备上的表现</br><strong>注意，这里的预览可能和正真的表现有所不同，由于预览的脚本有冲突，所以导航目前无法开启，你可以在设置完成之后用你的移动设备查看</strong></br>  <a href="http://www.themepark.com.cn" target="_blank">WEB主题公园开发提供</a>  </br>',
        'priority' => 79,
    ));
	
	
	 
	   $wp_customize->add_setting('mytheme_detects', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mytheme_detects', array(
        'label'      => __('设备宽度选择，选择你所需要的宽度进行查看', 'mytheme_detects'),
        'section'    => 'mytheme_detects_scheme',
        'settings'   => 'mytheme_detects',
		'type'    => 'select',
		 'choices'    => array(
            'value1' => '平板电脑（768）',
            'value2' => 'ipone4(640)',
         'value3' => '其他手机（480)',
        ),
    )); 
	
	 $wp_customize->add_setting('mytheme_qrcode', array(
        'default'        => 'value1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
	
	 $wp_customize->add_control(new Ari_Customize_qrcode_Control($wp_customize, 'mytheme_qrcode', array(
          'label'      => __('二维码', 'mytheme_qrcode'),
         'section'    => 'mytheme_detects_scheme',
         'settings'   => 'mytheme_qrcode',
  
      )));
};
add_action('customize_register', 'mytheme_customize_register');		


add_editor_style('/css/editor-style.css');  
function add_editor_buttons($buttons) {

$buttons[] = 'fontselect';

$buttons[] = 'fontsizeselect';

$buttons[] = 'cleanup';

$buttons[] = 'styleselect';

$buttons[] = 'hr';

$buttons[] = 'del';

$buttons[] = 'sub';

$buttons[] = 'sup';

$buttons[] = 'copy';

$buttons[] = 'paste';

$buttons[] = 'cut';

$buttons[] = 'undo';

$buttons[] = 'image';

$buttons[] = 'anchor';

$buttons[] = 'backcolor';

$buttons[] = 'wp_page';

$buttons[] = 'charmap';

return $buttons;

}
add_filter("mce_buttons_3", "add_editor_buttons");

?>