<?php
/**
 * Promo Banner Section
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="py-14 bg-white">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6">

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

			<!-- Banner 01 -->

			<div class="group relative overflow-hidden rounded-3xl bg-gradient-to-r from-green-600 to-green-500 p-8 min-h-[260px]">

				<div class="absolute -right-10 -bottom-10 text-[180px] opacity-10">

					🥦

				</div>

				<div class="relative z-10 max-w-[280px]">

					<span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-xs font-semibold text-white backdrop-blur">

						FARM FRESH

					</span>

					<h3 class="mt-5 text-4xl font-black text-white leading-tight">

						Fresh Vegetables

					</h3>

					<p class="mt-4 text-green-100">

						Direct from local farms with same day delivery.

					</p>

					<a

						href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"

						class="inline-flex mt-8 rounded-full bg-white px-7 py-3 font-bold text-green-700 transition group-hover:scale-105">

						Shop Now →

					</a>

				</div>

			</div>

			<!-- Banner 02 -->

			<div class="group relative overflow-hidden rounded-3xl bg-gradient-to-r from-orange-500 to-yellow-400 p-8 min-h-[260px]">

				<div class="absolute -right-6 bottom-0 text-[170px] opacity-10">

					🍎

				</div>

				<div class="relative z-10 max-w-[280px]">

					<span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-xs font-semibold text-white">

						UP TO 40% OFF

					</span>

					<h3 class="mt-5 text-4xl font-black text-white">

						Fresh Fruits

					</h3>

					<p class="mt-4 text-yellow-100">

						Seasonal fruits selected every morning.

					</p>

					<a

						href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"

						class="inline-flex mt-8 rounded-full bg-white px-7 py-3 font-bold text-orange-600 transition group-hover:scale-105">

						Explore →

					</a>

				</div>

			</div>

			<!-- Banner 03 -->

			<div class="group relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 to-slate-700 p-8 min-h-[260px]">

				<div class="absolute -right-6 bottom-0 text-[170px] opacity-10">

					🥛

				</div>

				<div class="relative z-10 max-w-[280px]">

					<span class="inline-flex rounded-full bg-white/20 px-4 py-2 text-xs font-semibold text-white">

						DAILY ESSENTIALS

					</span>

					<h3 class="mt-5 text-4xl font-black text-white">

						Milk & Dairy

					</h3>

					<p class="mt-4 text-slate-300">

						Fresh milk, cheese, yogurt and butter.

					</p>

					<a

						href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"

						class="inline-flex mt-8 rounded-full bg-white px-7 py-3 font-bold text-slate-900 transition group-hover:scale-105">

						Buy Now →

					</a>

				</div>

			</div>

		</div>

	</div>

</section>