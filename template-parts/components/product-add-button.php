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

$product_id = $product->get_id();

?>

<button
	type="button"
	class="swc-add-cart inline-flex h-9 min-w-[82px] items-center justify-center rounded-full bg-green-600 px-5 text-sm font-semibold text-white transition hover:bg-green-700"
	data-product-id="<?php echo esc_attr( $product_id ); ?>"
	data-quantity="1"
>

	+ Add

</button>