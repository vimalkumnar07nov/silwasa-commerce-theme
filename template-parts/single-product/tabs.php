<?php
/**
 * Product Accordion
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

$tabs = apply_filters(
	'woocommerce_product_tabs',
	array()
);

if ( empty( $tabs ) ) {
	return;
}
?>

<section class="mt-16">

	<div class="mx-auto max-w-7xl">

		<h2 class="mb-6 text-lg font-black text-slate-900">

			Product Details

		</h2>

		<div class="space-y-4">

			<?php
			$first = true;

			foreach ( $tabs as $key => $tab ) :
			?>

				<div
					class="overflow-hidden rounded-2xl border border-slate-200 bg-white transition">

					<button
						type="button"
						class="swc-product-accordion flex w-full items-center justify-between px-3 py-3 text-left font-bold text-slate-900"
						data-target="<?php echo esc_attr( $key ); ?>">

						<span>

							<?php

							if ( 'reviews' === $key ) {

								printf(
									'Reviews (%d)',
									$product->get_review_count()
								);

							} else {

								echo esc_html(
									$tab['title']
								);

							}

							?>

						</span>

						<svg
							class="swc-product-arrow h-5 w-5 transition duration-300 <?php echo $first ? 'rotate-180' : ''; ?>"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor">

							<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M19 9l-7 7-7-7" />

						</svg>

					</button>

					<div
						id="accordion-<?php echo esc_attr( $key ); ?>"
						class="swc-product-content <?php echo $first ? '' : 'hidden'; ?> border-t border-slate-100 px-6 py-6">

						<?php

						if ( isset( $tab['callback'] ) ) {

							call_user_func(
								$tab['callback'],
								$key,
								$tab
							);

						}

						?>

					</div>

				</div>

			<?php

			$first = false;

			endforeach;

			?>

		</div>

	</div>

</section>