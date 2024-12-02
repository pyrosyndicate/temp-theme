// JavaScript Document

jQuery(document).ready(function($) {
	
	if( $('.js-ocdi-gl-item-container').length > 0 )
	{
		$('.js-ocdi-gl-item').each(function(index, element) {
            var CateGories = $(this).data("categories");

			if ( CateGories.includes('elementor') ) { 
				$(this).addClass( 'nx-elementor' ); 
				$(this).append('<div class="nxrq-plugins"><h4>Required Page Builder Plugins</h4><span>Elementor</span><span>Essential Addons for Elementor</span></div>'); 				
			} else if ( CateGories.includes('wpbakerypagebuilder') ) { 
				$(this).addClass( 'nx-wpbpb' ); 
				$(this).append('<div class="nxrq-plugins"><h4>Required Page Builder Plugins</h4><span>SiteOrigin Page Builder</span><span>SiteOrigin Widgets Bundle</span></div>');			
			} else if ( CateGories.includes('siteoriginpagebuilder') ) { 
				$(this).addClass( 'nx-sopb' );
				$(this).append('<div class="nxrq-plugins"><h4>Required Page Builder Plugins</h4><span>WPBakery Page Builder</span></div>');				
			} 
        });
	}	

});