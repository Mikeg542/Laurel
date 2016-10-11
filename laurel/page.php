<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Laurel
 */

	get_header(); 
	$blogstyle = of_get_option( 'blog_sidebars' );
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$col = 'col-sm-8 col-xs-12';
	}
	if ( ! is_active_sidebar( 'sidebar-1' ) || $blogstyle == 'fullw' ) {
		$col = 'col-xs-12';
	}	
	?>			
	<div class='container'>
		<div class='row'>
		<?php		
			if ( is_active_sidebar( 'sidebar-1' ) && $blogstyle == 'leftside' ) {
				get_sidebar(); 
			}
			?>
			<section id='primary' class='content-area <?php echo $col ?>'>
						
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
								<?php 
								if ( of_get_option( 'show_title' ) ) { 
									the_title( '<h1 class="entry-title">', '</h1>' ); 
								} 
								?>
						</header><!-- .entry-header -->
						<div class='entry-content'>
							<?php if ( of_get_option( 'show_breadcrumbs' ) ) { 
								the_breadcrumb(); 
							} 
							?>
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
			</section><!-- #primary -->
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) && $blogstyle == 'rightside' )  { 
				get_sidebar(); 
			} 
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>