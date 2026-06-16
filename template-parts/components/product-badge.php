<?php
/**
 * Product Badge
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

$regular = (float) $product->get_regular_price();
$sale    = (float) $product->get_sale_price();

if ( $sale && $regular > $sale ) {

	$discount = round(
		( ( $regular - $sale ) / $regular ) * 100
	);

	?>

	<div class="absolute left-3 top-3 z-20 flex flex-col gap-2">

		<span class="rounded-full bg-red-500 px-3 py-1 text-xs font-bold text-white">

			-<?php echo esc_html( $discount ); ?>%

		</span>

		<span class="rounded-full bg-green-600 px-3 py-1 text-xs font-semibold text-white">

			Fresh

		</span>

	</div>

	<?php

}