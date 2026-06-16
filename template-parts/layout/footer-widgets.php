<?php
/**
 * Premium Footer
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<footer class="bg-slate-950 text-white">

	<div class="max-w-[1440px] mx-auto px-4 lg:px-6 py-16">

		<div class="grid lg:grid-cols-5 md:grid-cols-2 gap-10">

			<!-- Logo -->

			<div>

				<a href="<?php echo esc_url( home_url() ); ?>">

					<div class="text-4xl font-black text-green-400">

						Grocery<span class="text-white">Mart</span>

					</div>

				</a>

				<p class="mt-6 text-slate-400 leading-7">

					Fresh groceries, daily essentials and household products delivered quickly with premium service and trusted quality.

				</p>

				<div class="flex gap-4 mt-8">

					<a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center hover:bg-green-600 transition">

						F

					</a>

					<a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center hover:bg-green-600 transition">

						I

					</a>

					<a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center hover:bg-green-600 transition">

						X

					</a>

					<a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center hover:bg-green-600 transition">

						Y

					</a>

				</div>

			</div>

			<!-- Shop -->

			<div>

				<h3 class="text-xl font-bold mb-6">

					Shop

				</h3>

				<ul class="space-y-4 text-slate-400">

					<li><a href="/shop/" class="hover:text-green-400">All Products</a></li>

					<li><a href="#">Fresh Fruits</a></li>

					<li><a href="#">Vegetables</a></li>

					<li><a href="#">Dairy & Milk</a></li>

					<li><a href="#">Bakery</a></li>

				</ul>

			</div>

			<!-- Company -->

			<div>

				<h3 class="text-xl font-bold mb-6">

					Company

				</h3>

				<ul class="space-y-4 text-slate-400">

					<li><a href="#">About Us</a></li>

					<li><a href="#">Contact</a></li>

					<li><a href="#">Blog</a></li>

					<li><a href="#">Privacy Policy</a></li>

					<li><a href="#">Terms</a></li>

				</ul>

			</div>

			<!-- Customer -->

			<div>

				<h3 class="text-xl font-bold mb-6">

					Customer Care

				</h3>

				<ul class="space-y-4 text-slate-400">

					<li><a href="#">My Account</a></li>

					<li><a href="#">Orders</a></li>

					<li><a href="#">Wishlist</a></li>

					<li><a href="#">Returns</a></li>

					<li><a href="#">Support</a></li>

				</ul>

			</div>

			<!-- Contact -->

			<div>

				<h3 class="text-xl font-bold mb-6">

					Contact

				</h3>

				<div class="space-y-5 text-slate-400">

					<div>

						<div class="text-white font-semibold">

							Phone

						</div>

						<div>

							+1 (555) 123-4567

						</div>

					</div>

					<div>

						<div class="text-white font-semibold">

							Email

						</div>

						<div>

							support@grocerymart.com

						</div>

					</div>

					<div>

						<div class="text-white font-semibold">

							Delivery

						</div>

						<div>

							Open 24/7

						</div>

					</div>

				</div>

			</div>

		</div>

		<hr class="border-slate-800 my-12">

		<div class="flex flex-col lg:flex-row justify-between items-center gap-6">

			<div class="text-slate-400 text-sm">

				© <?php echo date('Y'); ?>

				GroceryMart.

				All Rights Reserved.

			</div>

			<div class="flex flex-wrap gap-6 text-slate-400 text-sm">

				<a href="#" class="hover:text-green-400">

					Privacy

				</a>

				<a href="#" class="hover:text-green-400">

					Cookies

				</a>

				<a href="#" class="hover:text-green-400">

					Shipping

				</a>

				<a href="#" class="hover:text-green-400">

					Returns

				</a>

			</div>

		</div>

	</div>

</footer>