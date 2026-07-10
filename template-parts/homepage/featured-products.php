<?php
/**
 * Featured Products
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

$args = array(
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'posts_per_page' => 10,
	'meta_key'       => '_featured',
	'meta_value'     => 'yes',
);

$featured_products = new WP_Query( $args );

if ( ! $featured_products->have_posts() ) {

	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$featured_products = new WP_Query( $args );

}

?>

<section class="py-16 bg-slate-50">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="flex items-center justify-between mb-10">

			<div>

				<span class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

					⭐ Featured Collection

				</span>

				<h2 class="text-4xl font-black text-slate-900 mt-4">

					Featured Products

				</h2>

				<p class="text-slate-500 mt-3">

					Hand picked grocery products recommended for you.

				</p>

			</div>

			<a

				href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"

				class="hidden lg:inline-flex items-center gap-2 rounded-full bg-green-600 px-7 py-4 font-semibold text-white transition hover:bg-green-700">

				View All

				<span>→</span>

			</a>

		</div>

		<!-- <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5">

			<?php

			while ( $featured_products->have_posts() ) :

				$featured_products->the_post();

				global $product;

				get_template_part(
					'template-parts/components/product-card'
				);

			endwhile;

			wp_reset_postdata();

			?>

		</div>

		<div class="flex justify-center mt-10 lg:hidden">

			<a

				href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"

				class="inline-flex items-center rounded-full bg-green-600 px-8 py-4 font-semibold text-white hover:bg-green-700 transition">

				View All Products

			</a>

		</div> -->

		<div class="relative">

			<!-- Previous -->

			<button
				class="swc-carousel-prev hidden absolute left-0 top-1/2 z-20 hidden -translate-x-5 -translate-y-1/2 rounded-full border border-slate-200 bg-white p-3 shadow-lg transition hover:bg-green-600 hover:text-white lg:flex">

				←

			</button>

			<!-- Next -->

			<button
				class="swc-carousel-next absolute right-0 top-1/2 z-20 hidden translate-x-5 -translate-y-1/2 rounded-full border border-slate-200 bg-white p-3 shadow-lg transition hover:bg-green-600 hover:text-white lg:flex">

				→

			</button>

			<!-- Track -->

			<div
				class="swc-carousel overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar">

				<div class="swc-carousel-track flex gap-4">

					<?php

					while ( $featured_products->have_posts() ) :

						$featured_products->the_post();

						global $product;

						?>

						<div class="swc-carousel-item shrink-0 snap-start">

							<?php

							get_template_part(
								'template-parts/components/product-card'
							);

							?>

						</div>

					<?php

					endwhile;

					wp_reset_postdata();

					?>

				</div>

			</div>

		</div>

	</div>

</section>