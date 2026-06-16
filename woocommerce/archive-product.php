<?php
/**
 * Shop Archive
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

do_action( 'woocommerce_before_main_content' );
?>

<section class="swc-shop-page py-8 bg-slate-50 min-h-screen">

    <div class="max-w-[1440px] mx-auto px-4 lg:px-6">

        <?php do_action( 'woocommerce_shop_loop_header' ); ?>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Sidebar -->

            <aside class="hidden lg:block w-[280px] flex-shrink-0">

                <div class="bg-white rounded-2xl p-6 shadow-sm sticky top-32">

                    <h3 class="text-lg font-bold mb-6">
                        Filters
                    </h3>

                    <?php
                    if ( is_active_sidebar( 'shop-sidebar' ) ) {

                        dynamic_sidebar( 'shop-sidebar' );

                    } else {
                    ?>

                        <div class="space-y-4">

                            <div>

                                <h4 class="font-semibold mb-2">
                                    Categories
                                </h4>

                                <?php

                                wp_list_categories(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'title_li' => '',
                                        'show_count' => true,
                                    )
                                );

                                ?>

                            </div>

                        </div>

                    <?php
                    }
                    ?>

                </div>

            </aside>

            <!-- Content -->

            <div class="flex-1">

                <div class="bg-white rounded-2xl p-5 shadow-sm mb-6">

                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                        <div>

                            <?php woocommerce_output_all_notices(); ?>

                            <?php woocommerce_result_count(); ?>

                        </div>

                        <div>

                            <?php woocommerce_catalog_ordering(); ?>

                        </div>

                    </div>

                </div>

                <?php if ( woocommerce_product_loop() ) : ?>

                    <?php woocommerce_product_loop_start(); ?>

                    <?php

                    while ( have_posts() ) :

                        the_post();

                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part(
                            'content',
                            'product'
                        );

                    endwhile;

                    ?>

                    <?php woocommerce_product_loop_end(); ?>

                    <div class="mt-10">

                        <?php woocommerce_pagination(); ?>

                    </div>

                <?php else : ?>

                    <div class="bg-white rounded-2xl p-20 text-center shadow-sm">

                        <h2 class="text-2xl font-bold mb-4">

                            No Products Found

                        </h2>

                        <p class="text-slate-500">

                            Try another category or search keyword.

                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php

do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );