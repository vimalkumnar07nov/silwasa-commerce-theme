<?php
function qc_setup(){add_theme_support('woocommerce');add_theme_support('title-tag');}add_action('after_setup_theme','qc_setup');