<?php

$product_search = 0;
$product_search = get_theme_mod('product_search', 0);

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo __( 'Search for:', 'i-excel' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo __( 'Search...', 'i-excel' ) ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s" title="<?php echo __( 'Search for:', 'i-excel' ) ?>" />
	</label>
    <?php if( $product_search == 1 ) { ?>
    <?php echo '<input type="hidden" value="product" name="post_type" id="post_type" />'; ?>
    <?php } ?>
	
    <input type="submit" class="search-submit" value="<?php echo __( 'Search', 'i-excel' ) ?>" />
</form>