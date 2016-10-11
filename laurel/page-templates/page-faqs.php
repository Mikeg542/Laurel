<?php
/*
Template Name: FAQs Page
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

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				 	 
				 	 	<header class='entry-header'>
							<?php if ( of_get_option( 'show_title' ) ) { the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
						</header><!-- .entry-header -->

						<div class='entry-content'>
							<?php if ( of_get_option( 'show_breadcrumbs' ) ) { the_breadcrumb(); } ?>
								<?php the_content(); 
									$args = array(
										'post_type'        => 'faqs',
										'posts_per_page'   => -1,
										'post_status'      => 'publish',
										'orderby'          => 'date',
										'order'            => 'DESC',
									);
									$faqs = get_posts($args);
									if ( ! empty( $faqs ) ) {
										if ( of_get_option( 'faq_layout' ) == 'accordian-layout' ) {
										?>
				  						<div class='panel-group' id='faqs'>
											<?php
											foreach( $faqs as $k => $faq ) {
												$post_data	=	get_post( $faq->ID );
												$faqcontent	=	$post_data->post_content;
												$faqtitle	=	$post_data->post_title;
												$string		=	preg_replace( '/[^A-Za-z0-9 ]/', '', $faqtitle );
												$titleslug	=	str_replace( ' ', '', $string );
												?>
												<div class='panel panel-default'>
													<div class='panel-heading'>
														<h4 class='panel-title'>
															<a data-toggle='collapse' data-parent='#faqs' href='#<?php echo $titleslug ?>' class='collapsed'>
																<?php echo $faqtitle ?>
															</a>
														</h4>
													</div>
													<div id='<?php echo $titleslug ?>' class='panel-collapse collapse'>
														<div class='panel-body'>
															<?php echo $faqcontent ?>
														</div>	
													</div>
												</div>
											<?php 
											} 
											?>
											</div>
										<?php 
										} 
										if ( of_get_option( 'faq_layout' ) == 'list-layout' ) {
											echo '<div class="faq-list">';
											foreach( $faqs as $k => $faq ) {
												$post_data	=	get_post( $faq->ID );
												$faqcontent	=	$post_data->post_content;
												$faqtitle	=	$post_data->post_title;
												$string		=	preg_replace( '/[^A-Za-z0-9 ]/', '', $faqtitle );
												$titleslug	=	str_replace( ' ', '', $string );
												?>
												<h5><?php echo $faqtitle ?></h5>
												<p><?php echo $faqcontent ?></p>
												<hr/>
												<?php
											}
											echo '</div>';
										}
									}
									?>
								
						</div><!-- .entry-content -->
							
						<footer class='entry-footer'>
							<?php edit_post_link( __( 'Edit', 'laurel' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->
					</article><!-- #post-## -->

				<?php endwhile; ?>
				
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
