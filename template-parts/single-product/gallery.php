<?php
/**
 * Product Gallery
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

$images = array();

$featured = get_post_thumbnail_id();

if ( $featured ) {
	$images[] = $featured;
}

$gallery = $product->get_gallery_image_ids();

if ( ! empty( $gallery ) ) {
	$images = array_merge( $images, $gallery );
}
?>

<div class="space-y-4">

	<!-- Mobile Carousel -->

	<div class="lg:hidden">

        <div
            id="swc-mobile-gallery"
            class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide">

            <?php foreach ( $images as $image_id ) : ?>

                <div class="min-w-full snap-center">

                    <div class="bg-white rounded-3xl p-4">

                        <?php

                        echo wp_get_attachment_image(
                            $image_id,
                            'large',
                            false,
                            array(
                                'class' => 'w-full h-auto object-contain'
                            )
                        );

                        ?>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

	<!-- Desktop Gallery -->

	<div class="hidden lg:block">

		<div
			id="swc-main-image"
			class="bg-white rounded-3xl p-8 shadow-sm">

			<img
				id="swc-product-main-image"
				src="<?php echo esc_url( wp_get_attachment_image_url( $featured, 'large' ) ); ?>"
				class="w-full h-auto object-contain"
				alt="">

		</div>

		<?php if ( count( $images ) > 1 ) : ?>

			<div class="grid grid-cols-6 gap-3 mt-4">

				<?php foreach ( $images as $image_id ) : ?>

					<button
						type="button"
						class="swc-gallery-thumb bg-white rounded-xl p-2 border border-slate-200 hover:border-green-500 transition"
						data-image="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'large' ) ); ?>">

						<?php

						echo wp_get_attachment_image(
							$image_id,
							'thumbnail',
							false,
							array(
								'class' => 'w-full h-14 object-contain'
							)
						);

						?>

					</button>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>

	</div>

</div>