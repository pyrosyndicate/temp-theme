<?php 
/*-----------------------------------------------------------------------------------*/
/* Social icons																		*/
/*-----------------------------------------------------------------------------------*/
function iexcel_social_icons () {
	
	$socio_list = '';
	$siciocount = 0;
	$services = array ('facebook','twitter','flickr','feed','instagram','googleplus','youtube','pinterest','linkedin');
    
		$socio_list .= '<ul class="social">';	
		foreach ( $services as $service ) :
			
			if( $service == 'facebook' ) {
				$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, esc_url('https://www.facebook.com/templatesnext')) );
			} elseif( $service == 'twitter' ) {
				$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, esc_url('https://www.twitter.com/templatesnext')) );
			} elseif( $service == 'youtube' ) {
				$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, esc_url('https://www.youtube.com/templatesnext')) );
			} elseif( $service == 'instagram' ) {
				$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, esc_url('https://www.instagram.com/templatesnext')) );
			} else {
				$active[$service] = esc_url( get_theme_mod('itrans_social_'.$service, '') );
			}
			
			if ($active[$service]) { 
				$socio_list .= '<li><a href="'.$active[$service].'" title="'.$service.'" target="_blank"><i class="genericon socico genericon-'.$service.'"></i></a></li>';
				$siciocount++;
			}
			
		endforeach;
		$socio_list .= '</ul>';
		
		if($siciocount>0)
		{	
			return $socio_list;
		} else
		{
			return;
		}
}

/*-----------------------------------------------------------------------------------*/
/* ibanner Slider																		*/
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'iexcel_ibanner_slider' ) ) :
function iexcel_ibanner_slider () {    
	$arrslidestxt = array();
	$template_dir = get_template_directory_uri();
	$banner_text = esc_attr(get_theme_mod('banner_text', ''));
	
	$text_alignment = esc_attr(get_theme_mod('itrans_align', 'nxs-left'));	
	$banner_overlay = esc_attr(get_theme_mod('itrans_overlay', 'nxs-semitrans'));
	if( $banner_overlay == "nxs-excel18" )
	{
		$text_alignment = "nxs-left";
	}
	$itrans_sliderparallax = get_theme_mod('itrans_sliderparallax', 1);
	$sliderscpeed = intval(esc_attr(get_theme_mod('itrans_sliderspeed', '6'))) * 1000 ;	
	
	$upload_dir = wp_upload_dir();
	$upload_base_dir = $upload_dir['basedir'];
	$upload_base_url = $upload_dir['baseurl'];	
	
	$slides_preset = array (
        array(
            'itrans_slide_title' => esc_attr__( '<span class="themecolor">Together</span> We Can Change The World.', 'i-excel' ),
            'itrans_slide_desc' => esc_attr__( 'Don not gamble on the future, act now, without delay.', 'i-excel' ),
            'itrans_slide_linktext' => esc_attr__( 'Know More', 'i-excel' ),
            'itrans_slide_linkurl' => esc_url('http://www.templatesnext.org/icreate/?page_id=541&amp;ref=ie-slide'),
            'itrans_slide_image' => esc_url( get_template_directory_uri() . '/images/slides/slide-1.jpg' ),
        ),
        array(
            'itrans_slide_title' => '',
            'itrans_slide_desc' => '',
            'itrans_slide_linktext' => '',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => '',
        ),
        array(
            'itrans_slide_title' => '',
            'itrans_slide_desc' => '',
            'itrans_slide_linktext' => '',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => '',
        ),
        array(
            'itrans_slide_title' => '',
            'itrans_slide_desc' => '',
            'itrans_slide_linktext' => '',
            'itrans_slide_linkurl' => '',
            'itrans_slide_image' => '',
        ),

	);		
	
    for( $slideno = 0; $slideno < 4; $slideno++ ){
			$strret = '';
			$counter = $slideno+1;
			
			$slide_title = esc_attr(get_theme_mod('itrans_slide'.$counter.'_title', $slides_preset[$slideno]['itrans_slide_title'] ));
			$slide_desc = esc_attr(get_theme_mod('itrans_slide'.$counter.'_desc', $slides_preset[$slideno]['itrans_slide_desc'] ));
			$slide_linktext = esc_attr(get_theme_mod('itrans_slide'.$counter.'_linktext', $slides_preset[$slideno]['itrans_slide_linktext'] ));
			$slide_linkurl = esc_url(get_theme_mod('itrans_slide'.$counter.'_linkurl', $slides_preset[$slideno]['itrans_slide_linkurl'] ));
			$slide_image = esc_url(get_theme_mod('itrans_slide'.$counter.'_image', $slides_preset[$slideno]['itrans_slide_image'] ));
			
			$slider_height = esc_attr(get_theme_mod('slider_height', 72 ));
			$slider_reduct = esc_attr(get_theme_mod('slider_reduction', 120 ));										
			
			$slider_image_id = iexcel_get_attachment_id_from_url( $slide_image );			
			$slider_resized_image = wp_get_attachment_image( $slider_image_id, 'iexcel-single-thumb' );
			
			
			if ( $slide_title ) {

				if( $slide_image != '' ){
					if( file_exists( str_replace($upload_base_url,$upload_base_dir,$slide_image) ) ){
						
						$slide_image_url = wp_get_attachment_image_src( $slider_image_id, 'iexcel-single-thumb' );
						$slide_image_url = $slide_image_url[0];							
						//$strret .= '<div class="da-img">' . $slider_resized_image .'</div>';
						$strret .= '<div class="da-img" style="background-image: url('.$slide_image_url.');"></div>';
					} else	{
						$slide_image = $template_dir.'/images/slides/slide-'.$counter.'.jpg';
						//$strret .= '<div class="da-img noslide-image"><img src="'.$slide_image.'" alt="'.$slide_title.'" /></div>';		
						$strret .= '<div class="da-img noslide-image" style="background-image: url('.$slide_image.');"></div>';			
					}
				}
				else
				{					
					$slide_image = $template_dir.'/images/no-image.png';
					//$strret .= '<div class="da-img noslide-image"><img src="'.$slide_image.'" alt="'.$slide_title.'" /></div>';
					$strret .= '<div class="da-img noslide-image" style="background-image: url('.$slide_image.');"></div>';
				}
				
				$strret .= '<div class="slider-content-wrap"><div class="nx-slider-container">';
				$strret .= '<h2>'.wp_specialchars_decode($slide_title, $quote_style = ENT_QUOTES).'</h2>';
				$strret .= '<div class="clear"></div>';
				if( !empty($slide_desc) ){
					$strret .= '<p>'.$slide_desc.'</p>';
					$strret .= '<div class="clear"></div>';
				} else {
					$strret .= '<div class="clear" style="height: 16px;"></div>';
				}
				if( !empty($slide_linktext) ){$strret .= '<a href="'.$slide_linkurl.'" class="da-link">'.$slide_linktext.'</a>';}
				$strret .= '</div></div>';
			}
			
			if ( $strret != '' ){
				$arrslidestxt[$slideno] = $strret;
			}
			
					
	}
	
	if( count( $arrslidestxt) > 0 ){
		echo '<div class="ibanner '.$banner_overlay.' '.$text_alignment.'">';
		echo '	<div id="da-slider" class="da-slider" role="banner" data-slider-speed="'.$sliderscpeed.'" data-slider-height="'.$slider_height.'" data-slider-reduct="'.$slider_reduct.'" data-slider-parallax="'.$itrans_sliderparallax.'">';
			
		foreach ( $arrslidestxt as $slidetxt ) :
			echo '<div class="nx-slider">';	
			echo	$slidetxt;
			echo '</div>';
		endforeach;
		
		echo '	</div>';
		echo '</div>';
	} else
	{
        echo '<div class="iheader front">';
        echo '    <div class="titlebar">';
        echo '        <h1>';
		
		if ($banner_text) {
			echo $banner_text;
		} 
        echo '        </h1>';
		echo ' 		  <h2>';

		echo '		</h2>';
        echo '    </div>';
        echo '</div>';
	}
}
endif;

/*-----------------------------------------------------------------------------------*/
/* find attachment id from url																	*/
/*-----------------------------------------------------------------------------------*/
function iexcel_get_attachment_id_from_url( $attachment_url = '' ) {

    global $wpdb;
    $attachment_id = false;

    // If there is no url, return.
    if ( '' == $attachment_url )
        return;

    // Get the upload directory paths
    $upload_dir_paths = wp_upload_dir();

    // Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

        // If this is the URL of an auto-generated thumbnail, get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

        // Finally, run a custom database query to get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );

    }

    return $attachment_id;
}

/*
 * Polylang language switcher
 *
 * @since iexcel 1.0.1
 */

function iexcel_polylang_switcher(){

	$tb_plylang = 2;
	$tb_plylang = intval(get_theme_mod('show_polylang', '2'));
	//$tb_plylang = $ispirit_data['tb-polylang'];
		
	if( $tb_plylang == 1 || $tb_plylang == 2 ) {
		$tx_topbar_output .= '<div class="tb-right tb-polylang">';
		$tx_topbar_output .= '<ul>';
		if( $tb_plylang == 1 ) {
			$tx_topbar_output .= pll_the_languages( array( 'show_flags' => 1,'show_names' => 0,'echo' => 0,'hide_current' => 1 ) );
		} else {
			$tx_topbar_output .= pll_the_languages( array( 'show_flags' => 1,'show_names' => 1,'echo' => 0,'hide_current' => 1 ) );
		}
		$tx_topbar_output .= '</ul>';
		$tx_topbar_output .= '</div>';
	}
	
	return $tx_topbar_output;
}

/* Calling Theme Welcome on activation */
require_once( get_template_directory() . '/inc/theme-welcome/theme-welcome.php' );

/* activating all site origin widgets bundle */
function iexcel_filter_active_widgets($active){
    $active['features'] = true;
    $active['icon'] = true;
	
    $active['button'] = true;	
    $active['layout-slider'] = true;	
    $active['social-media-buttons'] = true;	
    $active['call-to-action'] = true;
    $active['google-maps'] = true;	
    $active['image'] = true;	
    //$active['post-carousel'] = true;	
    //$active['taxonomy'] = true;
    $active['contact'] = true;	
    $active['headline'] = true;	
    $active['image-grid'] = true;	
    $active['price-table'] = true;	
    $active['testimonial'] = true;	
    $active['editor'] = true;	
    $active['hero'] = true;	
    $active['image-slider'] = true;
    $active['simple-masonry'] = true;
    $active['video'] = true;		
	
    return $active;
}
add_filter('siteorigin_widgets_active_widgets', 'iexcel_filter_active_widgets');


function iexcel_smartslider_list () {
		
	global $wpdb;
	$smartslider = array();
		//$smartslider[0] = 'Select a slider';
		
	if(class_exists('SmartSlider3')) {
		$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'nextend2_smartslider3_sliders');
		if($get_sliders) {
			foreach($get_sliders as $slider) {
				$smartslider[$slider->id] = $slider->title;
			}
		}
	}
	return $smartslider;
}
	
function iexcel_smartslider_after () {
		
	$smartslider_html = '';
		
	$smartslider_html .= '<div class="nx-ss-pro">';
	$smartslider_html .= esc_attr__('Download &quot;Smart Slider 3&quot; from ', 'i-excel');
	$smartslider_html .= '<a href="'.esc_url('//wordpress.org/plugins/smart-slider-3/').'" target="_blank">';
	$smartslider_html .= esc_attr__('WordPress repository', 'i-excel');
	$smartslider_html .= '</a>. ';
	$smartslider_html .= esc_attr__('Professionally designed ', 'i-excel');
	$smartslider_html .= '<a href="'.esc_url('//smartslider3.com/sample-sliders/?source=templatesnext').'" target="_blank">';
	$smartslider_html .= esc_attr__('slider library', 'i-excel');
	$smartslider_html .= '</a> ';
	$smartslider_html .= esc_attr__('available with Smart Slider 3.', 'i-excel');
	$smartslider_html .= '</div>';
		
	return $smartslider_html;
	
}	
