<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
$total = WC()->cart ? WC()->cart->get_cart_total() : wc_price( 0 );

?>

<button
	id="swc-open-cart"
	type="button"
	class="group flex items-center gap-1 rounded bg-green-600 px-3 py-1 text-white transition hover:bg-green-700">

	<div class="text-2xl transition group-hover:scale-110">
		🛒
	</div>

	<div class="text-left">

		<div
			id="swc-cart-count"
			class="text-xs font-medium">

			<?php echo esc_html( $count ); ?>

			<?php echo ( $count === 1 ) ? 'Item' : 'Items'; ?>

		</div>

		<div
			id="swc-cart-total"
			class="font-semibold">

			<?php echo wp_kses_post( $total ); ?>

		</div>

	</div>

</button>