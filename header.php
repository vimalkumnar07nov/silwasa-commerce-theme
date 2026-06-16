<?php
/**
 * Header
 *
 * @package SilwasaCommerceTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!doctype html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

</head>

<body <?php body_class( 'bg-slate-50 text-slate-800' ); ?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/layout/header-top' ); ?>

<?php get_template_part( 'template-parts/layout/header-main' ); ?>

<?php get_template_part( 'template-parts/layout/navigation' ); ?>