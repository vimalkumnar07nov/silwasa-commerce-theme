<?php
/**
 * Premium AJAX Mini Cart
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$cart_count = function_exists( 'swc_cart_count' )
	? swc_cart_count()
	: 0;

$cart_total = function_exists( 'swc_cart_total' )
	? swc_cart_total()
	: '';

?>

<!-- Overlay -->

<div
	id="swc-mini-cart-overlay"
	class="fixed inset-0 z-[9998] hidden bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300">

</div>

<!-- Drawer -->

<aside
	id="swc-mini-cart"
	class="fixed top-0 right-0 z-[9999] flex h-full w-full max-w-md translate-x-full flex-col bg-white shadow-2xl transition-transform duration-300">

	<!-- Header -->

	<div class="border-b border-slate-200 p-5">

		<div class="flex items-center justify-between">

			<div>

				<h2 class="text-2xl font-bold text-slate-900">

					Shopping Cart

				</h2>

				<p
					id="swc-cart-count"
					class="mt-1 text-sm text-slate-500">

					<?php echo esc_html( $cart_count ); ?> Items

				</p>

			</div>

			<button
				type="button"
				id="swc-close-cart"
				class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100 text-xl transition hover:bg-red-100 hover:text-red-600">

				✕

			</button>

		</div>

	</div>

	<!-- Body -->

	<div
		id="swc-mini-cart-items"
		class="flex-1 overflow-y-auto bg-slate-50">

		<?php

		get_template_part(
			'template-parts/components/mini-cart-items'
		);

		?>

	</div>

	<!-- Footer -->

	<div
		id="swc-mini-cart-footer"
		class="border-t border-slate-200 bg-white p-5">

		<div class="mb-5 flex items-center justify-between">

			<div>

				<div class="text-sm text-slate-500">

					Total

				</div>

				<div
					id="swc-mini-cart-total"
					class="text-2xl font-black text-slate-900">

					<?php echo wp_kses_post( $cart_total ?: '' ); ?>

				</div>

			</div>

		</div>

		<div class="space-y-3">

			<a
				href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
				class="flex h-14 w-full items-center justify-center rounded-xl bg-green-600 text-lg font-bold text-white transition hover:bg-green-700">

				Proceed to Checkout

			</a>

			<button
				type="button"
				id="swc-continue-shopping"
				class="flex h-14 w-full items-center justify-center rounded-xl border border-slate-300 bg-white font-semibold transition hover:bg-slate-100">

				Continue Shopping

			</button>

		</div>

	</div>

</aside>