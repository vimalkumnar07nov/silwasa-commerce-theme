<?php
/**
 * Shop By Brand
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$brands = get_terms(
	array(
		'taxonomy'   => 'product_brand',
		'hide_empty' => true,
		'number'     => 12,
	)
);

if ( empty( $brands ) || is_wp_error( $brands ) ) {
	return;
}
?>

<section class="py-16 bg-white overflow-hidden">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="flex items-center justify-between mb-10">

			<div>

				<span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">

					Trusted Brands

				</span>

				<h2 class="mt-4 text-4xl font-black text-slate-900">

					Shop by Brand

				</h2>

				<p class="mt-3 text-slate-500">

					Discover your favourite grocery brands.

				</p>

			</div>

			<div class="hidden lg:flex gap-3">

				<button
					id="brand-prev"
					class="w-12 h-12 rounded-full border border-slate-200 bg-white hover:bg-green-600 hover:text-white transition">

					←

				</button>

				<button
					id="brand-next"
					class="w-12 h-12 rounded-full border border-slate-200 bg-white hover:bg-green-600 hover:text-white transition">

					→

				</button>

			</div>

		</div>

		<div
			id="brand-slider"
			class="flex gap-6 overflow-x-auto no-scrollbar scroll-smooth snap-x snap-mandatory pb-3">

			<?php foreach ( $brands as $brand ) :

				$image_id = get_term_meta(
					$brand->term_id,
					'thumbnail_id',
					true
				);

				$image = '';

				if ( $image_id ) {

					$image = wp_get_attachment_image_url(
						$image_id,
						'medium'
					);

				}

				?>

				<a

					href="<?php echo esc_url( get_term_link( $brand ) ); ?>"

					class="group min-w-[170px] snap-start"

				>

					<div
						class="rounded-3xl border border-slate-100 bg-slate-50 p-6 text-center transition duration-300 hover:-translate-y-2 hover:shadow-xl">

						<div
							class="mx-auto flex h-28 w-28 items-center justify-center overflow-hidden rounded-full bg-white shadow">

							<?php if ( $image ) : ?>

								<img

									src="<?php echo esc_url( $image ); ?>"

									alt="<?php echo esc_attr( $brand->name ); ?>"

									class="h-full w-full object-contain transition duration-300 group-hover:scale-110"

									loading="lazy">

							<?php else : ?>

								<div class="text-5xl">

									🏷️

								</div>

							<?php endif; ?>

						</div>

						<h3 class="mt-5 text-lg font-bold text-slate-900">

							<?php echo esc_html( $brand->name ); ?>

						</h3>

						<p class="mt-2 text-sm text-slate-500">

							<?php echo esc_html( $brand->count ); ?> Products

						</p>

					</div>

				</a>

			<?php endforeach; ?>

		</div>

	</div>

</section>