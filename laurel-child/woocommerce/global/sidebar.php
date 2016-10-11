<?php
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_active_sidebar( 'shop-sidebar' ) ) {
			echo '<div id="secondary" class="widget-area col-md-4 as" role="complementary">';
			dynamic_sidebar( 'shop-sidebar' );
			echo '</div>';
		}
?>