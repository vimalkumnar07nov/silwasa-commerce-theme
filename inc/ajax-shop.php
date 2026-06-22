<?php
/**
 * Premium AJAX Shop
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| AJAX Actions
|--------------------------------------------------------------------------
*/

add_action(
	'wp_ajax_swc_ajax_shop',
	'swc_ajax_shop'
);

add_action(
	'wp_ajax_nopriv_swc_ajax_shop',
	'swc_ajax_shop'
);

/*
|--------------------------------------------------------------------------
| AJAX Shop
|--------------------------------------------------------------------------
*/

if (!function_exists('swc_ajax_shop')) {

    function swc_ajax_shop()
    {

        /*
        |--------------------------------------------------------------------------
        | Security
        |--------------------------------------------------------------------------
        */

        check_ajax_referer(
            'swc_nonce',
            'nonce'
        );

        /*
        |--------------------------------------------------------------------------
        | Request
        |--------------------------------------------------------------------------
        */

        $page = isset($_POST['page'])
            ? absint($_POST['page'])
            : 1;

        $price = isset($_POST['price'])
            ? floatval($_POST['price'])
            : 999999;

        $stock = !empty($_POST['stock']);

        $sale = !empty($_POST['sale']);

        $sort = isset($_POST['sort'])
            ? sanitize_text_field($_POST['sort'])
            : 'menu_order';

        $categories = array();

        if (!empty($_POST['categories'])) {

            $categories = json_decode(

                wp_unslash(
                    $_POST['categories']
                ),

                true

            );

            if (!is_array($categories)) {

                $categories = array();

            }

        }

        $brands = array();

        if (!empty($_POST['brands'])) {

            $brands = json_decode(

                wp_unslash(
                    $_POST['brands']
                ),

                true

            );

            if (!is_array($brands)) {

                $brands = array();

            }

        }

        /*
        |--------------------------------------------------------------------------
        | Query Args
        |--------------------------------------------------------------------------
        */

        $args = array(

            'post_type' => 'product',

            'post_status' => 'publish',

            'paged' => $page,

            'posts_per_page' => 20,

            'meta_query' => array(),

            'tax_query' => array(),

        );

        /*
        |--------------------------------------------------------------------------
        | Product Category
        |--------------------------------------------------------------------------
        */

        if (!empty($categories)) {

            $args['tax_query'][] = array(

                'taxonomy' => 'product_cat',

                'field' => 'slug',

                'terms' => array_map(

                    'sanitize_text_field',

                    $categories

                ),

            );

        }

        /*
        |--------------------------------------------------------------------------
        | Product Brand
        |--------------------------------------------------------------------------
        */

        if (!empty($brands)) {

            $args['tax_query'][] = array(

                'taxonomy' => 'product_brand',

                'field' => 'slug',

                'terms' => array_map(

                    'sanitize_text_field',

                    $brands

                ),

            );

        }

        /*
        |--------------------------------------------------------------------------
        | Price Filter
        |--------------------------------------------------------------------------
        */

        $args['meta_query'][] = array(

            'key' => '_price',

            'value' => $price,

            'compare' => '<=',

            'type' => 'NUMERIC',

        );

        /*
        |--------------------------------------------------------------------------
        | Stock Filter
        |--------------------------------------------------------------------------
        */

        if ($stock) {

            $args['meta_query'][] = array(

                'key' => '_stock_status',

                'value' => 'instock',

            );

        }

        /*
        |--------------------------------------------------------------------------
        | Sale Filter
        |--------------------------------------------------------------------------
        */

        if ($sale) {

            $product_ids = wc_get_product_ids_on_sale();

            $product_ids[] = 0;

            $args['post__in'] = $product_ids;

        }

        /*
        |--------------------------------------------------------------------------
        | Meta Relation
        |--------------------------------------------------------------------------
        */

        if (count($args['meta_query']) > 1) {

            $args['meta_query']['relation'] = 'AND';

        }

        /*
        |--------------------------------------------------------------------------
        | Tax Relation
        |--------------------------------------------------------------------------
        */

        if (count($args['tax_query']) > 1) {

            $args['tax_query']['relation'] = 'AND';

        }

        		/*
		|--------------------------------------------------------------------------
		| Sorting
		|--------------------------------------------------------------------------
		*/

		switch ( $sort ) {

			case 'popularity':

				$args['meta_key'] = 'total_sales';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'DESC';

				break;

			case 'rating':

				$args['meta_key'] = '_wc_average_rating';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'DESC';

				break;

			case 'date':

				$args['orderby'] = 'date';
				$args['order']   = 'DESC';

				break;

			case 'price':

				$args['meta_key'] = '_price';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'ASC';

				break;

			case 'price-desc':

				$args['meta_key'] = '_price';
				$args['orderby']  = 'meta_value_num';
				$args['order']    = 'DESC';

				break;

			default:

				$args['orderby'] = array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				);

		}

		/*
		|--------------------------------------------------------------------------
		| Product Query
		|--------------------------------------------------------------------------
		*/

		$query = new WP_Query( $args );

		ob_start();

		if ( $query->have_posts() ) {

			while ( $query->have_posts() ) {

				$query->the_post();

				wc_get_template_part(
					'content',
					'product'
				);

			}

		}

		$html = ob_get_clean();

		wp_reset_postdata();

		/*
		|--------------------------------------------------------------------------
		| Empty State
		|--------------------------------------------------------------------------
		*/

		if ( empty( $html ) ) {

			wp_send_json_success(

				array(

					'products' => '',

					'total' => 0,

					'max_pages' => 0,

				)

			);

		}

		/*
		|--------------------------------------------------------------------------
		| Success Response
		|--------------------------------------------------------------------------
		*/

		wp_send_json_success(

			array(

				'products' => $html,

				'total' => intval(
					$query->found_posts
				),

				'current_page' => intval(
					$page
				),

				'max_pages' => intval(
					$query->max_num_pages
				),

			)

		);

		/*
		|--------------------------------------------------------------------------
		| Error Response
		|--------------------------------------------------------------------------
		*/

		wp_send_json_error(

			array(

				'message' => 'Unable to load products.'

			)

		);
        

	}

    /*
    |--------------------------------------------------------------------------
    | Performance
    |--------------------------------------------------------------------------
    */

    if ( ! isset( $args['no_found_rows'] ) ) {

        $args['no_found_rows'] = false;

    }

    $args['update_post_meta_cache'] = false;

    $args['update_post_term_cache'] = false;

    $args['ignore_sticky_posts'] = true;

    $args['cache_results'] = true;

    /*
    |--------------------------------------------------------------------------
    | Security Helpers
    |--------------------------------------------------------------------------
    */

    array_walk_recursive(

        $args,

        function ( &$value ) {

            if ( is_string( $value ) ) {

                $value = sanitize_text_field( $value );

            }

        }

    );

    /*
    |--------------------------------------------------------------------------
    | Future WooCommerce Compatibility
    |--------------------------------------------------------------------------
    */

    if ( function_exists( 'wc_set_loop_prop' ) ) {

        wc_set_loop_prop(
            'columns',
            4
        );

    }

    /*
    |--------------------------------------------------------------------------
    | Headers
    |--------------------------------------------------------------------------
    */

    nocache_headers();

    header(
        'Content-Type: application/json; charset=' .
        get_option( 'blog_charset' )
    );

    /*
    |--------------------------------------------------------------------------
    | Hook
    |--------------------------------------------------------------------------
    */

    do_action(
        'swc_ajax_shop_loaded',
        $args
    );

}
