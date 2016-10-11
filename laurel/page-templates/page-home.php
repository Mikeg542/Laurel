<?php
/*
Template Name: Home Page
*/
	get_header();
	$headerstyle = of_get_option( 'header_style' );
	if ( $headerstyle != 'header3' && $headerstyle != 'header5' && $headerstyle != 'header6' && of_get_option( 'show_slider' ) )
	{
		$childslider = get_stylesheet_directory() . '/slider.php';
		if ( file_exists( $childslider ) ) {
			require get_stylesheet_directory() . '/slider.php';
		}
		else {
			require get_template_directory() . '/slider.php';
		}
	}
	?>
	<?php
	$widgetcount = 0;
	if ( is_active_sidebar( 'home-1' ) ) {
		$widgetcount++;
	}
	if ( is_active_sidebar( 'home-2' ) ) {
		$widgetcount++;
	}
	if ( is_active_sidebar( 'home-3' ) ) {
		$widgetcount++;
	}
	if ( $widgetcount > 0 ) {
		$widgetcols = 12 / $widgetcount;
		$widgetclass = 'col-sm-' . $widgetcols;
	}
	if ($widgetcount > 0) { ?>
		<div class='home-widget-area'>
			<div class='container'>
				<div class='row'>
					<?php
						if ( is_active_sidebar( 'home-1' ) ) {
							echo '<div class="widget1 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-1' );
							echo '</div>';
						}
						if ( is_active_sidebar( 'home-2' ) ) {
							echo '<div class="widget2 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-2' );
							echo '</div>';
						}
						if ( is_active_sidebar( 'home-3' ) ) {
							echo '<div class="widget3 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-3' );
							echo '</div>';
						}
					?>
					<div style='clear:both'></div>
				</div>
			</div>
		</div>
		<?php } ?>
	<div class="container">
		<div class="row">
			<section id='primary' class='content-area col-xs-12'>

				<?php if ( have_posts() ) :

	 			  /* Start the Loop */
	 		  	while ( have_posts() ) : the_post(); ?>

						<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
							<div class='entry-content'>
								<?php the_content(); ?>
							</div><!-- .entry-content -->
				
							<footer class='entry-footer'>
								<?php edit_post_link( __( 'Edit', 'laurel' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php
					endwhile;
				
				else :
				
					get_template_part( 'content-templates/content', 'none' );
				
				endif; ?>
					
			</section>
		</div>
	</div>
</div><!-- end #content -->
<?php
	get_footer();
?>