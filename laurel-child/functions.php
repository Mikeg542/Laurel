<?php
function show_portfolio_sc( $atts ){
	$args = array(
		'post_type'        => 'services',
		'posts_per_page'   => -1,
		'post_status'      => 'publish',
		'orderby'          => 'date',
		'order'            => 'ASC',
		);
	$posts = get_posts($args);
	if (empty($posts)) return;

	$output .= '<div class="all-items">';
	foreach( $posts as $k => $post ) {
		$post_data = get_post( $slide->ID );
		if ( has_post_thumbnail( $post->ID ) ) {
			$sl_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'grid-blog-2col' );
			$output .= '<a href="' .  $post->post_excerpt . '" target="_BLANK"><div class="port-item"><img alt="" src="' . $sl_image_url[0] . '" />';
			$output .= "<div class='port-logo'>" . $post->post_content . "</div>";
			$output .= '</div></a>';
		}
	}
	$output .= '</div>';
	return $output;
}
add_shortcode( 'show_portfolio', 'show_portfolio_sc' );
?>