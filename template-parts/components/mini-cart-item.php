<?php
/**
 * Premium Mini Cart Item
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

if ( empty( $product ) || ! $product || ! $product->exists() ) {
	return;
}

$product_id = $product->get_id();

$image = get_the_post_thumbnail_url(
	$product_id,
	'woocommerce_thumbnail'
);

if ( ! $image ) {
	$image = wc_placeholder_img_src();
}

$name = $product->get_name();

$price = $product->get_price_html();

$quantity = $cart_item['quantity'];

$link = $product->is_visible()
	? $product->get_permalink()
	: '';

?>

<div
	class="swc-mini-cart-item mb-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md"
	data-key="<?php echo esc_attr( $cart_item_key ); ?>">

	<div class="flex gap-4">

		<!-- Product Image -->

		<a
			href="<?php echo esc_url( $link ); ?>"
			class="flex h-24 w-24 items-center justify-center rounded-xl bg-slate-100">

			<img
				src="<?php echo esc_url( $image ); ?>"
				alt="<?php echo esc_attr( $name ); ?>"
				class="h-20 w-20 object-contain transition duration-300 hover:scale-105">

		</a>

		<!-- Product Content -->

		<div class="flex flex-1 flex-col">

			<a
				href="<?php echo esc_url( $link ); ?>"
				class="line-clamp-2 text-base font-bold leading-6 text-slate-900 transition hover:text-green-600">

				<?php echo esc_html( $name ); ?>

			</a>

			<?php

			$item_data = wc_get_formatted_cart_item_data(
				$cart_item
			);

			if ( $item_data ) :

			?>

				<div class="mt-1 text-xs text-slate-500">

					<?php echo wp_kses_post( $item_data ); ?>

				</div>

			<?php endif; ?>

			<div class="mt-3 flex items-center justify-between">

				<div class="text-lg font-black text-green-600">

					<?php echo wp_kses_post( $price ); ?>

				</div>

				<div
					class="flex items-center rounded-full border border-slate-200 bg-slate-50">

					<button
						type="button"
						class="swc-cart-minus flex h-9 w-9 items-center justify-center text-lg font-bold transition hover:bg-slate-200"
						data-key="<?php echo esc_attr( $cart_item_key ); ?>">

						−

					</button>

					<span
						class="swc-cart-qty flex h-9 min-w-[34px] items-center justify-center text-sm font-bold">

						<?php echo esc_html( $quantity ); ?>

					</span>

					<button
						type="button"
						class="swc-cart-plus flex h-9 w-9 items-center justify-center text-lg font-bold transition hover:bg-slate-200"
						data-key="<?php echo esc_attr( $cart_item_key ); ?>">

						+

					</button>

				</div>

			</div>

			<button
				type="button"
				class="swc-remove-item mt-4 inline-flex w-fit items-center rounded-lg px-3 py-2 text-sm font-semibold text-red-500 transition hover:bg-red-50"
				data-key="<?php echo esc_attr( $cart_item_key ); ?>">

				<svg
					xmlns="http://www.w3.org/2000/svg"
					class="mr-2 h-4 w-4"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor">

					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M19 7L5 7M10 11v6M14 11v6M6 7l1 13h10l1-13M9 7V4h6v3"/>

				</svg>

				Remove

			</button>

		</div>

	</div>

</div>