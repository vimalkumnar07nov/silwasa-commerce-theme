<?php
/**
 * Product Loop End
 *
 * @package SilwasaCommerceTheme
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit;

?>

</ul>

<div class="swc-loop-bottom mt-8">

	<div class="flex justify-center">

		<div
			id="swc-load-more-container"
			class="hidden"
		>

			<button
				id="swc-load-more"
				type="button"
				class="inline-flex items-center gap-2 rounded-full border border-green-600 bg-white px-8 py-3 text-sm font-semibold text-green-600 transition-all duration-300 hover:bg-green-600 hover:text-white"
			>

				<svg
					class="h-5 w-5"
					fill="none"
					stroke="currentColor"
					stroke-width="2"
					viewBox="0 0 24 24"
					xmlns="http://www.w3.org/2000/svg"
				>

					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M12 4v16m8-8H4"
					/>

				</svg>

				Load More Products

			</button>

		</div>

	</div>

	<div
		id="swc-loading-spinner"
		class="hidden justify-center py-10"
	>

		<div
			class="h-10 w-10 animate-spin rounded-full border-4 border-slate-200 border-t-green-600"
		></div>

	</div>

</div>