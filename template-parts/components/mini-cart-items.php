<?php
/**
 * Premium Mini Cart Items
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
	return;
}

$cart = WC()->cart;

$subtotal = (float) $cart->get_subtotal();

$free_shipping_target = 50;

$remaining = max(
	0,
	$free_shipping_target - $subtotal
);

$progress = 0;

if ( $free_shipping_target > 0 ) {

	$progress = min(
		100,
		( $subtotal / $free_shipping_target ) * 100
	);

}

/*
|--------------------------------------------------------------------------
| Empty Cart
|--------------------------------------------------------------------------
*/

if ( $cart->is_empty() ) :
?>

	<div class="flex h-full flex-col items-center justify-center px-8 py-20 text-center">

		<div class="mb-6 flex h-28 w-28 items-center justify-center rounded-full bg-green-50 text-6xl">

			🛒

		</div>

		<h3 class="text-lg font-bold text-slate-900">

			Your cart is empty

		</h3>

		<p class="mt-4 max-w-xs text-slate-500 leading-7">

			Start shopping fresh groceries and discover thousands of everyday essentials.

		</p>

		<a
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
			class="swc-btn swc-btn swc-btn-outline">

			Shop Now

		</a>

	</div>

<?php

	return;

endif;

?>

<!-- Free Shipping -->

<div class="border-b border-slate-200 bg-white p-5">

	<?php if ( $remaining > 0 ) : ?>

		<p class="mb-3 text-sm font-medium text-slate-700">

			Add

			<strong>

				<?php echo wp_kses_post( wc_price( $remaining ) ); ?>

			</strong>

			more for FREE delivery 🚚

		</p>

	<?php else : ?>

		<p class="mb-3 font-semibold text-green-600">

			🎉 You unlocked FREE delivery

		</p>

	<?php endif; ?>

	<div class="h-2 overflow-hidden rounded-full bg-slate-200">

		<div
			class="h-full rounded-full bg-green-500 transition-all duration-500"
			style="width:<?php echo esc_attr( $progress ); ?>%;">

		</div>

	</div>

</div>

<!-- Cart Items -->

<div class="space-y-4 p-3">

	<?php

	foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) :

		$product = isset( $cart_item['data'] )
			? $cart_item['data']
			: false;

		if ( ! $product || ! $product->exists() ) {
			continue;
		}

		set_query_var(
			'cart_item_key',
			$cart_item_key
		);

		set_query_var(
			'cart_item',
			$cart_item
		);

		set_query_var(
			'product',
			$product
		);

		get_template_part(
			'template-parts/components/mini-cart-item'
		);

	endforeach;

	?>

</div>