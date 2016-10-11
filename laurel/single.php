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

					<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
						<header class='entry-header'>
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class='entry-content'>
							<figure class='blog-image'>
								<?php the_post_thumbnail( 'post-slider-image' ); ?>
							</figure>
							<?php the_content(); ?>
							<?php
							if ( of_get_option( 'blog_meta' ) ) {
							?>
								<div class='meta'>
									<hr/>
									<span class='blog-author'><i class='fa fa-user'></i> <?php the_author(); ?></span>
									<span class='blog-date'><i class='fa fa-calendar'></i> <?php the_time('F jS, Y') ?></span>
									<?php
									if ( of_get_option( 'blog_comments' ) ) {
									?>
										<span class='blog-comment'><i class='fa fa-comment'></i> <?php comments_number(); ?></span>
									<?php
									}
									?>
									<hr/>
								</div>
							<?php
							}

							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif; ?>
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
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) && $blogstyle == 'rightside' )  { 
				get_sidebar(); 
			} 
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>