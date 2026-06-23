<?php
/**
 * Product Summary
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="space-y-6">

	<?php if ( $product->is_on_sale() ) : ?>

		<div>

			<span class="inline-flex bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">

				SALE

			</span>

		</div>

	<?php endif; ?>

	<h1 class="text-4xl font-black text-slate-900">

		<?php the_title(); ?>

	</h1>

	<div>

		<?php woocommerce_template_single_rating(); ?>

	</div>

	<div class="text-4xl font-black text-green-600">

		<?php echo wp_kses_post( $product->get_price_html() ); ?>

	</div>

	<?php if ( $product->is_in_stock() ) : ?>

		<div class="inline-flex items-center gap-2 text-green-600 font-semibold">

			● In Stock

		</div>

	<?php else : ?>

		<div class="inline-flex items-center gap-2 text-red-600 font-semibold">

			● Out of Stock

		</div>

	<?php endif; ?>

	<div class="text-slate-600 leading-7">

		<?php echo wp_kses_post( wpautop( $product->get_short_description() ) ); ?>

	</div>

	<form
		class="swc-single-add-cart flex flex-wrap gap-4"
		data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">

		<div class="flex items-center border border-slate-300 rounded-full overflow-hidden">

			<button
				type="button"
				class="swc-single-minus w-12 h-12">

				−

			</button>

			<input
				type="number"
				min="1"
				value="1"
				class="swc-single-qty w-16 text-center border-0 outline-none">

			<button
				type="button"
				class="swc-single-plus w-12 h-12">

				+

			</button>

		</div>

		<button
			type="button"
			class="swc-single-add flex-1 h-12 rounded-full bg-green-600 text-white font-bold hover:bg-green-700 transition">

			Add To Cart

		</button>

		<a
			href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
			class="flex-1 h-12 rounded-full bg-slate-900 text-white font-bold flex items-center justify-center">

			Buy Now

		</a>

	</form>

	<div class="grid grid-cols-2 gap-4 pt-4">

		<div class="bg-white rounded-2xl p-4 shadow-sm">

			<div class="text-xs text-slate-500">

				SKU

			</div>

			<div class="font-semibold">

				<?php echo esc_html( $product->get_sku() ); ?>

			</div>

		</div>

		<div class="bg-white rounded-2xl p-4 shadow-sm">

			<div class="text-xs text-slate-500">

				Category

			</div>

			<div class="font-semibold">

				<?php

				echo wc_get_product_category_list(
					$product->get_id()
				);

				?>

			</div>

		</div>

	</div>

</div>