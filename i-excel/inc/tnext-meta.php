<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

add_filter( 'rwmb_meta_boxes', 'iexcel_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function iexcel_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'iexcel_';
	
	$iexcel_template_url = get_template_directory_uri();

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'heading',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Page Heading Options', 'i-excel' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Hide Title
			array(
				'name' => __( 'Hide Title Bar', 'i-excel' ),
				'id'   => "{$prefix}hidetitle",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'hide-ttl',
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),					
			),
			array(
				'name' => __( 'Show Default i-excel Slider', 'i-excel' ),
				'id'   => "{$prefix}show_slider",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'class' => 'show-slider',
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),					
			),			
			/*		
			// Custom Title
			array(
				// Field name - Will be used as label
				'name'  => __( 'Custom title', 'i-excel' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}customtitle",
				// Field description (optional)
				'desc'  => __( 'Enter custom title for the page', 'i-excel' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'i-excel' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),
			*/
			
			// hide breadcrum
			array(
				'name' => __( 'Hide breadcrumb', 'i-excel' ),
				'id'   => "{$prefix}hide_breadcrumb",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),
			
			// 3rd part slider
			array(
				// Field name - Will be used as label
				'name'  => __( 'Other Slider Plugin Shortcode', 'i-excel' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}other_slider",
				// Field description (optional)
				'desc'  => __( 'Enter itrans Slider shortcode or a 3rd party slider shortcode, ex. meta slider, smart slider 2, wow slider, etc. Only works with TemplatesNext Themes ', 'i-excel' ),
				'type'  => 'textarea',
				// Default value (optional)
				'std'   => __( '', 'i-excel' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				//'clone' => true,
				'class' => 'cust-ttl',
			),
			
			array(
				'name'            => __( 'Smart Slider 3', 'i-excel' ),
				'id'              => "{$prefix}smart_slider",
				'type'            => 'select',
				// Array of 'value' => 'Label' pairs
				'options'         => iexcel_smartslider_list(),
				// Allow to select multiple value?
				'multiple'        => false,
				// Placeholder text
				'placeholder'     => __( 'Select a smart slider', 'i-excel' ),
				// Display "Select All / None" button?
				'select_all_none' => false,
				'desc' 			  => __('This option will override all the above slider options', 'i-excel'),
				'after'			  => iexcel_smartslider_after(),
			),

		)
	);
	
	
	/**/
	
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'portfoliometa',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Portfolio Meta', 'i-excel' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// Side bar

			// ITEM DETAILS OPTIONS SECTION
			array(
				'type' => 'heading',
				'name' => __( 'Portfolio Additinal Details', 'i-excel' ),
				'id'   => 'fake_id_pf1', // Not used but needed for plugin
			),
			// Slide duration
			array(
				'name'  => __( 'Subtitle', 'i-excel' ),
				'id'    => "{$prefix}portfolio_subtitle",
				'desc'  => __( 'Enter a subtitle for use within the portfolio item index (optional).', 'i-excel' ),				
				'type'  => 'text',
			),
			
			array(
				'name'  => __( 'Portfolio Link(External)', 'i-excel' ),
				'id'    => "{$prefix}portfolio_url",
				'desc'  => __( 'Enter an external link for the item (optional) (NOTE: INCLUDE HTTP://).', 'i-excel' ),				
				'type'  => 'text',
			),

		)
	);	
	

	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'miscellaneous',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Other Options', 'i-excel' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'post', 'page', 'portfolio', 'team', 'product' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'low',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			/*
			// Show Alternate main navigation
			array(
				'name' => __( 'Show Alternate Main Navigation', 'i-excel' ),
				'id'   => "{$prefix}alt_navigation",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Turn on the alternate main navigation', 'i-excel'),
			),
			*/
			
			// Remove top and bottom page padding/margin
			array(
				'name' => __( 'Remove Top and Bottom Padding/Margin', 'i-excel' ),
				'id'   => "{$prefix}page_nopad",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Remove the spaces/padding from top and bottom of the page/post', 'i-excel'),
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),
			
			// Hide page header
			array(
				'name' => __( 'Show Transparent Header', 'i-excel' ),
				'id'   => "{$prefix}trans_header",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Show transparent header on pages/posts. This will hide the page/post titlebar as well', 'i-excel'),
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),				
			
			// Hide page header
			array(
				'name' => __( 'Hide Page Header', 'i-excel' ),
				'id'   => "{$prefix}no_page_header",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('In case you are building the page without the top navigation and logo', 'i-excel'),
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),										

			// Hide page header
			array(
				'name' => __( 'Hide Topbar', 'i-excel' ),
				'id'   => "{$prefix}no_ubar",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Hide top bar with email, phone and social links', 'i-excel'),
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),
			// Hide page header
			array(
				'name' => __( 'Hide Footer Widget Area', 'i-excel' ),
				'id'   => "{$prefix}no_footer",
				'type' => 'switch',
				// Value can be 0 or 1
				'std'  => 0,
				'desc' => __('Hide bottom footer widget area', 'i-excel'),
				'on_label'  => esc_attr__('Yes', 'i-excel'),
				'off_label' => esc_attr__('No', 'i-excel'),				
			),									

			// Custom page primary color			
			array(
				'name'  => __( 'Custom Primary Color', 'i-excel' ),
				'id'    => "{$prefix}page_color",
				'type'  => 'color',
				'std'   => '',
				'desc' => __('Choose a custom primary color for this page', 'i-excel'),
			),
			
			// Custom page primary color			
			array(
				'name'  => __( 'Topbar Background Color', 'i-excel' ),
				'id'    => "{$prefix}topbar_bg_color",
				'type'  => 'color',
				'std'   => '',
				'desc' => __('Top bar with phone, email and social link background color', 'i-excel'),
			),
			
			/* Requires Meta Box Update */
			array(
				'name'  => __( 'Custom Page Logo Normal', 'i-excel' ),
				'id'    => "{$prefix}page_logo_normal",
				'type'  => 'single_image',
			),
			// additional page class			
			array(
				'name'  => __( 'Custom Page Logo Reverse', 'i-excel' ),
				'id'    => "{$prefix}page_logo_trans",
				'type'  => 'single_image',
			),
							
						
			// additional page class			
			array(
				'name'  => __( 'Additional Page Class', 'i-excel' ),
				'id'    => "{$prefix}page_class",
				'type'  => 'text',
				'std'   => __( '', 'i-excel' ),
				'desc' => __('Enter an additional page class, will be added to body. "hide-page-header" for no header, "nx-boxed" for boxed page for wide layout.', 'i-excel'),
			),
			// additional page Style			
			array(
				'name'  => __( 'Additional Page CSS', 'i-excel' ),
				'id'    => "{$prefix}page_styles",
				'type'  => 'textarea',
				'std'   => '',
				'desc' => __('Enter an additional page CSS Codes, Styles will be applied on this page only.', 'i-excel'),
			),				
						
		)
	);			
	
	
	
	return $meta_boxes;
}

function iexcel_get_category_list_key_array($category_name) {
			
	$get_category = get_categories( array( 'taxonomy' => $category_name	));
	$category_list = array( 'all' => 'Select Category');
		
	foreach( $get_category as $category ){
		if (isset($category->slug)) {
			$category_list[$category->slug] = $category->cat_name;
		}
	}
	return $category_list;
}	
