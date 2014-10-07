jQuery(function( $ ){

	$(window).scroll(function () {

		var yPos = ( $(window).scrollTop() );
		if( yPos > 75 ) { // fade out sticky menu after 75 pixels have been scrolled down from the top
			$(".site-header").slideUp();
		} else {
			$(".site-header").fadeIn();
		}

	});

});