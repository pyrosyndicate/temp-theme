/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title and description changes.
 */

// JavaScript Document

jQuery(document).ready(function($) {	

	
	var introwin = "";

	if( intropop_content.indexOf('popdemolist') != -1 && intropop_content.indexOf('txoc-stage1') == -1 ){
    	$( "body" ).addClass('nx-demolist');
	} else if( intropop_content.indexOf('install-tx') != -1 ){
		$( "body" ).addClass('nx-install-tx');
	}
	
	/*
	if( intropop_content.indexOf('txoc-show') != -1 ){
		introwin = jQuery('<div id="nx-intropopouter" class="nx-intropopouter">\
		<div id="nx-intropopwrap" class="nx-intropopwrap">'+intropop_content+'</div>\
		</div>');
	} else {
		introwin = jQuery('<div id="nx-intropopouter" class="nx-intropopouter" style="display: none;">\
		<div id="nx-intropopwrap" class="nx-intropopwrap">'+intropop_content+'</div>\
		</div>');
	}	
	*/
	introwin = jQuery('<div id="nx-intropopouter" class="nx-intropopouter" style="display: none;">\
	<div id="nx-intropopwrap" class="nx-intropopwrap">'+intropop_content+'</div>\
	</div>');	
	
	if( $('.wp-customizer').length > 0 || $('.txocwiz').length > 0 ) {
		$( "body" ).prepend( introwin );		
	}
	
	
	$(document).mouseup(function (e) {		
		var container = $("#nx-intropopwrap"); // YOUR CONTAINER SELECTOR
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			introwin.hide();
		}
	});	
	
	
    $('.wp-customizer').on('click', '.install-txtk-now', function (e) {
        var installButton = $(this);
        e.preventDefault();
		
		if ($(installButton).length) {		
			
			var url = $(installButton).attr('href');
			var slug = $(this).attr('data-slug');
			var lebel = $(this).data('active-lebel');			
			
			if (typeof url !== 'undefined') {
                //Request plugin istallation.
                $.ajax({
                    beforeSend: function () {
                        $(installButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.install-txtk-now, .txoc-stage1 .updating-message').css("display", "none");
						$('.activate-txtk-now').css("display", "inline-block");
						
						activateNXPlugin();			
                    }
                });
            }
		}
        return false;
    });
	
	
	$('.wp-customizer').on('click', '.activate-txtk-now', function (e) {
	
        var activateButton = $(this);
        e.preventDefault();
        
		if ($(activateButton).length) {
			
            var url = $(activateButton).attr('href');
			var lebel = $(this).data('active-lebel');			
            
			if (typeof url !== 'undefined') {
                //Request plugin activation.
                $.ajax({
                    beforeSend: function () {
                        $(activateButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.activate-txtk-now, .txoc-stage1 .updating-message').css("display", "none");
						$('.txtk-active').css("display", "inline-block");	
						
						//location.reload();
						
						$('.txoc-stage1').css("display", "none");
						$('.txoc-stage2').css("display", "block");
						
    					$( "body" ).removeClass('nx-install-tx');
						$( "body" ).addClass('nx-demolist');
						
						//resizepoDemilist();
						setTimeout(resizepoDemilist, 800);
                    }
                });
            }
        }
    });
	
	
	function activateNXPlugin() {
		
        var activateButton = $('.activate-txtk-now');
        
		if ($(activateButton).length) {
			
            var url = $(activateButton).attr('href');
			var lebel = $('.activate-txtk-now').data('active-lebel');			
            
			if (typeof url !== 'undefined') {
                //Request plugin activation.
                $.ajax({
                    beforeSend: function () {
                        $(activateButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.activate-txtk-now, .txoc-stage1 .updating-message').css("display", "none");
						$('.txtk-active').css("display", "inline-block");

						//location.reload();	
						
						$('.txoc-stage1').css("display", "none");
						$('.txoc-stage2').css("display", "block");

    					$( "body" ).removeClass('nx-install-tx');
						$( "body" ).addClass('nx-demolist');
												
						//resizepoDemilist();
						setTimeout(resizepoDemilist, 800);
																
                    }
                });
            }
        }		
    };
	
	
	/********************************************* Stage 2 *********************************************/
	/********************** Resetting Popup and Installing one click demo import *************************/
	
	$('.wp-customizer').on('click', '.ocdi-install-button', function (e) {
		
		e.preventDefault();
		
		var fileName = $(this).data('file-name');
		var fileName2 = '';
		
		$( "body" ).removeClass('nx-demolist');
		$('.nx-ocdi-install, .ocdi-install-top').css("display", "block");
		$('.popdemogallery, .intropop-top, .intropop-bottom').css("display", "none");
		
		if ( $('.ocdi-active').length > 0 )
		{
			$('.nx-ocdi-install, .ocdi-install-top').css("display", "none");
			
			$('.import-confirm').each(function( index ) {
								
				fileName2 = $(this).data('file-name');
				if( fileName == fileName2 )
				{
					$(this).css("display", "block");
					$(this).addClass('visible-item');
				}
			});
			
		} else if ( $('.nx-ocdi-install .install-nx-now').length > 0 )
		{
			installOCDIPlugin(fileName);	
		} else
		{
			activateOCDIPlugin(fileName);
		}
	});
	
	
	function activateOCDIPlugin(fileName) {
		
        var activateButton = $('.nx-ocdi-install .activate-nx-now');
        
		if ($(activateButton).length) {
			
            var url = $(activateButton).attr('href');
			var lebel = $('.nx-ocdi-install .activate-nx-now').data('active-lebel');			
            
			if (typeof url !== 'undefined') {
                //Request plugin activation.
                $.ajax({
                    beforeSend: function () {
                        $(activateButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.nx-ocdi-install .activate-nx-now, .nx-ocdi-install .updating-message').css("display", "none");
						$('.nx-ocdi-install .tx-active').css("display", "inline-block").addClass('ocdi-active');;

						$('.nx-ocdi-install, .ocdi-install-top').css("display", "none");
						
						$('.import-confirm').each(function( index ) {
											
							fileName2 = $(this).data('file-name');
							if( fileName == fileName2 )
							{
								$(this).css("display", "block");
								$(this).addClass('visible-item');								
							}
						});						
						
                    }
                });
            }
        }		
    };
	
	function installOCDIPlugin(fileName) {
		
        var installButton = $('.nx-ocdi-install .install-nx-now');
		
		if ($(installButton).length) {		
			
			var url = $(installButton).attr('href');
			var slug = $('.nx-ocdi-install .install-nx-now').attr('data-slug');
			var lebel = $('.nx-ocdi-install .install-nx-now').data('active-lebel');			
			
			if (typeof url !== 'undefined') {
                //Request plugin istallation.
                $.ajax({
                    beforeSend: function () {
                        $(installButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.nx-ocdi-install .install-nx-now, .updating-message').css("display", "none");
						$('.nx-ocdi-install .activate-nx-now').css("display", "inline-block");
						
						activateOCDIPlugin(fileName);							
                    }
                });
            }
		}
	};	


	importPkgBtn = jQuery('<div class="nx-import-pkg">\
		<a href="#">I-EXCEL Setup Wizard</a>\
		</div>');
	$( "#customize-info" ).after( importPkgBtn );
	

	$('#widgets-right').on('click', '.nx-import-pkg a', function (e) {
        e.preventDefault();
		$('.nx-intropopouter').css("display", "block");	
		resizepoDemilist();	
    });			
		
	
	if( $('.nx-demolist .nx-intropopwrap').length > 0 ) {
		resizepoDemilist();
	}


	function resizepoDemilist()	{
        var popContainer = $('.nx-demolist .nx-intropopwrap');
		var txocpopHeight = popContainer.height();
		
		if ($(popContainer).length) {
			
			var headerHeight = $('.nx-demolist .txoc-stage2 .demolist-head').height();
			var footerHeight = $('.nx-demolist .txoc-stage2 .intropop-bottom').height();			
			var galleryHeight = txocpopHeight-(headerHeight+footerHeight+64);		
			
			$('.nx-demolist .txoc-stage2 .popdemogallery').css("max-height", galleryHeight+"px");
			
			window.onresize = function() {
				popContainer = $('.nx-demolist .nx-intropopwrap');
				txocpopHeight = popContainer.height();
				
				galleryHeight = txocpopHeight-(headerHeight+footerHeight+64);			
				$('.nx-demolist .txoc-stage2 .popdemogallery').css("max-height", galleryHeight+"px");							
			}			
		}		
	}
	
	// Close pop up
	
    $('.wp-customizer').on('click', '.closepop a', function (e) {
        e.preventDefault();
		
		if ( $(this).parent('.closepop').hasClass("popstage3") )
		{
			$('.visible-item').css("display", "none");
			$('.visible-item').removeClass("visible-item");
			$('.intropop-top.demolist-head, .popdemogallery, .intropop-bottom').css("display", "block");
			
    		$( "body" ).addClass('nx-demolist');
			resizepoDemilist();
			
			setTimeout(resizepoDemilist, 800);
			
		} else
		{
			$('.nx-intropopouter').css("display", "none");				
		}
	 });				



/*************************************************/
/*************************************************/
/*************************************************/
/*************************************************/

	if( $('.wp-customizer').length < 1 && $('.wp-admin').length > 0 ) {
    	$('.nx-intropopouter').css("display", "none");
	} 
	

    $('.wp-admin').on('click', '.install-txtk-now', function (e) {
        var installButton = $(this);
        e.preventDefault();
		
		if ($(installButton).length) {		
			
			var url = $(installButton).attr('href');
			var slug = $(this).attr('data-slug');
			var lebel = $(this).data('active-lebel');			
			
			if (typeof url !== 'undefined') {
                //Request plugin istallation.
                $.ajax({
                    beforeSend: function () {
                        $(installButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.install-txtk-now, .txoc-stage1 .updating-message').css("display", "none");
						$('.activate-txtk-now').css("display", "inline-block");
						
						activateNXPlugin();			
                    }
                });
            }
		}
        return false;
    });

	$('.wp-admin').on('click', '.activate-txtk-now', function (e) {
	
        var activateButton = $(this);
        e.preventDefault();
        
		if ($(activateButton).length) {
			
            var url = $(activateButton).attr('href');
			var lebel = $(this).data('active-lebel');			
            
			if (typeof url !== 'undefined') {
                //Request plugin activation.
                $.ajax({
                    beforeSend: function () {
                        $(activateButton).replaceWith('<a class="button updating-message">' + lebel + '</a>');
                    },
                    async: true,
                    type: 'GET',
                    url: url,
                    success: function () {
                        //Reload the page.
                        //location.reload();
						$('.activate-txtk-now, .txoc-stage1 .updating-message').css("display", "none");
						$('.txtk-active').css("display", "inline-block");	
						
						//location.reload();
						
						$('.txoc-stage1').css("display", "none");
						$('.txoc-stage2').css("display", "block");
						
    					$( "body" ).removeClass('nx-install-tx');
						$( "body" ).addClass('nx-demolist');
						
						//resizepoDemilist();
						setTimeout(resizepoDemilist, 800);
                    }
                });
            }
        }
    });


	/********************************************* Stage 2 *********************************************/
	/********************** Resetting Popup and Installing one click demo import *************************/
	
	
	$('.wp-admin').on('click', '.ocdi-install-button', function (e) {
		
		e.preventDefault();
		
		var fileName = $(this).data('file-name');
		var fileName2 = '';
		
		$( "body" ).removeClass('nx-demolist');
		$('.nx-ocdi-install, .ocdi-install-top').css("display", "block");
		$('.popdemogallery, .intropop-top, .intropop-bottom').css("display", "none");
		
		if ( $('.ocdi-active').length > 0 )
		{
			$('.nx-ocdi-install, .ocdi-install-top').css("display", "none");
			
			$('.import-confirm').each(function( index ) {
								
				fileName2 = $(this).data('file-name');
				if( fileName == fileName2 )
				{
					$(this).css("display", "block");
					$(this).addClass('visible-item');
				}
			});
			
		} else if ( $('.nx-ocdi-install .install-nx-now').length > 0 )
		{
			installOCDIPlugin(fileName);	
		} else
		{
			activateOCDIPlugin(fileName);
		}
	});

    $('.wp-admin').on('click', '.closepop a', function (e) {
        e.preventDefault();
		
		if ( $(this).parent('.closepop').hasClass("popstage3") )
		{
			$('.visible-item').css("display", "none");
			$('.visible-item').removeClass("visible-item");
			$('.intropop-top.demolist-head, .popdemogallery, .intropop-bottom').css("display", "block");
			
    		$( "body" ).addClass('nx-demolist');
			resizepoDemilist();
			
			setTimeout(resizepoDemilist, 800);
			
		} else
		{
			$('.nx-intropopouter').css("display", "none");				
		}
	 });

	$('.tx-dash-notice').on('click', '.txocwiz', function (e) {
        e.preventDefault();
		$('.nx-intropopouter').css("display", "block");	
		resizepoDemilist();	
    });		
	
});






















