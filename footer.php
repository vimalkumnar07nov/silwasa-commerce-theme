<?php
/**
 * Footer
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<?php get_template_part( 'template-parts/layout/footer-widgets' ); ?>

<?php
/*
|--------------------------------------------------------------------------
| Global Components
|--------------------------------------------------------------------------
| These components are available site-wide and stay hidden until activated.
*/

get_template_part( 'template-parts/components/search-overlay' );

?>

<!-- Mobile Navigation -->
<?php get_template_part( 'template-parts/layout/mobile-navigation' ); ?>


<?php wp_footer(); ?>

</body>

</html>