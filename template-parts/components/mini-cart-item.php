<?php
/**
 * Premium Mini Cart Item
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Variables
|--------------------------------------------------------------------------
*/

$cart_item_key = get_query_var( 'cart_item_key' );
$cart_item     = get_query_var( 'cart_item' );
$product       = get_query_var( 'product' );

if (
	empty( $cart_item_key ) ||
	empty( $cart_item ) ||
	! $product ||
	! is_a( $product, 'WC_Product' ) ||
	! $product->exists()
) {
	return;
}

/*
|--------------------------------------------------------------------------
| Product Data
|--------------------------------------------------------------------------
*/

$product_id = $product->get_id();

$image = get_the_post_thumbnail_url(
	$product_id,
	'woocommerce_thumbnail'
);

if ( empty( $image ) ) {
	$image = wc_placeholder_img_src();
}

$name = $product->get_name();

$price_html = $product->get_price_html();

$link = $product->is_visible()
	? $product->get_permalink()
	: '#';

$quantity = isset( $cart_item['quantity'] )
	? absint( $cart_item['quantity'] )
	: 1;

$item_total = WC()->cart->get_product_subtotal(
	$product,
	$quantity
);

$item_data = wc_get_formatted_cart_item_data(
	$cart_item
);

?>

<div
	class="swc-mini-cart-item rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-md"
	data-cart-key="<?php echo esc_attr( $cart_item_key ); ?>">

	<div class="flex gap-4">

		<!-- Image -->

		<a
			href="<?php echo esc_url( $link ); ?>"
			class="flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-slate-100">

			<img
				src="<?php echo esc_url( $image ); ?>"
				alt="<?php echo esc_attr( $name ); ?>"
				class="h-20 w-20 object-contain transition duration-300 hover:scale-105"
				loading="lazy">

		</a>

		<!-- Content -->

		<div class="flex min-w-0 flex-1 flex-col">

			<a
				href="<?php echo esc_url( $link ); ?>"
				class="line-clamp-2 text-base font-bold leading-6 text-slate-900 transition hover:text-green-600">

				<?php echo esc_html( $name ); ?>

			</a>

			<?php if ( ! empty( $item_data ) ) : ?>

				<div class="mt-1 text-xs text-slate-500">

					<?php echo wp_kses_post( $item_data ); ?>

				</div>

			<?php endif; ?>

			<div class="mt-2 text-lg font-black text-green-600">

				<?php echo wp_kses_post( $price_html ?: '' ); ?>

			</div>

			<div class="mt-4 flex items-center justify-between gap-3">

				<!-- Quantity -->

				<div class="flex items-center overflow-hidden rounded-full border border-slate-200 bg-slate-50">

					<button
						type="button"
						class="swc-cart-minus flex h-9 w-9 items-center justify-center text-lg font-bold transition hover:bg-slate-200"
						data-key="<?php echo esc_attr( $cart_item_key ); ?>">

						−

					</button>

					<span
						class="swc-cart-qty flex min-w-[36px] items-center justify-center text-sm font-bold">

						<?php echo esc_html( $quantity ); ?>

					</span>

					<button
						type="button"
						class="swc-cart-plus flex h-9 w-9 items-center justify-center text-lg font-bold transition hover:bg-slate-200"
						data-cart-key="<?php echo esc_attr( $cart_item_key ); ?>">

						+

					</button>

				</div>

				<!-- Subtotal -->

				<div class="text-right">

					<div class="text-xs text-slate-500">

						Subtotal

					</div>

					<div class="font-bold text-slate-900">

						<?php echo wp_kses_post( $item_total ?: '' ); ?>

					</div>

				</div>

			</div>

			<button
				type="button"
				class="swc-remove-item mt-4 inline-flex w-fit items-center gap-2 rounded-lg px-3 py-2 text-sm font-semibold text-red-500 transition hover:bg-red-50"
				data-cart-key="<?php echo esc_attr( $cart_item_key ); ?>">

				<svg
					xmlns="http://www.w3.org/2000/svg"
					class="h-4 w-4"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor">

					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M19 7H5M10 11v6M14 11v6M6 7l1 13h10l1-13M9 7V4h6v3"/>

				</svg>

				Remove

			</button>

		</div>

	</div>

</div>