<?php
/**
 * AJAX Functions
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Product AJAX Search
|--------------------------------------------------------------------------
*/

function swc_ajax_product_search() {

	check_ajax_referer( 'swc_nonce', 'nonce' );

	$keyword = '';

	if ( isset( $_POST['keyword'] ) ) {

		$keyword = sanitize_text_field(
			wp_unslash( $_POST['keyword'] )
		);

	}

	if ( strlen( $keyword ) < 2 ) {

		wp_send_json_success(
			array(
				'html' => '',
			)
		);

	}

	$args = array(

		'post_type' => 'product',

		'post_status' => 'publish',

		'posts_per_page' => 8,

		's' => $keyword,

		'orderby' => 'menu_order title',

		'order' => 'ASC',

	);

	$query = new WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) {

			$query->the_post();

			global $product;

			get_template_part(
				'template-parts/components/search-product'
			);

		}

	} else {

		?>

		<div class="col-span-full py-16 text-center">

			<div class="text-6xl">

				🔍

			</div>

			<h3 class="mt-5 text-3xl font-black">

				No Products Found

			</h3>

			<p class="mt-3 text-slate-500">

				Try another keyword.

			</p>

		</div>

		<?php

	}

	wp_reset_postdata();

	$html = ob_get_clean();

	wp_send_json_success(

		array(

			'html' => $html,

		)

	);

}

add_action(

	'wp_ajax_swc_ajax_product_search',

	'swc_ajax_product_search'

);

add_action(

	'wp_ajax_nopriv_swc_ajax_product_search',

	'swc_ajax_product_search'

);


/*
|--------------------------------------------------------------------------
| Update Cart Quantity
|--------------------------------------------------------------------------
*/

function swc_ajax_update_cart_quantity() {

	check_ajax_referer( 'swc_nonce', 'nonce' );

	if ( empty( $_POST['cart_key'] ) ) {

		wp_send_json_error();

	}

	$cart_key = sanitize_text_field( wp_unslash( $_POST['cart_key'] ) );

	$quantity = absint( $_POST['quantity'] );

	if ( $quantity < 1 ) {

		WC()->cart->remove_cart_item( $cart_key );

	} else {

		WC()->cart->set_quantity(
			$cart_key,
			$quantity,
			true
		);

	}

	WC()->cart->calculate_totals();

	ob_start();

	get_template_part(
		'template-parts/components/mini-cart'
	);

	$mini_cart = ob_get_clean();

	wp_send_json_success(

		array(

			'count' => WC()->cart->get_cart_contents_count(),

			'total' => WC()->cart->get_cart_total(),

			'mini_cart' => $mini_cart,

		)

	);

}

add_action(
	'wp_ajax_swc_update_cart_quantity',
	'swc_ajax_update_cart_quantity'
);

add_action(
	'wp_ajax_nopriv_swc_update_cart_quantity',
	'swc_ajax_update_cart_quantity'
);

/*
|--------------------------------------------------------------------------
| Remove Cart Item
|--------------------------------------------------------------------------
*/

function swc_ajax_remove_cart_item() {

	check_ajax_referer( 'swc_nonce', 'nonce' );

	if ( empty( $_POST['cart_key'] ) ) {

		wp_send_json_error();

	}

	$cart_key = sanitize_text_field(

		wp_unslash(

			$_POST['cart_key']

		)

	);

	WC()->cart->remove_cart_item(

		$cart_key

	);

	WC()->cart->calculate_totals();

	ob_start();

	get_template_part(

		'template-parts/components/mini-cart'

	);

	$mini_cart = ob_get_clean();

	wp_send_json_success(

		array(

			'count' => WC()->cart->get_cart_contents_count(),

			'total' => WC()->cart->get_cart_total(),

			'mini_cart' => $mini_cart,

		)

	);

}

add_action(

	'wp_ajax_swc_remove_cart_item',

	'swc_ajax_remove_cart_item'

);

add_action(

	'wp_ajax_nopriv_swc_remove_cart_item',

	'swc_ajax_remove_cart_item'

);

/*
|--------------------------------------------------------------------------
| Refresh Mini Cart
|--------------------------------------------------------------------------
*/

function swc_ajax_refresh_mini_cart() {

	ob_start();

	get_template_part(

		'template-parts/components/mini-cart'

	);

	$mini_cart = ob_get_clean();

	wp_send_json_success(

		array(

			'count' => WC()->cart->get_cart_contents_count(),

			'total' => WC()->cart->get_cart_total(),

			'mini_cart' => $mini_cart,

		)

	);

}

add_action(

	'wp_ajax_swc_refresh_mini_cart',

	'swc_ajax_refresh_mini_cart'

);

add_action(

	'wp_ajax_nopriv_swc_refresh_mini_cart',

	'swc_ajax_refresh_mini_cart'

);