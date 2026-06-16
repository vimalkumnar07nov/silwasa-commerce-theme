<?php

/**
 * Theme Functions
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/theme-setup.php';

require_once get_template_directory() . '/inc/enqueue.php';

require_once get_template_directory() . '/inc/menus.php';

require_once get_template_directory() . '/inc/ajax.php';

require_once get_template_directory() . '/inc/helpers.php';

require_once get_template_directory() . '/inc/woocommerce.php';

require_once get_template_directory() . '/inc/customizer.php';