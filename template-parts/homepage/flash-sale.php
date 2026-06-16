<?php
/**
 * Flash Sale Section
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 8,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
);

$flash_products = new WP_Query( $args );

if ( ! $flash_products->have_posts() ) {
	return;
}
?>

<section class="py-14 bg-[#FFF8F2] overflow-hidden">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-10">

			<div>

				<div class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold">

					🔥 Limited Time Offer

				</div>

				<h2 class="text-4xl font-black mt-4 text-slate-900">

					Flash Sale

				</h2>

				<p class="text-slate-500 mt-3">

					Best grocery deals available today.

				</p>

			</div>

			<div class="flex gap-4">

				<div class="bg-white rounded-2xl shadow px-5 py-4 text-center min-w-[80px]">

					<div id="flash-hours" class="text-3xl font-black text-red-500">

						12

					</div>

					<div class="text-xs uppercase text-slate-500">

						Hours

					</div>

				</div>

				<div class="bg-white rounded-2xl shadow px-5 py-4 text-center min-w-[80px]">

					<div id="flash-minutes" class="text-3xl font-black text-red-500">

						00

					</div>

					<div class="text-xs uppercase text-slate-500">

						Minutes

					</div>

				</div>

				<div class="bg-white rounded-2xl shadow px-5 py-4 text-center min-w-[80px]">

					<div id="flash-seconds" class="text-3xl font-black text-red-500">

						00

					</div>

					<div class="text-xs uppercase text-slate-500">

						Seconds

					</div>

				</div>

			</div>

		</div>

		<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-5">

			<?php

			while ( $flash_products->have_posts() ) :

				$flash_products->the_post();

				global $product;

				get_template_part(
					'template-parts/components/product-card'
				);

			endwhile;

			wp_reset_postdata();

			?>

		</div>

	</div>

</section>