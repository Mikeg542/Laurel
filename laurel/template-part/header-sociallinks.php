<?php
if ( of_get_option( 'fb_url' ) ) {
	echo "<a href='" . of_get_option( 'fb_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/facebook.png' alt='facebook icon' /></a>";
}
if ( of_get_option( 'twitter_url' ) ) {
	echo "<a href='" . of_get_option( 'twitter_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/twitter.png' alt='twitter icon' /></a>";
}
if ( of_get_option( 'google_url' ) ) {
	echo "<a href='" . of_get_option( 'google_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/google.png' alt='googleplus icon' /></a>";
}
if ( of_get_option( 'linkedin_url' ) ) {
	echo "<a href='" . of_get_option( 'linkedin_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/linkedin.png' alt='linkedIn icon' /></a>";
}
if ( of_get_option( 'instagram_url' ) ) {
	echo "<a href='" . of_get_option( 'instagram_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/instagram.png' alt='instagram icon' /></a>";
}
if ( of_get_option( 'pinit_url' ) ) {
	echo "<a href='" . of_get_option( 'pinit_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/pinterest.png' alt='pinterest icon' /></a>";
}
if ( of_get_option( 'rss_url' ) ) {
	echo "<a href='" . of_get_option( 'rss_url' ) . "' target='_BLANK'><img src='" . get_stylesheet_directory_uri() . "/images/icons/rss.png' alt='rss icon' /></a>";
}
?>