<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$numpp = of_get_option( 'testimonials_pp' );
$args = array( 	'post_type'		=> 'testimonials',
								'posts_per_page'   => $numpp,
								'post_status'      => 'publish',
								'orderby'          => 'date',
								'order'            => 'ASC',
								'paged' 					 => $paged );
$testislist = new WP_Query( $args );
$layout = of_get_option( 'testimonial_layout' );
$contentclass = 'col-sm-12';
if ( $layout == 'boxed-layout' ) {
	$mainclass = 'testi-box';
	$imgclass = 'col-md-2';
	$contentclass = 'col-md-9 col-xs-12';
}

if ( $testislist->have_posts() ) :
while ( $testislist->have_posts() ) : $testislist->the_post(); 

	$meta = get_post_meta( get_the_ID(), '_testimonial', true  );
	$sl_image_url   =      wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'thumbnail');
	if ( ! empty( $meta['client_name'] ) ) {
		$clientname = $meta['client_name'];
	}
	if ( ! empty( $meta['source'] ) ) {
		$loc = $meta['source'];
	}
	if ( ! empty( $meta['link'] ) ) {
		$linkurl = $meta['link'];
	}
	?>
	<div class='col-md-12 <?php echo $mainclass ?>'>
		<div class='testimonial'>
			<?php
			if ( ! empty( $sl_image_url[0] ) ) {
			?>
				<figure class='testimonial-image <?php echo $imgclass ?>'>
				<?php echo "<img src='" . $sl_image_url[0] . "' class='aligncenter' alt='' />"; ?>
				</figure>
			<?php
			}
			?>
			<div class='testimonial-content <?php echo $contentclass ?>'>
				<?php the_content() ?>
				<br><strong>
				<?php 
					if ( ! empty( $clientname ) ) { 
						echo $clientname; 
					}
					if ( ! empty( $loc ) ) {
						echo ' | ' . $loc;
					}
				?>
				</strong>
				<br/>
				<?php 
					if ( ! empty( $linkurl ) ) { 
						echo "<a href='" . $linkurl . "' target='_BLANK'>" . $linkurl . "</a>";
					} 
				?>
				<?php
				if ( $layout == 'list-layout' ) {
					echo '<br/><hr/>';
				}
				?>
			</div>
		</div>
	</div>
<?php 
	endwhile;
?>
<div class='clear'></div>
<div class='navigation'>
	<?php
		$numpages = $testislist->max_num_pages;
		if ( $numpages > 1 ) {
			previous_posts_link( '&laquo;' ); 
			echo '<ul class="laurelpagination">';
			for ( $x=1; $x<=$numpages; $x++ ) {
				if ( $x == $paged ) {
					echo '<li class="active">' . $x . '</li>';
				}
				else {
					echo '<li><a href="' . site_url('/testimonials/page/') . $x . '">' . $x . '</a></li>';
				}
			}
			echo '</ul>';
			next_posts_link( '&raquo;', $numpages );
			wp_reset_postdata();
		}
	?>
</div>
<?php
	endif;
?>