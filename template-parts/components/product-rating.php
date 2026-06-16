<?php
/**
 * Product Rating
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

$rating = $product->get_average_rating();

?>

<div class="flex items-center gap-2">

	<div class="text-yellow-500 text-sm">

		★★★★★

	</div>

	<div class="text-xs text-slate-500">

		<?php echo esc_html( $rating ? $rating : '5.0' ); ?>

	</div>

</div>