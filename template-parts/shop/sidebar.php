<?php
/**
 * Premium Shop Sidebar
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$product_categories = get_terms(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
	)
);

$brands = get_terms(
	array(
		'taxonomy'   => 'product_brand',
		'hide_empty' => true,
	)
);

?>

<aside
	id="swc-shop-sidebar"
	class="w-full xl:w-80 shrink-0 rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">

	<h2 class="text-2xl font-black mb-8">

		Filters

	</h2>

	<?php get_template_part( 'template-parts/shop/filters' ); ?>

	<!-- Categories -->

	<div class="mb-10">

		<h3 class="font-bold text-lg mb-4">

			Categories

		</h3>

		<div class="space-y-3 max-h-80 overflow-auto">

			<?php foreach ( $product_categories as $category ) : ?>

				<label
					class="flex items-center justify-between cursor-pointer group">

					<div class="flex items-center gap-3">

						<input
							type="checkbox"
							class="swc-filter-category h-5 w-5 rounded border-slate-300"
							value="<?php echo esc_attr( $category->slug ); ?>">

						<span class="group-hover:text-green-600 transition">

							<?php echo esc_html( $category->name ); ?>

						</span>

					</div>

					<span
						class="text-xs bg-slate-100 rounded-full px-3 py-1">

						<?php echo esc_html( $category->count ); ?>

					</span>

				</label>

			<?php endforeach; ?>

		</div>

	</div>

	<!-- Brand -->

	<div class="mb-10">

		<h3 class="font-bold text-lg mb-4">

			Brands

		</h3>

		<div class="space-y-3 max-h-80 overflow-auto">

			<?php foreach ( $brands as $brand ) : ?>

				<label
					class="flex items-center justify-between cursor-pointer">

					<div class="flex items-center gap-3">

						<input
							type="checkbox"
							class="swc-filter-brand h-5 w-5"
							value="<?php echo esc_attr( $brand->slug ); ?>">

						<span>

							<?php echo esc_html( $brand->name ); ?>

						</span>

					</div>

					<span
						class="text-xs bg-slate-100 rounded-full px-3 py-1">

						<?php echo esc_html( $brand->count ); ?>

					</span>

				</label>

			<?php endforeach; ?>

		</div>

	</div>

	<!-- Price -->

	<div class="mb-10">

		<h3 class="font-bold text-lg mb-5">

			Price

		</h3>

		<input
			id="swc-price-range"
			type="range"
			min="0"
			max="500"
			value="500"
			class="w-full">

		<div class="flex justify-between mt-3 text-sm">

			<span>

				$0

			</span>

			<span
				id="swc-price-value">

				$500

			</span>

		</div>

	</div>

	<!-- Stock -->

	<div class="mb-8">

		<h3 class="font-bold text-lg mb-4">

			Availability

		</h3>

		<label class="flex items-center gap-3 mb-3">

			<input
				type="checkbox"
				id="swc-stock-filter">

			In Stock

		</label>

		<label class="flex items-center gap-3">

			<input
				type="checkbox"
				id="swc-sale-filter">

			On Sale

		</label>

	</div>

	<button
		id="swc-clear-filters"
		class="w-full h-12 rounded-xl bg-slate-100 hover:bg-slate-200 transition font-bold">

		Clear Filters

	</button>

</aside>