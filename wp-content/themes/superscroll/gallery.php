<?php 
//deactivate WordPress function

//activate own function
if (!function_exists('wpe_gallery_shortcode')) {

function wpe_gallery_shortcode($attr) {
		$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'li',
		'icontag'    => 'a',
		'captiontag' => 'span',
		'columns'    => 3,
		'size'       => 'page-thumbb',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "";
	$size_class = sanitize_html_class( $size );
	if ( ! empty( $link ) && 'none' === $link ){
	$gallery_div = '<div id="enter_xz"class="smaoll_xzs"><ul id="gallery-1" class="gallery_xz">';
	}
	elseif( ! empty( $link ) && 'file' === $link ){  $gallery_div = '<div id="enter_xz" class="big_xzs"><ul id="gallery-1" class="gallery_xz">';; }
	else{	$gallery_div = '<ul id="gallery-1" class="list-h">';}
	
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $link ) && 'none' === $link ){
	    $image_output = wp_get_attachment_image( $id, "gallery-other-thumbb", false );
		}
		elseif( ! empty( $link ) && 'file' === $link ){  $image_output = wp_get_attachment_image( $id, "gallery-full-thumbb", false ); }
		
		else {
	  
	    $image_output = wp_get_attachment_image( $id, $size, false );
        $image_meta  = wp_get_attachment_metadata( $id );
		$image_scr = wp_get_attachment_image_src( $id,"product_single-thumb" , false );
	   
	   }

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "<{$itemtag}>";
	if ( ! empty( $link ) && 'none' === $link ){
		$output .= "$image_output";
	}elseif( ! empty( $link ) && 'file' === $link ){$output .= "$image_output";}else{
		$output .= "
			<a rel=$image_scr[0]>
				$image_output
				</a>
			";
	}
		$output .= "</{$itemtag}>";
		
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '';
	}
if ( ! empty( $link ) && 'none' === $link ){
	$output .= '</ul><a class="next"></a><a class="prve"></a></div><script>$(function() {
$("#enter_xz").jCarouselLite({
btnNext: "#enter_xz .next",
btnPrev: "#enter_xz .prve",
visible:1,
start:0,
auto:3000,
speed:900,
onMouse:true,
easing: "easeOutCirc"
});
});
</script>';}
		elseif( ! empty( $link ) && 'file' === $link ){$output .= '</ul><a class="next"></a><a class="prve"></a></div>
		<script>$(function() {
$("#enter_xz").jCarouselLite({
btnNext: "#enter_xz .next",
btnPrev: "#enter_xz .prve",
visible:1,
start:0,
auto:3000,
speed:900,
onMouse:true,
easing: "easeOutCirc"
});
});
</script>';
		
		
		}
		else{ $output .= "
			
		</ul>"; }

	return $output;
}
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'wpe_gallery_shortcode');
}
?>