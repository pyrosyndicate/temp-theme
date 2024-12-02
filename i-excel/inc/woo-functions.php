<?php
	/*
	*
	*	nx woocommerce Functions
	*	------------------------------------------------
	*	nx Framework v 1.0
	*
	*	nx_woo_bar()
	*
	*/
	
	
// Display 12 products per page.
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );


/**
* Change number of related products on product page
* Set your own value for 'posts_per_page'
*
*/

add_filter( 'woocommerce_output_related_products_args', 'iexcel_related_products_args' );
function iexcel_related_products_args( $args ) {
	
	global  $iexcel_data;
		
	$woo_columns = 4;
		
	if ( !empty($iexcel_data['woo-archive-columns']) )
	{
		$woo_columns = $iexcel_data['woo-archive-columns'];
	}
			
	$args['posts_per_page'] = $woo_columns;
	$args['posts_per_page'] = 4;	 
	$args['columns'] = $woo_columns; 
	return $args;
}


/* TOP BAR Shopping Cart
================================================== */
if (!function_exists('iexcel_top_cart')) {
	function iexcel_top_cart() {
				
		global $woocommerce;
		$nx_top_cart = '';
			
		$nx_top_cart .= '<div class="cartdrop widget_shopping_cart nx-animate">';
		$nx_top_cart .= '<div class="widget_shopping_cart_content">';
		$nx_top_cart .= '<ul class="cart_list product_list_widget">';
		//$nx_top_cart .= do_shortcode('[woocommerce_cart]');
		$nx_top_cart .= '</ul>';
		$nx_top_cart .= '</div>';
		$nx_top_cart .= '</div>';
			
		return $nx_top_cart;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Adding login logout menu item */
/*-----------------------------------------------------------------------------------*/
 
add_filter( 'wp_nav_menu_items', 'iexcel_add_loginout_link', 10, 2 );
function iexcel_add_loginout_link( $items, $args ) {
		
	//$hide_login = of_get_option('hide_login');
	$show_login = get_theme_mod('show_login', 0);
		
	if( $show_login == 1 ){	
		if (is_user_logged_in() && $args->theme_location == 'primary') {
			$items .= '<li class="menu-item nx-mega-menu"><a href="'. wp_logout_url() .'">' . __( 'Log Out', 'i-excel' ) . ' </a></li>';
		}
		elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
			$items .= '<li class="menu-item nx-mega-menu"><a href="'. site_url('wp-login.php') .'">' . __( 'Log In', 'i-excel' ) . ' </a></li>';
		}
	}
	return $items;

}

// archive remove title
//add_filter( 'woocommerce_show_page_title', function() { return false; } );
//add_filter('woocommerce_show_page_title',false);

add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );

/**
 * woo_hide_page_title
 *
*/
function woo_hide_page_title() {
	return false;
}



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
// add_filter('add_to_cart_fragments', 'iexcel_header_add_to_cart_fragment');
add_filter('woocommerce_add_to_cart_fragments', 'iexcel_header_add_to_cart_fragment');

function iexcel_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<span class="cart-counts"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
	<?php
	
	$fragments['.cart-counts'] = ob_get_clean();
	
	return $fragments;
	
}