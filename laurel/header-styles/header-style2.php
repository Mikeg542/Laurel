<header id='masthead' class='site-header header2' role='banner'>
	<div class='container'>
		<div class='row'>
			<div class='site-branding col-xs-10 header2'>
				<?php 
				if ( ! of_get_option( 'site_logo' ) ) { ?>
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
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'mobilemenu')); ?>
			</div>
		</div>
	</div>
	<nav id='site-navigation' class='header2 main-navigation col-md-9 col-xs-12' role='navigation'>
		<div class='container'>
			<div class='row'>
				<?php 
				if ( of_get_option( 'show_search' ) ) { 
				?>
					<div class='header2 search-bar'>
						<?php get_template_part( 'template-part/header', 'searchbar' ); ?>
					</div>
				<?php 
				} 
				wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu' ) ); 
				?>
			</div>
		</div>
	</nav><!-- #site-navigation -->
</header><!-- #masthead -->