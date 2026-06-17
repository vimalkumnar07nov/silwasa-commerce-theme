<?php
/**
 * Empty Products State
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<div
	id="swc-empty-products"
	class="flex flex-col items-center justify-center rounded-3xl border border-dashed border-slate-300 bg-white px-8 py-20 text-center">

	<div
		class="mb-8 flex h-36 w-36 items-center justify-center rounded-full bg-green-50 text-7xl">

		🛒

	</div>

	<h2
		class="text-3xl font-black text-slate-900">

		No products found

	</h2>

	<p
		class="mt-4 max-w-md text-base leading-7 text-slate-500">

		We couldn't find any products matching your selected filters.
		Try removing some filters or browse all available grocery items.

	</p>

	<div
		class="mt-10 flex flex-col gap-4 sm:flex-row">

		<button
			id="swc-reset-filters"
			type="button"
			class="flex h-14 items-center justify-center rounded-xl bg-green-600 px-8 text-base font-bold text-white transition hover:bg-green-700">

			Reset Filters

		</button>

		<a
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
			class="flex h-14 items-center justify-center rounded-xl border border-slate-300 px-8 text-base font-bold text-slate-800 transition hover:bg-slate-100">

			Browse All Products

		</a>

	</div>

	<div
		class="mt-12 grid w-full max-w-3xl grid-cols-2 gap-4 md:grid-cols-4">

		<a
			href="<?php echo esc_url( get_term_link( 'fruits', 'product_cat' ) ); ?>"
			class="rounded-2xl bg-slate-50 p-5 transition hover:bg-green-50 hover:text-green-600">

			<div class="mb-2 text-4xl">

				🍎

			</div>

			<div class="font-semibold">

				Fruits

			</div>

		</a>

		<a
			href="<?php echo esc_url( get_term_link( 'vegetables', 'product_cat' ) ); ?>"
			class="rounded-2xl bg-slate-50 p-5 transition hover:bg-green-50 hover:text-green-600">

			<div class="mb-2 text-4xl">

				🥦

			</div>

			<div class="font-semibold">

				Vegetables

			</div>

		</a>

		<a
			href="<?php echo esc_url( get_term_link( 'dairy', 'product_cat' ) ); ?>"
			class="rounded-2xl bg-slate-50 p-5 transition hover:bg-green-50 hover:text-green-600">

			<div class="mb-2 text-4xl">

				🥛

			</div>

			<div class="font-semibold">

				Dairy

			</div>

		</a>

		<a
			href="<?php echo esc_url( get_term_link( 'bakery', 'product_cat' ) ); ?>"
			class="rounded-2xl bg-slate-50 p-5 transition hover:bg-green-50 hover:text-green-600">

			<div class="mb-2 text-4xl">

				🥖

			</div>

			<div class="font-semibold">

				Bakery

			</div>

		</a>

	</div>

</div>