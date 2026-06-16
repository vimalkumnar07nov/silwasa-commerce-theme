<?php
/**
 * Search Overlay
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;
?>

<div
	id="swc-search-overlay"
	class="fixed inset-0 z-[9999] hidden bg-black/60 backdrop-blur-sm">

	<div
		class="absolute inset-0 overflow-y-auto">

		<div
			class="min-h-screen bg-white lg:max-w-[1100px] lg:mx-auto lg:my-10 lg:min-h-0 lg:rounded-3xl lg:shadow-2xl">

			<!-- Header -->

			<div
				class="sticky top-0 z-20 border-b border-slate-200 bg-white">

				<div
					class="flex items-center gap-4 p-4 lg:p-6">

					<div class="flex-1">

						<div
							class="flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">

							<svg
								class="ml-5 h-6 w-6 text-slate-400"
								fill="none"
								stroke="currentColor"
								viewBox="0 0 24 24">

								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									stroke-width="2"
									d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>

							</svg>

							<input

								id="swc-search-input"

								type="text"

								autocomplete="off"

								placeholder="Search vegetables, fruits, dairy, snacks..."

								class="w-full bg-transparent px-5 py-5 text-lg outline-none">

						</div>

					</div>

					<button

						id="swc-search-close"

						type="button"

						class="flex h-14 w-14 items-center justify-center rounded-2xl border border-slate-200 bg-white transition hover:bg-red-50 hover:text-red-600">

						✕

					</button>

				</div>

			</div>

			<!-- Popular Searches -->

			<div
				id="swc-search-popular"
				class="border-b border-slate-100 p-6">

				<h3 class="mb-5 text-xl font-bold text-slate-900">

					Popular Searches

				</h3>

				<div class="flex flex-wrap gap-3">

					<?php

					$popular = array(

						'Milk',
						'Eggs',
						'Apple',
						'Bread',
						'Rice',
						'Vegetables',
						'Cheese',
						'Juice',
						'Chocolate',
						'Coffee'

					);

					foreach ( $popular as $item ) :

					?>

						<button

							type="button"

							class="swc-search-tag rounded-full bg-slate-100 px-5 py-3 text-sm font-semibold transition hover:bg-green-600 hover:text-white"

							data-search="<?php echo esc_attr( $item ); ?>">

							<?php echo esc_html( $item ); ?>

						</button>

					<?php endforeach; ?>

				</div>

			</div>

			<!-- Loading -->

			<div

				id="swc-search-loading"

				class="hidden py-16 text-center">

				<div

					class="mx-auto h-12 w-12 animate-spin rounded-full border-4 border-slate-200 border-t-green-600">

				</div>

				<p class="mt-5 text-slate-500">

					Searching products...

				</p>

			</div>

			<!-- Empty -->

			<div

				id="swc-search-empty"

				class="hidden py-20 text-center">

				<div class="text-7xl">

					🔍

				</div>

				<h3 class="mt-6 text-3xl font-black text-slate-900">

					No Products Found

				</h3>

				<p class="mt-4 text-slate-500">

					Try another keyword or browse categories.

				</p>

			</div>

			<!-- Results -->

			<div

				id="swc-search-results"

				class="grid grid-cols-2 gap-5 p-5 lg:grid-cols-4 lg:p-8">

			</div>

		</div>

	</div>

</div>