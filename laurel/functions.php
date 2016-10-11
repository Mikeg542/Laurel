<?php
/**
 * Laurel functions and definitions
 *
 * @package Laurel
 */

/**
 * Set the content width based on the theme's desgpn and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

if ( ! function_exists( 'laurel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function laurel_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Laurel, use a find and replace
	 * to change 'laurel' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'laurel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Add support for WooCommerce
	add_theme_support( 'woocommerce' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	//Register primary navigation bar menu
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'laurel' ),
	) );

	//Register Top Bar (very top of site) alternate menu. This menu contains the social icons in the theme options
	register_nav_menus( array(
		'topbar' => __( 'Top Bar Menu', 'laurel' ),
	) );

	//Register Footer Menu which appears at the bottom of the site
	register_nav_menus( array(
		'footer' => __( 'Footer Menu', 'laurel' ),
	) );	

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'laurel_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // laurel_setup
add_action( 'after_setup_theme', 'laurel_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function laurel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'laurel' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main Site Sidebar', 'laurel' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'laurel' ),
		'id'            => 'shop-sidebar',
		'description'   => __( 'Sidebar that displays on shop pages', 'laurel' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'laurel' ),
		'id'            => 'header-area',
		'description'   => __( 'Section in the top right of the header when using header style 4', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Page 1', 'laurel' ),
		'id'            => 'home-1',
		'description'   => __( 'Widget Areas below the navigation and/or slideshow on the homepage', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Page 2', 'laurel' ),
		'id'            => 'home-2',
		'description'   => __( 'Widget Areas below the navigation and/or slideshow on the homepage', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Page 3', 'laurel' ),
		'id'            => 'home-3',
		'description'   => __( 'Widget Areas below the navigation and/or slideshow on the homepage', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Above Footer', 'laurel' ),
		'id'            => 'above-footer',
		'description'   => __( 'Widget Areas between the footer navigation and main content', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area 1', 'laurel' ),
		'id'            => 'footer-1',
		'description'   => __( 'Widget Areas between the footer navigation and main content', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area 2', 'laurel' ),
		'id'            => 'footer-2',
		'description'   => __( 'Widget Areas between the footer navigation and main content', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area 3', 'laurel' ),
		'id'            => 'footer-3',
		'description'   => __( 'Widget Areas between the footer navigation and main content', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area 4', 'laurel' ),
		'id'            => 'footer-4',
		'description'   => __( 'Widget Areas between the footer navigation and main content', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Text Widget', 'laurel' ),
		'id'            => 'footer-text',
		'description'   => __( 'Widget Areas at the bottom right of the page', 'laurel' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'laurel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function laurel_scripts() {
	$type = of_get_option( 'blog_layout' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/css/bootstrap.css', array() );
	wp_enqueue_style( 'superfish', get_template_directory_uri() . '/inc/css/superfish.css', array() );
	if ( of_get_option( 'show_slider' ) ) {
		wp_enqueue_style( 'slider', get_template_directory_uri() . '/inc/css/nivo-slider.css', array() );
	}
	wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/inc/css/jquery.bxslider.css', array() );
	wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/inc/css/prettyPhoto.css', array() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array() );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/inc/css/animate.css', array() );
	wp_enqueue_style( 'devicons-css', 'https://cdnjs.cloudflare.com/ajax/libs/devicons/1.8.0/css/devicons.min.css', array() );
	wp_enqueue_style( 'laurel-style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script( 'jquery' );
	if ( of_get_option( 'show_slider' ) ) {
		wp_enqueue_script( 'jquery-slider', get_template_directory_uri() . '/inc/js/jquery.nivo.slider.pack.js', array(), false, true );
  }
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array(), false, true );
	wp_enqueue_script( 'jspretty-photo', get_template_directory_uri() . '/inc/js/jquery.prettyPhoto.js', array(), false, true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/inc/js/superfish.js', array(), false, true );
  wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/inc/js/jquery.bxslider.min.js', array(), false, true );
 	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.js', array(), false, true );
	wp_enqueue_script( 'parral', get_template_directory_uri() . '/inc/js/parallax.min.js', array(), false, true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/inc/js/wow.js', array(), false, false );
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/inc/js/custom.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'laurel_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Plugin Activator
 */
require get_template_directory() . '/inc/tgm-plugin-activation/laurel-activation.php';


add_image_size( 'post-slider-image', 1250, 520, true );
add_image_size( 'post-slider-image-full', 1920, 585, true );
add_image_size( 'grid-blog-2col', 600, 350, true );
add_image_size( 'grid-blog-3col', 384, 250, true );
add_image_size( 'post-slider-thumb', 70, 50, true );

//Laurel Breadcrumb creation function
function the_breadcrumb() {
  global $post;
  echo '<hr/><ul id="breadcrumbs">';
  if ( ! is_front_page() ) {
  	echo '<li><a href="';
    echo home_url();
    echo '">';
    echo  __( 'Home', 'laurel' );
    echo '</a></li><li class="separator"> / </li>';
    if ( is_category() || is_single() ) {
      echo '<li>';
      the_category( ' </li><li class="separator"> / </li><li> ' );
      if ( is_single() ) {
        echo '</li><li class="separator"> / </li><li>';
        the_title();
        echo '</li>';
      }
    }
    if ( is_home() ) {
    	echo '<li>' . __( 'Blog', 'laurel' ) . '</li>';
    }
    elseif ( is_page() ) {
      if( $post->post_parent ) {
        $anc = get_post_ancestors( $post->ID );
        $title = get_the_title();
        foreach ( $anc as $ancestor ) {
          $output = '<li><a href="'.get_permalink( $ancestor ).'" title="'.get_the_title( $ancestor ).'">'.get_the_title( $ancestor ).'</a></li> <li class="separator">/</li>';
        }
        echo $output;
        echo '<li title="'.$title.'"> '.$title.'</li>';
      }
      else {
        echo '<li> '.get_the_title().'</li>';
      }
    }
  }
  elseif ( is_tag() ) { 
  	single_tag_title();
  }
  elseif ( is_day() ) {
  	echo '<li>' . __( 'Archive for ', 'laurel' ); 
  	the_time('F jS, Y'); 
  	echo '</li>';
  }
  elseif ( is_month() ) {
  	echo '<li>' . __( 'Archive for ', 'laurel' ); 
  	the_time('F, Y'); 
  	echo '</li>';
	}
  elseif ( is_year() ) {
  	echo '<li>' . __( 'Archive for ', 'laurel' ); 
  	the_time('Y'); 
  	echo '</li>';
	}
  elseif ( is_author() ) {
  	echo '<li>' . __( 'Author Archive', 'laurel' ) . '</li>';
	}
  elseif ( isset($_GET['paged'] ) && ! empty( $_GET['paged'] ) ) {
  	echo '<li>' . __( 'Blog Archives', 'laurel' ) . '</li>';
	}
  elseif ( is_search() ) {
  	echo '<li>' . __( 'Search Results', 'laurel' ) . '</li>';
	}
  echo '</ul><div class="clearfix"></div><hr/><div class="clearfix"></div>';
}

function options_typography_get_os_fonts() {
  $os_faces = array(
    'Arial, sans-serif' => 'Arial',
    '"Avant Garde", sans-serif' => 'Avant Garde',
    'Cambria, Georgia, serif' => 'Cambria',
    'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
    'Georgia, serif' => 'Georgia',
    '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
    'Tahoma, Geneva, sans-serif' => 'Tahoma',
    'Trebuchet MS, Arial, sans-serif' => 'Trebuchet MS'
  );
  return $os_faces;
}
function options_typography_get_google_fonts() {
  // Google Font Defaults
  $google_faces = array(
		'Open Sans, sans-serif' => 'Open Sans',
		'Slabo, serif' => 'Slabo',
		'Roboto, sans-serif' => 'Roboto',
		'Oswald, sans-serif' => 'Oswald',
		'Lato, sans-serif' => 'Lato',
		'Roboto Condensed, sans-serif' => 'Roboto Condensed',
		'Source Sans Pro, sans-serif' => 'Source Sans Pro',
		'PT Sans, sans-serif' => 'PT Sans',
		'Open Sans Condensed, sans-serif' => 'Open Sans Condensed',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Raleway, sans-serif' => 'Raleway',
		'Droid Serif, serif' => 'Droid Serif',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Merriweather, serif' => 'Merriweather',
		'Copse, serif' => 'Copse',
		'Montserrat, sans-serif' => 'Montserrat',
		'Roboto Slab, serif' => 'Roboto Slab',
		'PT Sans Narrow, sans-serif' => 'PT Sans Narrow',
		'Lora, serif' => 'Lora',
		'Arimo, sans-serif' => 'Arimo',
		'Bitter, serif' => 'Bitter',
		'Oxygen, sans-serif' => 'Oxygen',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz',
		'Lobster, cursive' => 'Lobster',
		'Arvo, serif' => 'Arvo',
		'Indie Flower, cursive' => 'Indie Flower',
		'PT Serif, serif' => 'PT Serif',
		'Noto Sans, sans-serif' => 'Noto Sans',
		'Titillium Web, sans-serif' => 'Titillium Web',
		'Francois One, sans-serif' => 'Francois One',
		'Dosis, sans-serif' => 'Dosis',
		'Fjalla One, sans-serif' => 'Fjalla One',
		'Cabin, sans-serif' => 'Cabin',
		'Playfair Display, serif' => 'Playfair Display',
		'Ubuntu Condensed, sans-serif' => 'Ubuntu Condensed',
		'Muli, sans-serif' => 'Muli',
		'Vollkorn, serif' => 'Vollkorn',
		'Abel, sans-serif' => 'Abel',
		'Signika, sans-serif' => 'Signika',
		'Nunito, sans-serif' => 'Nunito',
		'Poiret One, sans-serif' => 'Poiret One',
		'Archivo Narrow, sans-serif' => 'Archivo Narrow',
		'Shadows Into Light, cursive' => 'Shadows Into Light',
		'Libre Baskerville, serif' => 'Libre Baskerville',
		'Bree Serif, serif' => 'Bree Serif',
		'Maven Pro, sans-serif' => 'Maven Pro',
		'Cuprum, sans-serif' => 'Cuprum',
		'Play, sans-serif' => 'Play',
		'Noto Serif, serif' => 'Noto',
		'Hammersmith One, sans-serif' => 'Hammersmith One',
		'Rokkitt, serif' => 'Rokkitt',
		'Inconsolata, sans-serif' => 'Inconsolata',
		'Pacifico, cursive' => 'Pacifico',
		'Asap, sans-serif' => 'Asap',
		'Anton, sans-serif' => 'Anton',
		'Alegreya, serif' => 'Alegreya',
		'Josefin Sans, sans-serif' => 'Josefin Sans',
		'Armata, sans-serif' => 'Armata',
		'Karla, sans-serif' => 'Karla',
		'Dancing Script, cursive' => 'Dancing Script',
		'Questrial, sans-serif' => 'Questrial',
		'Gloria Hallelujah, cursive' => 'Gloria Hallelujah',
		'Exo, sans-serif' => 'Exo',
		'Varela Round, sans-serif' => 'Varela Round',
		'News Cycle, sans-serif' => 'News Cycle',
		'Architects Daughter, cursive' => 'Architects Daughter',
		'Istok Web, sans-serif' => 'Istok Web',
		'Quicksand, sans-serif' => 'Quicksand',
		'Ropa Sans, sans-serif' => 'Ropa Sans',
		'Pontano Sans, sans-serif' => 'Pontano Sans',
		'Crete Round, serif' => 'Crete Round',
		'Monda, sans-serif' => 'Monda',
		'Domine, serif' => 'Domine',
		'Tinos, serif' => 'Tinos',
		'Gudea, sans-serif' => 'Gudea',
		'Coming Soon, cursive' => 'Coming Soon',
		'Sigmar One, cursive' => 'Sigmar One'
  );
  return $google_faces;
}
/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
if ( ! function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$h1_font = of_get_option( 'h1_font' );
		$h2_font = of_get_option( 'h2_font' );
		$h3_font = of_get_option( 'h3_font' );
		$h4_font = of_get_option( 'h4_font' );
		$h5_font = of_get_option( 'h5_font' );
		$h6_font = of_get_option( 'h6_font' );
		$body_text = of_get_option( 'body_text' );
		$nav_links = of_get_option( 'nav_links' );
		$caption_text = of_get_option( 'caption_text' );
		$topbar_text = of_get_option( 'topbar_text' );
		$mobile_text = of_get_option( 'mobile_text' );
		$footer_font = of_get_option( 'footer_font' );
		$footer_widget = of_get_option( 'footer_widget' );
		$footer_nav = of_get_option( 'footer_nav' );
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
			$h1_font['face'],
			$h2_font['face'],
			$h3_font['face'],
			$h4_font['face'],
			$h5_font['face'],
			$h6_font['face'],
			$body_text['face'],
			$nav_links['face'],
			$caption_text['face'],
			$topbar_text['face'],
			$mobile_text['face'],
			$footer_font['face'],
			$footer_widget['face'],
			$footer_nav['face'] 
		);
		// Remove any duplicates in the list
		$selected_fonts = array_unique( $selected_fonts );
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font( $font );
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );
/**
 * Enqueues the Google $font that is passed
 */
function options_typography_enqueue_google_font($font) {
	$font = explode( ',', $font );
	$font = $font[0];
	// Certain Google fonts need slight tweaks in order to load properly
	$font = str_replace( " ", "+", $font );
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font:400,600,700,900", false, null, 'all' );
}

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
/**
 * CSS Files inserted into wp_head
 */
require get_template_directory() . '/inc/style-functions.php';

//Function to create excerpts of a given length
function string_limit_words( $thestring, $len ) {
	$words = explode( ' ', $thestring );
	if ( sizeof( $words ) >= $len ) {
		$words = array_slice( $words, 0, $len );
		$thestring = implode( ' ', $words );
		$thestring .= '...';
	}
	return $thestring;
}

//enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

//Set the number of columns in the Woocommerce shop based on the theme options
add_filter( 'loop_shop_columns', 'loop_columns' );
if ( ! function_exists( 'loop_columns' ) ) {
	function loop_columns() {
		return of_get_option( 'woocommerce_columns' ); // 3 is default - products per row
	}
}

//Set number of products per page in Woocommerce based on theme options
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return of_get_option( "woocommerce_ppp" );' ), 20 );

//add logo to wp login page
function my_login_logo() {
   if(of_get_option('site_logo') != "") {
      $logoID = null;
      if(($logoID = get_attachment_id_from_src(of_get_option('site_logo'))) != null ) {
      $logo = wp_get_attachment_image_src($logoID, 'medium');
      $width = $logo[1];
      $height = $logo[2];
   ?>
      <style type="text/css">
         .login h1 a {
            background-size: <?php echo $width; ?>px auto;
            width: <?php echo $width; ?>px;
            height: <?php echo $height; ?>px;
            background-image: url('<?php echo of_get_option( 'site_logo' ); ?>');
            padding-bottom: 20px;
         }
      </style>
      <?php
      }
   }
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );
 
 
function get_attachment_id_from_src ($image_src) {
   global $wpdb;
   $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
   $id = $wpdb->get_var($query);
   return $id;
}