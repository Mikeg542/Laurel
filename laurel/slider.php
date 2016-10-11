 <script type='text/javascript'>
	jQuery(function(){
			
		jQuery( '#camera_random' ).nivoSlider({
			effect: '<?php echo of_get_option( 'slide_animation' ); ?>',
			animSpeed:<?php echo of_get_option( 'anim_speed' ); ?>,
			pauseTime:<?php echo of_get_option( 'pause_time' ); ?>,
			directionNav:<?php echo of_get_option( 'show_arrows' ); ?>,
			controlNav:<?php echo of_get_option( 'show_slide_nav' ); ?>,
			controlNavThumbs:<?php echo of_get_option( 'show_slide_thumbs' ); ?>
		
		});
	
	});
</script>
<?php 
$headerstyle = of_get_option( 'header_style' );
if ($headerstyle == 'header5') {
	$style = 'pull-up';
}
else {
	$style = '';
}
?>

<div class='slider-wrapper <?php echo $style . " " . $headerstyle ?>'>
	<div class='container'>
		<div class='row'>
			<div class='camera_wrap camera_azure_skin' id='camera_random'>
				<?php
				$args = array(
					'post_type'        => 'slides',
					'posts_per_page'   => -1,
					'post_status'      => 'publish',
					'orderby'          => 'date',
					'order'            => 'ASC',
				);
				$slides = get_posts($args);
				if (empty($slides)) {
					return;
				}
		
				$captions = array();
				foreach( $slides as $k => $slide ) {
					$url = get_post_meta( $slide->ID, 'url', true  );
					$post_data        =      get_post($slide->ID);
					$caption          =      $post_data->post_content;
					$classes          =      get_body_class();
					if ( in_array( 'full', $classes ) ) {
						$sl_image_url   =      wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), 'post-slider-image-full' );    		
					}
					else {
						$sl_image_url   =      wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), 'post-slider-image' );
					}
					if ( ! empty( $url ) ) {
						echo "<a href='$url'>";
					}
					echo "<img alt='' src='$sl_image_url[0]'";
				  if ( $caption && of_get_option( 'show_caption' ) ) { 
						echo " title='#title" . $slide->ID . "'";
						$captions[$slide->ID] = stripslashes( htmlspecialchars_decode( $caption ) ); 
					}
					if ( of_get_option( 'show_slide_thumbs' ) ) {
						$sl_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $slide->ID ), 'post-slider-thumb' );
						echo " data-thumb='$sl_thumb_url[0]'";
					}
					echo ">";

				 	if ( ! empty( $url ) ) {
						echo "</a>";
					}

				}
				echo "</div>";
				if ( of_get_option( 'show_caption' ) )
				{
					foreach ( $captions as $id => $cap ) {
						echo "<div id='title" . $id . "' class='nivo-html-caption'>";
						echo $cap;
						echo "</div>";
					}
				}
			?>
		</div><!-- Row -->
	</div>
<?php 
if ( $headerstyle != 'header6' ) {
	echo "</div>"; 
} 
?>