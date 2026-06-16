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