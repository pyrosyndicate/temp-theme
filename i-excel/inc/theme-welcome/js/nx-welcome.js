jQuery(document).ready(function ($) {
    //$('body').on('click', ' .tx-install-plugin ', function () {
	$('.install-now').on('click', function (e) {	

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
                        location.reload();
                    }
                });
            }
		}
        return false;
    });

    $('.activate-now').on('click', function (e) {
		
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
                        location.reload();
                    }
                });
            }
        }
    });
	
	/*****************************************************************************************************************
	Customizer notice
	******************************************************************************************************************/
	
	// Notice Close Button
	/*
	jQuery(document).ready(function($) {
		if( recomended_notice != '0' ) {
			$( "#customize-info" ).after( recomended_notice );
		}
	});
	*/
    
	$('#widgets-right').on('click', '.tx-notice-close', function (e) {
        var noticeClose = $(this);
        e.preventDefault();
		
		var url = $(noticeClose).attr('href');
		
		if (typeof url !== 'undefined') {
                //Request plugin istallation.
            $.ajax({
                beforeSend: function () {
                    $('.nx-cstnt').addClass('tx-blink');
                },				
                async: true,
                type: 'GET',
                url: url,
                success: function () {
					$('.nx-cstnt').css("display", "none");
                }
            });
        }		
		return false;
			
    });
	

	
    $('#widgets-right').on('click', '.install-nx-now', function (e) {
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
						$('.install-nx-now, .updating-message').css("display", "none");
						$('.activate-nx-now').css("display", "inline-block");
                    }
                });
            }
		}
        return false;
    });
	
	
	$('#widgets-right').on('click', '.activate-nx-now', function (e) {
	
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
						$('.activate-nx-now, .updating-message').css("display", "none");
						$('.tx-active').css("display", "inline-block");						
                    }
                });
            }
        }
    });	
		

	/********************************************************************************************
	YouTube Popup Starts
	********************************************************************************************/	
	$("[data-media]").on("click", function(e) {
		e.preventDefault();
		var $this = $(this);
		var videoUrl = $this.attr("data-media");
		var popup = $this.attr("href");
		var $popupIframe = $(popup).find("iframe");
								
		$popupIframe.attr("src", videoUrl);
							
		$this.closest("#wpwrap").addClass("show-popup");
	});
				
	$(".popup").on("click", function(e) {
		e.preventDefault();
		e.stopPropagation();
								
		var $popupIframe = $(this).find("iframe");
		$popupIframe.removeAttr("src");
								
		$("#wpwrap").removeClass("show-popup");
	});
							
	$(".popup > iframe").on("click", function(e) {
		e.stopPropagation();
	});
	
	
	

	// Find all YouTube videos
	var $allVideos = $(".nx-videowrapper iframe"),
		$fluidEl = $(".nx-videowrapper");
	
	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {
	
	  $(this)
		.data('aspectRatio', this.height / this.width)
	
		// and remove the hard coded width/height
		.removeAttr('height')
		.removeAttr('width');	
	});
	
	// When the window is resized
	$(window).resize(function() {
	
	  var newWidth = $fluidEl.width();
	
	  // Resize all videos according to their own aspect ratio
	  $allVideos.each(function() {
	
		var $el = $(this);
		$el
		  .width(newWidth)
		  .height(newWidth * $el.data('aspectRatio'));	
	  });
	
	// Kick off one resize to fix all videos on page load
	}).resize();	
	
	/********************************
	YouTube Popup Ends
	********************************/	
	
	if(jQuery().colorbox) {
		$('.nx-colorbox').colorbox({
			width: "80%",
		});
	}
	
	/********************************
	I-EXCEL Setup Guide
	********************************/
	
	if( $('#customize-info').length )
	{
		var setupGuide = '<div class="tx-setup-guide"><a href="themes.php?page=welcome-screen-about" target="_blank">Setup Guide</a></div>';
		$( "#customize-info .accordion-section-title" ).append( setupGuide );
	}
	
	if( $('#customize-theme-controls').length )
	{
		var txPromo = '<div class="tx-promo-panel"><a href="http://templatesnext.org/ispirit/landing/?ref=iexcelc" target="_blank">Go Premium</a></div>';
		$( "#customize-theme-controls" ).append( txPromo );
	}		

});