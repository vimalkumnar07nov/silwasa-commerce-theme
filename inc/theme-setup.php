<?php
/**
 * Theme Setup
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'swc_theme_setup' ) ) {

	function swc_theme_setup() {

		load_theme_textdomain(
			'silwasa-commerce-theme',
			get_template_directory() . '/languages'
		);

		add_theme_support( 'woocommerce' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'custom-logo' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

	}

}

add_action(
	'after_setup_theme',
	'swc_theme_setup'
);