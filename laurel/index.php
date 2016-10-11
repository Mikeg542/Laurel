<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				<div class='container'>
					<div class='row'>
					<?php if ( have_posts() ) : ?>

						<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
							<header class='entry-header'>
								<div class='container'>
									<h1 class='entry-title'>
									<?php 
									if ( of_get_option( 'show_title' ) ) { 
										echo of_get_option( 'blog_title' );
									}
									?>
									</h1>
								</div>
							</header><!-- .page-header -->
							<div class='entry-content'>
								<div class='container'>
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>

										<?php
											/* Include the Post-Format-specific template for the content.
										  * If you want to override this in a child theme, then include a file
					  				  * called content-___.php (where ___ is the Post Format name) and that will be used instead.
											*/
											get_template_part( 'content-templates/content', get_post_format() );
										?>

										<?php endwhile; ?>

										<?php laurel_paging_nav(); ?>

									<?php else : ?>

										<?php get_template_part( 'content-templates/content', 'none' ); ?>

									<?php endif; ?>
								</div>
							</div>
						</article>
					</div>
				</div>
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
