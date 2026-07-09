<?php
/**
 * Enqueue Assets
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function swc_enqueue_assets() {

	$theme = wp_get_theme();

	$version = $theme->get( 'Version' );

	/*
	|--------------------------------------------------------------------------
	| CSS
	|--------------------------------------------------------------------------
	*/

	wp_enqueue_style(

		'swc-app',

		get_template_directory_uri() . '/assets/css/app.css',

		array(),

		$version

	);

	/*
	|--------------------------------------------------------------------------
	| JavaScript
	|--------------------------------------------------------------------------
	*/

	wp_enqueue_script(

		'swc-main',

		get_template_directory_uri() . '/assets/js/main.js',

		array(),

		$version,

		true

	);

	wp_enqueue_script(

		'swc-header',

		get_template_directory_uri() . '/assets/js/header.js',

		array(

			'swc-main',

		),

		$version,

		true

	);

	wp_enqueue_script(

		'swc-mobile-menu',

		get_template_directory_uri() . '/assets/js/mobile-menu.js',

		array(

			'swc-main',

		),

		$version,

		true

	);

	wp_enqueue_script(

		'swc-search',

		get_template_directory_uri() . '/assets/js/search.js',

		array(

			'swc-main',

		),

		$version,

		true

	);

	wp_enqueue_script(

		'swc-cart',

		get_template_directory_uri() . '/assets/js/cart.js',

		array(

			'swc-main',

		),

		$version,

		true

	);

	if (

		is_shop()

		||

		is_product_taxonomy()

		||

		is_product_category()

		||

		is_product_tag()

	) {

		wp_enqueue_script(

			'swc-shop',

			get_template_directory_uri() . '/assets/js/shop.js',

			array(

				'swc-main',

			),

			$version,

			true

		);

	}

	if ( is_front_page() ) {

		wp_enqueue_script(

			'swc-slider',

			get_template_directory_uri() . '/assets/js/slider.js',

			array(

				'swc-main',

			),

			$version,

			true

		);

	}

	wp_enqueue_script(

		'swc-single-product',

		get_template_directory_uri() . '/assets/js/single-product.js',

		array(),

		$version,

		true

	);

	wp_enqueue_script(
		'swc-single-product-tabs',
		get_template_directory_uri() . '/assets/js/single-product-tabs.js',
		array(),
		$version,
		true
	);

	/*
	|--------------------------------------------------------------------------
	| AJAX
	|--------------------------------------------------------------------------
	*/

	$localize = array(

		'ajax_url' => admin_url('admin-ajax.php'),

		'ajaxurl'  => admin_url('admin-ajax.php'),

		'nonce' => wp_create_nonce('swc_nonce'),

		'cart_url' => wc_get_cart_url(),

		'checkout_url' => wc_get_checkout_url(),

		'shop_url' => wc_get_page_permalink(

			'shop'

		),

	);

	wp_localize_script(

		'swc-main',

		'swc_ajax',

		$localize

	);
	wp_localize_script(
		'swc-main',
		'swc',
		$localize
	);

}

add_action(

	'wp_enqueue_scripts',

	'swc_enqueue_assets'

);