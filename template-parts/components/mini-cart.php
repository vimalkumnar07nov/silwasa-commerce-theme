<?php
/**
 * Premium AJAX Mini Cart
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$cart_total = WC()->cart ? WC()->cart->get_cart_total() : '';
$subtotal = WC()->cart ? WC()->cart->get_subtotal() : 0;

$free_shipping_target = 50;
$progress = 0;

if ( $subtotal > 0 ) {
	$progress = min( 100, ( $subtotal / $free_shipping_target ) * 100 );
}
?>

<!-- Overlay -->

<div
	id="swc-mini-cart-overlay"
	class="fixed inset-0 z-[9998] hidden bg-black/50 backdrop-blur-sm">

</div>

<!-- Drawer -->

<aside
	id="swc-mini-cart"
	class="fixed top-0 right-0 z-[9999] flex h-full w-full max-w-md translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300">

	<!-- Header -->

	<div class="flex items-center justify-between border-b p-5">

		<div>

			<h2 class="text-2xl font-bold text-slate-900">

				Shopping Cart

			</h2>

			<p class="mt-1 text-sm text-slate-500">

				<?php echo esc_html( $cart_count ); ?> Items

			</p>

		</div>

		<button
			id="swc-close-cart"
			class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100 transition hover:bg-red-100 hover:text-red-600">

			✕

		</button>

	</div>

	<!-- Free Shipping -->

	<div class="border-b p-5">

		<?php if ( $subtotal < $free_shipping_target ) : ?>

			<p class="mb-3 text-sm font-medium text-slate-700">

				Add

				<strong>

					$

					<?php echo number_format( $free_shipping_target - $subtotal, 2 ); ?>

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

				style="width:<?php echo esc_attr( $progress ); ?>%">

			</div>

		</div>

	</div>

	<!-- Cart Items -->

	<div

		id="swc-mini-cart-items"

		class="flex-1 overflow-y-auto p-5">

		<?php

		if ( WC()->cart && ! WC()->cart->is_empty() ) :

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

				$product = $cart_item['data'];

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

		else :

		?>

			<div class="py-20 text-center">

				<div class="text-7xl">

					🛒

				</div>

				<h3 class="mt-6 text-2xl font-bold">

					Your cart is empty

				</h3>

				<p class="mt-3 text-slate-500">

					Start shopping fresh groceries.

				</p>

			</div>

		<?php endif; ?>

	</div>

	<!-- Footer -->

	<div class="border-t bg-white p-5">

		<div class="mb-5 flex items-center justify-between">

			<span class="text-lg font-medium text-slate-600">

				Total

			</span>

			<div

				id="swc-mini-cart-total"

				class="text-2xl font-black text-slate-900">

				<?php echo wp_kses_post( $cart_total ); ?>

			</div>

		</div>

		<div class="space-y-3">

			<a

				href="<?php echo esc_url( wc_get_checkout_url() ); ?>"

				class="flex h-14 items-center justify-center rounded-xl bg-green-600 text-lg font-bold text-white transition hover:bg-green-700">

				Proceed to Checkout

			</a>

			<button

				id="swc-continue-shopping"

				class="flex h-14 w-full items-center justify-center rounded-xl border border-slate-300 font-semibold transition hover:bg-slate-100">

				Continue Shopping

			</button>

		</div>

	</div>

</aside>