<?php
/**
 * Search Trigger
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<button

	id="swc-open-search"

	type="button"

	class="group flex h-12 md:h-14 w-full items-center rounded-full border border-slate-200 bg-slate-100 px-4 md:px-5 transition hover:border-green-500 hover:bg-white">

	<svg

		xmlns="http://www.w3.org/2000/svg"

		fill="none"

		viewBox="0 0 24 24"

		stroke-width="2"

		stroke="currentColor"

		class="h-6 w-6 text-slate-500">

		<path

			stroke-linecap="round"

			stroke-linejoin="round"

			d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z"/>

	</svg>

	<div class="ml-3 flex-1 overflow-hidden">

		<span class="block truncate text-left text-sm text-slate-500 md:hidden">

			Search...

		</span>

		<span class="hidden truncate text-left text-slate-500 md:block">

			Search vegetables, fruits, milk...

		</span>

	</div>

	<div
		class="hidden rounded-full bg-white px-4 py-2 text-xs font-semibold text-slate-400 xl:block">

		Ctrl + K

	</div>

</button>