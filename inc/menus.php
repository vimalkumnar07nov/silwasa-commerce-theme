<?php
/**
 * Register Theme Menus
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'swc_register_menus' ) ) {

	function swc_register_menus() {

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'silwasa-commerce-theme' ),
				'mobile'  => __( 'Mobile Menu', 'silwasa-commerce-theme' ),
				'footer'  => __( 'Footer Menu', 'silwasa-commerce-theme' ),
			)
		);

	}

}

add_action( 'after_setup_theme', 'swc_register_menus' );