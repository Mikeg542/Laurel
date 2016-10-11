<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @subpackage Laurel
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
						<h1 class='entry-title'>
						<?php 
						if ( of_get_option( 'show_title' ) ) { 
							if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'laurel' ), get_the_date() );
							elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'laurel' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'laurel' ) ) );
							elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'laurel' ), get_the_date( _x( 'Y', 'yearly archives date format', 'laurel' ) ) );
							else :
								_e( 'Archives', 'laurel' );
							endif;
						}
						?>
   				</header><!-- .page-header -->
					<div class='entry-content'>
					<?php
						// Start the Loop.
					while ( have_posts() ) : the_post();
														/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
												get_template_part( 'content-templates/content', 'archive' );
					endwhile;

									// Previous/next page navigation.
					laurel_paging_nav();

					else :
					
						// If no content, include the "No posts found" template.
						get_template_part( 'content-templates/content', 'none' );

					endif;
					?>
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
