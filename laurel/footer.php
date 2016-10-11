<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Laurel
 */
?>
<?php
$widgetcount = 0;
if ( is_active_sidebar( 'footer-1' ) ) {
	$widgetcount++;
}
if ( is_active_sidebar( 'footer-2' ) ) {
	$widgetcount++;
}
if ( is_active_sidebar( 'footer-3' ) ) {
	$widgetcount++;
}
if ( is_active_sidebar( 'footer-4' ) ) {
	$widgetcount++;
}
if ($widgetcount > 0) {
	$widgetcols = 12 / $widgetcount;
	$widgetclass = 'col-sm-' . $widgetcols;
}
?>
			<div id='scrolltotop'><i class='fa fa-arrow-circle-up'></i></div>
		</div><!-- #content -->
	</div><!-- #page -->
</div>
<?php
dynamic_sidebar( 'above-footer' );
?>
<footer id='colophon' class='site-footer' role='contentinfo'>
<?php 
if ($widgetcount > 0) {
?>
	<div class='footer-widgets'>
		<div class='container'>
			<div class='row'>
				<?php
					if ( is_active_sidebar( 'footer-1' ) ) {
						echo "<div class='widget1 " . $widgetclass ."'>";
						dynamic_sidebar( 'footer-1' );
						echo '</div>';
					}
					if (is_active_sidebar('footer-2')) {
						echo "<div class='widget2 " . $widgetclass ."'>";
						dynamic_sidebar( 'footer-2' );
						echo '</div>';
					}
					if (is_active_sidebar('footer-3')) {
						echo "<div class='widget3 " . $widgetclass ."'>";
						dynamic_sidebar( 'footer-3' );
						echo '</div>';
					}
					if (is_active_sidebar('footer-4')) {
						echo "<div class='widget4 " . $widgetclass ."'>";
						dynamic_sidebar( 'footer-4' );
						echo '</div>';
					}						
				?>
			</div>
		</div>
	</div>
	<?php 
	}	
	if ( of_get_option( 'show_footer_nav' ) || is_active_sidebar( 'footer-text' ) ) {
	?>
		<div class='footer-section'>
			<div class="container">
				<div class="row">
					<?php
					if ( of_get_option( 'show_footer_nav' ) && ! is_active_sidebar( 'footer-text' ) ) {
					?>
						<div class='col-xs-12'>
							<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footermenu' ) ); ?>
						</div>		
						<?php
					}
					if ( of_get_option( 'show_footer_nav' ) && is_active_sidebar( 'footer-text' ) ) {
					?>	
						<div class='col-sm-8'>
							<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footermenu' ) ); ?>
						</div>		
						<div class='col-sm-4'>
							<div class='footer-text'><?php dynamic_sidebar( 'footer-text' ) ?></div>
						</div>
						<?php
					}
					if ( ! of_get_option( 'show_footer_nav' ) && is_active_sidebar( 'footer-text' ) ) {
					?>
						<div class='col-xs-12'>
							<div class='footer-text'>
								<?php dynamic_sidebar( 'footer-text' ) ?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	<?php
	}	
	?>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
