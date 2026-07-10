<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<header id="swc-header" class="sticky top-0 z-50 bg-white shadow-sm">

<div class="max-w-[1440px] mx-auto">

<div class="flex items-center gap-6 px-3 py-1">

<div class="flex-shrink-0">

<a href="<?php echo esc_url( home_url() ); ?>">

<?php

if ( has_custom_logo() ) {

	the_custom_logo();

} else {

	?>

<span class="text-3xl font-bold text-green-600">

	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/India-Market-Logo-Green.png' ); ?>"
		alt="India-Market-Logo-Green"
		class="max-h-[60px] sm:max-h-[60px] lg:max-h-[75px] object-contain">

</span>

<?php

}

?>

</a>

</div>

<div class="hidden lg:flex bg-slate-100 rounded px-3 py-1 items-center min-w-[180px]">

📍

<div class="ml-2">

<div class="text-xs text-slate-500">

Deliver To

</div>

<div class="font-semibold text-sm">

New York

</div>

</div>

</div>

<div class="flex-1">

<?php

get_template_part(

	'template-parts/layout/search-form'

);

?>

</div>

<div class="hidden lg:flex items-center gap-5">

<?php

get_template_part(

	'template-parts/layout/account-button'

);

?>

<?php

get_template_part(

	'template-parts/layout/cart-button'

);

?>

</div>

<button

class="lg:hidden text-3xl"

id="mobileMenuButton"

>

☰

</button>

</div>

</div>

</header>