<?php
	if ( ( is_front_page() && of_get_option( 'show_slider' ) ) || is_page_template( 'page-templates/page-fullwidthslider.php' ) ) { 
		$childslider = get_stylesheet_directory() . '/slider.php';
		if (file_exists($childslider)) {
			require get_stylesheet_directory() . '/slider.php';
		}
		else {
			require get_template_directory() . '/slider.php';
		} 
	}
?>
<header id='masthead' class='site-header header3' role='banner'>
	<div class='container'>
		<div class='row'>
			<div class='site-branding col-sm-3 header3'>
				<?php 
				if ( ! of_get_option( 'site_logo' ) ) {	
				?>
					<h1 class='site-title'>
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home'>
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
				<?php 
				} 
				else {
					$logo_url = of_get_option( 'site_logo' );
					echo "<a href='" . esc_url( home_url( '/' ) ) . "'><img class='logo' src='" . $logo_url . "' alt='" . get_bloginfo( 'name' ) . " Logo' /></a>";
				} 
				?>
			</div>
				<div class='mobile-menu'>
					<i class='fa fa-bars'></i>
					<div style='clear:both'></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobilemenu' ) ); ?>
				</div>
				<nav id='site-navigation' class='main-navigation header3 col-sm-9 col-xs-12' role='navigation'>
				<?php
				if ( of_get_option( 'show_search' ) ) { 
				?>
					<div class='header3 search-bar'>
						<?php get_template_part( 'template-part/header', 'searchbar' ); ?>
					</div>
				<?php 
				} 	
				?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu' ) ); ?>
			</nav><!-- #site-navigation -->		
		</div>
	</div>
</header><!-- #masthead -->