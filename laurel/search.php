<?php
/**
 * The template for displaying search results pages.
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

			<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
					<header class='entry-header'>
						<div class='container'>
							<h1 class='entry-title'>
								<?php 
								printf( __( 'Search Results for: %s', 'laurel' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</div>
					</header><!-- .page-header -->
					<div class='entry-content'>
						<div class='container'>

							<?php /* Start the Loop */
							while ( have_posts() ) : the_post();

							/**
				 		  * Run the loop for the search to output the results. 
						  * If you want to overload this in a child theme then include a file
							* called content-search.php and that will be used instead.
							*/
								get_template_part( 'content-templates/content', 'search' );
										
							endwhile;

						laurel_paging_nav();

						else :

							get_template_part( 'content-templates/content', 'none' );

						endif; ?>
						</div>
					</div>
				</article>
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
