<?php

if ( ! defined('ABSPATH')) {
    die('Silence is golden');
}

function iexcel_txoc_admin_js() {

	wp_enqueue_script( 'iexcel-txoc-admin-js', get_template_directory_uri() . '/inc/txoc/js/txoc-admin.js');
	wp_enqueue_style( 'iexcel-txoc-admin-css', get_template_directory_uri() . '/inc/txoc/css/txoc-admin.css');
	
	if ( is_plugin_active( 'templatesnext-toolkit/tx-toolkit.php' ) ) {
		$intropop_content = iexcel_customizer_demolist();
	} else {
		$intropop_content = iexcel_customizer_intropop() . iexcel_customizer_demolist();
	}
	
	wp_localize_script('iexcel-txoc-admin-js', 'intropop_content', $intropop_content);
	
	iexcel_enque_ocdi();
	
}
add_action( 'admin_enqueue_scripts', 'iexcel_txoc_admin_js' );



function iexcel_customizer_intropop () {
	
	$intropop_content = '';
	
    global $current_user ;
    $user_id = $current_user->ID;
	$show_pop_meta = get_user_meta($user_id, 'iexcel_txoc_show_pops');
	$how_to_import = esc_url('https://www.youtube.com/watch?v=9m1MQUFGQN8');
	
	if ( !empty($show_pop_meta) ){
		if ( '1' == $show_pop_meta[0] ) {
			$intropop_content .= '<div class="txoc-stage1"><div class="intropop-top install-tx txoc-show">';
		} elseif ( '0' == $show_pop_meta[0] )	{
			$intropop_content .= '<div class="txoc-stage1"><div class="intropop-top install-tx txoc-noshow">';
		}
	} else {
		$intropop_content .= '<div class="txoc-stage1"><div class="intropop-top install-tx txoc-noshow">';		
	}
	
	$intropop_content .= '<div class="closepop"><a href="#" title="Close"></a></div>';
	$intropop_content .= '<h1>'. esc_html__('Welcome To I-EXCEL Setup', 'i-excel') .'</h1>';
	$intropop_content .= '<h4>'. esc_html__('Installing accompanying plugin Templatesnext ToolKit.', 'i-excel') .'</h4>';
	
	$intropop_content .= '<a href="'.$how_to_import.'" target="_blank" title="How To Import Demo Layouts" class="howtoimport">';
	$intropop_content .= '</a>';
		
	$intropop_content .= '</div>';
	$intropop_content .= '<div class="tx-features">';
	$intropop_content .= '<h1>'. esc_html__('Main Features', 'i-excel') .'</h1>';
	$intropop_content .= '<ul>';
	$intropop_content .= '<li>'. esc_html__('Ready To Import Sites.', 'i-excel') .'</li>';
	$intropop_content .= '<li>'. esc_html__('Portfolio, Team, Custom Slider., etc.', 'i-excel') .'</li>';
	$intropop_content .= '<li>'. esc_html__('Page/Post Meta Options.', 'i-excel') .'</li>';
	$intropop_content .= '<li>'. esc_html__('20+ Custom Shortcodes.', 'i-excel') .'</li>';	
	$intropop_content .= '<li>'. esc_html__('Wishlist And Products Compare.', 'i-excel') .'</li>';	
	$intropop_content .= '<li>'. esc_html__('And Much More..', 'i-excel') .'</li>';					
	$intropop_content .= '</ul>';		
	$intropop_content .= '</div>';
	

	$pluginLocation = rawurlencode('templatesnext-toolkit/tx-toolkit.php');
	$pluginLink = iexcel_plugin_activation( $pluginLocation, 'templatesnext-toolkit', 'tx-toolkit.php' );
	$nonce_install = iexcel_plugin_install('templatesnext-toolkit');
	$pluginTitle = 'TemplatesNext ToolKit';
	$activation_button = '';
	
	$activation_button .= '<div class="btn-wrap">';
	if ( !empty($show_pop_meta) ) {
		if ( '1' == $show_pop_meta[0] ) {
			$activation_button .= '<a class="never-show button button-hero" href="?iexcel_txoc_pops=0">' . __( 'Never Show This Popup', 'i-excel' ) . '</a>';	
		}
	}
	$activation_button .= '<div class="nx-tx-activation">';
	if ( is_plugin_active( 'templatesnext-toolkit/tx-toolkit.php' ) ) {
		$activation_button .= '<a href="#" class="button disabled button-hero">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
	} elseif( iexcel_is_plugin_installed($pluginTitle) == false ) {
		$activation_button .= '<a data-slug="templatesnext-toolkit" data-active-lebel="' . __( 'Installing...', 'i-excel' ) . '" class="install-nx-now install-txtk-now button button-hero" href="' . esc_url( $nonce_install ) . '" data-name="templatesnext-toolkit" aria-label="Install templatesnext-toolkit">' . __( 'Install and activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a class="button activate-nx-now activate-txtk-now button-primary button-hero" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="templatesnext-toolkit" href="' . esc_url( $pluginLink ) . '" aria-label="Activate templatesnext-toolkit" style="display: none;">' . __( 'Activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a href="#" class="tx-active txtk-active button disabled button-hero" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';
	} else {
		$activation_button .= '<a class="button activate-nx-now activate-txtk-now button-primary button-hero" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="templatesnext-toolkit" href="' . esc_url( $pluginLink ) . '" aria-label="Activate templatesnext-toolkit">' . __( 'Activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a href="#" class="tx-active txtk-active button disabled button-hero" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
	}
	$activation_button .= '</div></div></div>';	
	
	
	return $intropop_content.$activation_button;									
}


function iexcel_customizer_demolist () {
	
	$intropop_content = '';
	$intropop_plugins = '';	
	$demolist = iexcel_import_files();
	$intropop_classes = '';	

    global $current_user ;
    $user_id = $current_user->ID;
		
	$show_pop_meta = get_user_meta($user_id, 'iexcel_txoc_show_pops');
	
	if ( is_plugin_active( 'templatesnext-toolkit/tx-toolkit.php' ) ) {
		if ( !empty($show_pop_meta) ){
			if ( '1' == $show_pop_meta[0] ) {
				$intropop_content .= '<div class="txoc-stage2 txoc-show">';
			} elseif ( '0' == $show_pop_meta[0] )	{
				$intropop_content .= '<div class="txoc-stage2 txoc-noshow">';
			}
		} else {
			$intropop_content .= '<div class="txoc-stage2 txoc-noshow">';
		}	
	} else {
		if ( !empty($show_pop_meta) ){
			if ( '1' == $show_pop_meta[0] ) {
				$intropop_content .= '<div class="txoc-stage2 txoc-show" style="display: none;">';
			} elseif ( '0' == $show_pop_meta[0] )	{
				$intropop_content .= '<div class="txoc-stage2 txoc-noshow" style="display: none;">';
			}
		} else {
			$intropop_content .= '<div class="txoc-stage2 txoc-noshow" style="display: none;">';
		}
	}
	
	
	$intropop_content .= '<div class="intropop-top demolist-head">';
	$intropop_content .= '<div class="closepop popstage2"><a href="#" title="Close"></a></div>';
	$intropop_content .= '<h1>'. esc_html__('Ready to Import Demos', 'i-excel') .'</h1>';
	$intropop_content .= '<h4>'. esc_html__('Start With A Pre-designed Website', 'i-excel') .'</h4>';

	$intropop_content .= '<ul class="nxl-filter">';
	$intropop_content .= '<li class="nxl-all active">'. esc_html__('All', 'i-excel') .'</li>';
	$intropop_content .= '<li class="nxl-free">'. esc_html__('Free', 'i-excel') .'</li>';
	$intropop_content .= '<li class="nxl-woocommerce">'. esc_html__('WooCommerce', 'i-excel') .'</li>';		
	$intropop_content .= '</ul>';

	$intropop_content .= '</div>';
	
	$intropop_content .= '<div class="popdemogallery">';
	$intropop_content .= '<ul class="popdemolist gallerylist">';	
	
	foreach ( $demolist as $vals ) {

		foreach ( $vals['categories'] as $class ) {
			$intropop_classes .= 'nx-' . str_replace(' ', '-', strtolower($class)) . ' ';
		}
		
		$intropop_content .= '<li class="'.$intropop_classes.'">';
		$intropop_content .= '<img src="'.$vals['import_preview_image_url'].'" alt="">';
		
      	$intropop_content .= '<div class="popitemfooter">';
      	$intropop_content .= '<div class="txoc-thumb-title">'.$vals['import_file_name'].'</div>';
      	$intropop_content .= '<a href="'.$vals['preview_url'].'" class="button preview-button" target="_blank">'. esc_html__('Preview', 'i-excel') .'</a>';
		
		if( !empty($vals['required_plugin']) )
		{
			foreach ( $vals['required_plugin'] as $plugin ) {
				$intropop_plugins .= $plugin.', ';
			}
		}
		
      	$intropop_content .= '<a href="'.$vals['import_file_name'].'" class="button button-primary ocdi-install-button" target="_blank" data-required-plugins="'.$intropop_plugins.'" data-file-name="'.$vals['import_file_name'].'" >'. esc_html__('Import', 'i-excel') .'</a>';				
      	$intropop_content .= '</div>';		
		
		$intropop_content .= '</li>';
		
		$intropop_plugins = '';
		$intropop_classes = '';
	}
	
	$intropop_content .= '</ul>';
	$intropop_content .= '<div class="clear cls"></div>';
	$intropop_content .= '</div>';
    if ( !empty($show_pop_meta) ) {
		if ( '1' == $show_pop_meta[0] ) {
			$intropop_content .= '<div class="intropop-bottom"><a class="never-show button" href="?iexcel_txoc_pops=0">' . __( 'Never Show This Popup', 'i-excel' ) . '</a></div>';	
		}
	}	
	$intropop_content .= '</div>';	
	
	
	/*************** Stage 2 ******************/
	/******************************************/	
	
	
	$pluginLocation = rawurlencode('one-click-demo-import/one-click-demo-import.php');
	$pluginLink = iexcel_plugin_activation( $pluginLocation, 'one-click-demo-import', 'one-click-demo-import.php' );
	$nonce_install = iexcel_plugin_install('one-click-demo-import');
	$pluginTitle = 'One Click Demo Import';
	$activation_button = '';
	
	$intropop_content .= '<div class="ocdi-install-top" style="display: none;">';
	$intropop_content .= '<h1>'. esc_html__('Installing Plugin One Click Demo Import', 'i-excel') .'</h1>';
	$intropop_content .= '<h2>'. esc_html__('Please wait ... ', 'i-excel') .'</h2>';		
	$intropop_content .= '</div>';	
	
	$activation_button .= '<div class="nx-ocdi-install" style="display: none;">';								
	if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) {
		$activation_button .= '<a href="#" class="button disabled ocdi-active">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
	} elseif( iexcel_is_plugin_installed($pluginTitle) == false ) {
		$activation_button .= '<a data-slug="one-click-demo-import" data-active-lebel="' . __( 'Installing...', 'i-excel' ) . '" class="install-nx-now button" href="' . esc_url( $nonce_install ) . '" data-name="templatesnext-toolkit" aria-label="Install one-click-demo-import">' . __( 'Install and activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a class="button activate-nx-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="one-click-demo-import" href="' . esc_url( $pluginLink ) . '" aria-label="Activate one-click-demo-import" style="display: none;">' . __( 'Activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a href="#" class="tx-active button disabled" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';
	} else {
		$activation_button .= '<a class="button activate-nx-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="one-click-demo-import" href="' . esc_url( $pluginLink ) . '" aria-label="Activate templatesnext-toolkit">' . __( 'Activate', 'i-excel' ) . '</a>';
		$activation_button .= '<a href="#" class="tx-active button disabled" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
	}
	$activation_button .= '</div>';
	
	
	/*************** Stage 3 ******************/
	/******************************************/
	
	$intropop_plugins = '';
	$nxd_classes = '';
	$item_counter = 0;
	$required_plugins_list = iexcel_ocdi_required_plugins();
	
	foreach ( $demolist as $vals ) {
		
		foreach ( $vals['categories'] as $class ) {
			$nxd_classes .= 'nxd-' . strtolower($class) . ' ';
		}

		$intropop_content .= '<div class="import-confirm '.$nxd_classes.'" data-item-number="'.$item_counter.'" data-file-name="'.$vals['import_file_name'].'" style="display: none;">';
		$intropop_content .= '<div class="closepop popstage3"><a href="#" title="Close"></a></div>';
		$intropop_content .= '<div class="stage3-imgwrap">';
		$intropop_content .= '<img src="'.$vals['import_preview_image_url'].'" alt="" width="100%">';
		$intropop_content .= '<div class="stage3-label">'. esc_html__('You are about to import demo site', 'i-excel') .' <b class="stage3-label-name">'.$vals['import_file_name'].'</b></div>';
		$intropop_content .= '</div>';						
		
		
		if ( in_array( "Free", $vals['categories']) ) {
			$intropop_content .= '<div class="fimp-notice">';
			$intropop_content .= '<ul>';
			$intropop_content .= '<li>'. esc_html__('No existing content or any other data will be deleted.', 'i-excel') .'<li>';
			$intropop_content .= '<li>'. esc_html__('Posts, pages, images, menus and other theme settings will get imported.', 'i-excel') .'</li>';
			$intropop_content .= '<li>'. esc_html__('Please click on the Import button only once and wait, it can take 5 - 20  minutes.', 'i-excel') .'</li>';
			$intropop_content .= '</ul>';
			$intropop_content .= '</div>';
			
			
			$intropop_content .= '<div class="ocdi-reqplug-wrap">';
			
			$intropop_content .= '<h3>'. esc_html__('Following Plugins Will Be Installed As Part Of The Demo', 'i-excel') .'</h3>';
			
			if( !empty($vals['required_plugin']) )
			{
				foreach ( $vals['required_plugin'] as $plugin_slug ) {			
					foreach ( $required_plugins_list as $plugin ) {				
						if ( $plugin_slug == $plugin['slug'] )
						{				
							$pluginLocation = rawurlencode($plugin['slug'].'/'.$plugin['pluginfile']);
							$pluginLink = iexcel_plugin_activation( $pluginLocation, $plugin['slug'], $plugin['pluginfile'] );
							$nonce_install = iexcel_plugin_install($plugin['slug']);
																				
							$intropop_content .= '<div class="ocdi-reqplug"><span class="reqplugin-title">'.$plugin['title'].'</span>';
							$pluginTitle = $plugin['title'];
							
							if ( is_plugin_active( $plugin['slug'].'/'.$plugin['pluginfile'] ) ) {
								$intropop_content .= '<a href="#" class="button disabled">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
							} elseif( iexcel_is_plugin_installed($pluginTitle) == false )
							{
								$intropop_content .= '<a data-slug="' . $plugin['slug'] . '" data-active-lebel="' . __( 'Installing...', 'i-excel' ) . '" class="install-txoc-now button" href="' . esc_url( $nonce_install ) . '" data-name="' . $plugin['slug'] . '" aria-label="Install ' . $plugin['slug'] . '">' . __( 'Install and activate', 'i-excel' ) . '</a>';
								$intropop_content .= '<a class="button activate-txoc-now" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '" style="display: none;">Activate</a>';
								$intropop_content .= '<a href="#" class="button disabled txoc-active" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
							} else
							{
								$intropop_content .= '<a class="button activate-txoc-now" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '">Activate</a>';
								$intropop_content .= '<a href="#" class="button disabled txoc-active" style="display: none;">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
							}
							
							$intropop_content .= '</div>';							
						}										
					}					
				}
			}
			
			$intropop_content .= '</div>';			
			
						
		} else {
			$intropop_content .= '<div class="fprem-notice">';
			$intropop_content .= '<h4>'. esc_html__('This demo site is only available with premium theme ', 'i-excel' ) . '<a href="' . esc_url('//templatesnext.org/ispirit/landing/?ref=txoc-iexcel') . '" target="_blank">' . esc_html__( 'I-SPIRIT', 'i-excel' ) . '</a>' . '</h4>';
			$intropop_content .= '</div>';				
		}			

		$intropop_content .= '<div class="tx-ocdi-item-footer">';		
		$intropop_content .= '<p class="ocdi__ajax-loader js-ocdi-ajax-loader" style="display: none;"><span class="spinner"></span>'. esc_html__( 'Please wait! The import process can take few minutes.', 'i-excel' ) .'</p>';

		if ( in_array( "Free", $vals['categories']) ) {
			$intropop_content .= '<a href="#" class="button button-hero button-primary install-all-txoc" data-item-number="'.$item_counter.'" target="_blank" data-required-plugins="'.$intropop_plugins.'" >'. esc_html__( 'Import Demo Site', 'i-excel' ) .'</a>';
		} else {
			$intropop_content .= '<a href="' . esc_url('//templatesnext.org/ispirit/landing/?ref=txoc-iexcel') . '" class="button button-hero button-primary go-prem" data-item-number="'.$item_counter.'" target="_blank" data-required-plugins="'.$intropop_plugins.'" >'. esc_html__( 'Go Premium', 'i-excel' ) .'</a>';
		}		
		
		$intropop_content .= '</div>';		
      	$intropop_content .= '</div>';
	
		$intropop_plugins = '';
		$nxd_classes = '';
		
		$item_counter++;
	}
	
	$intropop_content .= '<div class="ocdi__response js-ocdi-ajax-response"></div>';
	
	$intropop_content .= '<div class="txoc-sitelink" style="display: none;">';
	$intropop_content .= '<a href="'.site_url().'/wp-admin/customize.php?iexcel_txoc_pops=0" class="button" target="_self" >'. esc_html__( 'Customize', 'i-excel' ) .'</a>';
	$intropop_content .= '<a href="'.site_url().'/?iexcel_txoc_pops=0" class="button button-primary" target="_blank" >'. esc_html__( 'Visit Site', 'i-excel' ) .'</a>';
	$intropop_content .= '</div>';
	
	
	return $intropop_content.$activation_button;									
}



function iexcel_enque_ocdi () {
	
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_style( 'wp-jquery-ui-dialog' );

	wp_enqueue_script( 'tx-ocdi-main-js', get_template_directory_uri() . '/inc/txoc/js/txoc-main.js');

	// Get theme data.
	$theme = wp_get_theme();

	wp_localize_script( 'tx-ocdi-main-js', 'ocdi',
			array(
					
					'ajax_url'         => admin_url( 'admin-ajax.php' ),					
					'ajax_nonce'       => wp_create_nonce( 'ocdi-ajax-verification' ),
					'texts'            => array(
						'missing_preview_image' => esc_html__( 'No preview image defined for this import.', 'i-excel' ),
						'dialog_title'          => esc_html__( 'Are you sure?', 'i-excel' ),
						'dialog_no'             => esc_html__( 'Cancel', 'i-excel' ),
						'dialog_yes'            => esc_html__( 'Yes, import!', 'i-excel' ),
						'selected_import_title' => esc_html__( 'Selected demo import:', 'i-excel' ),
					),
					'dialog_options' => apply_filters( 'pt-ocdi/confirmation_dialog_options', array() )
					
			)
	);
	
}


function iexcel_ocdi_required_plugins() {
	return array(	
		array(
				'name' => __( 'TemplatesNext ToolKit (<span class="nx-red">Highly Recommended</span>)', 'i-excel' ),
				'desc' => __( 'Required for page options, widgets and WooCommerce wishlist and compare. This plugin also adds all the custom post types like, portfolio, Team, Slider, Testimonials etc along with all the shortcodes.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/templatesnext-toolkit/' ),
				'tutorial' => esc_url( 'https://www.youtube.com/watch?v=vqTHQCN2ci4' ),
				'title' => 'TemplatesNext ToolKit',
				'slug' => 'templatesnext-toolkit',			
				'pluginfile' => 'tx-toolkit.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'Breadcrumb NavXT (<span class="nx-red">Recommended</span>)', 'i-excel' ),
				'desc' => __( 'This plugin adds the “Breadcrumbs” trail for your users to help them navigate and find their location in your site.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/breadcrumb-navxt/' ),
				'title' => 'Breadcrumb NavXT',			
				'slug' => 'breadcrumb-navxt',
				'pluginfile' => 'breadcrumb-navxt.php',	
				'ocdi' => 1,					
		),
		array(
				'name' => __( 'Contact Form 7 (<span class="nx-red">Recommended</span>)', 'i-excel' ),
				'desc' => __( 'A form creating plugin to help you create your own contact form or other kinds of forms.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/contact-form-7/' ),
				'tutorial' => esc_url( 'https://www.youtube.com/watch?v=wy70WGCjMY4' ),
				'title' => 'Contact Form 7',			
				'slug' => 'contact-form-7',
				'pluginfile' => 'wp-contact-form-7.php',
				'ocdi' => 1,						
		),
		array(
				'name' => __( 'One Click Demo Import (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'This plugin is only required if you choose to import the predefined demo contents, Once you are done with your demo setup you can deactivate the plugin.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/one-click-demo-import/' ),
				'title' => 'One Click Demo Import',			
				'slug' => 'one-click-demo-import',
				'pluginfile' => 'one-click-demo-import.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'Brizy Page Builder (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Drag and drop page builder with pre-built sections.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/brizy/' ),
				'tutorial' => esc_url( 'https://www.youtube.com/watch?v=3sRJ0-PAuXk' ),
				'title' => 'Brizy – Page Builder',			
				'slug' => 'brizy',
				'pluginfile' => 'brizy.php',
		),
		array(
				'name' => __( 'Elementor Page Builder (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Drag and drop page builder with pre-built layouts.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/elementor/' ),
				'tutorial' => esc_url( 'https://www.youtube.com/watch?v=3B5HL11uhVE' ),
				'title' => 'Elementor',			
				'slug' => 'elementor',
				'pluginfile' => 'elementor.php',
		),			
		array(
				'name' => __( 'SiteOrigin PageBuilder (<span class="nx-red">Recommended</span>)', 'i-excel' ),
				'desc' => __( 'This drag and drop page builder plugin makes it easy to build responsive grid-based page content. Our themes supports and extends SiteOrigin PageBuilder functionalities.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/siteorigin-panels/' ),
				'tutorial' => esc_url( 'https://siteorigin.com/page-builder/documentation/' ),
				'title' => 'Page Builder by SiteOrigin',			
				'slug' => 'siteorigin-panels',
				'pluginfile' => 'siteorigin-panels.php',
				'ocdi' => 1,					
		),
		array(
				'name' => __( 'SiteOrigin Widgets Bundle (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Additional useful widgets for pagebuilder such as Google map, Button, Image, Price table, etc.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/so-widgets-bundle/' ),
				'title' => 'SiteOrigin Widgets Bundle',			
				'slug' => 'so-widgets-bundle',
				'pluginfile' => 'so-widgets-bundle.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'Contact Form 7 Honeypot (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Plugin to fools spammers with a dummy filed visible only to bots.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/contact-form-7-honeypot/' ),
				'title' => 'Contact Form 7 Honeypot',			
				'slug' => 'contact-form-7-honeypot',
				'pluginfile' => 'honeypot.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'Essential Addons for Elementor (<span class="nx-red">Recommended with Elementor</span>)', 'i-excel' ),
				'desc' => __( 'Various addons for elementor', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/essential-addons-for-elementor-lite/' ),
				'title' => 'Essential Addons for Elementor',			
				'slug' => 'essential-addons-for-elementor-lite',
				'pluginfile' => 'essential_adons_elementor.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'WooCommerce', 'i-excel' ),
				'desc' => __( 'WordPress Ecommerce plugin', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/woocommerce/' ),
				'title' => 'WooCommerce',			
				'slug' => 'woocommerce',
				'pluginfile' => 'woocommerce.php',
				'ocdi' => 1,			
		),
		array(
				'name' => __( 'Loco Translate (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Theme translation plugin.', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/loco-translate/' ),
				'title' => 'Loco Translate',			
				'slug' => 'loco-translate',
				'pluginfile' => 'loco.php',
				'ocdi'      => 1,
				'repourl'	=> '',					
		),
		array(
				'name' => __( 'Polylang (<span class="nx-red">Optional</span>)', 'i-excel' ),
				'desc' => __( 'Multilingual plugin', 'i-excel' ),
				'pluginurl' => esc_url( 'https://wordpress.org/plugins/polylang/' ),
				'title' => 'Polylang',			
				'slug' => 'polylang',
				'pluginfile' => 'polylang.php',
				'ocdi'      => 1,
				'repourl'	=> '',					
		),						
		
	);
}
  
add_action('admin_init', 'iexcel_txoc_popup_ignore');
function iexcel_txoc_popup_ignore() {
    global $current_user;
	$user_id = $current_user->ID;
	
	$show_pop_meta = get_user_meta($user_id, 'iexcel_txoc_show_pops');
	
	/*
	if ( isset($_GET['activated']) && $_GET['activated'] == 'true' ) {
		add_user_meta($user_id, 'iexcel_txoc_show_pops', 1);
	}
	*/
	if ( isset($_GET['iexcel_txoc_pops']) && '0' == $_GET['iexcel_txoc_pops'] ) {
    	update_user_meta($user_id, 'iexcel_txoc_show_pops', 0);
    } elseif ( isset($_GET['iexcel_txoc_pops']) && '1' == $_GET['iexcel_txoc_pops'] ) {
    	update_user_meta($user_id, 'iexcel_txoc_show_pops', 1);
    }
}

/* Turn On Imporp wiz */
add_action('after_switch_theme', 'iexcel_txoc_setup_options');

function iexcel_txoc_setup_options () {
	
    global $current_user ;
    $user_id = $current_user->ID;
	$show_pop_meta = get_user_meta($user_id, 'iexcel_txoc_show_pops');
		
	add_user_meta($user_id, 'iexcel_txoc_show_pops', 1);
}
