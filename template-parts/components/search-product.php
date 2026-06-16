<?php
/**
 * AJAX Search Product Card
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$product_id = $product->get_id();

$image = get_the_post_thumbnail_url(
	$product_id,
	'woocommerce_thumbnail'
);

if ( ! $image ) {

	$image = wc_placeholder_img_src();

}

$price = $product->get_price_html();

$categories = wc_get_product_category_list(
	$product_id,
	', '
);

$rating = $product->get_average_rating();

?>

<div

	class="group overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">

	<a

		href="<?php the_permalink(); ?>"

		class="block">

		<div

			class="relative bg-slate-50 p-5">

			<img

				src="<?php echo esc_url( $image ); ?>"

				alt="<?php the_title_attribute(); ?>"

				class="mx-auto h-36 w-36 object-contain transition duration-300 group-hover:scale-110"

				loading="lazy">

		</div>

	</a>

	<div class="p-5">

		<?php if ( $categories ) : ?>

			<div

				class="mb-2 text-xs font-semibold uppercase tracking-wide text-green-600">

				<?php

				echo wp_strip_all_tags(
					$categories
				);

				?>

			</div>

		<?php endif; ?>

		<h3

			class="min-h-[52px] text-lg font-bold leading-6 text-slate-900">

			<a

				href="<?php the_permalink(); ?>"

				class="transition hover:text-green-600">

				<?php the_title(); ?>

			</a>

		</h3>

		<?php if ( wc_review_ratings_enabled() ) : ?>

			<div class="mt-3 flex items-center gap-2">

				<div class="text-yellow-400">

					★★★★★

				</div>

				<span class="text-sm text-slate-500">

					<?php

					echo number_format(
						(float) $rating,
						1
					);

					?>

				</span>

			</div>

		<?php endif; ?>

		<div

			class="mt-5 flex items-center justify-between">

			<div

				class="text-xl font-black text-slate-900">

				<?php

				echo wp_kses_post(
					$price
				);

				?>

			</div>

			<?php

			woocommerce_template_loop_add_to_cart();

			?>

		</div>

	</div>

</div>