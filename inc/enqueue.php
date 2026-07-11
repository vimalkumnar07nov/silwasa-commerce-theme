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

		wp_enqueue_script(

			'swc-carousel',

			get_template_directory_uri() . '/assets/js/carousel.js',

			array(

				'swc-main',

			),

			$version,

			true

		);

		wp_enqueue_script(

			'swc-flash-sale',

			get_template_directory_uri() . '/assets/js/flash-sale.js',

			array( 'swc-main' ),

			$version,

			true

		);

	}

	wp_enqueue_script(

		'swc-add-to-cart',

		get_template_directory_uri() . '/assets/js/add-to-cart.js',

		array('swc-main'),

		$version,

		true

	);

	if (is_product()) {

		wp_enqueue_script(
			'swc-single-product-tabs',
			get_template_directory_uri() . '/assets/js/single-product-tabs.js',
			array('swc-main'),
			$version,
			true
		);

		wp_enqueue_script(

			'swc-single-product',

			get_template_directory_uri() . '/assets/js/single-product.js',

			array('swc-main'),

			$version,

			true

		);
		
	}

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

	// Defer loading of scripts to the footer

	$scripts = array(
		'swc-main',
		'swc-header',
		'swc-mobile-menu',
		'swc-search',
		'swc-cart',
		'swc-shop',
		'swc-slider',
		'swc-single-product',
		'swc-single-product-tabs',
	);

	foreach ( $scripts as $script ) {

		if ( wp_script_is( $script, 'enqueued' ) ) {

			wp_script_add_data(
				$script,
				'defer',
				true
			);

		}

	}

}

add_action(

	'wp_enqueue_scripts',

	'swc_enqueue_assets'

);