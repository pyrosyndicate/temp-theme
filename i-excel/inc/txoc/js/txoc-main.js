// JavaScript Document

jQuery( function ( $ ) {
	'use strict';

	/**
	 * Grid Layout import button click.
	 */
	$( '.tx-ocdi-gl-import-data' ).on( 'click', function (e) {
		
		e.preventDefault();
		
		var selectedImportID = $(this).data('item-number');
		var $itemContainer   = $(this).closest( '.import-confirm' );

		// If the import confirmation is enabled, then do that, else import straight away.
		txocGridLayoutImport( selectedImportID, $itemContainer );
	});
	
	
	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function txocGridLayoutImport( selectedImportID, $itemContainer ) {
		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		/*
		// Hide all other import items.
		$itemContainer.siblings( '.js-ocdi-gl-item' ).fadeOut( 500 );

		$itemContainer.animate({
			opacity: 0
		}, 500, 'swing', function () {
			$itemContainer.animate({
				opacity: 1
			}, 500 )
		});
		
		// Hide the header with category navigation and search box.
		$itemContainer.closest( '.js-ocdi-gl' ).find( '.js-ocdi-gl-header' ).fadeOut( 500 );
		*/
		// Append a title for the selected demo import.
		//$itemContainer.children('.tx-ocdi-item-title').prepend( '<h3>' + ocdi.texts.selected_import_title + '</h3>' );

		// Remove the import button of the selected item.
		$itemContainer.find( '.tx-ocdi-gl-import-data' ).remove();
		$itemContainer.find( '.ocdi-reqplug-wrap' ).remove();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', selectedImportID );

		// AJAX call to import everything (content, widgets, before/after setup)
		txocAjaxCall( data );
	}
	
	/**
	 * The main AJAX call, which executes the import process.
	 *
	 * @param FormData data The data to be passed to the AJAX call.
	 */
	function txocAjaxCall( data ) {
		$.ajax({
			method:      'POST',
			url:         ocdi.ajax_url,
			data:        data,
			contentType: false,
			processData: false,
			beforeSend:  function() {
				$( '.js-ocdi-ajax-loader' ).show();
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				txocAjaxCall( data );
			}
			else if ( 'undefined' !== typeof response.status && 'customizerAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_import_customizer_data' );
				newData.append( 'security', ocdi.ajax_nonce );

				// Set the wp_customize=on only if the plugin filter is set to true.
				/*
				if ( true === ocdi.wp_customize_on ) {
					newData.append( 'wp_customize', 'on' );
				}
				*/

				txocAjaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_after_import_data' );
				newData.append( 'security', ocdi.ajax_nonce );
				txocAjaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.message ) {
				$( '.js-ocdi-ajax-response' ).append( '<p>' + response.message + '</p>' );
				$( '.js-ocdi-ajax-loader' ).hide();

				// Trigger custom event, when OCDI import is complete.
				$( document ).trigger( 'ocdiImportComplete' );
				$('.txoc-sitelink').css("display", "block");
			}
			else {
				$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>' + response + '</p></div>' );
				$( '.js-ocdi-ajax-loader' ).hide();
			}
		})
		.fail( function( error ) {
			$( '.js-ocdi-ajax-response' ).append( '<div class="notice  notice-error  is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
			$( '.js-ocdi-ajax-loader' ).hide();
		});
	}


	/********************************************* Stage 3 *********************************************/
	/********************** Resetting Popup and Installing Required Plugins *************************/

	$('.install-txoc-now').on('click', function (e) {	

        var installButton = $(this);
		var parentContainer = installButton.parent('.ocdi-reqplug');
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

						parentContainer.children('.install-txoc-now').css("display", "none");
						parentContainer.children('.updating-message').css("display", "none");
						parentContainer.children('.activate-txoc-now').css("display", "inline-block");		
                    }
                });
            }
		}
        return false;
    });

    $('.activate-txoc-now').on('click', function (e) {
		
        var activateButton = $(this);
		var parentContainer = activateButton.parent('.ocdi-reqplug');
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

						parentContainer.children('.activate-txoc-now').css("display", "none");
						parentContainer.children('.updating-message').css("display", "none");
						parentContainer.children('.txoc-active').css("display", "inline-block");						
                    }
                });
            }
        }
    });
	

    /* Install and activate all the plugins*/
	$('.install-all-txoc').on('click', function (e) {
		
        e.preventDefault();	
		$(this).css("display", "none");
		
		if( $('.visible-item .install-txoc-now:visible').length > 0 )
		{
			installREQPlugin( $(".visible-item .install-txoc-now:visible").eq(0) );
		} else if( $('.visible-item .activate-txoc-now:visible').length > 0 )
		{
			activateREQPlugin( $(".visible-item .activate-txoc-now:visible").eq(0) );
		} else
		{
			txoc_import_data();
		}
		
    });
	
	
	function installNActivatePlugins() {
		
		if( $('.visible-item .install-txoc-now:visible').length > 0 )
		{
			installREQPlugin( $(".visible-item .install-txoc-now:visible").eq(0) );
		} else if( $('.visible-item .activate-txoc-now:visible').length > 0 )
		{
			activateREQPlugin( $(".visible-item .activate-txoc-now:visible").eq(0) );
		} else
		{
			txoc_import_data();
		}
			
	};	
	
	function installREQPlugin( installButton ) {
		
        var parentContainer = installButton.parent('.ocdi-reqplug');
		
		if ($(installButton).length) {
			
			var url = $(installButton).attr('href');
			var slug = $(installButton).attr('data-slug');
			var lebel = $(installButton).data('active-lebel');			
			
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
						parentContainer.children('.install-txoc-now').css("display", "none");
						parentContainer.children('.updating-message').css("display", "none");
						parentContainer.children('.activate-txoc-now').css("display", "inline-block");
						installNActivatePlugins();						
                    }
                });
            }
		}
        return false;		
		
	};
		
	function activateREQPlugin( activateButton ) {
		
		var parentContainer = activateButton.parent('.ocdi-reqplug');
        
		if ($(activateButton).length) {
			
            var url = $(activateButton).attr('href');
			var lebel = $(activateButton).data('active-lebel');			
            
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
						parentContainer.children('.activate-txoc-now').css("display", "none");
						parentContainer.children('.updating-message').css("display", "none");
						parentContainer.children('.txoc-active').css("display", "inline-block");
						installNActivatePlugins();							
                    }
                });
            }
        }
				
    };
		

	/**
	 * Grid Layout import button function.
	 */
	function txoc_import_data()	{
		
		var $itemContainer   = $('.visible-item');
		var selectedImportID = $('.visible-item').data('item-number');
		
		$('.visible-item .closepop.popstage3').css("display", "none");

		txocGridLayoutImport( selectedImportID, $itemContainer );
	}
	
	
	$('.nxl-filter li').click(function() {

		// reset the active class on all the buttons
		$('.nxl-filter li').removeClass('active');
		// fetch the class of the clicked item
		var ourClass = $(this).attr('class');
		// update the active state on our clicked button
		$(this).addClass('active');
		
		
		if(ourClass == 'nxl-all') {
			$('.gallerylist').children('li').show();
		} else if (ourClass == 'nxl-free') {
		  	$('.gallerylist').children('li:not(.nx-free)').hide();
		  	$('.gallerylist').children('li.nx-free').show();
		} else if (ourClass == 'nxl-woocommerce') {
		  	$('.gallerylist').children('li:not(.nx-woocommerce)').hide();
		  	$('.gallerylist').children('li.nx-woocommerce').show();
		}
 		else if (ourClass == 'nxl-premium') {
		  	$('.gallerylist').children('li:not(.nx-premium)').hide();
		  	$('.gallerylist').children('li.nx-premium').show();
		}		
		/**/
		return false;
	});	

	
});