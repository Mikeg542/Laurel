jQuery(window).load(function() {
	jQuery('p:empty').remove();
	
	jQuery('ul.menu').superfish();
	jQuery('.mobile-menu .fa').click(function() { 
		jQuery('.mobilemenu').toggle('slide');
	});
	jQuery('.search-toggle').click(function() { 
		jQuery('.searchform').slideToggle();
	});

  var $container = jQuery('.masonry-layout');
    $container.imagesLoaded(function(){
    $container.masonry({
      itemSelector: '.item',
      gutter: 10
    });
  });
    
  jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 600) {
  		jQuery('#scrolltotop').stop().fadeIn();
		}
		else {
 			jQuery('#scrolltotop').stop().fadeOut();
	  }
  }); 

  jQuery('#scrolltotop').click(function(){
    jQuery("html, body").animate({ scrollTop: 0 }, 500);
    return false;
  });

  jQuery('a[href*=#]').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = jQuery(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        jQuery('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });
});