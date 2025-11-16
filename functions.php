<?php

/****************************** Required Files */
require_once(__DIR__ . '/inc/functions/theme-init.php');
require_once(__DIR__ . '/inc/functions/register.php');
require_once(__DIR__ . '/inc/functions/customize.php');
require_once(__DIR__ . '/inc/functions/acf.php');
require_once(__DIR__ . '/inc/functions/general.php');
require_once(__DIR__ . '/inc/functions/form.php');
require_once(__DIR__ . '/inc/classes/metabox.php');
require_once (__DIR__ . '/inc/functions/acf-fields.php');
require_once (__DIR__ . '/inc/functions/query.php');
new meta_box();
add_action('acf/init', 'register_acf');

function mytheme_setup() {
    // پشتیبانی از Elementor
    add_theme_support( 'elementor' );
    
    // فعال کردن قابلیت استفاده از Elementor در تمام پست‌تایپ‌ها
    add_post_type_support( 'page', 'elementor' );
    add_post_type_support( 'post', 'elementor' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );
add_action( 'elementor/theme/register_locations', function( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
});


 

                                                                                     