/**
 * Functionality specific to i-excel.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {
	var body    = $( 'body' ),
	    _window = $( window );
	
	/**
	 * Enables menu toggle for small screens.
	 */
	( function() {
		var nav = $( '#site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-container' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.iexcel', function() {
			//nav.toggleClass( 'toggled-on' );
		} );
	} )();

	/**
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.iexcel', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
				element.tabIndex = -1;

			element.focus();
		}
	} );

		
} )( jQuery );

/* scripts to run on document ready */
jQuery(document).ready(function($) {
	
	/* customizing the drop down menu */
	jQuery('div.nav-container > ul > li > a').append( '<span class="colorbar"></span>' );
    jQuery('div.nav-container ul > li').hover(function() {
        jQuery(this).children('ul.children,ul.sub-menu').stop(true, true).slideDown("fast");
    }, function(){
        jQuery(this).children('ul.children,ul.sub-menu').slideUp("fast");
    });
	
	jQuery('.search-form').append( '<span class="searchico genericon genericon-search"></span>' );
	
	
	
	/* adding class for no featured image posts */
	$( "div.entry-nothumb" ).parent(".meta-img").addClass("no-image-meta");
	
	/* Go to top button */
	jQuery('body').append('<a href="#" class="go-top animated"><span class="genericon genericon-collapse"></span></a>');
                        // Show or hide the sticky footer button
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 200) {
        	jQuery('.go-top').fadeIn(200).addClass( 'bounce' );
        } else {
            jQuery('.go-top').fadeOut("slow");
        }
    });


    // Animate the scroll to top
    jQuery('.go-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, 1000);
    });	
	
	
	/* Side responsive menu	 */
	$('.menu-toggle').sidr({
      	name: 'sidr-left',
      	side: 'left',
		source: '.nav-container',
			onOpen: function() {
				$('.menu-toggle').animate({
					marginLeft: "260px"
				}, 200);
			},
			onClose: function() {
				$('.menu-toggle').animate({
					marginLeft: "0px"
				}, 200);
			}
    });
	
	$(window).resize(function () {
        if ($(window).width() > 1070) {
            $.sidr('close', 'sidr-left');
        }
	  	equalheight('#ft-post article');
    });	
	
	/*equal height for featured post for two column view */
	
	equalheight = function(container){
	
		var currentTallest = 0,
			 currentRowStart = 0,
			 rowDivs = new Array(),
			 $el,
			 topPosition = 0;
		$(container).each(function() {
		
		   $el = $(this);
		   $($el).height('auto')
		   topPostion = $el.position().top;
		
		   	if (currentRowStart != topPostion) {
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			   		rowDivs[currentDiv].height(currentTallest);
			 	}
			 	rowDivs.length = 0; // empty the array
			 	currentRowStart = topPostion;
			 	currentTallest = $el.height();
			 	rowDivs.push($el);
		   	} else {
			 	rowDivs.push($el);
			 	currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		  	}
		   	for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			 	rowDivs[currentDiv].height(currentTallest);
		   	}
		});
	}

  	equalheight('.main article');
	


	/*
	$(window).scroll(function(){
		var newvalue = parseInt($(this).scrollTop()*0.25)-64;
    	$('.ibanner').css('background-position', '0px '+newvalue+'px');
	});
	*/
	
	

	$(window).load(function(){	
		
		// footer area masonry	
		$('#footer-widgets').each(function () {
			$(this).masonry({});
		});
		
		// Two column Blog layout masonry
		$('#blog-cols').each(function () {
			$(this).masonry({});
		});		
		
	});		
	
	
	// slider
	$('#da-slider').each(function() {
		
		_this = $(this);
		var slider_speed = _this.data('slider-speed');
	
		_this.owlCarousel({
	 		
			navigation : true,
			autoPlay : slider_speed,
			paginationSpeed : 600,
			singleItem: true,
			rewindSpeed: 600,
			stopOnHover: true,
			navigationText: ['<span class="genericon genericon-leftarrow"></span>','<span class="genericon genericon-rightarrow"></span>'],
			addClassActive: true,
			theme : "owl-theme1",
			goToFirstSpeed : 1000,
			slideSpeed : 600,
			autoHeight: true			
	 
		});
	 
	});
	
	/*
	// Banner Parallax Effect	
	if ( $('.ibanner').length > 0 )
	{			
	
		var slider_parallax = $('#da-slider').data('slider-parallax');
		
		if (slider_parallax == 1)
		{		
			var slidetop = parseInt($('.ibanner').offset().top);
			
			if( $( window ).width() > 999 )
			{	
				$(window).scroll(function(){
					//var newvalue = parseInt($(this).scrollTop()*0.25)-64;
					var newvalue = parseInt($(this).scrollTop()*0.70)-100;
					
					if ($(this).scrollTop() > slidetop)
					{
						$('.da-img img').css('margin-top', newvalue+'px');
					}
					
					if ($(this).scrollTop() <= slidetop)
					{
						var slideheight = $('.active .da-img img').height();
						$('.da-img img').css('margin-top', 0+'px');
						$('.owl-wrapper-outer').css('max-height', slideheight+'px');
					}		
					//console.log('margin-top : '+newvalue+'px, ' + 'SlideTop : ' +slidetop+'px, ' + 'Scrolltop : ' +$(this).scrollTop()+'px');
				});
			}
		}
	}
	*/	
	
	// Banner Parallax Effect
	if ( $('.ibanner').length > 0 )
	{			
	
		var slider_parallax = $('#da-slider').data('slider-parallax');
		
		var slider_height = $('#da-slider').data('slider-height');
		var slider_reduct = $('#da-slider').data('slider-reduct');		

		slider_height = ( (($( window ).height()/100)*slider_height) - slider_reduct );
		
		$('.da-img').css( "height", slider_height );
		$('.ibanner .owl-carousel .owl-wrapper-outer').css( "height", slider_height );
		
		$('.da-img').css('background-position', 'center center');
		var backgroundPos = $('.da-img').css('backgroundPosition').split(" ");
		var yPos = backgroundPos[1];		
		
		if (slider_parallax == 1)
		{		
			var slidetop = parseInt($('.ibanner').offset().top);
			
			if( $( window ).width() > 999 )
			{	
				$(window).scroll(function(){
					var newvalue = parseInt($(this).scrollTop()*0.70)-60;
				
					if ($(this).scrollTop() > slidetop)
					{
						$('.da-img').css('background-position', 'center calc( 50% + '+newvalue+'px');	
					}
					
					if ($(this).scrollTop() <= slidetop)
					{
						var slideheight = $('.active .da-img').height();

						$('.da-img').css('background-position', 'center center');
						$('.owl-wrapper-outer').css('max-height', slideheight+'px');
					}		
				});
			}
		}
			
	}	

	
});

/* scripts to run as loads */

(function($) {
	
	/* acrolling header */
	var nav_container = $(".headerwrap");
	var nav = $(".site-header");

	var top_spacing = 30;
	var waypoint_offset = 60;
	
	if( $( window ).width() > 999 )
	{
		if ( $(".admin-bar").length>0 )
		{
			if($( window ).width()<766)
			{
				var top_spacing = 0;
			} else
			{
				var top_spacing = 30;
			}
		} else
		{
			var top_spacing = 0;
		}
		nav_container.waypoint({
			handler: function(direction) {
				
				if (direction == 'down') {
					nav_container.css({ 'height':nav.outerHeight() });		
					nav.stop().addClass("fixeddiv").css("top",-nav.outerHeight()).animate({"top":top_spacing});
				} else {
				
					nav_container.css({ 'height':'auto' });
					nav.stop().removeClass("fixeddiv").css("top",nav.outerHeight()).animate({"top":""});
				}
				
			},
			offset: function() {
				return -nav.outerHeight()-waypoint_offset;
			}
		});
	}

	/* no utility bar class addition */
	if ( $('.utilitybar').length == 0 )
	{
		$('.headerwrap').addClass('noutility');
	}
	
	// Title height adjustment for transparent header
	if ( $('.nx-titlebar').length > 0 && $('.nx-fullscreen').length > 0 )
	{
		$('.iheader').css( "height", 180);
		$('.titlebar').css( "paddingTop", 88);
		
	}		
	
		
})(jQuery);


jQuery(document).ready(function($) {
	$(window).load(function(){	
		// hide the preloader
		if ( $( 'body' ).hasClass( 'nx-preloader' ))
		{					
			$( '.nx-preloader .nx-ispload' ).css( "display", "none" );
		}
	});
	
	if( $('.elementor-editor-active').length > 0 ) {
		$( '.nx-ispload' ).css( "display", "none" );
	}
	
	if( $('.woocommerce').length > 0 ) {
		$('.woocommerce ul.products li.product a img').each(function() {
			$( this ).wrap( "<span class='nx-prod-vinette'></span>" );
		});
	}
	
	if( $('.header-icons').length || $('.topsearch').length ) {
		$('.nav-menu').addClass('nx-navicons');
	}	
});		
/**/
