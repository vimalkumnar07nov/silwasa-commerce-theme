<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<nav class="hidden lg:block bg-white border-t border-slate-100 border-b border-slate-100">

<div class="max-w-[1440px] mx-auto">

<div class="flex items-center justify-between h-16 px-6">

<div class="flex gap-8 items-center">

<a

href="#"

class="font-semibold text-green-600"

>

All Categories

</a>

<?php

wp_nav_menu(

	array(

		'theme_location' => 'primary',

		'container' => false,

		'menu_class' => 'flex gap-8 font-medium text-slate-700',

		'fallback_cb' => false,

	)

);

?>

</div>

<div>

<a

href="#"

class="bg-red-500 text-white px-4 py-2 rounded-full text-sm font-semibold"

>

🔥 Today's Deals

</a>

</div>

</div>

</div>

</nav>