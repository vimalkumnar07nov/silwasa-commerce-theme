<?php
/**
 * Premium Shop Toolbar
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $wp_query;

$total_products = isset( $wp_query->found_posts ) ? $wp_query->found_posts : 0;

?>

<div
	class="mb-8 rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">

	<div
		class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

		<div class="flex items-center gap-4">

			<button
				id="swc-mobile-filter"
				class="flex h-12 w-12 items-center justify-center rounded-xl border border-slate-200 xl:hidden">

				☰

			</button>

			<div>

				<h2 class="text-2xl font-black text-slate-900">

					Shop

				</h2>

				<p
					id="swc-product-count"
					class="text-sm text-slate-500">

					<?php echo esc_html( $total_products ); ?>

					Products Found

				</p>

			</div>

		</div>

		<div
			class="flex flex-wrap items-center gap-3">

			<select
				id="swc-sort"
				class="h-12 rounded-xl border border-slate-200 bg-white px-5 text-sm font-medium outline-none">

				<option value="menu_order">

					Featured

				</option>

				<option value="popularity">

					Most Popular

				</option>

				<option value="rating">

					Top Rated

				</option>

				<option value="date">

					New Arrivals

				</option>

				<option value="price">

					Price Low → High

				</option>

				<option value="price-desc">

					Price High → Low

				</option>

			</select>

			<div
				class="flex overflow-hidden rounded-xl border border-slate-200">

				<button
					class="swc-grid-view flex h-12 w-12 items-center justify-center bg-green-600 text-white"
					data-grid="2">

					2

				</button>

				<button
					class="swc-grid-view flex h-12 w-12 items-center justify-center"
					data-grid="3">

					3

				</button>

				<button
					class="swc-grid-view flex h-12 w-12 items-center justify-center"
					data-grid="4">

					4

				</button>

			</div>

		</div>

	</div>

	<?php

	get_template_part(

		'template-parts/shop/active-filters'

	);

	?>

</div>