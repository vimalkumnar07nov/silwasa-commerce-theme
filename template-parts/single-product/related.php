<?php
/**
 * Related Products
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

$related_ids = wc_get_related_products(
	$product->get_id(),
	12
);

if ( empty( $related_ids ) ) {
	return;
}

$query = new WP_Query(
	array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'post__in'       => $related_ids,
		'orderby'        => 'post__in',
		'posts_per_page' => 12,
	)
);

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="mt-16">

	<div class="flex items-center justify-between mb-6">

		<h2 class="text-lg lg:text-xl font-black text-slate-900">

			Related Products

		</h2>

	</div>

	<div class="relative">

        <button
            type="button"
            id="swc-related-prev"
            class="absolute left-0 top-1/2 z-20 hidden -translate-y-1/2 rounded-full bg-white shadow-lg p-3 lg:flex">

            ←

        </button>

        <button
            type="button"
            id="swc-related-next"
            class="absolute right-0 top-1/2 z-20 hidden -translate-y-1/2 rounded-full bg-white shadow-lg p-3 lg:flex">

            →

        </button>

        <div
            id="swc-related-slider"
            class="flex gap-3 overflow-x-auto scroll-smooth pb-4 scrollbar-hide">

            <?php while ( $query->have_posts() ) : ?>

                <?php

                $query->the_post();

                global $product;

                ?>

                <div
                    class="flex-shrink-0 snap-start w-[40%] sm:w-[30%] md:w-[24%] lg:w-[16%] xl:w-[15.5%]">

                    <?php

                    get_template_part(
                        'template-parts/components/product-card'
                    );

                    ?>

                </div>

            <?php endwhile; ?>

        </div>
    </div>

</section>

<?php
wp_reset_postdata();
?>