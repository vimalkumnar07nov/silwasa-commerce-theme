<?php
/**
 * Product Card
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->get_id();

$regular_price = $product->get_regular_price();
$sale_price    = $product->get_sale_price();

$discount = 0;

if ( $regular_price && $sale_price && $regular_price > $sale_price ) {
	$discount = round(
		( ( $regular_price - $sale_price ) / $regular_price ) * 100
	);
}

?>

<li <?php wc_product_class( 'group list-none', $product ); ?>>

	<div
		class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl"
	>

		<?php if ( $discount > 0 ) : ?>

			<div
				class="absolute left-3 top-3 z-20 rounded-full bg-red-500 px-3 py-1 text-xs font-bold text-white"
			>

				-<?php echo esc_html( $discount ); ?>%

			</div>

		<?php endif; ?>

		<button
			class="absolute right-3 top-3 z-20 flex h-9 w-9 items-center justify-center rounded-full bg-white shadow transition hover:bg-green-500 hover:text-white"
			type="button"
		>

			♡

		</button>

		<a
			href="<?php the_permalink(); ?>"
			class="block"
		>

			<div class="overflow-hidden bg-slate-50 p-6">

				<?php

				if ( has_post_thumbnail() ) {

					the_post_thumbnail(
						'woocommerce_thumbnail',
						array(
							'class' => 'mx-auto h-52 w-full object-contain transition duration-300 group-hover:scale-105',
							'loading' => 'lazy',
						)
					);

				} else {

					echo wc_placeholder_img(
						'woocommerce_thumbnail'
					);

				}

				?>

			</div>

		</a>

		<div class="p-5">

			<div class="mb-2 flex items-center gap-2">

				<span class="text-yellow-500">

					★★★★★

				</span>

				<span class="text-xs text-slate-500">

					4.8

				</span>

			</div>

			<h3 class="mb-2 line-clamp-2 text-lg font-semibold text-slate-800">

				<a
					href="<?php the_permalink(); ?>"
				>

					<?php the_title(); ?>

				</a>

			</h3>

			<div class="mb-4 text-sm text-slate-500">

				<?php

				$weight = get_post_meta(
					$product_id,
					'_product_unit',
					true
				);

				if ( empty( $weight ) ) {
					$weight = '1 Pack';
				}

				echo esc_html( $weight );

				?>

			</div>

			<div
				class="flex items-center justify-between"
			>

				<div>

					<div class="text-xl font-bold text-slate-900">

						<?php echo wp_kses_post( $product->get_price_html() ); ?>

					</div>

				</div>

				<?php

				echo apply_filters(

					'woocommerce_loop_add_to_cart_link',

					sprintf(

						'<a href="%s" data-quantity="1" class="%s">%s</a>',

						esc_url(
							$product->add_to_cart_url()
						),

						esc_attr(
							implode(
								' ',
								array_filter(
									array(
										'add_to_cart_button',
										'ajax_add_to_cart',
										'rounded-full',
										'bg-green-600',
										'px-5',
										'py-2',
										'font-semibold',
										'text-white',
										'transition',
										'hover:bg-green-700',
									)
								)
							)
						),

						'+ Add'

					),

					$product

				);

				?>

			</div>

		</div>

	</div>

</li>