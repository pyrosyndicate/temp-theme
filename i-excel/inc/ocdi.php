<?php

if ( ! defined('ABSPATH')) {
    die('Silence is golden');
}

/* Demo import by One Click Demo Import */
// include get_template_directory() . '/inc/one-click-demo-import/one-click-demo-import.php';

function iexcel_import_files() {
  return array(
  
		array(
		  'import_file_name'             	=> 'Consulting',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/consulting.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/restaurant.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/consulting.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/consulting.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-consulting/',
		  'required_plugin'					=> array(
												'elementor',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'Restaurant',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/restaurant.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/restaurant.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/restaurant.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/restaurant.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-restaurant/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'Small Business',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/small-business.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/small-business.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/small-business.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/business.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-smallbusiness/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),		
		array(
		  'import_file_name'             	=> 'Personal',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/personal.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-personal/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		
		/****************************************************************************/
		/****************************************************************************/		
		
		array(
		  'import_file_name'             	=> 'Multilingual',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/multilingual.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/multilingual.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/multilingual.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-multilingual/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
												'polylang',												
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'RTL',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/rtl.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/rtl.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/rtl.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-rtl/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
												'loco-translate',												
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'Online Courses',
		  'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/max-institute.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/max-institute/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'Elementor' ),										
		),	
		/* Starting 2019 - 3 demos */
		array(
		  'import_file_name'             	=> 'Church',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/church.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/church.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/church.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-church/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'SEO',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/seo.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/seo.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/seo.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-seo/',
		  'required_plugin'					=> array(
												'elementor',
												'essential-addons-for-elementor-lite',
												'contact-form-7',
											),
		  'categories'                 		=> array( 'Free', 'Elementor' ),	  
		),
		array(
		  'import_file_name'             	=> 'Yoga',
		  'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/yoga.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/yoga/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'Elementor' ),										
		),
		array(
		  'import_file_name'             	=> 'Gym',
		  'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/elementor/personal.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/gym.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/gym/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'Elementor' ),										
		),						
				
		/* ending 2019 - 3 demos */			
		/****************************************************************************/
		/****************************************************************************/	
						
		
		array(
		  'import_file_name'             	=> 'MAX Store',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/maxstore.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/maxstore/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WooCommerce', 'Elementor' ),										
		),		
		  
    array(
      'import_file_name'             	=> 'Agency 4',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency-4.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency-4.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/agency-4.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "Contact Form 7" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'https://templatesnext.in/demos/tx-demos/index.php/agency-4/',
	  'required_plugin'					=> array(
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
    ),
				
		array(
		  'import_file_name'             	=> 'School',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/school.xml',
		  'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/school.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/school.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/school.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-school/',
		  'required_plugin'					=> array(
												'siteorigin-panels',
												'so-widgets-bundle',
											),
		  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
		),
		array(
		  'import_file_name'             	=> 'Charity',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/charity.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/charity.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/charity.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/ngo-charity.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-charity/',
		  'required_plugin'					=> array(
												'siteorigin-panels',
												'so-widgets-bundle',
											),
		  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
		),
		array(
		  'import_file_name'             	=> 'Computer',
		  'import_file_url'            		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/computer.xml',
		  //'import_widget_file_url'     		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/computer.wie',
		  'import_customizer_file_url' 		=> 'http://wp-demos.com/downloads/demos/i-excel/creative/computer.dat',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/computer.jpg',
		  'import_notice'                	=> __( 'This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/i-spirit/i-excel-computers/',
		  'required_plugin'					=> array(
												'siteorigin-panels',
												'so-widgets-bundle',
											),
		  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
		),

    array(
      'import_file_name'             	=> 'Agency 1',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency-1.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/agency-1.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "Contact Form 7" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos/index.php/1635-2/',
	  'required_plugin'					=> array(
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
    ),
	
    array(
      'import_file_name'             	=> 'Agency 3',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency-3.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/agency-3.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "Contact Form 7" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'https://templatesnext.in/demos/tx-demos/index.php/agency-3/',
	  'required_plugin'					=> array(
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
    ),	
	
    array(
      'import_file_name'             	=> 'Business Home 1',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-business-1.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/business-1.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "Contact Form 7" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos/index.php/business-home-1-pb/',
	  'required_plugin'					=> array(
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
    ),
	

    array(
      'import_file_name'             	=> 'Fashion Shop 1',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-fashion-shop.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/fashion-shop.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "WooCommerce" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos',
	  'required_plugin'					=> array(
											'breadcrumb-navxt',
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free','WooCommerce', 'SiteOrigin Page Builder' ),	  
    ),
	
    array(
      'import_file_name'             	=> 'Shop Shaurya',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop-shaurya.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/shaurya.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "WooCommerce" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos/index.php/shop-shaurya/',
	  'required_plugin'					=> array(
											'breadcrumb-navxt',
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free','WooCommerce', 'SiteOrigin Page Builder' ),	  	  
    ),	
    array(
      'import_file_name'             	=> 'Craft-18 Shop',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-craft-18.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/shop-craft-18.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "WooCommerce" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos/index.php/shop-blank/',
	  'required_plugin'					=> array(
											'breadcrumb-navxt',
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free','WooCommerce', 'SiteOrigin Page Builder' ),	  	  
    ),
	
    array(
      'import_file_name'             	=> 'Agency 2',
      'import_file_url'            		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.xml',
      'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency.wie',
      'import_customizer_file_url' 		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-agency-2.dat',
      'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/agency-2.jpg',
      'import_notice'                	=> __( 'Please make sure you have plugin "TemplatesNext ToolKit" and "Contact Form 7" installed and active before you start the import process. <br> This process involves transfer of data and media from server to server and might take some time.', 'i-excel' ),
	  'preview_url'                		=> 'http://templatesnext.in/demos/tx-demos/index.php/agency-2-pb/',
	  'required_plugin'					=> array(
											'siteorigin-panels',
											'so-widgets-bundle',
											'contact-form-7',
	  									),
	  'categories'                 		=> array( 'Free', 'SiteOrigin Page Builder' ),	  
    ),	
		
		array(
		  'import_file_name'             	=> 'Classic 1',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/classic-1.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/classic/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),
		
		array(
		  'import_file_name'             	=> 'Modern 1',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/modern-1.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/modern/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),	
		array(
		  'import_file_name'             	=> 'Flat 1',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/flat-1.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/flat/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),			
		
		array(
		  'import_file_name'             	=> 'Shop 1',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/shop-1.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/shop/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium','WooCommerce', 'WPBakery Page Builder' ),										
		),
		array(
		  'import_file_name'             	=> 'Modern 2',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/modern-2.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/modern/home-visual-composer/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),	
		array(
		  'import_file_name'             	=> 'Classic MAX',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/classic-max.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/classic/classic-max',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),	
		array(
		  'import_file_name'             	=> 'Classic 2',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/classic-2.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/classic/nx-front/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),
		
		array(
		  'import_file_name'             	=> 'Shop 2',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/shop-2.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/shop/nx-shop/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium','WooCommerce', 'WPBakery Page Builder' ),										
		),	
		array(
		  'import_file_name'             	=> 'Flat 2',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/flat-2.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/flat/home-fullscreen-image-slider/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),	
		array(
		  'import_file_name'             	=> 'Modern MAX',
		  'import_widget_file_url'     		=> 'https://raw.githubusercontent.com/TemplatesNext/i-excel-demo/master/i-excel-shop.wie',
		  'import_preview_image_url'     	=> trailingslashit( get_template_directory_uri() ) . 'inc/txoc/small-images/modern-max.jpg',
		  'import_notice'                	=> __( 'This demo design is only available with premium theme I-SPIRIT.', 'i-excel' ),
		  'preview_url'                		=> 'http://www.wp-demos.com/ispirit/modern/home-halfscreen-slider-3/',
		  'required_plugin'					=> '',
		  'categories'                 		=> array( 'Premium', 'WPBakery Page Builder' ),										
		),	
				
		
	);
}
add_filter( 'pt-ocdi/import_files', 'iexcel_import_files' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function iexcel_after_import_setup($selected_import) {
	
	if ( 'Consulting' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );
				
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
						
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Restaurant' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Small Business' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Front Page' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Personal' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Multilingual' === $selected_import['import_file_name'] ) {
		
		if ( class_exists( 'PLL_Model' ) ) {
			
			$polylang_options = get_option( 'polylang');			
			if( !array_key_exists('default_lang', $polylang_options) ) {
				
				$polylang_options['default_lang'] = 'en';
				update_option( 'polylang', $polylang_options );
								
			}		
		}			

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
		$main_menu_de = get_term_by( 'name', 'Main Navigation De', 'nav_menu' );
		$main_menu_ru = get_term_by( 'name', 'Main Navigation Ru', 'nav_menu' );		
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
				'primary___de' => $main_menu_de->term_id,
				'primary___ru' => $main_menu_ru->term_id,				
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'RTL' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'SEO' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Front Page' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Church' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Home' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'School' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Graceland School' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Charity' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Vision Eartth' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Computer' === $selected_import['import_file_name'] ) {

		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Computers 1' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Agency 4' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Agency 4 PB' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Agency 1' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Agency 1' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Agency 2' === $selected_import['import_file_name'] ) {
	
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Agency 2' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}			
	
	} elseif ( 'Agency 3' === $selected_import['import_file_name'] ) {
	
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Agency 3' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}			
	
	} elseif ( 'Business Home 1' === $selected_import['import_file_name'] ) {

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
	
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Business Home 1' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}		
		
	} elseif ( 'Fashion Shop 1' === $selected_import['import_file_name'] ) {
	
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Fashion Shop 1' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}			
	
	} elseif ( 'Shop Shaurya' === $selected_import['import_file_name'] ) {
	
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Shop Shaurya' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}			
	
	} elseif ( 'Craft-18 Shop' === $selected_import['import_file_name'] ) {
	
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'i-excel Main Nav', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);
		
		$front_page_id = get_page_by_title( 'Craft-18 Shop' );
       	if ( isset( $front_page_id->ID ) ) {
			update_option( 'page_on_front', $front_page_id->ID );
        	update_option( 'show_on_front', 'page' );
       	}			
	
	}

}
add_action( 'pt-ocdi/after_import', 'iexcel_after_import_setup' );

/* Delete The default Hello World Post before import */
/* Resetting default Widgets */
function iexcel_before_content_import( $selected_import ) {
	wp_delete_post(1);
	update_option( 'sidebars_widgets', array() );
}
add_action( 'pt-ocdi/before_content_import', 'iexcel_before_content_import' );


/* change title for page and menu */
function iexcel_plugin_page_setup( $default_settings ) {
    $default_settings['page_title']  = esc_html__( 'i-excel One Click Demo Setup', 'i-excel' );
    $default_settings['menu_title']  = esc_html__( 'Theme Demo Setup' ,'i-excel' );
    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'iexcel_plugin_page_setup' );
