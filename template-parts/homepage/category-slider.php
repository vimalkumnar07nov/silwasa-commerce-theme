<?php
/**
 * Homepage Category Slider
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$product_categories = get_terms(
	array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'number'     => 12,
		'parent'     => 0,
	)
);

if ( empty( $product_categories ) || is_wp_error( $product_categories ) ) {
	return;
}
?>

<section id="categories" class="py-10 bg-white">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="flex items-center justify-between mb-8">

			<div>

				<h2 class="text-3xl font-bold text-slate-900">

					Shop by Category

				</h2>

				<p class="text-slate-500 mt-2">

					Fresh groceries delivered to your doorstep.

				</p>

			</div>

			<div class="hidden lg:flex gap-3">

				<button
					id="swc-category-prev"
					class="w-11 h-11 rounded-full border border-slate-200 bg-white hover:bg-green-600 hover:text-white transition">

					←

				</button>

				<button
					id="swc-category-next"
					class="w-11 h-11 rounded-full border border-slate-200 bg-white hover:bg-green-600 hover:text-white transition">

					→

				</button>

			</div>

		</div>

		<div
			id="swc-category-slider"
			class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory no-scrollbar">

			<?php foreach ( $product_categories as $category ) :

				$thumbnail_id = get_term_meta(
					$category->term_id,
					'thumbnail_id',
					true
				);

				$image = '';

				if ( $thumbnail_id ) {

					$image = wp_get_attachment_image_url(
						$thumbnail_id,
						'medium'
					);

				}

				?>

				<a

					href="<?php echo esc_url( get_term_link( $category ) ); ?>"

					class="group min-w-[120px] lg:min-w-[150px] snap-start"

				>

					<div
						class="bg-slate-50 rounded-3xl p-5 text-center transition duration-300 hover:bg-green-50 hover:-translate-y-2">

						<div
							class="w-24 h-24 lg:w-28 lg:h-28 rounded-full bg-white mx-auto shadow-sm flex items-center justify-center overflow-hidden">

							<?php if ( $image ) : ?>

								<img

									src="<?php echo esc_url( $image ); ?>"

									alt="<?php echo esc_attr( $category->name ); ?>"

									class="w-full h-full object-cover transition duration-300 group-hover:scale-110"

									loading="lazy">

							<?php else : ?>

								<div class="text-5xl">

									🥬

								</div>

							<?php endif; ?>

						</div>

						<h3
							class="mt-5 text-base font-semibold text-slate-800 line-clamp-2">

							<?php echo esc_html( $category->name ); ?>

						</h3>

						<p class="text-sm text-slate-500 mt-2">

							<?php echo esc_html( $category->count ); ?> Products

						</p>

					</div>

				</a>

			<?php endforeach; ?>

		</div>

	</div>

</section>