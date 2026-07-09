<?php
/**
 * Product Add Button
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product ) {
	return;
}

?>

<div
	class="swc-product-action"
	data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">

	<button
		type="button"
		class="swc-product-add swc-btn swc-btn-outline swc-btn-sm w-full">

		ADD

	</button>

</div>