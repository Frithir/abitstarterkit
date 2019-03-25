<?php
// General Woo stuff
add_theme_support( 'woocommerce' );
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'dequeue_styles' );
function dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
// breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action( 'woo_custom_breadcrumb', 'woocommerce_breadcrumb', 20 );

// sorting
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woo_custom_catalog_ordering', 'woocommerce_catalog_ordering', 30 );
add_action( 'woo_custom_result_count', 'woocommerce_result_count', 40 );

// woo pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woo_custom_pagination', 'woocommerce_pagination', 10 );

// single - remove_action
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
// rating
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );


add_action( 'woocommerce_single_product_summary', 'made_with_custom_action', 25 );
function made_with_custom_action() {
	echo '<div class="made-with"></div>';
}

// related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'custom_related_products', 'woocommerce_output_related_products', 20 );

// remove cross sells from cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// remove tabs
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// change text
// function my_text_strings( $translated_text, $text, $domain ) {
// 	switch ( $translated_text ) {
// 		case 'Related products' :
// 		$translated_text = __( 'You may also love', 'woocommerce' );
// 		break;
// 	}
// 	return $translated_text;
// }
// add_filter( 'gettext', 'my_text_strings', 20, 3 );

// exclude gift voucher category
// function custom_pre_get_posts_query( $q ) {
// 	if (is_admin() && !$q->is_main_query()) { return $q; }
// 	$tax_query = (array) $q->get( 'tax_query' );
// 	$tax_query[] = array(
// 		'taxonomy' => 'product_cat',
// 		'field' => 'slug',
// 		'terms' => array( 'gift-voucher' ), // Don't display products in the clothing category on the shop page.
// 		'operator' => 'NOT IN'
// 	);
// 	$q->set( 'tax_query', $tax_query );
// }
// add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );


// // add geo country code to body
// function use_geolocated_user_country($classes){
// 	// Geolocation must be enabled @ Woo Settings
// 	$location = WC_Geolocation::geolocate_ip();
// 	$country = $location['country'];
// 	$classes[] = $country;
// 	return $classes;
// }
// add_filter( 'body_class', 'use_geolocated_user_country' );


function get_parent_terms($term) {
	if ($term->parent > 0){
		$term = get_term_by("id", $term->parent, "product_cat");
		return get_parent_terms($term);
	}else{
		return $term->term_id;
	}
}


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['description'] ); // Remove the description tab
	//unset( $tabs['reviews'] ); // Remove the reviews tab
	//unset( $tabs['additional_information'] ); // Remove the additional information tab
	return $tabs;
}

// Adds the new tab
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	if ( $ingredients = get_field( 'ingredients' ) ) {
		$tabs['test_tab'] = array(
			'title' 	=> __( 'Ingredients', 'woocommerce' ),
			'priority' 	=> 20,
			'callback' 	=> 'woo_new_product_tab_content'
		);
		return $tabs;
	}
}
// The new tab content
function woo_new_product_tab_content() {
	if ( $ingredients = get_field( 'ingredients' ) ) {
		echo $ingredients;
	}
}
// Adds the new tab
add_filter( 'woocommerce_product_tabs', 'woo_video_product_tab' );
function woo_video_product_tab( $tabs ) {
	$tabs['des_tab'] = array(
		'title' 	=> __( 'Details', 'woocommerce' ),
		'priority' 	=> 10,
		'callback' 	=> 'woo_video_product_tab_content'
	);
	return $tabs;
}
// The new tab content
function woo_video_product_tab_content() {
	global $product;
	$product_details = $product->get_data();
	$product_full_description = $product_details['description'];
	echo apply_filters('the_content', $product_full_description);
	/*if ( $video = get_field( 'video_embed_code' ) ) {
		$aspect = ( get_field( 'aspect_ratio' ) == 'wide' ) ? " widescreen" : "";
		echo "<div class='flex'>";
		echo "<div class='one-half'>" . apply_filters('the_content', $product_full_description) . "</div>";
		echo "<div class='one-half flex-video $aspect'>" . $video . "</div>";
		echo "</div>";
	} else {
		echo "<div class='two-thirds'>" . apply_filters('the_content', $product_full_description) . "</div>";
	}*/
}

add_filter( 'woocommerce_product_review_list_args', 'newest_reviews_first' );
function newest_reviews_first($args) {
	$args['reverse_top_level'] = true;
	return $args;
}

// Change "Default Sorting" to "Our sorting" on shop page and in WC Product Settings
function change_default_sorting_name( $catalog_orderby ) {
	$catalog_orderby = str_replace("Default sorting", "Sort by", $catalog_orderby);
	return $catalog_orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'change_default_sorting_name' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'change_default_sorting_name' );


function patricks_woocommerce_catalog_orderby( $orderby ) {
	unset($orderby["popularity"]);
	unset($orderby["rating"]);
	unset($orderby["date"]);
	return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "patricks_woocommerce_catalog_orderby", 20 );


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	if ( ! is_admin() ) {
		ob_start();

		get_template_part( 'parts/cart', 'summary' );

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/*
* Get user's role
*
* If $user parameter is not provided, returns the current user's role.
* Only returns the user's first role, even if they have more than one.
* Returns false on failure.
*
* @param  mixed       $user User ID or object.
* @return string|bool       The User's role, or false on failure.
*/
function my_get_user_role( $user = null ) {
	$user = $user ? new WP_User( $user ) : wp_get_current_user();

	return $user->roles ? $user->roles[0] : false;
}

/**
* Force minimum subtotal and items to checkout
**/
function woocommerce_button_proceed_to_checkout() {
	$minimum_subtotal = get_field( 'minimum_subtotal', 'options' );
	$maximum_items    = get_field( 'maximum_items', 'options' );
	if ( my_get_user_role() == 'wholesale_customer' ) {
		$maximum_items = 500000;
	}

	if ( WC()->cart->total >= $minimum_subtotal && WC()->cart->get_cart_contents_count() <= $maximum_items ) {
		$checkout_url = WC()->cart->get_checkout_url();
		?>
		<a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e( 'Proceed to checkout', 'woocommerce' ); ?></a>
		<?php
	} else {
		if ( WC()->cart->total < $minimum_subtotal ) {
			wc_print_notice(
				sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.',
				wc_price( $minimum_subtotal ),
				wc_price( WC()->cart->total )
			), 'error'
		);
	}
	if ( WC()->cart->get_cart_contents_count() > $maximum_items ) {
		wc_print_notice(
			sprintf( 'There is a limit of %s items per order, you currently have %s item%s in your cart. Please remove some items.',
			$maximum_items,
			WC()->cart->get_cart_contents_count(),
			( WC()->cart->get_cart_contents_count() == 1 ) ? "" : "s"
		), 'error'
	);
}
}

}

/**
* Hide shipping rates when free shipping is available.
* Updated to support WooCommerce 2.6 Shipping Zones.
*/
function hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 100 );


add_action( 'wp', 'thrive_wc_change_hooks' );
function thrive_wc_change_hooks() {
  //remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20 );
  remove_action( 'woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30 );
}
