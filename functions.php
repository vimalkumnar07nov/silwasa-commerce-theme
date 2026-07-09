<?php
/**
 * Silwasa Commerce Theme
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Theme Core
|--------------------------------------------------------------------------
*/

require_once get_template_directory() . '/inc/theme-setup.php';

require_once get_template_directory() . '/inc/enqueue.php';

require_once get_template_directory() . '/inc/menus.php';

/*
|--------------------------------------------------------------------------
| WooCommerce
|--------------------------------------------------------------------------
*/

require_once get_template_directory() . '/inc/woocommerce.php';

require_once get_template_directory() . '/inc/my-account.php';

/*
|--------------------------------------------------------------------------
| AJAX
|--------------------------------------------------------------------------
*/

require_once get_template_directory() . '/inc/ajax.php';

require_once get_template_directory() . '/inc/ajax-shop.php';

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
*/

if ( file_exists( get_template_directory() . '/inc/helpers.php' ) ) {

	require_once get_template_directory() . '/inc/helpers.php';

}

/*
|--------------------------------------------------------------------------
| Template Tags
|--------------------------------------------------------------------------
*/

if ( file_exists( get_template_directory() . '/inc/template-tags.php' ) ) {

	require_once get_template_directory() . '/inc/template-tags.php';

}

/*
|--------------------------------------------------------------------------
| Customizer
|--------------------------------------------------------------------------
*/

if ( file_exists( get_template_directory() . '/inc/customizer.php' ) ) {

	require_once get_template_directory() . '/inc/customizer.php';

}

// require_once get_template_directory() . '/inc/theme-setup.php';

// require_once get_template_directory() . '/inc/enqueue.php';

// require_once get_template_directory() . '/inc/menus.php';

// require_once get_template_directory() . '/inc/ajax.php';

// require_once get_template_directory() . '/inc/helpers.php';

// require_once get_template_directory() . '/inc/woocommerce.php';

// require_once get_template_directory() . '/inc/customizer.php';

// require_once get_template_directory() . '/inc/ajax.php';