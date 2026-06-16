<?php
/**
 * Homepage Hero Section
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="relative bg-[#f6fbf3] overflow-hidden">

    <div class="max-w-[1440px] mx-auto px-4 lg:px-6 py-8 lg:py-10">

        <div class="grid lg:grid-cols-12 gap-6 items-stretch">

            <!-- =======================================
            LEFT HERO
            ======================================== -->

            <div class="lg:col-span-8">

                <div
                    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-green-600 via-green-500 to-lime-400 p-8 lg:p-12 text-white h-full">

                    <div class="absolute right-0 top-0 opacity-10">

                        <svg width="420" height="420" fill="none">

                            <circle cx="220" cy="180" r="180" fill="white"/>

                        </svg>

                    </div>

                    <div class="relative z-10 max-w-[600px]">

                        <span class="inline-flex items-center rounded-full bg-white/20 px-4 py-2 text-sm font-semibold backdrop-blur">

                            🚚 Grocery Delivered in 15 Minutes

                        </span>

                        <h1 class="mt-6 text-4xl lg:text-6xl font-black leading-tight">

                            Fresh Grocery

                            <span class="block text-yellow-200">

                                Delivered

                            </span>

                            To Your Door

                        </h1>

                        <p class="mt-6 text-lg text-green-50">

                            Shop vegetables, fruits, dairy, bakery, snacks,
                            beverages and household essentials from trusted
                            local stores.

                        </p>

                        <!-- Search -->

                        <div class="mt-8">

                            <form action="<?php echo esc_url(home_url('/shop')); ?>">

                                <div
                                    class="flex overflow-hidden rounded-full bg-white shadow-xl">

                                    <input

                                        type="text"

                                        name="s"

                                        placeholder="Search for products..."

                                        class="w-full px-6 py-5 text-black outline-none">

                                    <input

                                        type="hidden"

                                        name="post_type"

                                        value="product">

                                    <button

                                        class="bg-black px-8 font-semibold hover:bg-gray-800 transition">

                                        Search

                                    </button>

                                </div>

                            </form>

                        </div>

                        <!-- Buttons -->

                        <div class="mt-8 flex flex-wrap gap-4">

                            <a

                                href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"

                                class="rounded-full bg-white text-green-700 px-8 py-4 font-bold hover:scale-105 transition">

                                Shop Now

                            </a>

                            <a

                                href="#categories"

                                class="rounded-full border border-white px-8 py-4 font-semibold hover:bg-white hover:text-green-700 transition">

                                Browse Categories

                            </a>

                        </div>

                        <!-- Features -->

                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-10">

                            <div>

                                <div class="text-2xl">

                                    🥬

                                </div>

                                <div class="mt-2 font-semibold">

                                    Farm Fresh

                                </div>

                            </div>

                            <div>

                                <div class="text-2xl">

                                    🚚

                                </div>

                                <div class="mt-2 font-semibold">

                                    Free Delivery

                                </div>

                            </div>

                            <div>

                                <div class="text-2xl">

                                    ⭐

                                </div>

                                <div class="mt-2 font-semibold">

                                    Premium Quality

                                </div>

                            </div>

                            <div>

                                <div class="text-2xl">

                                    💳

                                </div>

                                <div class="mt-2 font-semibold">

                                    Secure Payment

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- =======================================
            RIGHT SIDE
            ======================================== -->

            <div class="lg:col-span-4 flex flex-col gap-6">

                <!-- Card 1 -->

                <div
                    class="rounded-3xl bg-[#FFF8E8] p-8 flex-1 relative overflow-hidden">

                    <div class="absolute right-0 bottom-0 text-[130px] opacity-10">

                        🍎

                    </div>

                    <div class="relative z-10">

                        <span
                            class="inline-flex rounded-full bg-red-500 text-white px-3 py-1 text-xs font-bold">

                            UP TO 40% OFF

                        </span>

                        <h3 class="mt-5 text-3xl font-black text-slate-900">

                            Fresh Fruits

                        </h3>

                        <p class="mt-3 text-slate-600">

                            Hand picked seasonal fruits from local farms.

                        </p>

                        <a

                            href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"

                            class="mt-6 inline-block rounded-full bg-black text-white px-6 py-3 font-semibold">

                            Shop Fruits

                        </a>

                    </div>

                </div>

                <!-- Card 2 -->

                <div
                    class="rounded-3xl bg-[#E9F9F1] p-8 flex-1 relative overflow-hidden">

                    <div class="absolute right-0 bottom-0 text-[130px] opacity-10">

                        🥛

                    </div>

                    <div class="relative z-10">

                        <span
                            class="inline-flex rounded-full bg-green-600 text-white px-3 py-1 text-xs font-bold">

                            DAILY ESSENTIALS

                        </span>

                        <h3 class="mt-5 text-3xl font-black text-slate-900">

                            Milk & Dairy

                        </h3>

                        <p class="mt-3 text-slate-600">

                            Fresh milk, cheese, butter and yogurt delivered.

                        </p>

                        <a

                            href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"

                            class="mt-6 inline-block rounded-full bg-green-600 text-white px-6 py-3 font-semibold">

                            Explore

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>