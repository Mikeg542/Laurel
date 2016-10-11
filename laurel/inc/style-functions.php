<?php
add_action( 'wp_head', 'laurel_general_opt' );


/* This function takes the Laurel Options and assigns appropriate CSS styles thoughout the site */
function laurel_general_opt() {
	$output = "\n<style type='text/css'>";

	/*/////////////////////////// GENERAL STYLES /////////////////////////*/

	// Normal body bg option
	$bg = of_get_option( 'background_main' );
	if ( $bg['image'] != '' ) {
		$output .= "\nbody { background-image:url( '" . $bg['image'] . "' );";
		$output .= "background-repeat:" . $bg['repeat'] . "; background-position:" . $bg['position'] . "; background-attachment:" . $bg['attachment'] . "; }";
	}
	if ( $bg['color'] != '' && empty( $bg['image'] ) && of_get_option( 'background_pattern' ) != 'patternnone' ) {
		$background = of_get_option( 'background_pattern' );
		$path = get_template_directory_uri();
		$pattern = $path . "/images/" . $background . ".png";
		$output .= "\nbody { background-image:url( '".$pattern. "' ); background-repeat:repeat; }";
	}
	if ( $bg['color'] != '' && $bg['image'] == '' && of_get_option( 'background_pattern' ) == 'patternnone' ) {
		$output .= "\nbody { background-color:" . $bg['color'] . "; }";		  		
	}
	if ( $bg['color'] == '' && $bg['image'] == '' && of_get_option( 'background_pattern' ) != 'patternnone') {
		$background = of_get_option( 'background_pattern' );
		$path = get_template_directory_uri();
		$pattern = $path . "/images/" . $background . ".png";
		$output .= "\nbody { background-image:url( '" . $pattern . "' );";
		$output .= "background-repeat: repeat }";
	}
	//Boxed width Body background
	if ( of_get_option( 'background_body' ) != '' ) { 
		$output .= "\n.boxed .content-holder { background-color:" . of_get_option( 'background_body' ) . "; }";
	}
	if ( of_get_option( 'background_internal' ) != '' ) { 
		$output .= "\nbody:not(.home):not(.boxed) #content > .container { background-color:" . of_get_option( 'background_internal' ) . "; }";
	}
	//Dynamic Site width
	if ( of_get_option( 'site_width' ) ) {
		$width = of_get_option( 'site_width' );
		$widthpx = $width . 'px';
		$container = ( $width - 30 ) . "px";
		if ( ! of_get_option( 'disable_responsive' ) ) {
			$output .= "@media ( min-width: $widthpx ) { .container {	width: $container; } .boxed .site-footer, .boxed .content-holder { width: $widthpx; }  }";
			if ($width >= 980) {
				$output .= "@media ( max-width: $widthpx ) and ( min-width:981px ) { .boxed .site-footer, .boxed .content-holder { width: 960px; } .container {	width: 930px; } }";
			}
			$output .= '@media ( max-width: 980px ) and ( min-width:768px ) { .boxed .site-footer, .boxed .content-holder { width: 750px; } }';
			$output .= '@media ( max-width: 767px ) and ( min-width:481px ) { .boxed .site-footer, .boxed .content-holder {	width: 470px;	} }';
			$output .= '@media ( max-width: 480px ) { .boxed .site-footer, .boxed .content-holder {	width: 100%; } }';
		}
		else {
			$output .= "\n.container {	width: $container !important; }";
			$output .= "\n.slider-wrapper > .container { width: 100% !important; min-width: $container !important; }";
			$output .= "\n.boxed .site-footer, .boxed .content-holder { width: $widthpx; }";
			$output .= "\nbody { overflow-x: visible; }";
			$output .= "\nfooter ul.footermenu li { float: left }";
		}
	}
	//Homepage Widgets Background
	$homewidgebg = of_get_option( 'background_homewidget' );
	if ( $homewidgebg['image'] != "" ) {
		$output .= "\n.home-widget-area  { background-image:url( '" . $homewidgebg['image'] . "' );";
		$output .= "background-repeat:" . $homewidgebg['repeat'] . "; background-position:" . $homewidgebg['position'] . "; background-attachment:" . $homewidgebg['attachment'] . "; }";
	}
	if ( $homewidgebg['image'] == '' && $homewidgebg['color'] != "" ) {
		$output .= "\n.home-widget-area  { background-color:" . $homewidgebg['color'] . "; }";
	}
	if ( of_get_option( 'totop_color' ) ) {
		$output .= "\n#scrolltotop i { color: " . of_get_option( 'totop_color' ) . "; }";
	}

	/*/////////////////////////// Slider STYLES /////////////////////////*/

	if ( of_get_option( 'bullet_color' ) ) {
		$output .= "\n .slider-wrapper a.nivo-control.active { background-color:" . of_get_option( 'bullet_color' ) . "; }";
	}

	if ( ! of_get_option( 'show_caption_bg' ) ) {
		$output .= "\n.nivo-caption { background: none; text-shadow: 1px 2px 1px #212121; opacity: 1 }";
	}

	if ( of_get_option( 'left_cap' ) ) {
		$output .= "\n.nivo-caption { left: " . of_get_option( 'left_cap' ) . "; }";
	}
	if ( of_get_option( 'bottom_cap' ) ) {
		$output .= "\n.nivo-caption { bottom: " . of_get_option( 'bottom_cap' ) . "; }";
	}
	if ( of_get_option( 'width_cap' ) ) {
		$output .= "\n.nivo-caption { width: " . of_get_option( 'width_cap' ) . "; }";
	}
	/*/////////////////////////// HEADER STYLES /////////////////////////*/

	//Header Styles
	$headerbg = of_get_option( 'background_header' );
	if ( $headerbg['image'] != '' ) {
		$output .= "\nheader.site-header { background-image:url('" . $headerbg['image'] . "');";
		$output .= "background-repeat:" . $headerbg['repeat'] . "; background-position:" . $headerbg['position'] . "; background-attachment:" . $headerbg['attachment'] . "; }";
	}
	if ( $headerbg['image'] == '' && $headerbg['color'] != '' ) {
		$output .= "\nheader.site-header { background-color:" . $headerbg['color'] . "; }";
	}
	if ( of_get_option( 'menu_float' ) ) {
		$output .= "\nul.sf-menu { float:" . of_get_option( 'menu_float' ) . "; }";
	}	
	//Topbar Styles
	$topbg = of_get_option( 'topbar_header' );
  if ( $topbg['image'] != "" ) {
		$output .= "\n.site-topbar { background-image:url('" . $topbg['image'] . "');";
		$output .= "background-repeat:" . $topbg['repeat'] . "; background-position:" . $topbg['position'] . "; background-attachment:" . $topbg['attachment'] . "; }";
	}
	if ( $topbg['image'] == '' && $topbg['color'] != '' ) {
		$output .= "\n.site-topbar { background-color:" . $topbg['color'] . "; }";
	}

	//Navigation Background 
	$navbg = of_get_option( 'background_nav' );
	if ( $navbg['image'] != "" ) {
		$output .= "\nnav.main-navigation, .header4nav { background-image:url('" . $navbg['image'] . "');";
		$output .= "background-repeat:" . $navbg['repeat'] . "; background-position:" . $navbg['position'] . "; background-attachment:" . $navbg['attachment'] . "; }";
	}
	if ( $navbg['image'] == "" && $navbg['color'] != "") {
		$output .= "\nnav.main-navigation, .header4nav { background-color:" . $navbg['color'] . "; }";
	}
	if ( of_get_option( 'link_hover_line' ) ) {
		$output .= "\nnav.main-navigation li.current-menu-item a, nav.main-navigation li:hover a { border-top: 4px solid " . of_get_option( 'link_hover_line' ) . "; } nav.main-navigation li a { border-top: 4px solid transparent; }";
	}

	if ( of_get_option( 'dropdown_color' ) ) {
		$output .= "\n.main-navigation ul.sub-menu { background-color:" . of_get_option( 'dropdown_color' ) . "; }";	
	}

	if ( of_get_option( 'dropdown_hover' ) ) {
		$output .= "\n.main-navigation ul.sub-menu li:hover { background-color:" . of_get_option( 'dropdown_hover' ) . "; }";	
	}

	/*/////////////////////////// TYPOGRAPHY STYLES /////////////////////////*/

	//Link Styles
	if ( of_get_option( 'link_color' ) ) {
		$output .= "\na, #faqs .panel-title a  { color:" . of_get_option( 'link_color' ) . "; }";
		$output .= "\n.laurelpagination li { border-color:" . of_get_option( 'link_color' ) . "; }";
	} 
	
	if ( of_get_option( 'link_hover' ) ) {
		$output .= "\na:hover, a:active, a:focus, #faqs .panel-title a:hover { color:" . of_get_option( 'link_hover' ) . "; }";
		$output .= "\n.laurelpagination li:hover, .laurelpagination li.active { border-color:" . of_get_option( 'link_hover' ) . "; }";
	}
	
	/*/////////////////////////// WOOCOMMERCE STYLES /////////////////////////*/

	if ( of_get_option( 'woocommerce_columns' ) ) {
		$columns = of_get_option( 'woocommerce_columns' );
		if ( $columns == 2 ) {
			$width = "48.1%";
		}
		if ( $columns == 3 ) {
			$width = "30.8%";
		}
		if ( $columns == 4 ) {
			$width = "22.05%";
		}			
		$output .= "\n.woocommerce ul.products li.product, .woocommerce-page ul.products li.product { width: $width }";
	}

	if ( of_get_option( 'addtocart_color' ) ) {
		$output .= "\n.woocommerce ul.products li.product a.add_to_cart_button { background-color: " . of_get_option( 'addtocart_color' ) . " }";
	}
	
	if ( of_get_option( 'addtocart_color_hover' ) ) {
		$output .= "\n.woocommerce ul.products li.product a.add_to_cart_button:hover { background-color: " . of_get_option( 'addtocart_color_hover' ) . " }";
	}

	if ( of_get_option( 'addtocart_link' ) ) {
		$output .= "\n.woocommerce ul.products li.product a.add_to_cart_button { color: " . of_get_option( 'addtocart_link' ) . " }";
	}

	if ( of_get_option( 'addtocart_link_hover' ) ) {
		$output .= "\n.woocommerce ul.products li.product a.add_to_cart_button:hover { color: " . of_get_option( 'addtocart_link_hover' ) . " }";
	}

	if ( ! of_get_option( 'woocommerce_reviews' ) ) {
		$output .= "\n.woocommerce ul.products li.product div.star-rating { display: none }";
	}

	if ( of_get_option( 'woocommerce_catalogue' ) ) {
		$output .= "\n.woocommerce a.add_to_cart_button, .woocommerce .cart { display: none }";
	}

	/*/////////////////////////// FOOTER STYLES /////////////////////////*/
	
	//Footer widget area
	$footwbg = of_get_option( 'widget_footer' );
	if ( $footwbg['image'] != "" ) {
		$output .= "\n.footer-widgets { background-image:url('" . $footwbg['image'] . "');";
		$output .= "background-repeat:" . $footwbg['repeat'] . "; background-position:" . $footwbg['position'] . "; background-attachment:" . $footwbg['attachment'] . "; }";
	}
	if ( $footwbg['image'] == "" && $footwbg['color'] != "" ) {
		$output .= "\n.footer-widgets { background-color:" . $footwbg['color'] . "; }";			
	}	
	//Footer Text Area
	$footbg = of_get_option( 'section_footer' );
	if ( $footbg['image'] != "" ) {
		$output .= "\n.footer-section { background-image:url('" . $footbg['image'] . "');";
		$output .= "background-repeat:" . $footbg['repeat'] . "; background-position:" . $footbg['position'] . "; background-attachment:" . $footbg['attachment'] . "; }";
	}
	if ( $footbg['image'] == "" && $footbg['color'] != "" ) {
		$output .= "\n.footer-section { background-color:" . $footbg['color'] . "; }";			
	}	

	/*/////////////////////////// END STYLES /////////////////////////*/	
			
	$output .= "\n</style>";

	echo $output;

}

//FullWidth or Boxed layout body class
add_filter( 'body_class','page_layout' );
function page_layout( $classes ) {
	// add 'class-name' to the $classes array
	if ( of_get_option( 'full_boxed' ) == 'boxed' ) {
		$classes[] = 'boxed';
	}
	else {
		$classes[] = 'full';
	}	
	// return the $classes array
	return $classes;
}

/*
 * Outputs the selected option panel styles inline into the <head>
 */
function options_typography_styles() {
  $output = '';
  if ( of_get_option( 'h1_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h1_font' ) , 'h1');
  }

  if ( of_get_option( 'h2_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h2_font' ) , 'h2');
  }

  if ( of_get_option( 'h3_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h3_font' ) , 'h3');
  }

  if ( of_get_option( 'h4_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h4_font' ) , 'h4');
  }

  if ( of_get_option( 'h5_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h5_font' ) , 'h5');
  }

  if ( of_get_option( 'h6_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'h6_font' ) , 'h6');
  }

  if ( of_get_option( 'body_text' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'body_text' ) , 'body, label');
  }

  if ( of_get_option( 'nav_links' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'nav_links' ) , '.main-navigation ul.sf-menu li a' );
  	$option = of_get_option( 'nav_links' );
  	$output .= ".mobile-menu i, .search-toggle .fa { color: " . $option['color'] . "; }";
  	$output .= ".search-toggle { font-size: " . $option['size'] . "; }";
  }

  if ( of_get_option( 'footer_nav' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'footer_nav' ) , 'ul.footermenu li a' );
    $option = of_get_option( 'footer_nav' );
    $output .= "ul.footermenu li a { border-left: 1px solid " . $option['color'] . "; }";
  }

  if ( of_get_option( 'caption_text' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'caption_text' ) , 'div.nivo-caption' );
  }

  if ( of_get_option( 'topbar_text' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'topbar_text' ) , 'ul.topmenu li a' );
  }

  if ( of_get_option( 'mobile_text' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'mobile_text' ) , 'header .mobilemenu a' );
  }

  if ( of_get_option( 'footer_widget' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'footer_widget' ) , 'footer .footer-widgets' );
  }

  if ( of_get_option( 'footer_font' ) ) {
    $output .= options_typography_font_styles( of_get_option( 'footer_font' ) , '.footer-text' );
  }

  //Add custom styles last so they overwrite everything
  $output .= "\n".htmlspecialchars_decode( of_get_option( 'custom_css' ) );
  
  if ( $output != '' ) {
		$output = "\n<style>\n" . $output . "</style>\n";
		echo $output;
  }

}
add_action( 'wp_head', 'options_typography_styles' );

/*
 * Returns a typography option in a format that can be outputted as inline CSS
 */
function options_typography_font_styles( $option, $selectors ) {
	$output = $selectors . ' {';
	$output .= ' color:' . $option['color'] .'; ';
	$output .= 'font-family:' . $option['face'] . '; ';
	$output .= 'font-size:' . $option['size'] . '; ';
	$output .= 'font-weight:' . $option['weight'] . '; ';
	$output .= '}';
	$output .= "\n";
	return $output;
}
?>