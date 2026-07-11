<?php
/**
 * Flash Sale
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

// Get flash sale settings
$options = swc_flash_sale_settings();

if ( ! $options['enabled'] ) {
	return;
}

$end = strtotime( $options['end_date'] );

if ( time() > $end ) {
	return;
}
// end

$sale_ids = wc_get_product_ids_on_sale();

if ( empty( $sale_ids ) ) {
	return;
}

$args = array(
	'post_type'      => 'product',
	'post_status'    => 'publish',
	'post__in'       => $sale_ids,
	'posts_per_page' => 12,
	'orderby'        => 'post__in',
);

$flash_sale = new WP_Query( $args );
?>

<section class="py-14 bg-gradient-to-r from-red-50 via-orange-50 to-yellow-50">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">

    <div>

        <span class="inline-flex items-center gap-2 rounded-full bg-red-50 border border-red-100 px-3 py-1 text-xs font-medium text-red-600">

            ⚡ Flash Sale

        </span>

        <h2 class="mt-3 text-2xl lg:text-3xl font-semibold text-slate-900">

            <?php echo esc_html( $options['title'] ); ?>

        </h2>

        <p class="mt-1 text-sm text-slate-500">

            <?php echo esc_html( $options['description'] ); ?>

        </p>

    </div>

    <div class="flex flex-wrap items-center gap-2 lg:gap-3">

        <div
			class="flex items-center gap-2 rounded-xl border border-red-100 bg-red-50 px-3 h-9 lg:h-10">

			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-4 w-4 text-red-500"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M12 8v4l3 3M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/>

			</svg>

			<span class="hidden sm:inline text-xs text-red-600">

				Ends in

			</span>

			<div id="swc-flash-countdown"
				data-end="<?php echo esc_attr( $options['end_date'] ); ?>"
				class="flex items-center gap-1">

				<span id="flash-days" class="swc-count-box">00 d</span>
				<!-- <span class="text-red-400 text-xs">d</span> -->

				<span id="flash-hours" class="swc-count-box">00 h  </span>
				<!-- <span class="text-red-400 text-xs">h</span> -->

				<span id="flash-minutes" class="swc-count-box">00 m  </span>
				<!-- <span class="text-red-400 text-xs">m</span> -->

				<span id="flash-seconds" class="swc-count-box">00 s  </span>
				<!-- <span class="text-red-400 text-xs">s</span> -->

			</div>

		</div>

        <a
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
			class="inline-flex items-center justify-center h-9 lg:h-10 rounded-xl border border-slate-200 bg-white px-4 lg:px-5 text-sm font-medium text-slate-700 transition hover:border-green-600 hover:bg-green-600 hover:text-white">

			View All

			<svg
				xmlns="http://www.w3.org/2000/svg"
				class="ml-1.5 h-4 w-4"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor">

				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M9 5l7 7-7 7"/>

			</svg>

		</a>

    </div>

</div>

		<div class="relative">

			<button
				class="swc-carousel-prev hidden absolute left-0 top-1/2 z-20 -translate-x-5 -translate-y-1/2 rounded-full border border-slate-200 bg-white p-3 shadow-lg transition hover:bg-red-600 hover:text-white lg:flex">

				<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19L8 12L15 5"/>
				</svg>

			</button>

			<button
				class="swc-carousel-next absolute right-0 top-1/2 z-20 translate-x-5 -translate-y-1/2 rounded-full border border-slate-200 bg-white p-3 shadow-lg transition hover:bg-red-600 hover:text-white lg:flex">

				<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5L16 12L9 19"/>
				</svg>

			</button>

			<div class="swc-carousel overflow-x-auto no-scrollbar">

				<div class="swc-carousel-track flex gap-4">

					<?php
					while ( $flash_sale->have_posts() ) :
						$flash_sale->the_post();

						global $product;
						?>

						<div class="swc-carousel-item shrink-0 snap-start">

							<?php
							get_template_part(
								'template-parts/components/product-card'
							);
							?>

						</div>

					<?php endwhile; ?>

				</div>

			</div>

		</div>

	</div>

</section>

<?php wp_reset_postdata(); ?>