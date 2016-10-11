<?php
/*
Template Name: Fullwidth Page
*/
	get_header();
	?>
	<div class="container">
		<div class="row">
			<section id='primary' class='content-area col-xs-12'>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

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