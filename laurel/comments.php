<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Laurel
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() || ! of_get_option( 'blog_comments' ) ) {
	return;
}
?>

<div id='comments' class='comments-area'>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class='comments-title'>
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'laurel' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id='comment-nav-above' class='comment-navigation' role='navigation'>
			<h1 class='screen-reader-text'><?php _e( 'Comment navigation', 'laurel' ); ?></h1>
			<div class='nav-previous'><?php previous_comments_link( __( '&larr; Older Comments', 'laurel' ) ); ?></div>
			<div class='nav-next'><?php next_comments_link( __( 'Newer Comments &rarr;', 'laurel' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class='comment-list'>
			<?php
				wp_list_comments( array(
					'style'      => 'ul',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id='comment-nav-below' class='comment-navigation' role='navigation'>
			<h1 class='screen-reader-text'><?php _e( 'Comment navigation', 'laurel' ); ?></h1>
			<div class='nav-previous'><?php previous_comments_link( __( '&larr; Older Comments', 'laurel' ) ); ?></div>
			<div class='nav-next'><?php next_comments_link( __( 'Newer Comments &rarr;', 'laurel' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class='no-comments'><?php _e( 'Comments are closed.', 'laurel' ); ?></p>
	<?php endif; ?>

	<?php $comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send',
        // change the title of the reply section
        'title_reply'=>'Write a Reply or Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'laurel' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
);

comment_form($comments_args); ?>

</div><!-- #comments -->
