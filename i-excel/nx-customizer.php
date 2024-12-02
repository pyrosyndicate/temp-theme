<?php


function iexcel_customizer_config() {
	

    $url  = get_stylesheet_directory_uri() . '/inc/kirki/';
	
    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', 'i-excel' ),
        'background-image' => __( 'Background Image', 'i-excel' ),
        'no-repeat' => __( 'No Repeat', 'i-excel' ),
        'repeat-all' => __( 'Repeat All', 'i-excel' ),
        'repeat-x' => __( 'Repeat Horizontally', 'i-excel' ),
        'repeat-y' => __( 'Repeat Vertically', 'i-excel' ),
        'inherit' => __( 'Inherit', 'i-excel' ),
        'background-repeat' => __( 'Background Repeat', 'i-excel' ),
        'cover' => __( 'Cover', 'i-excel' ),
        'contain' => __( 'Contain', 'i-excel' ),
        'background-size' => __( 'Background Size', 'i-excel' ),
        'fixed' => __( 'Fixed', 'i-excel' ),
        'scroll' => __( 'Scroll', 'i-excel' ),
        'background-attachment' => __( 'Background Attachment', 'i-excel' ),
        'left-top' => __( 'Left Top', 'i-excel' ),
        'left-center' => __( 'Left Center', 'i-excel' ),
        'left-bottom' => __( 'Left Bottom', 'i-excel' ),
        'right-top' => __( 'Right Top', 'i-excel' ),
        'right-center' => __( 'Right Center', 'i-excel' ),
        'right-bottom' => __( 'Right Bottom', 'i-excel' ),
        'center-top' => __( 'Center Top', 'i-excel' ),
        'center-center' => __( 'Center Center', 'i-excel' ),
        'center-bottom' => __( 'Center Bottom', 'i-excel' ),
        'background-position' => __( 'Background Position', 'i-excel' ),
        'background-opacity' => __( 'Background Opacity', 'i-excel' ),
        'ON' => __( 'ON', 'i-excel' ),
        'OFF' => __( 'OFF', 'i-excel' ),
        'all' => __( 'All', 'i-excel' ),
        'cyrillic' => __( 'Cyrillic', 'i-excel' ),
        'cyrillic-ext' => __( 'Cyrillic Extended', 'i-excel' ),
        'devanagari' => __( 'Devanagari', 'i-excel' ),
        'greek' => __( 'Greek', 'i-excel' ),
        'greek-ext' => __( 'Greek Extended', 'i-excel' ),
        'khmer' => __( 'Khmer', 'i-excel' ),
        'latin' => __( 'Latin', 'i-excel' ),
        'latin-ext' => __( 'Latin Extended', 'i-excel' ),
        'vietnamese' => __( 'Vietnamese', 'i-excel' ),
        'serif' => _x( 'Serif', 'font style', 'i-excel' ),
        'sans-serif' => _x( 'Sans Serif', 'font style', 'i-excel' ),
        'monospace' => _x( 'Monospace', 'font style', 'i-excel' ),
    );	

	$args = array(
  
        // Change the logo image. (URL) Point this to the path of the logo file in your theme directory
                // The developer recommends an image size of about 250 x 250
        //'logo_image'   => get_template_directory_uri() . '/images/logo-g.png',
  
        // The color of active menu items, help bullets etc.
        //'color_active' => '#95c837',
		
		// Color used on slider controls and image selects
		//'color_accent' => '#e7e7e7',
		
		// The generic background color
		//'color_back' => '#f7f7f7',
	
        // Color used for secondary elements and desable/inactive controls
        //'color_light'  => '#e7e7e7',
  
        // Color used for button-set controls and other elements
       // 'color_select' => '#34495e',
		 
        
        // For the parameter here, use the handle of your stylesheet you use in wp_enqueue
        'stylesheet_id' => 'customize-styles', 
		
        // Only use this if you are bundling the plugin with your theme (see above)
        'url_path'     => get_template_directory_uri() . '/inc/kirki/',

        'textdomain'   => 'i-excel',
		
        'i18n'         => $strings,		
		
		
	);
	
	
	return $args;
}
add_filter( 'kirki/config', 'iexcel_customizer_config' );


/**
 * Create the customizer panels and sections
 */
add_action( 'customize_register', 'iexcel_add_panels_and_sections' ); 
function iexcel_add_panels_and_sections( $wp_customize ) {
	
	/*
	* Add panels
	*/
	
	$wp_customize->add_panel( 'slider', array(
		'priority'    => 140,
		'title'       => __( 'Slider', 'i-excel' ),
		'description' => __( 'Slides details', 'i-excel' ),
	) );
	
	
	$wp_customize->add_panel( 'rmenu', array(
		'priority'    => 140,
		'title'       => __( 'Responsive Menu', 'i-excel' ),
		'description' => __( 'Responsive Menu Options', 'i-excel' ),
	) );	

    /**
     * Add Sections
     */
    $wp_customize->add_section('basic', array(
        'title'    => __('Basic Settings', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));
	
    $wp_customize->add_section('layout', array(
        'title'    => __('Layout Options', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));	
	
	
	
	$wp_customize->add_section('nxtopbar', array(
        'title'    => __('Topbar Options', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));
	
    $wp_customize->add_section('nxheader', array(
        'title'    => __('Header Options', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));	
	
    $wp_customize->add_section('nxfooter', array(
        'title'    => __('Footer Options', 'i-excel'),
        'description' => '',
        'priority' => 130,
    ));	
	
		
	
    $wp_customize->add_section('social', array(
        'title'    => __('Social Links', 'i-excel'),
        'description' => __('Insert full URL of your social link including &#34;http://&#34; replacing #, <br /><b>Empty the field to hide the icon.</b>', 'i-excel'),
        'priority' => 130,
    ));		
	
    $wp_customize->add_section('blogpage', array(
        'title'    => __('Default Blog Page', 'i-excel'),
        'description' => '',
        'priority' => 150,
    ));	
	
    $wp_customize->add_section('fonts', array(
        'title'    => __('Fonts', 'i-excel'),
        'description' => '',
        'priority' => 151,
    ));		
	
	// slider sections
	
	$wp_customize->add_section('slidersettings', array(
        'title'    => __('Slide Settings', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));		
	
	$wp_customize->add_section('slide1', array(
        'title'    => __('Slide 1', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide2', array(
        'title'    => __('Slide 2', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide3', array(
        'title'    => __('Slide 3', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	$wp_customize->add_section('slide4', array(
        'title'    => __('Slide 4', 'i-excel'),
        'description' => '',
        'panel' => 'slider',		
        'priority' => 140,
    ));	
	
	// promo sections
	
	$wp_customize->add_section('nxpromo', array(
        'title'    => __('More About i-excel', 'i-excel'),
        'description' => '',
        'priority' => 170,
    ));	
	
	// Responsive Menu sections	
	$wp_customize->add_section('rmgeneral', array(
        'title'    => __('General Options', 'i-excel'),
        'panel' => 'rmenu',		
        'description' => '',
        'priority' => 170,
    ));	
	
    $wp_customize->add_section('rmsettings', array(
        'title'    => __('Menu Appearance', 'i-excel'),
        'panel' => 'rmenu',
        'description' => '',
        'priority' => 180,
    ));	
	
	// WooCommerce Settings
    $wp_customize->add_section('woocomm', array(
        'title'    => __('WooCommerce Theme Options', 'i-excel'),
        'description' => '',
        'priority' => 191,
    ));	
}

if ( ! function_exists( 'iexcel_custom_setting' ) ) :
function iexcel_custom_setting( $controls ) {
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'top_phone',
        'label'    => __( 'Phone Number', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '1-000-123-4567',
        'priority' => 1,
		'description' => __( 'Phone number that appears on top bar.', 'i-excel' ),
    );

	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'pre_loader',
		'label'       => __( 'Turn ON Page Preloader', 'i-excel' ),
		'description' => __( 'Turn ON/OFF loding animation before page load', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 0,		
		'priority'    => 3,
	);	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'top_email',
        'label'    => __( 'Email Address', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => 'email@example.com',
        'priority' => 1,
		'description' => __( 'Email Id that appears on top bar.', 'i-excel' ),		
    );
	$controls[] = array(
		'type'        => 'radio-buttonset',
		'settings'     => 'show_polylang',
		'label'       => __( 'Show Polylang Language Switch', 'i-excel' ),
		'description' => __( 'Show multilingual plugin polylang language switch on top bar.', 'i-excel' ),
		'section'     => 'nxtopbar',
		'choices'     => array(
							'0' => esc_html__( 'Off', 'i-excel' ),
							'1' => esc_html__( 'On with Flags', 'i-excel' ),
							'2' => esc_html__( 'On With Names', 'i-excel' ),
		),		
		'default'     => '2',
		'priority'    => 4,
	);			
	
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'logo',
		'label'       => __( 'Site header logo', 'i-excel' ),
		'description' => __( 'Width 280px, height 72px max. Upload logo for header', 'i-excel' ),
        'section'  => 'title_tagline',
		//'default'     => get_template_directory_uri() . '/images/logo-soft-pink-black.png',
		'default'     => '',		
		'priority'    => 1,
	);
	
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'logo_trans',
		'label'       => __( 'Transparent Logo', 'i-excel' ),
		'description' => __( 'Optional transparent logo for transparent header', 'i-excel' ),
        'section'  => 'title_tagline',
		//'default'     => get_template_directory_uri() . '/images/logo-soft-pink-white.png',
		'default'     => '',		
		'priority'    => 2,
	);		
	
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'primary_color',
		'label'       => __( 'Primary Color', 'i-excel' ),
		'description' => __( 'Choose your theme color', 'i-excel' ),
		'section'     => 'colors',
		'default'     => '#c8367d',
		'priority'    => 1,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'topbar_bg',
		'label'       => __( 'Primary Colored Topbar BG', 'i-excel' ),
		'description' => __( 'Turn off primary colored topbar background', 'i-excel' ),
		'section'     => 'nxtopbar',
		'default'     => 1,		
		'priority'    => 3,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'exta_shadow',
		'label'       => __( 'Turn ON Extra Shadows', 'i-excel' ),
		'description' => __( 'Shadows behind dropdown, top and bottom of the slider, page header, etc', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 1,		
		'priority'    => 3,
	);			

	/* Header controls */
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'show_search',
		'label'       => __( 'Show Site Search', 'i-excel' ),
		'description' => __( 'Turn the search ON/OFF on main navigation', 'i-excel' ),
		'section'     => 'nxheader',
		'default'     => 1,
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'nav_dropdown',
		'label'       => __( 'Primary Colored Dropdown Menu', 'i-excel' ),
		'description' => __( 'Turn off primary colored dropdown Menu', 'i-excel' ),
		'section'     => 'nxheader',
		'default'     => 1,		
		'priority'    => 3,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'boxed-icons',
		'label'       => __( 'Boxed Menu Icons', 'i-excel' ),
		'description' => __( 'The crat and search icons will appear as boxed', 'i-excel' ),
		'section'     => 'nxheader',
		'default'     => 0,			
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'nav_upper',
		'label'       => __( 'Turn All Top Menu Item UPPERCASE', 'i-excel' ),
		'description' => __( 'Turns all top navigation manu item to UPPERCASE', 'i-excel' ),
		'section'     => 'nxheader',
		'default'  => 0,		
		'priority'    => 5,
	);	
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'     => 'nav_font_size',
		'label'       => __( 'Top Navigation Font size', 'i-excel' ),
		'section'     => 'nxheader',
		'priority'    => 6,
		'default'     => 14,
		'choices'     => array(
			'min'  => '12',
			'max'  => '18',
			'step' => '1',
		),		
		'output' => array(
			array(
				'element'  => '.nav-container li a',
				'property' => 'font-size',
				'units'	   => 'px',
			),
		),
		
	);	
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'     => 'nav_font_weight',
		'label'       => __( 'Top Navigation Font Weight', 'i-excel' ),
		'section'     => 'nxheader',
		'priority'    => 6,
		'default'     => 400,
		'choices'     => array(
			'min'  => '200',
			'max'  => '800',
			'step' => '100',
		),		
		'output' => array(
			array(
				'element'  => '.nav-container li a',
				'property' => 'font-weight',
			),
		),
		
	);
	
	
	/* NXFooter controls */	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'copyright_text',
        'label'    => __( 'Copyright Text', 'i-excel' ),
		'description' => __( 'Bottom footer copyright text', 'i-excel' ),		
        'section'  => 'nxfooter',
		'default'  => __( 'Copyright &copy; ', 'i-excel').get_bloginfo( 'name' ),		
        'priority' => 1,
    );		
	
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'footer_bg',
		'label'       => __( 'Footer Widget Area Background Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#383838',
		'priority'    => 2,
		'output' => array(
			array(
				'element'  => '.footer-bg, .site-footer .sidebar-container',
				'property' => 'background-color',
			),
		),		
	);
	/**/
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'footer_title_color',
		'label'       => __( 'Footer Widgets Title Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#FFFFFF',
		'priority'    => 3,
		'output' => array(
			array(
				'element'  => '.site-footer .widget-area .widget .widget-title',
				'property' => 'color',
			),
		),		
	);		
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'footer_text_color',
		'label'       => __( 'Footer Widgets Text Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#bbbbbb',
		'priority'    => 4,
		'output' => array(
			array(
				'element'  => '.site-footer .widget-area .widget, .site-footer .widget-area .widget li',
				'property' => 'color',
			),
		),		
	);
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'footer_link_color',
		'label'       => __( 'Footer Widgets Link Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#dddddd',
		'priority'    => 4,
		'output' => array(
			array(
				'element'  => '.site-footer .widget-area .widget a',
				'property' => 'color',
			),
		),		
	);
	
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'bottom_footer_bg',
		'label'       => __( 'Bottom Footer background Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#272727',
		'priority'    => 4,
		'output' => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
			),
		),		
	);
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'bottom_footer_text_color',
		'label'       => __( 'Bottom Footer Text Color', 'i-excel' ),
		'section'     => 'nxfooter',
		'default'     => '#777777',
		'priority'    => 4,
		'output' => array(
			array(
				'element'  => '.site-footer .site-info, .site-footer .site-info a',
				'property' => 'color',
			),
		),		
	);					
	
	$controls[] = array(
		'type'        => 'radio-image',
		'settings'     => 'blog_layout',
		'label'       => __( 'Blog Posts Layout', 'i-excel' ),
		'description' => __( '(Choose blog posts layout (one column/two column)', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '2',
		'priority'    => 2,
		'choices'     => array(
			'1' => get_template_directory_uri() . '/images/onecol.png',
			'2' => get_template_directory_uri() . '/images/twocol.png',
		),
	);
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'show_full',
		'label'       => __( 'Show Full Content', 'i-excel' ),
		'description' => __( 'Show full content on blog pages', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 0,
		'priority'    => 3,
	);		
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'wide_layout',
		'label'       => __( 'Wide layout', 'i-excel' ),
		'description' => __( 'Check to have wide layou', 'i-excel' ),
		'section'     => 'layout',
		'default'     => 1,
		'priority'    => 4,
	);
	
	$controls[] = array(
		'type'        => 'textarea',
		'settings'     => 'extra_style',
		'label'       => __( 'Additional style', 'i-excel' ),
		'description' => __( 'add extra style(CSS) codes here', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '',
		'priority'    => 10,
	);	
	
	/*
	$controls[] = array(
		'type'        => 'color',
		'settings'     => 'site_bg_color',
		'label'       => __( 'Background Color (Boxed Layout)', 'i-excel' ),
		'description' => __( 'Choose your background color', 'i-excel' ),
		'section'     => 'layout',
		'default'     => '#FFFFFF',
		'priority'    => 1,
	);
	*/	
	

	
	// social links
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_facebook',
        'label'    => __( 'Facebook', 'i-excel' ),
        'section'  => 'nxtopbar',
		'default'  => esc_url('https://www.facebook.com/templatesnext'),
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_twitter',
        'label'    => __( 'Twitter', 'i-excel' ),
        'section'  => 'nxtopbar',
		'default'  => esc_url('https://www.twitter.com/templatesnext'),
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_flickr',
        'label'    => __( 'Flickr', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_feed',
        'label'    => __( 'RSS', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_instagram',
        'label'    => __( 'Instagram', 'i-excel' ),
        'section'  => 'nxtopbar',
		'default'  => esc_url('https://www.instagram.com/templatesnext'),
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_googleplus',
        'label'    => __( 'Google Plus', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_youtube',
        'label'    => __( 'YouTube', 'i-excel' ),
        'section'  => 'nxtopbar',
		'default'  => esc_url('https://www.youtube.com/templatesnext'),
        'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_pinterest',
        'label'    => __( 'Pinterest', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '',
        'priority' => 1,
    );	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_social_linkedin',
        'label'    => __( 'Linkedin', 'i-excel' ),
        'section'  => 'nxtopbar',
        'default'  => '',
        'priority' => 1,
    );	
	
	// Slider

	$controls[] = array(
		'type'        => 'slider',
		'settings'     => 'itrans_sliderspeed',
		'label'       => __( 'Slide Duration', 'i-excel' ),
		'description' => __( 'Slide visibility in second', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 6,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 1,
			'max'  => 30,
			'step' => 1
		),
	);

	// Parallax Effect
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'itrans_sliderparallax',
		'label'       => __( 'Parallax Effect', 'i-excel' ),
		'description' => __( 'Turn ON/OFF Parallax Effect', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 1,			
		'priority'    => 4,
	);
	
	$controls[] = array(
		//'type'        => 'radio-buttonset',
		'type'        => 'radio',
		'settings'    => 'itrans_overlay',
		'label'       => __( 'Background Overlay &frasl; Text Background', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 'nxs-semitrans',
		'priority'    => 10,
		'choices'     => array(
			'nxs-pattern'   	=> esc_attr__( 'Pattern', 'i-excel' ),
			'nxs-shadow' 		=> esc_attr__( 'Shadow', 'i-excel' ),
			'nxs-vinette'  		=> esc_attr__( 'Vignette', 'i-excel' ),
			'nxs-semitrans'  	=> esc_attr__( 'Semi-trans', 'i-excel' ),
			'nxs-excel18'  		=> esc_attr__( 'Excel 18', 'i-excel' ),
			'nxs-excel19'  		=> esc_attr__( 'Excel 19', 'i-excel' ),
			'nxs-gradient'  	=> esc_attr__( 'Gradient', 'i-excel' ),						
		),
	);
	
	$controls[] = array(
		'type'        	=> 'color',
		'settings'     	=> 'nxs_bg_color_1',
		'label'       	=> __( 'Overlay Gradient Color 1', 'i-excel' ),
		'section'     	=> 'slidersettings',
		'default'     	=> 'rgba(231,14,119,.72)',
		'priority'    	=> 12,
		'choices'     	=> array(
							'alpha' => true,
						),		
		/*
		'active_callback' => array(
								array( 'setting' => 'itrans_overlay', 'operator' => '==', 'value' => 'nxs-gradient' ),
							),		
		*/
		'active_callback' => 'iexcel_nxs_gradient',
	);	
	
	$controls[] = array(
		'type'        	=> 'color',
		'settings'     	=> 'nxs_bg_color_2',
		'label'       	=> __( 'Overlay Gradient Color 2', 'i-excel' ),
		'section'     	=> 'slidersettings',
		'default'     	=> 'rgba(250,162,20,.72)',
		'priority'    	=> 13,
		'choices'     	=> array(
							'alpha' => true,
						),		
		/*
		'active_callback' => array(
								array( 'setting' => 'itrans_overlay', 'operator' => '==', 'value' => 'nxs-gradient' ),
							),		
		*/
		'active_callback' => 'iexcel_nxs_gradient',
	);	
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'    => 'nxs_gradient_angle',
		'label'       => __( 'Gradient Angle', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 135,
		'choices'     => array(
						'min'  => '0',
						'max'  => '360',
						'step' => '1',
					),
		'active_callback' => 'iexcel_nxs_gradient',	
		'priority'    	=> 14,					
	);
		
	
	
	$controls[] = array(
		'type'        => 'radio-buttonset',
		'settings'    => 'itrans_align',
		'label'       => __( 'Text Alignment', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 'nxs-left',
		'priority'    => 20,
		'choices'     => array(
			'nxs-left'   => esc_attr__( 'Left', 'i-excel' ),
			'nxs-center' => esc_attr__( 'Center', 'i-excel' ),
			'nxs-right'  => esc_attr__( 'Right', 'i-excel' ),
		),
	);		
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'    => 'slider_height',
		'label'       => __( 'Slider Height (in %)', 'i-excel' ),
		'section'     => 'slidersettings',
		'default'     => 72,
		'choices'     => array(
			'min'  => '0',
			'max'  => '100',
			'step' => '1',
		),
		'priority'    => 30,
	);
	
	$controls[] = array(
		'type'        => 'slider',
		'settings'    => 'slider_reduction',
		'label'       => __( 'Reduction In px', 'i-excel' ),
		'section'     => 'slidersettings',
		'description' => __( 'Amount of pixels to be reduced from % of slider height', 'i-excel' ),		
		'default'     => 120,
		'choices'     => array(
			'min'  => '0',
			'max'  => '320',
			'step' => '1',
		),
		'priority'    => 31,
	);	
		
	
	// Slide1
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide1_title',
        'label'    => __( 'Slide1 Title', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => esc_attr__( '<span class="themecolor">Together</span> We Can Change The World.', 'i-excel' ),
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'settings'     => 'itrans_slide1_desc',
		'label'       => __( 'Slide1 Description', 'i-excel' ),
		'section'     => 'slide1',
		'default'     => esc_attr__( 'Don not gamble on the future, act now, without delay.', 'i-excel' ),
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide1_linktext',
        'label'    => __( 'Slide1 Link text', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => esc_attr__( 'Know More', 'i-excel' ),
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide1_linkurl',
        'label'    => __( 'Slide1 Link URL', 'i-excel' ),
        'section'  => 'slide1',
        'default'  => esc_url('http://www.templatesnext.org/icreate/?page_id=541&amp;ref=ie-slide'),
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'itrans_slide1_image',
		'label'       => __( 'Slide1 Image', 'i-excel' ),
        'section'  	  => 'slide1',
		'default'     => esc_url( get_template_directory_uri() . '/images/slides/slide-1.jpg' ),
		'priority'    => 1,
	);							
	
	
	// Slide2
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide2_title',
        'label'    => __( 'Slide2 Title', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'settings'     => 'itrans_slide2_desc',
		'label'       => __( 'Slide2 Description', 'i-excel' ),
		'section'     => 'slide2',
		'default'     => '',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide2_linktext',
        'label'    => __( 'Slide2 Link text', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => '',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide2_linkurl',
        'label'    => __( 'Slide2 Link URL', 'i-excel' ),
        'section'  => 'slide2',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'itrans_slide2_image',
		'label'       => __( 'Slide2 Image', 'i-excel' ),
        'section'  	  => 'slide2',
		'default'     => '',
		'priority'    => 1,
	);							
		
		
	// Slide3
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide3_title',
        'label'    => __( 'Slide3 Title', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'settings'     => 'itrans_slide3_desc',
		'label'       => __( 'Slide3 Description', 'i-excel' ),
		'section'     => 'slide3',
		'default'     => '',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide3_linktext',
        'label'    => __( 'Slide3 Link text', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => '',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide3_linkurl',
        'label'    => __( 'Slide3 Link URL', 'i-excel' ),
        'section'  => 'slide3',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'itrans_slide3_image',
		'label'       => __( 'Slide3 Image', 'i-excel' ),
        'section'  	  => 'slide3',
		'default'     => '',
		'priority'    => 1,
	);							
	
	
	// Slide4
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide4_title',
        'label'    => __( 'Slide4 Title', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'textarea',
		'settings'     => 'itrans_slide4_desc',
		'label'       => __( 'Slide4 Description', 'i-excel' ),
		'section'     => 'slide4',
		'default'     => '',
		'priority'    => 10,
	);
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide4_linktext',
        'label'    => __( 'Slide4 Link text', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => '',
        'priority' => 1,
    );
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'itrans_slide4_linkurl',
        'label'    => __( 'Slide4 Link URL', 'i-excel' ),
        'section'  => 'slide4',
        'default'  => '',
        'priority' => 1,
    );
	$controls[] = array(
		'type'        => 'upload',
		'settings'     => 'itrans_slide4_image',
		'label'       => __( 'Slide4 Image', 'i-excel' ),
        'section'  	  => 'slide4',
		'default'     => '',
		'priority'    => 1,
	);
	
	// Blog page setting
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'slider_stat',
		'label'       => __( 'Hide i-excel Slider', 'i-excel' ),
		'description' => __( 'Turn Off or On to hide/show default i-excel slider', 'i-excel' ),
		'section'     => 'blogpage',
		'default'     => 1,
		'priority'    => 1,
	);	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'blogslide_scode',
        'label'    => __( 'Other Slider Shortcode', 'i-excel' ),
        'section'  => 'blogpage',
        'default'  => '',
		'description' => __( 'Enter itrans slider shortcode or a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc.', 'i-excel' ),
        'priority' => 2,
    );
	
	
    $controls[] = array(
        'type'     => 'text',
        'settings'  => 'banner_text',
        'label'    => __( 'Banner Text', 'i-excel' ),
        'section'  => 'blogpage',
        'default'  => 'Welcome To '.get_bloginfo( 'name', 'display' ),
        'priority' => 3,
		'description' => __( 'if you are using a logo and want your site title or slogan to appear on the header banner', 'i-excel' ),		
    );
	
	$controls[] = array(
		'type'        => 'switch',
		'settings'     => 'blog_trans_header',
		'label'       => __( 'Turn ON Transparent Header', 'i-excel' ),
		'description' => __( 'Turn OFF or ON transparent header on default blog page', 'i-excel' ),
		'section'     => 'blogpage',
		'default'     => 0,
		'priority'    => 4,
	);
	
	$controls[] = array(
		'label' 		=> __('Smart Slider 3', 'i-excel'),
		'description' 	=> __('Select a slider from Smart Slider 3', 'i-excel'),
		'settings' 		=> 'blog_smart_slider',
		'choices' 		=> iexcel_smartslider_list(),
		'type' 			=> 'select',
        'section'  		=> 'blogpage',
		'default'     	=> '',
		'priority'    	=> 4,				
	);				
	
	//rmgeneral
	//rmsettings

	$controls[] = array(
		'label' => __('Enable Mobile Navigation', 'i-excel'),
		'description' => __('Check if you want to activate mobile navigation.', 'i-excel'),
		'settings' => 'enabled',
		'default' => 1,
		'type' => 'switch',
        'section'  => 'rmgeneral',	
	);
	/*
	$controls[] = array(
		'label' => __('Elements to hide in mobile:', 'i-excel'),
		'description' => __('Enter the css class/ids for different elements you want to hide on mobile separeted by a comma(,). Example: .nav,#main-menu ', 'i-excel'),
		'settings' => 'hide',
		'default' => '',
		'type' => 'text',
        'section'  => 'rmgeneral',		
	);
	*/
	$controls[] = array(
		'label' => __('Enable Swipe', 'i-excel'),
		'description' => __('Enable swipe gesture to open/close menus, Only applicable for left/right menu.', 'i-excel'),
		'settings' => 'swipe',
		'default' => 'yes',
		'choices' => array('yes' => 'Yes','no' => 'No'),
		'type' => 'radio',
        'section'  => 'rmgeneral',		
	);
	
	$controls[] = array(
		'label' => __(' Search...', 'i-excel'),
		'description' => __(' Select the position of search box or simply hide the search box if you donot need it.', 'i-excel'),
		'settings' => 'search_box',
		'default' => 'below_menu',
		'choices' => array('above_menu' => 'Above Menu','below_menu' => 'Below Menu', 'hide'=> 'Hide search box' ),
		'type' => 'select',
        'section'  => 'rmgeneral',		
	);

	$controls[] = array(
		'label' => __(' Search Box Text', 'i-excel'),
		'description' => __('Enter the text that would be displayed on the search box placeholder.', 'i-excel'),
		'settings' => 'search_box_text',
		'default' => __('Search...', 'i-excel'),
		'type' => 'text',
        'section'  => 'rmgeneral',	
	);
		
	$controls[] = array(
		'label' => __('Allow zoom on mobile devices', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'zooming',
		'default' => 'yes',
		'choices' => array('yes' => 'Yes','no' => 'No'),
		'type' => 'radio',
        'section'  => 'rmgeneral',	
	);
		

	// Responsive Menu Settings
	$controls[] = array(
		'label' => __('Menu Symbol Position', 'i-excel'),
		'description' => __('Select menu icon position which will be displayed on the menu bar.', 'i-excel'),
		'settings' => 'menu_symbol_pos',
		'default' => 'left',
		'class' => 'mini',
		'choices' => array('left' => 'Left','right' => 'Right'),
		'type' => 'select',
        'section'  => 'rmsettings',	
	);

	$controls[] = array(
		'label' => __('Menu Text', 'i-excel'),
		'description' => __('Entet the text you would like to display on the menu bar.', 'i-excel'),
		'settings' => 'bar_title',
		'default' => __('MENU', 'i-excel'),
		'class' => 'mini',
		'type' => 'text',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Menu Open Direction', 'i-excel'),
		'description' => __('Select the direction from where menu will open.', 'i-excel'),
		'settings' => 'position',
		'default' => 'left',
		'class' => 'mini',
		'choices' => array('left' => 'Left','right' => 'Right', 'top' => 'Top' ),
		'type' => 'select',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Display menu from width (in px)', 'i-excel'),
		'description' => __(' Enter the width (in px) below which the responsive menu will be visible on screen', 'i-excel'),
		'settings' => 'from_width',
		'default' => 1069,
		'class' => 'mini',
		'type' => 'text',
        'section'  => 'rmsettings',			
	);

	$controls[] = array(
		'label' => __('Menu Width', 'i-excel'),
		'description' => __('Enter menu width in (%) only applicable for left and right menu.', 'i-excel'),
		'settings' => 'how_wide',
		'default' => '80',
		'class' => 'mini',
		'type' => 'text',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu bar background color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'bar_bgd',
		'default' => '#2e2e2e',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu bar text color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'bar_color',
		'default' => '#F2F2F2',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu background color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_bgd',
		'default' => '#2E2E2E',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu text color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_color',
		'default' => '#CFCFCF',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu mouse over text color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_color_hover',
		'default' => '#606060',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu icon color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_icon_color',
		'default' => '#FFFFFF',
		'type' => 'color',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'label' => __('Menu borders(top & left) color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_border_top',
		'default' => '#0D0D0D',
		'type' => 'color',
        'section'  => 'rmsettings',		
	);
	
	$controls[] = array(
		'label' => __('Menu borders(bottom) color', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_border_bottom',
		'default' => '#131212',
		'type' => 'color',
        'section'  => 'rmsettings',		
	);
	
	$controls[] = array(
		'label' => __('Enable borders for menu items', 'i-excel'),
		'description' => __('', 'i-excel'),
		'settings' => 'menu_border_bottom_show',
		'default' => 'yes',
		'choices' => array('yes' => 'Yes','no' => 'No'),
		'type' => 'radio',
        'section'  => 'rmsettings',			
	);
	
	$controls[] = array(
		'type'        => 'typography',
		'settings'    => 'body_font',
		'label'       => __( 'Body Font Style', 'i-excel' ),
		'description' => __( 'Content font style (Variant and Subsets are not used). Default font "Roboto" Default font "Open Sans", size "14"', 'i-excel' ),
		'section'     => 'fonts',
		'default'     => array(
			//'font-style'     => array( 'normal', 'bold', 'italic' ),
			'font-family'    => 'Open Sans',
			'font-size'      => '14',
			'color'          => '#575757',			
			'subsets'        => 'none',
		),
		'priority'    => 1,
		'choices' => array(
			'fonts' => array(
				'google'   => array( 'popularity', 50 ),
				'standard' => array(
					'Georgia,Times,"Times New Roman",serif',
					'Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif'
				),
			),
		),	
	);
	
	$controls[] = array(
		'type'        => 'typography',
		'settings'    => 'title_font',
		'label'       => __( 'Heading Font Style', 'i-excel' ),
		'description' => __( 'Title font style (Variant and Subsets are not used). Default font "Roboto"', 'i-excel' ),
		'section'     => 'fonts',
		'default'     => array(
			//'font-style'     => array( 'normal', 'bold', 'italic' ),
			'font-family'    => 'Roboto',
			'subsets'        => 'none',
		),
		'priority'    => 1,
		'choices' => array(
			'fonts' => array(
				'google'   => array( 'popularity', 50 ),
				'standard' => array(
					'Georgia,Times,"Times New Roman",serif',
					'Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif'
				),
			),
		),	
	);
	
	/* WooCommerce Settings */
	if ( class_exists( 'WooCommerce' ) ) {
		$controls[] = array(
			'type'        => 'switch',
			'settings'     => 'show_login',
			'label'       => __( 'Hide/Show Topnav Login', 'i-excel' ),
			'description' => __( 'Turn ON or OFF user login menu item on top nav', 'i-excel' ),
			'section'     => 'woocomm',
			'default'  	  => 0,		
			'priority'    => 1,
		);
		
		$controls[] = array(
			'type'        => 'switch',
			'settings'     => 'show_cart',
			'label'       => __( 'Show/Hide Topnav Cart', 'i-excel' ),
			'description' => __( 'Turn ON or OFF cart from top nav', 'i-excel' ),
			'section'     => 'woocomm',
			'default'     => 0,		
			'priority'    => 1,
		);
		
		$controls[] = array(
			'type'        => 'switch',
			'settings'     => 'product_search',
			'label'       => __( 'Turn On/OFF Product Search', 'i-excel' ),
			'description' => __( 'Turn ON/OFF product only search.', 'i-excel' ),
			'section'     => 'woocomm',
			'default'  	  => 0,		
			'priority'    => 1,
		);
	}
	
	
    return $controls;
}
endif;
add_filter( 'kirki/controls', 'iexcel_custom_setting' );


function iexcel_nxs_gradient() {
	//'setting' => 'itrans_overlay', 'operator' => '==', 'value' => 'nxs-gradient'
	if ( get_theme_mod('itrans_overlay') == 'nxs-gradient' ) {
		return true;
	} else {
		return false;
	}
}




