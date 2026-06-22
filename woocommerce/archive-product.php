<?php
/**
 * Premium AJAX Shop Archive
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="bg-slate-50 min-h-screen py-8">

    <div class="max-w-[1440px] mx-auto px-4 lg:px-6">

        <?php

        if ( function_exists( 'woocommerce_breadcrumb' ) ) {

            woocommerce_breadcrumb();

        }

        ?>

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- ===========================================
            Sidebar
            ============================================ -->

            <aside class="hidden lg:block w-[300px] flex-shrink-0">

                <?php

                get_template_part(

                    'template-parts/shop/sidebar'

                );

                ?>

            </aside>

            <!-- ===========================================
            Shop Content
            ============================================ -->

            <main class="flex-1 min-w-0">

                <?php

                get_template_part(

                    'template-parts/shop/toolbar'

                );

                ?>

                <?php

                get_template_part(

                    'template-parts/shop/active-filters'

                );

                ?>

                <div
                    id="swc-shop-container"
                    class="relative mt-6"
                >

                    <?php

                    get_template_part(

                        'template-parts/shop/product-grid'

                    );

                    ?>

                </div>

            </main>

        </div>

    </div>

</section>

<!-- ===========================================
Mobile Filters
=========================================== -->

<div
    id="swc-mobile-filters"
    class="fixed inset-0 bg-black/40 z-50 hidden lg:hidden"
>

    <div
        class="absolute right-0 top-0 h-full w-[320px] bg-white overflow-y-auto shadow-xl"
    >

        <div class="flex items-center justify-between p-5 border-b">

            <h3 class="text-lg font-bold">

                Filters

            </h3>

            <button
                id="swc-close-mobile-filters"
                class="text-2xl"
            >

                ✕

            </button>

        </div>

        <div class="p-5">

            <?php

            get_template_part(

                'template-parts/shop/sidebar'

            );

            ?>

        </div>

    </div>

</div>

<?php

get_footer();