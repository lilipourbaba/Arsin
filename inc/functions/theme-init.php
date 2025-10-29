<?php
add_action('wp_enqueue_scripts', 'enqueue_files', 10, 2);
add_action('init', 'theme_init');
add_action('after_setup_theme', 'theme_setup');
add_action('admin_enqueue_scripts', 'admin_files');
add_action('wp_logout', 'logout_user');

add_filter('wp_check_filetype_and_ext', 'allow_svg', 10, 4);
add_filter('upload_mimes', 'mime_types');
add_action('wp_head', 'enqueue_head');



function enqueue_files()
{
    $build = false;
    $ver = '1.0.0';

    $css_path = $build ? '/assets/css/final.css' : '/assets/css/compiled.css';
    $js_path = $build ? '/assets/js/dist/scripts.bundle.min.js' : '/assets/js/dist/scripts.bundle.js';

    wp_enqueue_style('website-css', get_stylesheet_directory_uri() . $css_path, [], $ver);
    wp_enqueue_style('website-style', get_stylesheet_uri());
    wp_dequeue_style('wp-block-library');

    wp_enqueue_script('website-js', get_stylesheet_directory_uri() . $js_path, ['jquery'], $ver, true);
    wp_dequeue_script('global-styles');
}


function theme_init()
{
    add_filter('use_block_editor_for_post', '__return_false');
    add_filter('login_errors', function () {
        return null;
    });
    remove_unnecessary();
}

function theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');

    register_nav_menus([
        'header' => 'Main Menu',
        'header-mobile' => 'Mobile Menu',
        'footer-col1' => 'Footer - discover',
        'footer-col2' => 'Footer - Our company',
        'footer-col3' => 'Footer - support',
        'product-cat' => 'product category',
    ]);
}

function admin_files()
{
    wp_enqueue_style('website-admin', get_stylesheet_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_script('website-admin', get_stylesheet_directory_uri() . '/assets/js/admin.js');
}

function logout_user()
{
    wp_redirect(home_url());
    exit();
}

function allow_svg($data, $file, $filename, $mimes)
{
    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}

function mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

function remove_unnecessary()
{
    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
}

function enqueue_head()
{
    echo "<script>";
    echo "
				var head_script = {
					url: '" . admin_url('admin-ajax.php') . "',
					nonce: '" . wp_create_nonce('ajax-nonce') . "'
				}
			";
    echo "</script>";
}
