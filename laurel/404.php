<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Laurel
 */

get_header(); ?>

	<div class='container'>
			<div class='row'>

			<section class='error-404 not-found col-md-12'>
				<header class='page-header'>
					<h1 class='page-title'><?php _e( 'Oops! That page can&rsquo;t be found.', 'laurel' ); ?></h1>
				</header><!-- .page-header -->

				<div class='page-content'>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'laurel' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( laurel_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class='widget widget_categories'>
						<h2 class='widget-title'><?php _e( 'Most Used Categories', 'laurel' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . __( 'Try looking in the monthly archives.', 'laurel' ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>
					<hr/>
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
