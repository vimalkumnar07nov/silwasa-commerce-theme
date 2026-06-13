<?php
function qc_assets(){wp_enqueue_style('qc',get_template_directory_uri().'/assets/css/app.css',[],null);}add_action('wp_enqueue_scripts','qc_assets');