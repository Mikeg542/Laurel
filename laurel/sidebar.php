<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Laurel
 */

	if ( ! is_active_sidebar( 'sidebar-1' ) || ( function_exists('is_woocommerce') && is_woocommerce() ) ) {
		return;
	}
?>

<div id='secondary' class='widget-area col-sm-4' role='complementary'>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
