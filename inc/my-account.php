<?php
/**
 * My Account Functions
 *
 * @package SilwasaCommerceTheme
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Welcome Card
|--------------------------------------------------------------------------
*/

add_action(
    'woocommerce_account_dashboard',
    'swc_account_welcome',
    5
);

function swc_account_welcome() {

    $user = wp_get_current_user();

    ?>

    <div class="swc-account-welcome">

        <div class="swc-account-avatar">

            <?php echo esc_html( strtoupper( substr( $user->display_name, 0, 1 ) ) ); ?>

        </div>

        <div>

            <h3>

                Welcome back,
                <?php echo esc_html( $user->display_name ); ?> 👋

            </h3>

            <p>

                Manage your orders, addresses and account details from one place.

            </p>

        </div>

    </div>

    <?php

}

/*
|--------------------------------------------------------------------------
| Order Status Badge
|--------------------------------------------------------------------------
*/

add_filter(
	'woocommerce_my_account_my_orders_actions',
	'swc_my_orders_actions',
	10,
	2
);

function swc_my_orders_actions( $actions, $order ) {

	foreach ( $actions as $key => $action ) {

		$actions[ $key ]['class'] = 'swc-order-button';

	}

	return $actions;

}

/*
|--------------------------------------------------------------------------
| Empty Orders Message
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_before_account_orders',
	'swc_orders_empty_notice'
);

function swc_orders_empty_notice() {

	if ( wc_get_customer_order_count( get_current_user_id() ) > 0 ) {
		return;
	}

	?>

	<div class="swc-empty-orders">

		<div class="swc-empty-orders-icon">

			📦

		</div>

		<h3>

			No Orders Yet

		</h3>

		<p>

			Looks like you haven't placed any orders yet.

		</p>

		<a
			class="button"
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">

			Start Shopping

		</a>

	</div>

	<?php

}

/*
|--------------------------------------------------------------------------
| Dashboard Statistics Cards
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_account_dashboard',
	'swc_account_statistics',
	15
);

function swc_account_statistics() {

	$user_id = get_current_user_id();

	$order_count = wc_get_customer_order_count( $user_id );

	$downloads = count(
		wc_get_customer_available_downloads( $user_id )
	);

	$address_count = 0;

	if ( get_user_meta( $user_id, 'billing_address_1', true ) ) {
		$address_count++;
	}

	if ( get_user_meta( $user_id, 'shipping_address_1', true ) ) {
		$address_count++;
	}

	?>

	<div class="swc-dashboard-stats">

		<div class="swc-dashboard-card">

			<div class="swc-dashboard-icon">📦</div>

			<h3><?php echo esc_html( $order_count ); ?></h3>

			<p>Orders</p>

		</div>

		<div class="swc-dashboard-card">

			<div class="swc-dashboard-icon">📍</div>

			<h3><?php echo esc_html( $address_count ); ?></h3>

			<p>Addresses</p>

		</div>

		<div class="swc-dashboard-card">

			<div class="swc-dashboard-icon">⬇️</div>

			<h3><?php echo esc_html( $downloads ); ?></h3>

			<p>Downloads</p>

		</div>

	</div>

	<?php

}

/*
|--------------------------------------------------------------------------
| Quick Actions
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_account_dashboard',
	'swc_dashboard_actions',
	20
);

function swc_dashboard_actions() {

	?>

	<div class="swc-dashboard-actions">

		<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>">

			View Orders

		</a>

		<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-address' ) ); ?>">

			Manage Addresses

		</a>

		<a href="<?php echo esc_url( wc_get_account_endpoint_url( 'edit-account' ) ); ?>">

			Account Settings

		</a>

		<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">

			Continue Shopping

		</a>

	</div>

	<?php

}

/*
|--------------------------------------------------------------------------
| Empty Downloads Message
|--------------------------------------------------------------------------
*/

add_action(
	'woocommerce_before_account_downloads',
	'swc_empty_downloads_notice'
);

function swc_empty_downloads_notice() {

	$user_id = get_current_user_id();

    $downloads = wc_get_customer_available_downloads( $user_id );

	if ( ! empty( $downloads ) ) {
		return;
	}

	?>

	<div class="swc-empty-state">

		<div class="swc-empty-icon">⬇️</div>

		<h3>No Downloads Available</h3>

		<p>

			You don't have any downloadable products yet.

		</p>

		<a
			class="button"
			href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">

			Browse Products

		</a>

	</div>

	<?php

}

/*
|--------------------------------------------------------------------------
| Remove Default Dashboard Text
|--------------------------------------------------------------------------
*/

remove_action(
    'woocommerce_account_dashboard',
    'woocommerce_account_dashboard'
);