/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

jQuery(document).ready(function($) {

	// Loads the color pickers
	$( '.of-color' ).wpColorPicker();

	// Image Options
	$( '.of-radio-img-img' ).click( function(){
		$( this ).parent().parent().find( '.of-radio-img-img' ).removeClass( 'of-radio-img-selected' );
		$( this ).addClass( 'of-radio-img-selected' );
	});

	$( '.of-radio-img-label' ).hide();
	$( '.of-radio-img-img' ).show();
	$( '.of-radio-img-radio' ).hide();
	$( '#section-bullet_color' ).hide();
	$( '#section-show_caption_bg' ).hide();
	$( '#section-background_body' ).hide();
	$( '#section-background_internal' ).hide();
	$( '#section-topbar_header' ).hide();
	$( '#section-left_cap' ).hide();
	$( '#section-bottom_cap' ).hide();
	$( '#section-width_cap' ).hide();
	

	// Loads tabbed sections if they exist
	if ( $( '.nav-tab-wrapper' ).length > 0 ) {
		options_framework_tabs();
	}
	$( 'div:not(#setting-error-save_options)' ).click( function() {
		$( '#setting-error-save_options' ).fadeOut();
	});

	$( '#show_topbar' ).click( function() {
		if( $( this ).prop( "checked" ) ) {
			$( '#section-topbar_header' ).fadeIn();
		}
		else {
			$( '#section-topbar_header' ).fadeOut();
		}
	});


	if( $( '#show_topbar' ).prop( "checked" ) ) {
			$( '#section-topbar_header' ).show();
		}



	$( '#show_caption' ).click( function() {
		if( $( this ).prop( "checked" ) ) {
			$( '#section-caption_text' ).fadeIn();
			$( '#section-show_caption_bg' ).fadeIn();
			$( '#section-left_cap' ).fadeIn();
			$( '#section-bottom_cap' ).fadeIn();
			$( '#section-width_cap' ).fadeIn();
		}
		else {
			$( '#section-caption_text' ).fadeOut();
			$( '#section-show_caption_bg' ).fadeOut();
			$( '#section-left_cap' ).fadeOut();
			$( '#section-bottom_cap' ).fadeOut();
			$( '#section-width_cap' ).fadeOut();
		}
	});


	if( $( '#show_caption' ).prop( "checked" ) ) {
			$( '#section-caption_text' ).show();
			$( '#section-show_caption_bg' ).show();
			$( '#section-left_cap' ).show();
			$( '#section-bottom_cap' ).show();
			$( '#section-width_cap' ).show();
		}


	$( '#laurel_child_theme-show_slide_nav-true' ).click( function() {
		if( $( this ).prop( "checked" ) ) {
			$( '#section-bullet_color' ).fadeIn();
		}
		});
		$( '#laurel_child_theme-show_slide_nav-false' ).click( function() {
		if( $( this ).prop( "checked" ) ) {
			$( '#section-bullet_color' ).fadeOut();
		}
		});
	

	if( $( '#laurel_child_theme-show_slide_nav-true' ).prop( "checked" ) ) {
			$( '#section-bullet_color' ).show();
		}


	$( '#show_footer_nav' ).click( function() {
		if( $( this ).prop( "checked" ) ) {
			$( '#section-footer_nav' ).fadeIn();
		}
		else {
			$( '#section-footer_nav' ).fadeOut();
		}
	});

	$( '#full_boxed' ).change( function() {
		if( $( this ).val() == 'full' ) {
			$( '#section-background_body' ).fadeOut();
			$( '#section-background_internal' ).fadeIn();
		}
		else {
			$( '#section-background_body' ).fadeIn();
			$( '#section-background_internal' ).fadeOut();
		}
	});
	if( $( '#full_boxed' ).val() == 'boxed' ) {
		$( '#section-background_body' ).show();
	}
	if( $( '#full_boxed' ).val() == 'full' ) {
		$( '#section-background_internal' ).show();
	}

	if( $( '#show_footer_nav' ).prop( "checked" ) ) {
			$( '#section-footer_nav' ).show();
		}

	function options_framework_tabs() {

		var $group = $( '.group' ),
			$navtabs = $( '.nav-tab-wrapper a' ),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		// Find if a selected tab is saved in localStorage
		if ( typeof( localStorage ) != 'undefined' ) {
			active_tab = localStorage.getItem( 'active_tab' );
		}

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $( active_tab ).length ) {
			$( active_tab ).fadeIn();
			$( active_tab + '-tab' ).addClass( 'nav-tab-active' );
		} else {
			$( '.group:first' ).fadeIn();
			$( '.nav-tab-wrapper a:first' ).addClass( 'nav-tab-active' );
		}

		// Bind tabs clicks
		$navtabs.click( function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass( 'nav-tab-active' );

			$( this ).addClass( 'nav-tab-active' ).blur();

			if ( typeof( localStorage ) != 'undefined' ) {
				localStorage.setItem( 'active_tab', $( this ).attr( 'href' ) );
			}

			var selected = $( this ).attr( 'href' );

			$group.hide();
			$( selected ).fadeIn();

		});
	}

});