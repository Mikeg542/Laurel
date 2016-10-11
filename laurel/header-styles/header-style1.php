<header id='masthead' class='site-header header1' role='banner'>
	<div class='container'>
		<div class='row'>
			<div class='site-branding col-sm-3 col-xs-10 header1'>
				<?php 
				if ( of_get_option( 'site_logo' ) ) { 
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
				<nav id='site-navigation' class='main-navigation header1 col-sm-9 col-xs-12' role='navigation'>
				<?php
				if ( of_get_option( 'show_search' ) ) { 
				?>
					<div class='header1 search-bar'>
						<?php get_template_part( 'template-part/header', 'searchbar' ); ?>
					</div>
				<?php 
				}
				wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu' ) ); ?>
			</nav><!-- #site-navigation -->		
		</div>
	</div>
</header><!-- #masthead -->