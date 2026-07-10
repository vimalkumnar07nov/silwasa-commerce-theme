<?php
/**
 * Single Product
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :

	the_post();

	global $product;

	?>

	<section class="bg-slate-50 py-8">

		<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

			<nav class="mb-6 text-sm text-slate-500">

				<?php woocommerce_breadcrumb(); ?>

			</nav>

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

				<?php
				get_template_part(
					'template-parts/single-product/gallery'
				);
				?>

				<?php
				get_template_part(
					'template-parts/single-product/summary'
				);
				?>

			</div>

			<?php
			get_template_part(
				'template-parts/single-product/tabs'
			);
			?>

			<?php
			get_template_part(
				'template-parts/single-product/related'
			);
			?>

		</div>

	</section>

	<?php

endwhile;

get_footer();