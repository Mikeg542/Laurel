<?php
/*
Template Name: Fullwidth + Slider
*/
	get_header();
		$headerstyle = of_get_option( 'header_style' );
		if ( $headerstyle != 'header3' && $headerstyle != 'header5' && $headerstyle != 'header6' )
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
	<div class="container">
		<div class="row">
			<section id='primary' class='content-area col-xs-12'>

				<?php if ( have_posts() ) :

				/* Start the Loop */

					while ( have_posts() ) : the_post(); ?>

						<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
							<header class='entry-header'>
								<?php if ( of_get_option( 'show_title' ) ) { the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
							</header><!-- .entry-header -->

							<div class='entry-content'>
									<?php if ( of_get_option( 'show_breadcrumbs' ) ) { the_breadcrumb(); } ?>
									<?php the_content(); ?>
							</div><!-- .entry-content -->
		
							<footer class='entry-footer'>
								<?php edit_post_link( __( 'Edit', 'laurel' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'content-templates/content', 'none' ); ?>

				<?php endif; ?>

			</section>
		</div>
	</div>
</div><!-- end #content -->
<?php
	get_footer();
?>