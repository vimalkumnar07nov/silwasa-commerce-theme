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

<div class="swc-card group relative rounded">

	<?php get_template_part( 'template-parts/components/product-badge' ); ?>

	<a href="<?php the_permalink(); ?>">

		<div class="overflow-hidden bg-white">

			<?php

			if ( has_post_thumbnail() ) {

				the_post_thumbnail(

					'woocommerce_thumbnail',

					array(

						'class' => 'aspect-square mx-auto w-full object-contain',

						'loading' => 'lazy',

					)

				);

			} else {

				echo wc_placeholder_img( 'woocommerce_thumbnail' );

			}

			?>

		</div>

	</a>

	<div class="space-y-1 p-2">

		<?php get_template_part( 'template-parts/components/product-rating' ); ?>

		<h6 class="line-clamp-2 text-[13px] font-medium leading-5 text-slate-800"">

			<a href="<?php the_permalink(); ?>">

				<?php the_title(); ?>

			</a>

		</h6>

		<div class="text-xs text-slate-500">

			<?php

			$unit = get_post_meta(

				get_the_ID(),

				'_product_unit',

				true

			);

			echo esc_html( $unit ? $unit : '1 Pack' );

			?>

		</div>

		<div class="flex items-end justify-between pt-2">

			<?php get_template_part( 'template-parts/components/product-price' ); ?>

			<?php get_template_part( 'template-parts/components/product-add-button' ); ?>

		</div>

	</div>

</div>