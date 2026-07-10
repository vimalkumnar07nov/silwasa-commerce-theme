<?php
/**
 * Homepage Hero Section
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="relative overflow-hidden bg-[#F7FAF5]">

    <div class="mx-auto max-w-[1440px] px-2 py-6 lg:px-6 lg:py-3">

        <div class="grid gap-6 lg:grid-cols-12">

            <!-- =====================================
            LEFT HERO SLIDER
            ====================================== -->

            <div class="lg:col-span-8">

                <div class="relative h-[360px] overflow-hidden rounded-3xl lg:h-[500px]">

                    <!-- Slides -->

                    <div id="swc-hero-slider" class="relative h-full w-full overflow-hidden">

                        <!-- =====================================
                        Slide 1
                        ====================================== -->

                        <div class="swc-hero-slide absolute inset-0 hidden opacity-0 transition-all duration-700 ease-in-out flex h-full w-full items-center bg-gradient-to-r from-green-700 via-green-600 to-lime-500 px-8 lg:px-14">

                            <div class="grid w-full items-center gap-8 lg:grid-cols-2">

                                <div class="text-white">

                                    <span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-sm font-semibold backdrop-blur">

                                        Fresh Everyday

                                    </span>

                                    <h1 class="mt-6 text-4xl font-black leading-tight lg:text-6xl">

                                        Fresh Fruits

                                        <span class="block text-yellow-300">

                                            Up To 40% OFF

                                        </span>

                                    </h1>

                                    <p class="mt-5 max-w-md text-base text-green-50 lg:text-lg">

                                        Hand-picked seasonal fruits delivered
                                        fresh from local farms.

                                    </p>

                                    <div class="mt-8 flex gap-4">

                                        <a
                                            href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                                            class="inline-flex h-12 items-center rounded-full bg-white px-7 font-bold text-green-700 transition hover:scale-105">

                                            Shop Now

                                        </a>

                                    </div>

                                </div>

                                <div class="hidden justify-center lg:flex">

                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-apple-group.png' ); ?>"
                                        alt="hero-apple-group"
                                        class="max-h-[420px] object-contain">

                                </div>

                            </div>

                        </div>

                        <!-- =====================================
                        Slide 2
                        ====================================== -->

                        <div class="swc-hero-slide absolute inset-0 hidden h-full w-full items-center bg-gradient-to-r from-orange-500 via-amber-500 to-yellow-400 px-8 lg:px-14">

                            <div class="grid w-full items-center gap-8 lg:grid-cols-2">

                                <div class="text-white">

                                    <span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-sm font-semibold backdrop-blur">

                                        Daily Grocery

                                    </span>

                                    <h2 class="mt-6 text-4xl font-black leading-tight lg:text-6xl">

                                        Everything

                                        <span class="block">

                                            You Need

                                        </span>

                                    </h2>

                                    <p class="mt-5 max-w-md text-base lg:text-lg">

                                        Grocery, snacks, beverages and household
                                        essentials at amazing prices.

                                    </p>

                                    <div class="mt-8">

                                        <a
                                            href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                                            class="inline-flex h-12 items-center rounded-full bg-black px-7 font-bold text-white">

                                            Shop Grocery

                                        </a>

                                    </div>

                                </div>

                                <div class="hidden justify-center lg:flex">

                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-grocery.png' ); ?>"
                                        alt="Grocery"
                                        class="max-h-[420px] object-contain">

                                </div>

                            </div>

                        </div>

                        <!-- =====================================
                        Slide 3
                        ====================================== -->

                        <div class="swc-hero-slide absolute inset-0 hidden h-full w-full items-center bg-gradient-to-r from-emerald-700 via-green-600 to-lime-500 px-8 lg:px-14">

                            <div class="grid w-full items-center gap-8 lg:grid-cols-2">

                                <div class="text-white">

                                    <span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-sm font-semibold backdrop-blur">

                                        Farm Fresh

                                    </span>

                                    <h2 class="mt-6 text-4xl font-black leading-tight lg:text-6xl">

                                        Fresh

                                        <span class="block text-lime-200">

                                            Vegetables

                                        </span>

                                    </h2>

                                    <p class="mt-5 max-w-md text-base lg:text-lg">

                                        Fresh vegetables sourced directly from
                                        trusted local farmers every morning.

                                    </p>

                                    <div class="mt-8">

                                        <a
                                            href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                                            class="inline-flex h-12 items-center rounded-full bg-white px-7 font-bold text-green-700 transition hover:scale-105">

                                            Shop Vegetables

                                        </a>

                                    </div>

                                </div>

                                <div class="hidden justify-center lg:flex">

                                    <img
                                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-vegetables.png' ); ?>"
                                        alt="hero-vegetables"
                                        class="max-h-[420px] object-contain">

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- =====================================
                    Slider Navigation
                    ====================================== -->

                    <button
                        id="swc-hero-prev"
                        class="absolute left-5 top-1/2 z-20 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-xl shadow-lg transition hover:bg-white lg:flex">

                        ←

                    </button>

                    <button
                        id="swc-hero-next"
                        class="absolute right-5 top-1/2 z-20 hidden h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-xl shadow-lg transition hover:bg-white lg:flex">

                        →

                    </button>

                    <!-- Dots -->

                    <div class="absolute bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-3">

                        <button class="swc-hero-dot h-2.5 w-8 rounded-full bg-white"></button>

                        <button class="swc-hero-dot h-2.5 w-2.5 rounded-full bg-white/50"></button>

                        <button class="swc-hero-dot h-2.5 w-2.5 rounded-full bg-white/50"></button>

                    </div>

                </div>

            </div>

            <!-- =====================================
            RIGHT PROMO CARDS
            ====================================== -->

            <div class="flex flex-col gap-4 lg:col-span-4">

                <!-- Fruits -->

                <a
                    href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                    class="group relative flex flex-1 items-center overflow-hidden rounded-2xl bg-gradient-to-r from-orange-50 to-yellow-100 p-6 transition hover:-translate-y-1 hover:shadow-lg">

                    <div>

                        <span class="rounded-full bg-red-500 px-3 py-1 text-xs font-bold text-white">

                            UP TO 40% OFF

                        </span>

                        <h3 class="mt-3 text-2xl font-black text-slate-900">

                            Fresh Fruits

                        </h3>

                        <p class="mt-1 text-sm text-slate-600">

                            Seasonal & Imported

                        </p>

                    </div>

                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-apple.png' ); ?>"
                        alt="Fresh Fruits"
                        class="absolute bottom-0 right-2 h-28 transition duration-300 group-hover:scale-110">

                </a>

                <!-- Dairy -->

                <a
                    href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                    class="group relative flex flex-1 items-center overflow-hidden rounded-2xl bg-gradient-to-r from-green-50 to-emerald-100 p-6 transition hover:-translate-y-1 hover:shadow-lg">

                    <div>

                        <span class="rounded-full bg-green-600 px-3 py-1 text-xs font-bold text-white">

                            DAILY FRESH

                        </span>

                        <h3 class="mt-3 text-2xl font-black text-slate-900">

                            Milk & Dairy

                        </h3>

                        <p class="mt-1 text-sm text-slate-600">

                            Fresh Every Morning

                        </p>

                    </div>

                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-milk.png' ); ?>"
                        alt="Milk & Dairy"
                        class="absolute bottom-0 right-2 h-28 transition duration-300 group-hover:scale-110">

                </a>

                <!-- Vegetables -->

                <a
                    href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"
                    class="group relative flex flex-1 items-center overflow-hidden rounded-2xl bg-gradient-to-r from-lime-50 to-green-100 p-6 transition hover:-translate-y-1 hover:shadow-lg">

                    <div>

                        <span class="rounded-full bg-lime-600 px-3 py-1 text-xs font-bold text-white">

                            FARM PICKED

                        </span>

                        <h3 class="mt-3 text-2xl font-black text-slate-900">

                            Fresh Vegetables

                        </h3>

                        <p class="mt-1 text-sm text-slate-600">

                            100% Farm Fresh

                        </p>

                    </div>

                    <img
                        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-red-shimala-mirch.png' ); ?>"
                        alt="hero-red-shimala-mirch"
                        class="absolute bottom-0 right-2 h-28 transition duration-300 group-hover:scale-110">

                </a>

            </div>

        </div>

    </div>

</section>

<!-- ==========================================================
Feature Strip
=========================================================== -->

<section class="bg-white py-1 lg:py-5">

    <div class="mx-auto max-w-[1440px] px-4 lg:px-6">

        <div class="swc-feature-strip">

            <!-- Farm Fresh -->

            <div class="swc-feature-card group">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-2xl">

                    🥬

                </div>

                <div>

                    <h4 class="text-sm font-bold text-slate-900">

                        Farm Fresh

                    </h4>

                    <p class="mt-1 text-xs text-slate-500">

                        Fresh from local farms

                    </p>

                </div>

            </div>

            <!-- Free Delivery -->

            <div class="swc-feature-card group">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-2xl">

                    🚚

                </div>

                <div>

                    <h4 class="text-sm font-bold text-slate-900">

                        Free Delivery

                    </h4>

                    <p class="mt-1 text-xs text-slate-500">

                        On eligible orders

                    </p>

                </div>

            </div>

            <!-- Premium Quality -->

            <div class="swc-feature-card group">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-100 text-2xl">

                    ⭐

                </div>

                <div>

                    <h4 class="text-sm font-bold text-slate-900">

                        Premium Quality

                    </h4>

                    <p class="mt-1 text-xs text-slate-500">

                        Carefully selected products

                    </p>

                </div>

            </div>

            <!-- Secure Payment -->

            <div class="swc-feature-card group">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl">

                    💳

                </div>

                <div>

                    <h4 class="text-sm font-bold text-slate-900">

                        Secure Payment

                    </h4>

                    <p class="mt-1 text-xs text-slate-500">

                        100% Safe Checkout

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>