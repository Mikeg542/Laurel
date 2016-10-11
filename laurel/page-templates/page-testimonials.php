<?php
/*
Template Name: Testimonials Page
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

					<?php /* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
						
						<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
							<header class='entry-header'>
								<?php if ( of_get_option( 'show_title' ) ) { the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
							</header><!-- .entry-header -->

							<div class='entry-content'>
								<?php if ( of_get_option( 'show_breadcrumbs' ) ) { the_breadcrumb(); } ?>
								<?php the_content(); ?>
								<?php get_template_part( 'content-templates/content', 'testimonials' ); ?>
							</div><!-- .entry-content -->

							<footer class='entry-footer'>
								<?php edit_post_link( __( 'Edit', 'laurel' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php
					endwhile;

				endif; ?>

			</section>
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) && $blogstyle == 'rightside' )  { 
				get_sidebar(); 
			} 
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>