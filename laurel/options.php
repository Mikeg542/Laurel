<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace( '/\W/', '_', strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'laurel'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
asort($typography_mixed_fonts);
	// Test data
	

	// Background Defaults
	$background_defaults = array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );


	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent, menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'General', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Background Pattern', 'laurel' ),
		'desc' => __( 'Images for Background - This will overwrite a background image', 'laurel' ),
		'id' => 'background_pattern',
		'std' => 'patternnone',
		'type' => 'images',
		'options' => array(
			'patternnone' => $imagepath . 'admin/nobg.png',
			'pattern1' => $imagepath . 'admin/pattern1ex.png',
			'pattern2' => $imagepath . 'admin/pattern2ex.png',
			'pattern3' => $imagepath . 'admin/pattern3ex.png',
			'pattern4' => $imagepath . 'admin/pattern4ex.png',
			'pattern5' => $imagepath . 'admin/pattern5ex.png',
			'pattern6' => $imagepath . 'admin/pattern6ex.png',
			'pattern7' => $imagepath . 'admin/pattern7ex.png',
			'pattern8' => $imagepath . 'admin/pattern8ex.png',
			'pattern9' => $imagepath . 'admin/pattern9ex.png',
			'pattern10' => $imagepath . 'admin/pattern10ex.png',
			'pattern11' => $imagepath . 'admin/pattern11ex.png',
			'pattern12' => $imagepath . 'admin/pattern12ex.png',
			'pattern13' => $imagepath . 'admin/pattern13ex.png',
			'pattern14' => $imagepath . 'admin/pattern14ex.png',
			'pattern15' => $imagepath . 'admin/pattern15ex.png' ) );

	$options[] = array(
		'name' => __( 'Background Image/Color', 'laurel' ),
		'desc' => __( 'Change the background color or set an image.', 'laurel' ),
		'id' => 'background_main',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Page Layout', 'laurel' ),
		'desc' => __( 'Set the width of your site', 'laurel' ),
		'id' => 'full_boxed',
		'std' => 'full',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'full' => __( 'Full-Width', 'laurel' ),
			'boxed' => __( 'Boxed', 'laurel' ) ) );


	$options[] = array(
		'name' => __( 'Color Scheme', 'laurel' ),
		'desc' => __( 'Set the preset elements of the theme to be light or dark', 'laurel' ),
		'id' => 'light_dark',
		'std' => 'light',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'light' => __( 'Light', 'laurel' ),
			'dark' => __( 'Dark', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Page width', 'laurel' ),
		'desc' => __( 'Set the width for your content in pixels', 'laurel' ),
		'id' => 'site_width',
		'std' => '1170',
		'type' => 'text' );
		
	$options[] = array(
		'name' => __( 'Body Background Color', 'laurel' ),
		'desc' => __( 'Change the background color of the body in boxed width.', 'laurel' ),
		'id' => 'background_body',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Internal Page Background Color', 'laurel' ),
		'desc' => __( 'Change the background color of the internal pages in full width.', 'laurel' ),
		'id' => 'background_internal',
		'std' => '#ffffff',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Header Style', 'laurel' ),
		'desc' => __( 'Layout for the header area of the website', 'laurel' ),
		'id' => 'header_style',
		'std' => 'header1',
		'type' => 'images',
		'options' => array(
			'header1' => $imagepath . 'admin/header1ex.png',
			'header2' => $imagepath . 'admin/header2ex.png',
			'header3' => $imagepath . 'admin/header3ex.png',
			'header4' => $imagepath . 'admin/header4ex.png',
			'header5' => $imagepath . 'admin/header5ex.png',
			'header6' => $imagepath . 'admin/header6ex.png' ) );
	
	$options[] = array(
		'name' => __( 'Favicon', 'laurel' ),
		'desc' => __( 'Set the favicon for your site.', 'laurel' ),
		'id' => 'favicon_uploader',
		'type' => 'upload' );

	$options[] = array(
		'name' => __( 'Homepage Widget Background', 'laurel' ),
		'desc' => __( 'Change the background color or set an image of the homepage widget area', 'laurel' ),
		'id' => 'background_homewidget',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Show Search Box?', 'laurel' ),
		'desc' => __( 'Show Site Search Field', 'laurel' ),
		'id' => 'show_search',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Breadcrumbs?', 'laurel' ),
		'desc' => __( 'Show Site Breadcrumbs', 'laurel' ),
		'id' => 'show_breadcrumbs',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Top Bar?', 'laurel' ),
		'desc' => __( 'Show Link Bar along Top of Site', 'laurel' ),
		'id' => 'show_topbar',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Page Titles?', 'laurel' ),
		'desc' => __( 'Show Interior Page Titles', 'laurel' ),
		'id' => 'show_title',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'To Top Link Color', 'laurel' ),
		'desc' => __( 'Change the color of the to top link.', 'laurel' ),
		'id' => 'totop_color',
		'std' => '#000000',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Custom CSS', 'laurel' ),
		'desc' => __( 'Put any custom CSS Styles here.', 'laurel' ),
		'id' => 'custom_css',
		'type' => 'textarea' );

	$options[] = array(
		'name' => __( 'Slider', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Show Slider?', 'laurel' ),
		'desc' => __( 'Show Home Page Slideshow', 'laurel' ),
		'std' => '1',
		'id' => 'show_slider',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Animation Type', 'laurel' ),
		'desc' => __( 'Set the transition effect of your Slider', 'laurel' ),
		'id' => 'slide_animation',
		'std' => 'random',
		'type' => 'select',
		'options' => array(
			'sliceDown' => 'sliceDown',
			'sliceUp' => 'sliceUp',
			'sliceUpLeft' => 'sliceUpLeft',
			'sliceDownLeft' => 'sliceDownLeft',
			'sliceUpDown' => 'sliceUpDown',
			'sliceUpDownLeft' => 'sliceUpDownLeft',
			'fold' => 'fold',
			'fade' => 'fade',
			'random' => 'random',
			'slideInRight' => 'slideInRight',
			'slideInLeft' => 'slideInLeft',
			'boxRandom' => 'boxRandom',
			'boxRain' => 'boxRain',
			'boxRainReverse' => 'boxRainReverse',
			'boxRainGrow' => 'boxRainGrow',
			'boxRainGrowReverse' => 'boxRainGrowReverse' ) );

	$options[] = array(
		'name' => __( 'Animation Speed', 'laurel' ),
		'desc' => __( 'Animation Speed in ms', 'laurel' ),
		'id' => 'anim_speed',
		'std' => '500',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Pause Time', 'laurel' ),
		'desc' => __( 'How long each slide shows in ms', 'laurel' ),
		'id' => 'pause_time',
		'std' => '3000',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Show Slider Caption?', 'laurel' ),
		'id' => 'show_caption',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Caption Overlay?', 'laurel' ),
		'id' => 'show_caption_bg',
		'type' => 'checkbox' );
	
	$options[] = array(
		'name' => __( 'Caption Left Margin', 'laurel' ),
		'desc' => __( 'How far the caption is from the left side of the slideshow in px or %', 'laurel' ),
		'id' => 'left_cap',
		'std' => '50%',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Caption Bottom Margin', 'laurel' ),
		'desc' => __( 'How far the caption is from the bottom of the slideshow in px or %', 'laurel' ),
		'id' => 'bottom_cap',
		'std' => '30%',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Caption Width', 'laurel' ),
		'desc' => __( 'How wide the slideshow caption is in px or %', 'laurel' ),
		'id' => 'width_cap',
		'std' => '50%',
		'type' => 'text' );

	$options[] = array( 
		'name' => __( 'Caption Text Style', 'laurel' ),
		'id' => 'caption_text',
		'std' => array( 'size' => '30px', 'face' => 'Roboto, sans-serif', 'color' => '#fff', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array(
		'name' => __( 'Show Next/Prev Navigation?', 'laurel' ),
		'desc' => __( 'Show/Hide Next/Prev arrows on the slideshow', 'laurel' ),
		'id' => 'show_arrows',
		'type' => 'radio',
		'std' => 'true',
		'options' => array( 
			'true' => __( 'True', 'laurel' ), 
			'false' => __( 'False', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Show Control Tab Navigation?', 'laurel' ),
		'desc' => __( 'Show/Hide pagination buttons', 'laurel' ),
		'id' => 'show_slide_nav',
		'type' => 'radio',
		'std' => 'true',
		'options' => array( 
			'true' => __( 'True', 'laurel' ), 
			'false' => __( 'False', 'laurel' ) ) );

		$options[] = array(
		'name' => __( 'Bullet Color', 'laurel' ),
		'desc' => __( 'Change the color of the active bullets.', 'laurel' ),
		'id' => 'bullet_color',
		'std' => '#3387ff',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Show Control Thumbnails?', 'laurel' ),
		'desc' => __( 'Show/Hide thumbnails under slider', 'laurel' ),
		'id' => 'show_slide_thumbs',
		'type' => 'radio',
		'std' => 'false',
		'options' => array( 
			'true' => __( 'True', 'laurel' ), 
			'false' => __( 'False', 'laurel' ) ) );


	$options[] = array(
		'name' => __( 'Header & Logo', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Site Logo', 'laurel' ),
		'desc' => __( 'Set the logo for your site.', 'laurel' ),
		'id' => 'site_logo',
		'type' => 'upload' );

	$options[] = array(
		'name' => __( 'Header Image/Color', 'laurel' ),
		'desc' => __( 'Change the header color or set an image.', 'laurel' ),
		'id' => 'background_header',
		'type' => 'background' );
	

	$options[] = array(
		'name' => __( 'Main Navigation Background', 'laurel' ),
		'desc' => __( 'Change the color or background of the main navigation.', 'laurel' ),
		'id' => 'background_nav',
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Primary Menu Position', 'laurel' ),
		'desc' => __( 'Set the location of the primary menu in the header', 'laurel' ),
		'id' => 'menu_float',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini',
		'options' => array(
			'right'  => __( 'Right', 'laurel' ),
			'left'   => __( 'Left', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Dropdown background color', 'laurel' ),
		'desc' => __( 'Change the color of dropdown boxes.', 'laurel' ),
		'id' => 'dropdown_color',
		'std' => '#fff',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Dropdown hover color', 'laurel' ),
		'desc' => __( 'Change the color of the dropdown boxes on hover.', 'laurel' ),
		'id' => 'dropdown_hover',
		'std' => '#3387ff',
		'type' => 'color' );

	$options[] = array( 
		'name' => __( 'Link Hover Indicator Color', 'laurel' ),
		'desc' => __( 'Change the color of the line while hovering on links. Selecting no color will make it disappear', 'laurel' ),
		'id' => 'link_hover_line',
		'std' => '#880088',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Top Bar Image/Color', 'laurel' ),
		'desc' => __( 'Change the top bar color or set an image.', 'laurel' ),
		'id' => 'topbar_header',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Typography', 'laurel' ),
		'type' => 'heading' );

	$options[] = array( 
		'name' => __( 'Body Text Style', 'laurel' ),
		'id' => 'body_text',
		'std' => array( 'size' => '13px', 'face' => 'Montserrat, serif', 'color' => '#a5a5a5', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array( 
		'name' => __( 'Navigation Link Style', 'laurel' ),
		'id' => 'nav_links',
		'std' => array( 'size' => '24px', 'face' => 'Oswald, serif', 'color' => '#212121', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array( 
		'name' => __( 'Top Bar Link Style', 'laurel' ),
		'id' => 'topbar_text',
		'std' => array( 'size' => '17px', 'face' => 'Oswald, serif', 'color' => '#f5f5f5', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array( 
		'name' => __( 'Mobile Menu Text Style', 'laurel' ),
		'id' => 'mobile_text',
		'std' => array( 'size' => '24px', 'face' => 'Oswald, serif', 'color' => '#212121', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array( 
    'name' => __( 'Link Color', 'laurel' ),
		'desc' => __( 'Change the color of links on the site.', 'laurel' ),
		'id' => 'link_color',
		'std' => '#212121',
		'type' => 'color' );

	$options[] = array( 
		'name' => __( 'Link Hover Color', 'laurel' ),
		'desc' => __( 'Change the color when hovering on links.', 'laurel' ),
		'id' => 'link_hover',
		'std' => '#212121',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'H1 Styles', 'laurel' ),
		'id' => 'h1_font',
		'std' => array( 'size' => '32px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );
		
	$options[] = array(
		'name' => __( 'H2 Styles', 'laurel' ),
		'id' => 'h2_font',
		'std' => array( 'size' => '28px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );
		
	$options[] = array(
		'name' => __( 'H3 Styles', 'laurel' ),
		'id' => 'h3_font',
		'std' => array( 'size' => '24px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );
		
	$options[] = array(
		'name' => __( 'H4 Styles', 'laurel' ),
		'id' => 'h4_font',
		'std' => array( 'size' => '20px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );
		
	$options[] = array(
		'name' => __( 'H5 Styles', 'laurel' ),
		'id' => 'h5_font',
		'std' => array( 'size' => '18px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );
		
	$options[] = array(
		'name' => __( 'H6 Styles', 'laurel' ),
		'id' => 'h6_font',
		'std' => array( 'size' => '14px', 'face' => 'Roboto, sans-serif', 'color' => '#212121', 'weight' => 'bold' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array(
		'name' => __( 'Social', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Facebook URL', 'laurel' ),
		'id' => 'fb_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Twitter URL', 'laurel' ),
		'id' => 'twitter_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'LinkedIn URL', 'laurel' ),
		'id' => 'linkedin_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Google+ URL', 'laurel' ),
		'id' => 'google_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Pinterest URL', 'laurel' ),
		'id' => 'pinit_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Instagram URL', 'laurel' ),
		'id' => 'instagram_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'RSS Feed URL', 'laurel' ),
		'id' => 'rss_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Blog/Custom Posts', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Blog Title', 'laurel' ),
		'id' => 'blog_title',
		'std' => 'Blog',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'Blog Sidebars', 'laurel' ),
		'desc' => __( 'Sidebar Location for Blog/Custom Post Pages', 'laurel' ),
		'id' => 'blog_sidebars',
		'std' => 'fullw',
		'type' => 'images',
		'options' => array(
			'fullw' => $imagepath . 'admin/fullw.jpg',
			'leftside' => $imagepath . 'admin/leftside.jpg',
			'rightside' => $imagepath . 'admin/rightside.jpg' ) );

	$options[] = array(
		'name' => __( 'Use Post Excerpts?', 'laurel' ),
		'desc' => __( 'Use post excerpts for blog and category archives.', 'laurel' ),
		'id' => 'blog_excerpts',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Post Meta?', 'laurel' ),
		'desc' => __( 'Check this box to show the author, date posted and number of comments on archive, posts and category pages.', 'laurel' ),
		'id' => 'blog_meta',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Allow Post Comments?', 'laurel' ),
		'desc' => __( 'Check this box to enable commenting on all posts and custom post types.', 'laurel' ),
		'id' => 'blog_comments',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Blog Layout', 'laurel' ),
		'desc' => __( 'Set the layout of your Blog', 'laurel' ),
		'id' => 'blog_layout',
		'std' => 'list-layout',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'list-layout' => __( 'List', 'laurel' ),
			'grid-layout' => __( 'Picture Grid', 'laurel' ),
			'masonry-layout' => __( 'Masonry', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Testimonial Layout', 'laurel' ),
		'desc' => __( 'Set the layout of your Testimonials', 'laurel' ),
		'id' => 'testimonial_layout',
		'std' => 'list-layout',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'list-layout' => __( 'List', 'laurel' ),
			'boxed-layout' => __( 'Boxed', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Testimonials per Page', 'laurel' ),
		'id' => 'testimonials_pp',
		'std' => '10',
		'type' => 'text' );

	$options[] = array(
		'name' => __( 'FAQ Layout', 'laurel' ),
		'desc' => __( 'Set the layout of your FAQ Page', 'laurel' ),
		'id' => 'faq_layout',
		'std' => 'accordian-layout',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'list-layout' => __( 'List', 'laurel' ),
			'accordian-layout' => __( 'Accordian', 'laurel' ) ) );

	$options[] = array(
		'name' => __( 'Blog as Home Page?', 'laurel' ),
		'desc' => __( 'Check this box to enable the slideshow and homepage widgets to your blog page.', 'laurel' ),
		'id' => 'blog_home',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'WooCommerce', 'laurel' ),
		'type' => 'heading' );

	$options[] = array(
		'name' => __( 'Product Columns', 'laurel' ),
		'desc' => __( 'Set the number of columns in the product list.', 'laurel' ),
		'id' => 'woocommerce_columns',
		'std' => '3',
		'class' => 'mini',
		'type' => 'select',
		'options' => array(
			'2' => '2',
			'3' => '3',
			'4' => '4' ) );

	$options[] = array(
		'name' => __( 'Products per Page', 'laurel' ),
		'desc' => __( 'Set the number of products to show per page.', 'laurel' ),
		'id' => 'woocommerce_ppp',
		'std' => '10',
		'type' => 'text' );

	$options[] = array( 
    'name' => __( 'Add to Cart Link Color', 'laurel' ),
		'desc' => __( 'Change the color of add to cart button link.', 'laurel' ),
		'id' => 'addtocart_link',
		'std' => '#212121',
		'type' => 'color' );

	$options[] = array( 
    'name' => __( 'Add to Cart Hover Link Color', 'laurel' ),
		'desc' => __( 'Change the color of add to cart button link on hover.', 'laurel' ),
		'id' => 'addtocart_link_hover',
		'std' => '#212121',
		'type' => 'color' );

	$options[] = array( 
    'name' => __( 'Add to Cart Color', 'laurel' ),
		'desc' => __( 'Change the color of add to cart button on products list.', 'laurel' ),
		'id' => 'addtocart_color',
		'std' => '#e8e8e8',
		'type' => 'color' );

	$options[] = array( 
    'name' => __( 'Add to Cart Hover Color', 'laurel' ),
		'desc' => __( 'Change the color of add to cart button when hovering on products list.', 'laurel' ),
		'id' => 'addtocart_color_hover',
		'std' => '#b0b0b0',
		'type' => 'color' );

	$options[] = array(
		'name' => __( 'Show as Catalogue?', 'laurel' ),
		'desc' => __( 'Remove ability to purchase products.', 'laurel' ),
		'id' => 'woocommerce_catalogue',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Show Reviews on Product List?', 'laurel' ),
		'id' => 'woocommerce_reviews',
		'std' => '1',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Footer', 'laurel' ),
		'type' => 'heading' );

	$options[] = array( 
		'name' => __( 'Footer Text Style', 'laurel' ),
		'id' => 'footer_font',
		'std' => array( 'size' => '14px', 'face' => 'Montserrat, serif', 'color' => '#f5f5f5', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array( 
		'name' => __( 'Footer Widget Text', 'laurel' ),
		'id' => 'footer_widget',
		'std' => array( 'size' => '14px', 'face' => 'Montserrat, serif', 'color' => '#212121', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	$options[] = array(
		'name' => __( 'Footer Widget Area Background', 'laurel' ),
		'desc' => __( 'Change the header color or set an image.', 'laurel' ),
		'id' => 'widget_footer',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Footer Nav and Text Area Background', 'laurel' ),
		'desc' => __( 'Change the header color or set an image.', 'laurel' ),
		'id' => 'section_footer',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __( 'Show Footer Menu?', 'laurel' ),
		'id' => 'show_footer_nav',
		'type' => 'checkbox' );

	$options[] = array(
		'name' => __( 'Footer Menu Link Color', 'laurel' ),
		'desc' => __( 'Change the color of the footer navigation.', 'laurel' ),
		'id' => 'footer_nav',
		'std' => array( 'size' => '14px', 'face' => 'Oswald, serif', 'color' => '#e8e8e8', 'weight' => 'normal' ),
    'type' => 'typography',
    'options' => array(
        'faces' => $typography_mixed_fonts,
        'styles' => false ) );

	return $options;
}