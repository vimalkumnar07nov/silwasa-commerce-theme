<?php
/**
 * Product Card
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->get_id();

$regular_price = $product->get_regular_price();
$sale_price    = $product->get_sale_price();

$discount = 0;

if ( $regular_price && $sale_price && $regular_price > $sale_price ) {
	$discount = round(
		( ( $regular_price - $sale_price ) / $regular_price ) * 100
	);
}

?>

<li <?php wc_product_class( 'group list-none', $product ); ?>>

    <?php get_template_part( 'template-parts/components/product-card' ); ?>

</li>
