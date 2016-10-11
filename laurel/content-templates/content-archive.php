<?php
/**
 * @package Laurel
 */
?>

<article id='post-<?php the_ID(); ?>' <?php post_class(); ?>>
	<header class='entry-header'>
		<a href='<?php the_permalink() ?>'><?php the_title( '<h4 class="entry-title">', '</h4>' ); ?></a>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class='entry-meta'>
				<?php laurel_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class='entry-content'>
		<?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'laurel' ) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'laurel' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class='entry-footer'>
		<?php
		if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'laurel' ) );
				if ( $categories_list && laurel_categorized_blog() ) :
			?>
			<span class='cat-links'>
				<?php printf( __( 'Posted in %1$s', 'laurel' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories 

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'laurel' ) );
			if ( $tags_list ) : ?>
				<span class='tags-links'>
					<?php printf( __( 'Tagged %1$s', 'laurel' ), $tags_list ); ?>
				</span>
			<?php endif; // End if $tags_list
		endif; // End if 'post' == get_post_type() ?>



		<?php edit_post_link( __( 'Edit', 'laurel' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->