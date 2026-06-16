<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;

$total = WC()->cart ? WC()->cart->get_cart_total() : '$0';

?>

<a
	href="<?php echo esc_url( wc_get_cart_url() ); ?>"
	class="flex items-center gap-3 bg-green-600 hover:bg-green-700 transition text-white px-5 py-3 rounded-full"
>

	<div class="text-2xl">

	🛒

	</div>

	<div>

		<div class="text-xs">

			<?php echo esc_html( $count ); ?>

			Items

		</div>

		<div class="font-semibold">

			<?php echo wp_kses_post( $total ); ?>

		</div>

	</div>

</a>