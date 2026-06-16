<?php
/**
 * Product Card Component
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! $product->is_visible() ) {
	return;
}

?>

<div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">

	<?php get_template_part( 'template-parts/components/product-badge' ); ?>

	<a href="<?php the_permalink(); ?>">

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

				echo wc_placeholder_img( 'woocommerce_thumbnail' );

			}

			?>

		</div>

	</a>

	<div class="space-y-3 p-5">

		<?php get_template_part( 'template-parts/components/product-rating' ); ?>

		<h3 class="line-clamp-2 text-lg font-semibold text-slate-800">

			<a href="<?php the_permalink(); ?>">

				<?php the_title(); ?>

			</a>

		</h3>

		<div class="text-sm text-slate-500">

			<?php

			$unit = get_post_meta(

				get_the_ID(),

				'_product_unit',

				true

			);

			echo esc_html( $unit ? $unit : '1 Pack' );

			?>

		</div>

		<div class="flex items-center justify-between pt-2">

			<?php get_template_part( 'template-parts/components/product-price' ); ?>

			<?php get_template_part( 'template-parts/components/product-add-button' ); ?>

		</div>

	</div>

</div>