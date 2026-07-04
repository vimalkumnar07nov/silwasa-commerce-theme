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
		class="swc-product-add inline-flex h-9 w-full items-center justify-center rounded border-2 border-green-600 bg-white px-5 text-[13px] font-bold text-green-600 transition hover:bg-green-50">

		ADD

	</button>

</div>