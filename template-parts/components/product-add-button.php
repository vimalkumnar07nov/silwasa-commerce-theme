<?php
/**
 * Product Add Button
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

echo apply_filters(

	'woocommerce_loop_add_to_cart_link',

	sprintf(

		'<a href="%s"
		data-quantity="1"
		class="add_to_cart_button ajax_add_to_cart inline-flex items-center justify-center rounded-full bg-green-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-green-700">%s</a>',

		esc_url(
			$product->add_to_cart_url()
		),

		esc_html__( '+ Add', 'silwasa-commerce-theme' )

	),

	$product

);