<?php
/**
 * Product Price
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

?>

<div>

	<div class="text-xl font-bold text-slate-900">

		<?php echo wp_kses_post( $product->get_price_html() ); ?>

	</div>

</div>