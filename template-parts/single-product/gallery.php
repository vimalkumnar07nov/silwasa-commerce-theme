<?php
/**
 * Product Gallery
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

$product_id = $product->get_id();

$main_image = get_post_thumbnail_id();

$gallery_ids = $product->get_gallery_image_ids();

$images = array();

if ( $main_image ) {
	$images[] = $main_image;
}

if ( ! empty( $gallery_ids ) ) {
	$images = array_merge(
		$images,
		$gallery_ids
	);
}
?>

<div class="space-y-4">

	<div
		id="swc-main-image"
		class="bg-white rounded-3xl p-6 shadow-sm overflow-hidden">

		<?php

		if ( $main_image ) {

			echo wp_get_attachment_image(
				$main_image,
				'large',
				false,
				array(
					'class' => 'w-full h-auto object-contain'
				)
			);

		} else {

			echo wc_placeholder_img();

		}

		?>

	</div>

	<?php if ( count( $images ) > 1 ) : ?>

		<div class="grid grid-cols-5 gap-3">

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
							'class' => 'w-full h-16 object-contain'
						)
					);

					?>

				</button>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

</div>