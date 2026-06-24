<?php
/**
 * Product Summary
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

$short_description = $product->get_short_description();
?>

<div class="space-y-6">

	<h1 class="text-xl lg:text-3xl font-bold text-slate-900">

		<?php the_title(); ?>

	</h1>

	<div class="flex items-center gap-3">

		<div class="text-3xl font-black text-green-600">

			<?php echo wp_kses_post( $product->get_price_html() ); ?>

		</div>

		<div class="text-green-600 font-semibold">

			● In Stock

		</div>

	</div>

	<?php if ( $short_description ) : ?>

		<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

			<button
				type="button"
				id="swc-desc-toggle"
				class="w-full flex items-center justify-between px-5 py-4 font-semibold text-left">

				<span>Description</span>

				<span>▼</span>

			</button>

			<div
				id="swc-desc-content"
				class="hidden px-5 pb-5 text-slate-600 leading-7">

				<?php echo wp_kses_post( wpautop( $short_description ) ); ?>

			</div>

		</div>

	<?php endif; ?>

	<div class="space-y-4">

        <!-- Blinkit Add Button -->

        <div id="swc-product-action">

            <button
                type="button"
                class="swc-product-add w-full h-12 rounded-xl bg-green-600 text-white font-bold text-base"
                data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">

                ADD

            </button>

        </div>

        <a
			href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
			class="flex h-14 items-center justify-center rounded-xl border-2 border-green-600 bg-white text-green-600 text-lg font-bold transition hover:bg-green-50">

			Buy Now

		</a>

    </div>
		

	<div class="grid grid-cols-2 gap-4 pt-2">

		<div class="bg-white rounded-2xl p-4 shadow-sm">

			<div class="text-xs text-slate-500 mb-1">

				SKU

			</div>

			<div class="font-semibold text-slate-900">

				<?php echo esc_html( $product->get_sku() ); ?>

			</div>

		</div>

		<div class="bg-white rounded-2xl p-4 shadow-sm">

			<div class="text-xs text-slate-500 mb-1">

				Category

			</div>

			<div class="font-semibold text-slate-900">

				<?php

				echo wc_get_product_category_list(
					$product->get_id()
				);

				?>

			</div>

		</div>

	</div>

</div>