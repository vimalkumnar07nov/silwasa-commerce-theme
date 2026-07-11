<?php
/**
 * Theme Options
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Flash Sale Settings
|--------------------------------------------------------------------------
*/

function swc_flash_sale_settings() {

	return array(

		'enabled' => true,

		'title' => 'Today\'s Best Deals',

		'description' => 'Limited-time offers on your favourite products.',

		'end_date' => '2026-07-25 23:59:59',

	);

}