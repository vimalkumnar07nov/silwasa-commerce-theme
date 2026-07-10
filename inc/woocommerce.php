<?php
/**
 * WooCommerce Functions
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Remove Default WooCommerce Styles
|--------------------------------------------------------------------------
*/

add_filter(
	'woocommerce_enqueue_styles',
	'__return_empty_array'
);

/*
|--------------------------------------------------------------------------
| Products Per Page
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_products_per_page' ) ) {

	function swc_products_per_page() {
		return 20;
	}

}

add_filter(
	'loop_shop_per_page',
	'swc_products_per_page',
	20
);

/*
|--------------------------------------------------------------------------
| Change Related Products Count
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_related_products_args' ) ) {

	function swc_related_products_args( $args ) {

		$args['posts_per_page'] = 4;
		$args['columns'] = 4;

		return $args;

	}

}

add_filter(
	'woocommerce_output_related_products_args',
	'swc_related_products_args'
);

/*
|--------------------------------------------------------------------------
| Remove Default Shop Elements
|--------------------------------------------------------------------------
*/

remove_action(
	'woocommerce_before_shop_loop_item_title',
	'woocommerce_show_product_loop_sale_flash',
	10
);

remove_action(
	'woocommerce_after_shop_loop_item_title',
	'woocommerce_template_loop_rating',
	5
);

/*
|--------------------------------------------------------------------------
| Custom Image Size
|--------------------------------------------------------------------------
*/

add_image_size(
	'swc-product',
	600,
	600,
	true
);

add_image_size(
    'swc-category',
    400,
    400,
    true
);

add_image_size(
    'swc-search',
    150,
    150,
    true
);

add_image_size(
    'swc-brand',
    180,
    180,
    false
);

add_image_size(
    'swc-mini-cart',
    120,
    120,
    true
);

/*
|--------------------------------------------------------------------------
| Product Placeholder
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_product_image' ) ) {

	function swc_product_image() {

		global $product;

		if ( ! $product ) {
			return;
		}

		if ( has_post_thumbnail() ) {

			echo get_the_post_thumbnail(
				get_the_ID(),
				'swc-product',
				array(
					'class' => 'w-full h-full object-cover transition duration-300 group-hover:scale-105',
					'loading' => 'lazy',
				)
			);

		} else {

			echo wc_placeholder_img(
				'swc-product'
			);

		}

	}

}

/*
|--------------------------------------------------------------------------
| Discount Percentage
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_discount_percentage' ) ) {

	function swc_discount_percentage() {

		global $product;

		if (
			$product &&
			$product->is_on_sale()
		) {

			$regular = (float) $product->get_regular_price();

			$sale = (float) $product->get_sale_price();

			if ( $regular > 0 ) {

				$percentage = round(
					( ( $regular - $sale ) / $regular ) * 100
				);

				echo '<span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">';

				echo '-' . esc_html( $percentage ) . '%';

				echo '</span>';

			}

		}

	}

}

/*
|--------------------------------------------------------------------------
| Product Unit
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_product_unit' ) ) {

	function swc_product_unit() {

		global $product;

		if ( ! $product ) {
			return;
		}

		$unit = get_post_meta(
			$product->get_id(),
			'_product_unit',
			true
		);

		if ( empty( $unit ) ) {
			$unit = '1 Pack';
		}

		echo '<div class="text-sm text-slate-500 mt-1">';

		echo esc_html( $unit );

		echo '</div>';

	}

}

/*
|--------------------------------------------------------------------------
| Add Body Class
|--------------------------------------------------------------------------
*/

add_filter(

	'body_class',

	function ( $classes ) {

		$classes[] = 'swc-theme';

		return $classes;

	}

);

/*
|--------------------------------------------------------------------------
| Cart Count Helper
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_cart_count' ) ) {

	function swc_cart_count() {

		if ( ! function_exists( 'WC' ) ) {
			return 0;
		}

		if ( ! WC()->cart ) {
			return 0;
		}

		return WC()->cart->get_cart_contents_count();

	}

}

/*
|--------------------------------------------------------------------------
| Cart Total Helper
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'swc_cart_total' ) ) {

	function swc_cart_total() {

		if ( ! function_exists( 'WC' ) ) {
			return '';
		}

		if ( ! WC()->cart ) {
			return '';
		}

		return WC()->cart->get_cart_total();

	}

}

// Brands Taxonomy
add_action('init', function () {

	register_taxonomy(

		'product_brand',

		'product',

		array(

			'label' => 'Brands',

			'public' => true,

			'hierarchical' => true,

			'show_admin_column' => true,

			'rewrite' => array(

				'slug' => 'brand',

			),

			'show_in_rest' => true,

		)

	);

});
