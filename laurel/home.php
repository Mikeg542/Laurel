<?php
/**
 * The Home Template.
 *
 * This page shows as the default Blog page layout.
 *
 * @package Laurel
 */
get_header(); 
if ( of_get_option( 'blog_home' ) ) {
	$headerstyle = of_get_option( 'header_style' );
	if ( $headerstyle != 'header3' && $headerstyle != 'header5' && $headerstyle != 'header6' && of_get_option( 'show_slider' ) )
	{
		$childslider = get_stylesheet_directory() . '/slider.php';
		if ( file_exists( $childslider ) ) {
			require get_stylesheet_directory() . '/slider.php';
		}
		else {
			require get_template_directory() . '/slider.php';
		}
	}
	$widgetcount = 0;
	if ( is_active_sidebar( 'home-1' ) ) {
		$widgetcount++;
	}
	if ( is_active_sidebar( 'home-2' ) ) {
		$widgetcount++;
	}
	if ( is_active_sidebar( 'home-3' ) ) {
		$widgetcount++;
	}
	if ( $widgetcount > 0 ) {
		$widgetcols = 12 / $widgetcount;
		$widgetclass = 'col-sm-' . $widgetcols;
	}
	if ($widgetcount > 0) { ?>
		<div class='home-widget-area'>
			<div class='container'>
				<div class='row'>
					<?php
						if ( is_active_sidebar( 'home-1' ) ) {
							echo '<div class="widget1 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-1' );
							echo '</div>';
						}
						if ( is_active_sidebar( 'home-2' ) ) {
							echo '<div class="widget2 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-2' );
							echo '</div>';
						}
						if ( is_active_sidebar( 'home-3' ) ) {
							echo '<div class="widget3 ' . $widgetclass . ' home-widget">';
							dynamic_sidebar( 'home-3' );
							echo '</div>';
						}
					?>
					<div style='clear:both'></div>
				</div>
			</div>
		</div>
  <?php
	}
}

$type = of_get_option( 'blog_layout' );
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
				<div class='<?php echo $type ?>'>

					<?php
					if ( have_posts() ) : ?>

						<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
							<header class='entry-header'>
								<h1 class='entry-title'>
								<?php 
								if ( of_get_option( 'show_title' ) ) { 
									echo of_get_option( 'blog_title' );
								}
								?>
								</h1>
							</header><!-- .page-header -->
							<div class='entry-content'>
								<?php	
										/* Start the Loop */
								$count = 0;
								while ( have_posts() ) : the_post(); 

									//If blog is selected to be in the list layout, use this code
									if ( $type == 'list-layout' ) {

									  if ( has_post_thumbnail() ) {
											echo '<div class="col-md-3 list">';
											the_post_thumbnail( 'medium', array( 'class' => 'alignleft' ) );
											echo '</div>';
											$listwidth = 'col-md-9'; 
										}
										else {
											$listwidth = 'col-md-12'; 
										}
										?>
										<div class='<?php echo $listwidth ?> list'>
											<div class='titlemeta'>
												<a href='<?php the_permalink(); ?>'><h2><?php the_title(); ?></h2></a>
												<?php
												if ( of_get_option( 'blog_meta' ) ) {
												?>
													<hr/>
													<div class='meta'>
														<span class='blog-author'>
															<i class='fa fa-user'></i>
															<?php the_author(); ?>
														</span>
														<span class='blog-date'>
															<i class='fa fa-calendar'></i>
															<?php the_time( 'F jS, Y' ) ?>
														</span>
														<?php
														if ( of_get_option( 'blog_comments' ) ) {
														?>
															<span class='blog-comment'>
																<i class='fa fa-comment'></i>
																<a href='<?php comments_link(); ?>'>
																	<?php comments_number( __('0 Comments', 'laurel' ), __('1 Comment', 'laurel' ), __('% Comments', 'laurel' ) ); ?>
																</a>
															</span>
														<?php
														}
														?>
													</div>
													<hr/>
												<?php
												}
												?>
											</div>
											<div class='blog-excerpt'>
												<?php
												if ( of_get_option( 'blog_excerpts' ) ) {
													the_excerpt();
												} 
												else {
													the_content();
												}
												?>
											</div>
										</div>
										<div class='clear'></div>
										<hr />
										<?php $count++;
									}

									//If blog is selected to be in the image grid layout, use this code
									if ( $type == 'grid-layout' ) {
										$num = 4;
										if ( in_array( $count, array( 0, 1, 5, 6 ) ) ) { 
											$num = 6;
										} 
										if ( has_post_thumbnail() ) { 
										?>
											<div class='col-md-<?php echo $num; ?> col-sm-6 col-xs-12 grid'>
												<a href='<?php the_permalink() ?>' class='blog-link'>
													<?php the_post_thumbnail( 'grid-blog-2col' );	?>
													<div class='titlemeta'>
														<!-- max 11 words -->
														<h2><?php echo string_limit_words( get_the_title(), 11 ); ?></h2>
														<hr/>
														<?php
														if ( of_get_option( 'blog_meta' ) ) {
														?>
															<div class='meta'>
																<span class='blog-author'><i class='fa fa-user'></i> <?php the_author(); ?></span>
																<?php
																if ( of_get_option( 'blog_comments' ) ) {
																?>
																	<span class='blog-comment'><i class='fa fa-comment'></i> <?php comments_number(); ?></span>
																<?php
																}
																?>
															</div>
														<?php
														}
														?>
													</div>
												</a>
											</div>
											<?php 
											if ( in_array ( $count, array( 1,4,6 ) ) ) {
												echo '<div class="clear"></div>';
											}
											$count++;
										}
									}

									//If blog is selected to be in the image grid layout, use this code
									if ($type == 'masonry-layout') {
									?>
										<div class='item'>
											<div class='boxin'>
												<?php the_post_thumbnail( 'grid-blog-2col' );	?>
												<div class='titlemeta'>
													<h2><a href='<?php the_permalink(); ?>'><?php echo string_limit_words( get_the_title(), 11 ); ?></a></h2>
													<hr/>
														<?php
														if ( of_get_option( 'blog_meta' ) ) {
														?>
															<div class='meta'>
																<span class='blog-author'><i class='fa fa-user'></i> <?php the_author(); ?></span>
																<?php
																if ( of_get_option( 'blog_comments' ) ) {
																?>
																	<span class='blog-comment'><i class='fa fa-comment'></i> <?php comments_number(); ?></span>
																<?php
																}
																?>
															</div>
														<?php
														}
														?>
												</div>
													<?php
													if ( of_get_option( 'blog_excerpts' ) ) {
														the_excerpt();
													} 
													else {
														the_content();
													}
													if ( of_get_option( 'blog_meta' ) && of_get_option( 'blog_comments' ) ) {
													?>
														<span class='blog-comment'><i class='fa fa-comment'></i> <a href='<?php comments_link(); ?>'><?php comments_number('0', '1', '%'); ?></a></span>
													<?php 
													} 
													?>
												<div class='clear'></div>
											</div>
										</div>
										<?php 
									}

								endwhile; ?>

								<?php laurel_paging_nav(); ?>

							</div>

						</article>

					<?php else : ?>

						<?php get_template_part( 'content-templates/content', 'none' ); ?>

					<?php endif; ?>

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
