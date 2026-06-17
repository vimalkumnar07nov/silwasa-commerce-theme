<?php
/**
 * Premium Product Grid
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

if ( have_posts() ) :

?>

<div
	id="swc-product-grid"
	class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-4">

	<?php

	while ( have_posts() ) :

		the_post();

		wc_get_template_part(
			'content',
			'product'
		);

	endwhile;

	?>

</div>

<div
	id="swc-pagination"
	class="mt-10 flex items-center justify-center">

	<?php

	echo wp_kses_post(

		paginate_links(

			array(

				'prev_text' => '←',

				'next_text' => '→',

				'type' => 'list',

			)

		)

	);

	?>

</div>

<?php

else :

	get_template_part(
		'template-parts/shop/empty-state'
	);

endif;

?>