<?php
/**
 * Header Search Form
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form
	role="search"
	method="get"
	action="<?php echo esc_url( home_url( '/' ) ); ?>"
	class="relative w-full"
>

	<input
		type="search"
		name="s"
		value="<?php echo get_search_query(); ?>"
		placeholder="Search for vegetables, fruits, milk, bakery..."
		class="w-full h-14 rounded-full border border-slate-200 bg-slate-100 pl-14 pr-5 text-base outline-none focus:border-green-500 focus:bg-white transition"
	/>

	<input
		type="hidden"
		name="post_type"
		value="product"
	/>

	<button
		type="submit"
		class="absolute left-5 top-1/2 -translate-y-1/2 text-slate-500"
		aria-label="Search"
	>

	<svg
		xmlns="http://www.w3.org/2000/svg"
		fill="none"
		viewBox="0 0 24 24"
		stroke-width="2"
		stroke="currentColor"
		class="w-6 h-6"
	>

	<path
		stroke-linecap="round"
		stroke-linejoin="round"
		d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0a7 7 0 0 1 14 0Z"
	/>

	</svg>

	</button>

</form>