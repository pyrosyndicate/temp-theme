<?php

/* include Theme Welcome Page functions */
include get_template_directory() . '/inc/theme-welcome/tw-functions.php';

/*	
if (isset($_GET['activated']) && is_admin()) {
	set_transient( '_welcome_screen_activation_redirect', true, 30 );
}

add_action( 'admin_init', 'welcome_screen_do_activation_redirect' );
function welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_welcome_screen_activation_redirect' );

  // Bail if activating from network, or bulk
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to bbPress about page
  wp_safe_redirect( add_query_arg( array( 'page' => 'welcome-screen-about' ), admin_url( 'themes.php' ) ) );

}
*/

add_action('admin_menu', 'welcome_screen_pages');

function welcome_screen_pages() {
	add_theme_page(
		'Welcome To Welcome i-excel',
		'About i-excel',
		'read',
		'welcome-screen-about',
		'welcome_screen_content',
		'dashicons-awards', 
		6 		
	);
}

function welcome_screen_content() {
	
	include get_template_directory() . '/inc/theme-welcome/tw-content.php';
	
	$logo_url = get_template_directory_uri() . '/inc/theme-welcome/i-excel-welcome.jpg';
	$page_settings_url = get_template_directory_uri() . '/inc/theme-welcome/images/iexcel-static-fp-settings.png';
	$page_settings_url_2 = get_template_directory_uri() . '/inc/theme-welcome/images/iexcel-pb-settings.png';
	$img_url = get_template_directory_uri() . '/inc/theme-welcome/images/';
	$active_tab = 'iexcel_about';
	
	/* Urls */
	$reviewURL = esc_url('//wordpress.org/support/theme/i-excel/reviews/?filter=5');
	$goPremiumURL = esc_url('//templatesnext.org/ispirit/landing/?ref=iexcelw');
	$videoguide = esc_url('//www.templatesnext.org/i-excel-documentations/');
	$supportforum = esc_url('//templatesnext.org/ispirit/landing/forums/'); 
	$toolkit = esc_url('//www.templatesnext.org/icreate/templatesnext-toolkit/');
	$fb_page = esc_url('//www.facebook.com/templatesnext/');
	$pb_tutorial = esc_url('https://siteorigin.com/page-builder/documentation/');
	$livedemos = esc_url('//www.templatesnext.org/i-excel/?ref=iexcelw');
	
	$intro_video_url = esc_url( 'https://www.youtube.com/embed/Gh_roekInwg?rel=0&amp;controls=1&amp;showinfo=0&amp;color=white&quot;theme=light' );
	$intro_video = '<iframe width="100%" src="'. $intro_video_url . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';


	$ocdi_buttont = "";
	if ( class_exists('OCDI_Plugin') ) {
		$ocdi_buttont = "button-enabled";
	} else
	{
		$ocdi_buttont = "button-disabled";
	} 	
	$details_theme = wp_get_theme();
	$name_version = $details_theme->get( 'Name' ) . " - " . $details_theme->get( 'Version' );
  	?>
  	<div class="wrapp">
        <div class="nx-info-wrap-2 welcome-panel">
        	
        	<div class="nx-info-wrap">
                <div class="nx-info-desc" style="width: 100%;">
					
                            <div class="nx-welcome"><?php _e( 'Welcome To ', 'i-excel' ); echo '<span style="text-transform: uppercase;">'.$name_version.'</span>'; ?></div>
                            <div class="tx-wspace-24"></div>                    
                            <p>
                                <?php _e( 'I-EXCEL is a functional, flexible, multipurpose WordPress theme. Use it for blogs, business websites, personal websites, WooCommerce, portfolios, etc.', 'i-excel' ); ?>
                            </p>                    
                	<div class="nx-admin-row">
                        <div class="col-1-2" style="padding-left: 0px; margin-left: 0px; width: 60%;">
                        	<h2 style="margin: 12px 0px;"><?php esc_attr_e('I-EXCEL Setup Guide', 'i-excel'); ?></h4>
                        	<div class="video-wrapper">
                            	<?php echo $intro_video; ?>
                            </div>
                        </div>
                        <div class="col-1-2" style="padding-right: 0px; margin-right: 0px; width: 36%;">            	
							<div>
                            	<ul class="setup-list">
                                	<li><b><?php esc_attr_e('0:03','i-excel'); ?> </b><?php esc_html_e('Installing TemplatesNext Toolkit', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('0:36','i-excel'); ?> </b><?php esc_html_e('Setting-up Top Menu', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('1:08','i-excel'); ?> </b><?php esc_html_e('Highlighting A Menu Item', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('1:49','i-excel'); ?> </b><?php esc_html_e('Adding Logo', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('2:58','i-excel'); ?> </b><?php esc_html_e('Maintenance/Coming Soon Mode', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('4:17','i-excel'); ?> </b><?php esc_html_e('Blog/Shop Page Settings', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('5.07','i-excel'); ?> </b><?php esc_html_e('Theme Slider', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('6:03','i-excel'); ?> </b><?php esc_html_e('Topbar Customization', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('6:53','i-excel'); ?> </b><?php esc_html_e('Header Customization', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('7:42','i-excel'); ?> </b><?php esc_html_e('Creating A Front Page', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('15:03','i-excel'); ?> </b><?php esc_html_e('Setting A Page As Your Front/Home Page', 'i-excel'); ?></li>
                                	<li><b><?php esc_attr_e('15:34','i-excel'); ?> </b><?php esc_html_e('A Preview : Premium Theme I-SPIRIT', 'i-excel'); ?></li>
                                </ul>
                            </div> 
                            <a href="//www.youtube.com/watch?v=M_-HUs4EN-8?autoplay=1" target="_blank" style="display: block; margin: 16px 0px;" class="ocdi-vdo">
                                <?php printf( esc_html__( 'Demo import video guide.', 'i-excel' )); ?>
                            </a>                                                                                   
                        </div>
                    </div> 
                	<div class="nx-admin-row">
                        <div class="">            	
                            <a class="button button-primary button-hero" target="_blank" href="<?php echo $livedemos; ?>">
                            <?php _e( 'Live Demos', 'i-excel' ); ?>
                            </a>  
                            <a class="button button-primary button-hero" target="_blank" href="<?php echo $goPremiumURL; ?>">
                                <?php _e( 'Go Premium', 'i-excel' ); ?>
                            </a>
                        </div>
                    </div>                     
                    
                </div>
                <div class="tx-wspace-12"></div>
                <div class="tx-wspace-24"></div>
                <div class="tx-wspace-24"></div>
                <?php
					if( isset( $_GET[ 'tab' ] ) ) {
						$active_tab = $_GET[ 'tab' ];
					}
				?>
                <h2 class="nav-tab-wrapper">
                    <a href="?page=welcome-screen-about&tab=iexcel_about" class="nav-tab <?php echo $active_tab == 'iexcel_about' ? 'nav-tab-active' : ''; ?>">
                   		<?php _e( 'Setting Up i-Excel', 'i-excel' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=iexcel_ocdi" class="nav-tab <?php echo $active_tab == 'iexcel_ocdi' ? 'nav-tab-active' : ''; ?>">
                   		<?php _e( 'One Click Demo Import', 'i-excel' ); ?>
                    </a>                       
                    <a href="?page=welcome-screen-about&tab=iexcel_plugins" class="nav-tab <?php echo $active_tab == 'iexcel_plugins' ? 'nav-tab-active' : ''; ?> nx-kick">
                    	<?php _e( 'Useful Plugins', 'i-excel' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=iexcel_faq" class="nav-tab <?php echo $active_tab == 'iexcel_faq' ? 'nav-tab-active' : ''; ?> nx-plug">
                    	<?php _e( 'FAQs/Support', 'i-excel' ); ?>
                    </a>
                    <a href="?page=welcome-screen-about&tab=iexcel_vid" class="nav-tab <?php echo $active_tab == 'iexcel_vid' ? 'nav-tab-active' : ''; ?> nx-plug">
                    	<?php _e( 'Video Guide', 'i-excel' ); ?>
                    </a>                     
                </h2>
                
                <?php
					if( $active_tab == 'iexcel_about' )
					{
				?> 
                	<div class="nx-tab-content">
                		<p>&nbsp;</p>
                        <ul class="nx-welcome">
  							<?php
									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Upload Logos', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Start with uploading your logos', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=title_tagline" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Set Theme Color', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Change theme color', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=colors" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Topbar Customization', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Add your phone, email and social links or empty the fields to remove them', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=nxtopbar" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Header Customization', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Customize header, change font menu size, width, etc.', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=nxheader" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Turn ON/OFF Preloader', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Turn on or off page preloader, by default it is on', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=layout" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';
									
									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Footer Customization', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Customize footer background, text color, etc', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=nxfooter" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';									

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Edit Theme Slider', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Adjust slider settings, edit slides, etc.', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[panel]=slider" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'WooCommerce Customization', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Adjust WooCommerce Settings', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=woocomm" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';

									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Set Fonts', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Choose your fonts', 'i-excel' ) );
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=typography" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';
									
									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Choose Your Plugins', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'I-ONE supports most of the popular plugins. We have listed some of the most popular plugins with high ratings. ', 'i-excel' ) );
									printf( esc_html__( 'It is not neccssery to install and activate all the plugins recommendded. ', 'i-excel' ) );
									printf( esc_html__( 'You need the correct set of plugins suiteable for your job.', 'i-excel' ) );																		
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%sthemes.php?page=welcome-screen-about&tab=iexcel_plugins" target="_blank">Install Plugins</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';
									
									echo '<li>';
									echo '<h3>';
									printf( esc_html__( 'Activate Maintenance/Coming Soon  Mode', 'i-excel' ));
									echo '</h3>';
									printf( esc_html__( 'Maintenance mode for visitors. If you are logged in admin, use different browser to preview the maintenance mode.', 'i-excel' ) );
									printf( esc_html__( 'Logged in admins will view a normal site so that they can work on it.', 'i-excel' ) );									
									echo '<div class="nx-customizer-link">';
									printf( __( '<a href="%scustomize.php?autofocus[section]=mmode" target="_blank">Customizer Option</a>', 'i-excel' ), admin_url() );
									echo '</div>';								
									echo '</li>';																	
                            ?>                 
                        </ul>
        			</div>
                    <div>
                    	<h3 style="margin: 16px 0px 6px 0px;">
                        <a href="<?php echo $page_settings_url; ?>" class="nx-colorbox"><?php echo esc_attr__('Ideal Static Front Page Settings.', 'i-excel'); ?></a>
                        </h3>
                    	<h3 style="margin: 16px 0px 6px 0px;">
                        <a href="<?php echo $page_settings_url_2; ?>" class="nx-colorbox"><?php echo esc_attr__('Ideal Page Settings For Page Builders Using Full Width Layout.', 'i-excel'); ?></a>
                        </h3>
                        
                    </div>                    
				<?php		
					} elseif ( $active_tab == 'iexcel_ocdi' ) {
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <p style="font-weight: 600; color: #272727;">
                            <?php _e( 'Following plugins were used while creating the &quot;One Click Demo&quot;s. <br>Once you are done with installing and activating the plugins go to', 'i-excel' ); ?>
                            <a class="" href="<?php echo admin_url(); ?>themes.php?page=pt-one-click-demo-import">
                            <?php _e( 'I-Excel Demo Setup', 'i-excel' ); ?>
                            </a>                             
                        </p>                       
                        <ol>
							<?php
			
								foreach ($tx_plugins as $plugin) {
									
									$pluginLocation = rawurlencode($plugin['slug'].'/'.$plugin['pluginfile']);
									$pluginLink = iexcel_plugin_activation( $pluginLocation, $plugin['slug'], $plugin['pluginfile'] );
									$nonce_install = iexcel_plugin_install($plugin['slug']);
															
									if (!empty($plugin['ocdi']))
									{
										echo '<li><b>'.$plugin['title'].'</b><br />';
										echo $plugin['desc'].'<br />';
										$pluginTitle = $plugin['title'];
										if ( is_plugin_active( $plugin['slug'].'/'.$plugin['pluginfile'] ) ) {
											echo '<a href="#" class="button disabled">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
										} elseif( iexcel_is_plugin_installed($pluginTitle) == false )
										{
											echo '<a data-slug="' . $plugin['slug'] . '" data-active-lebel="' . __( 'Installing...', 'i-excel' ) . '" class="install-now button" href="' . esc_url( $nonce_install ) . '" data-name="' . $plugin['slug'] . '" aria-label="Install ' . $plugin['slug'] . '">' . __( 'Install and activate', 'i-excel' ) . '</a>';
										} else
										{
											echo '<a class="button activate-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '">Activate</a>';
										}
										echo '</li>';
									}
									
								}
                            ?>                    
                        </ol>
        			</div>                     
				<?php		
					} elseif ( $active_tab == 'iexcel_plugins' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <p style="font-weight: 600; color: #272727;">
                            <?php _e( 'I-EXCEL is based on core WordPress theme and is compatible with most of the popular plugins, Following are few plugins we like to use with I-EXCEL and placed at one place for convenience of I-EXCEL users.', 'i-excel' ); ?>
                        </p>    
                        <ol>
							<?php
			
								foreach ($tx_plugins as $plugin) {
									
									$pluginLocation = rawurlencode($plugin['slug'].'/'.$plugin['pluginfile']);
									$pluginLink = iexcel_plugin_activation( $pluginLocation, $plugin['slug'], $plugin['pluginfile'] );
									$nonce_install = iexcel_plugin_install($plugin['slug']);
															
									
									echo '<li><b>'.$plugin['name'].'</b><br />';
									echo $plugin['desc'].'<br />';
									echo _e( 'Plugin URL : ', 'i-excel' ).'<a href="'.$plugin['pluginurl'].'" target="_blank">'.$plugin['pluginurl'].'</a><br />';
									if(!empty($plugin['tutorial']))
									{
										echo _e( 'Tutorial : ', 'i-excel' ).'<a href="'.$plugin['tutorial'].'" target="_blank">'.$plugin['tutorial'].'</a><br />';   
									}
									
									$pluginTitle = $plugin['title'];
									if ( is_plugin_active( $plugin['slug'].'/'.$plugin['pluginfile'] ) ) {
										echo '<a href="#" class="button disabled">' . __( 'Plugin installed and active', 'i-excel' ) . '</a>';  
									} elseif( iexcel_is_plugin_installed($pluginTitle) == false )
									{
										echo '<a data-slug="' . $plugin['slug'] . '" data-active-lebel="' . __( 'Installing...', 'i-excel' ) . '" class="install-now button" href="' . esc_url( $nonce_install ) . '" data-name="' . $plugin['slug'] . '" aria-label="Install ' . $plugin['slug'] . '">' . __( 'Install and activate', 'i-excel' ) . '</a>';
									} else
									{
										echo '<a class="button activate-now button-primary" data-active-lebel="' . __( 'Activating...', 'i-excel' ) . '" data-slug="' . $plugin['slug'] . '" href="' . esc_url( $pluginLink ) . '" aria-label="Activate ' . $plugin['slug'] . '">Activate</a>';
									}
									
									echo '</li>';
									
								}
                            ?>                    
                        </ol>
        			</div>       
                        
				<?php	
					} elseif ( $active_tab == 'iexcel_faq' )
					{
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <?php
							foreach ($tx_faqs as $faq) {
								echo '<b>'._e( 'Q. ', 'i-excel' ).$faq['question'].'</b><br />';
								echo _e( 'A. ', 'i-excel' ).$faq['answeer'].'<br /><br />';									   
							}
                        ?>                    
                        
        			</div>      
                        
				<?php	
					} elseif ( $active_tab == 'iexcel_vid' ) {
				?>     
                	<div class="nx-tab-content"> 
                		<p>&nbsp;</p>
                        <ul class="vd-thumb">
							<li><a href="#media-popup" data-media="//www.youtube.com/embed/M_-HUs4EN-8?autoplay=1"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/theme-welcome/images/ocdi.png'); ?>" alt="" /></a></li>                                                
                        	<li><a href="#media-popup" data-media="//www.youtube.com/embed/J7mJSnuko_w?autoplay=1"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/theme-welcome/images/so-pb.png'); ?>" alt="" /></a></li>
                            <li><a href="#media-popup" data-media="//www.youtube.com/embed/sCStWRm6iUU?autoplay=1"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/theme-welcome/images/elementor.png'); ?>" alt="" /></a></li>
                            <li><a href="#media-popup" data-media="//www.youtube.com/embed/KFuO0Jg6Ps4?autoplay=1"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/theme-welcome/images/brizy-n-ss3.png'); ?>" alt="" /></a></li>
                        </ul>    
                            
                        <div class="popup" id="media-popup">
                        	<div class="nx-videowrapper">
                            	<iframe width="560" height="315" src="" frameborder="0" autoplay="1" allowfullscreen></iframe>
                                <div class="clvideo"><a href="#"><?php esc_attr_e('Close Video', 'i-excel'); ?></a></div>
                            </div>
                        </div>                       
						<div class="tx-wspace-12"></div>
        			</div>      
                        
				<?php	
					}
				?>
  
                <div class="tx-wspace-24"></div>
                <div class="tx-wspace-24"></div>
                <div class="tx-wspace-24"></div>                 
                <div class="nx-admin-row">
                	<div class="one-four-col">
                    	<a href="<?php echo $videoguide; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-video-alt2"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Documentations', 'i-excel' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $supportforum; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-format-chat"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Support Forum', 'i-excel' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $toolkit; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-migrate"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'TemplatesNext Toolkit', 'i-excel' ); ?></h3>
                        </a>
                    </div>
                	<div class="one-four-col">
                    	<a href="<?php echo $fb_page; ?>" target="_blank">
                            <div class="nx-dash"><span class="dashicons dashicons-facebook-alt"></span></div>
                            <h3 class="tx-admin-link"><?php _e( 'Community', 'i-excel' ); ?></h3>
                        </a>
                    </div>                                                            
                </div>                
 	
            </div>

                <div id="dashboard_right_now" class="postbox" style="display: block; float: right; width: 33%; max-width: 320px; margin: 16px;">
                    <h2 class="hndle nxw-title" style="padding: 12px 24px;"><span><?php echo $review_pop['title']; ?></span></h2>
                    <div class="inside">
                        <div class="main" style="padding: 24px;">
							<?php echo $review_pop['desc']; ?>
                    		<a class="button button-primary button-hero" target="_blank" href="<?php echo $reviewURL; ?>">
                            	<?php echo $review_pop['link']; ?>
                            </a> 
                            <?php echo $review_pop['conclusion']; ?>
                        </div>
                    </div>
                </div>   

            <div class="tx-wspace"></div>
        
            
            
        </div>
        
  	</div>
  
  	<?php
}

add_action( 'admin_head', 'welcome_screen_remove_menus' );
function welcome_screen_remove_menus() {
    remove_submenu_page( 'index.php', 'welcome-screen-about' );
}


// Add Stylesheet
add_action( 'admin_enqueue_scripts', 'iexcel_welcome_scripts' );
function iexcel_welcome_scripts() {
	wp_enqueue_style( 'nx-welcome-style', get_template_directory_uri() . '/inc/theme-welcome/css/nx-welcome.css', array(), '1.01' );
	wp_enqueue_script( 'nx-welcome-script', get_template_directory_uri() . '/inc/theme-welcome/js/nx-welcome.js' );

	$activation_button = iexcel_customizer_activate_notice();
	wp_localize_script('nx-welcome-script', 'recomended_notice', $activation_button);
}
