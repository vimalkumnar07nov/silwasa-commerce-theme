<?php
/**
 * Enqueue Scripts & Styles
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'swc_enqueue_assets' ) ) {

	function swc_enqueue_assets() {

		$version = wp_get_theme()->get( 'Version' );

		wp_enqueue_style(
			'swc-style',
			get_template_directory_uri() . '/assets/css/app.css',
			array(),
			$version
		);

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
			array(),
			$version,
			true
		);

		wp_enqueue_script(
			'swc-mobile-menu',
			get_template_directory_uri() . '/assets/js/mobile-menu.js',
			array(),
			$version,
			true
		);

		wp_enqueue_script(
			'swc-search',
			get_template_directory_uri() . '/assets/js/search.js',
			array(),
			$version,
			true
		);

		wp_enqueue_script(
			'swc-slider',
			get_template_directory_uri() . '/assets/js/slider.js',
			array(),
			$version,
			true
		);

		wp_enqueue_script(

			'swc-flash-sale',

			get_template_directory_uri() . '/assets/js/flash-sale.js',

			array(),

			$version,

			true

		);

	}

}

add_action(
	'wp_enqueue_scripts',
	'swc_enqueue_assets'
);