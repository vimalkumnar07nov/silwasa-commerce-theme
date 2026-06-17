<?php
/**
 * Mobile Bottom Navigation
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$cart_count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
?>

<nav
	id="swc-mobile-nav"
	class="fixed bottom-0 left-0 right-0 z-50 border-t border-slate-200 bg-white shadow-[0_-5px_25px_rgba(0,0,0,.08)] lg:hidden">

	<div class="grid grid-cols-5 h-16">

		<!-- Home -->

		<a
			href="<?php echo esc_url( home_url() ); ?>"
			class="flex flex-col items-center justify-center gap-1 text-green-600">

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M3 10.5L12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5Z"/>

			</svg>

			<span class="text-[11px] font-semibold">

				Home

			</span>

		</a>

		<!-- Categories -->

		<a
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
			class="flex flex-col items-center justify-center gap-1 text-slate-500">

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M4 4h6v6H4zm10 0h6v6h-6zM4 14h6v6H4zm10 0h6v6h-6z"/>

			</svg>

			<span class="text-[11px] font-semibold">

				Shop

			</span>

		</a>

		<!-- Search -->

		<button
			id="swc-open-search-mobile"
			type="button"
			class="relative flex flex-col items-center justify-center gap-1 -mt-5">

			<div class="flex items-center justify-center w-14 h-14 rounded-full bg-green-600 shadow-xl">

				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-7 h-7 text-white">

					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z"/>

				</svg>

			</div>

			<span class="text-[11px] font-semibold text-slate-600">

				Search

			</span>

		</button>

		<!-- Account -->

		<a
			href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
			class="flex flex-col items-center justify-center gap-1 text-slate-500">

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M12 12a4 4 0 1 0-4-4a4 4 0 0 0 4 4Zm-7 8a7 7 0 1 1 14 0"/>

			</svg>

			<span class="text-[11px] font-semibold">

				Account

			</span>

		</a>

		<!-- Cart -->

		<button
			id="swc-open-cart-mobile"
			type="button"
			class="relative flex flex-col items-center justify-center gap-1 text-slate-500 w-full h-full">

			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M3 4h2l2 10h10l2-7H7"/>

				<circle cx="10" cy="20" r="1"/>

				<circle cx="18" cy="20" r="1"/>

			</svg>

			<?php if ( $cart_count > 0 ) : ?>

				<span
					class="absolute top-1 right-4 flex h-5 min-w-[20px] items-center justify-center rounded-full bg-red-500 px-1 text-[10px] font-bold text-white">

					<?php echo esc_html( $cart_count ); ?>

				</span>

			<?php endif; ?>

			<span class="text-[11px] font-semibold">

				Cart

			</span>

		</button>

	</div>

</nav>