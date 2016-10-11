<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Laurel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset='<?php bloginfo( 'charset' ); ?>'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel='profile' href='http://gmpg.org/xfn/11'>
	<link rel='pingback' href='<?php bloginfo( 'pingback_url' ); ?>'>
	<?php 
	if(of_get_option( 'favicon_uploader' ) != '') { 
	?>
		<link rel='icon' href='<?php echo of_get_option( 'favicon_uploader', "" ); ?>' type='image/x-icon' />
	<?php 
	} 
	else { 
		?>
			<link rel='icon' href='<?php echo get_template_directory_uri(); ?>/favicon.ico' type='image/x-icon' />
		<?php 
	}
	wp_head(); ?>
	<script>
    new WOW().init();
  </script>
</head>
<?php
$scheme = of_get_option( 'light_dark' );
?>
<body <?php body_class( $scheme ); ?>>
<div id='page' class='hfeed site'>
	<div class='content-holder'>
	<a class='skip-link screen-reader-text' href='#content'><?php _e( 'Skip to content', 'laurel' ); ?></a>
	<?php 
	if ( of_get_option('show_topbar') ) {
	?>
		<header id='topbar' class='site-topbar' role='banner'>
			<div class='container'>
				<div class='row'>
					<div class='col-sm-8'>
						<?php 
						if ( has_nav_menu( 'topbar' ) ) {
							wp_nav_menu( array( 'theme_location' => 'topbar', 'menu_class' => 'topmenu' ) ); 
						}
						?>
					</div>
					<div class='col-sm-4'>
						<div class='social'>
						<?php
							get_template_part( 'template-part/header', 'sociallinks' ); 
						?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php
	}
  $headerstyle = of_get_option( 'header_style' );

	if ( $headerstyle == 'header1' ) {
		get_template_part( 'header-styles/header', 'style1' ); 
	}
	if ( $headerstyle == 'header2' ) {
		get_template_part( 'header-styles/header', 'style2' ); 		
	}
	if ( $headerstyle == 'header3' ) {
		get_template_part( 'header-styles/header', 'style3' ); 		
	}
	if ( $headerstyle == 'header4' ) {
		get_template_part( 'header-styles/header', 'style4' ); 	
	}
	if ( $headerstyle == 'header5' ) {
		get_template_part( 'header-styles/header', 'style5' ); 		
	}
	if ( $headerstyle == 'header6' ) {
		get_template_part( 'header-styles/header', 'style6' ); 		
	}
	?>
	<div id="content" class="site-content">
	