<?php

add_action('init', 'taxonomy_register');
add_action('init', 'post_type_register');
add_action('init', 'term_register');



function post_type_register()
{
    $GLOBALS["form-post-type"] = $post_type = 'form';
    make_post_type('form', $post_type, 'dashicons-email-alt2', true, ['title']);
    // make_post_type('Rug', 'rug', 'dashicons-archive', supports: ['title', 'editor', 'thumbnail', 'page-attributes']);
      make_post_type(
        'Rug',
        'rug',
        'dashicons-archive',
        true,
        ['title', 'editor', 'thumbnail', 'page-attributes'],
        'rug', // مسیر آرشیو
        ['slug' => 'finerug', 'with_front' => false] // مسیر سینگل
    );
 }

function taxonomy_register()
{
    make_taxonomy('Category Form', 'form-cat', 'form', true);
    make_taxonomy('rug Category', 'rug_cat', 'rug', true , supports: ['title','thumbnail']);
 


}
function term_register()
{
    wp_insert_term('contact us', 'form-cat', ['slug' => 'contact-us']);
    wp_insert_term('Oushak Rugs', 'rug_cat', ['slug' => 'membrane_doors']);
     wp_insert_term('subscribe', 'form-cat', ['slug' => 'subscribe']);


}


function make_post_type($name, $slug, $icon, $menu = true, $supports = ['title', 'thumbnail', 'editor'], $has_archive = true, $rewrite = [])
{
    $labels = [
        'name' => $name,
        'singular_name' => $name,
        'menu_name' => $name . 's',
        'name_admin_bar' => $name,
        'add_new' => 'add ' . $name,
        'add_new_item' => 'add ' . $name . ' new',
        'new_item' => $name . ' new',
        'edit_item' => 'edit ' . $name,
        'view_item' => 'view ' . $name,
        'all_items' => 'all ' . $name . 's',
        'search_items' => 'search ' . $name,
        'not_found' => $name . ' not found.',
        'not_found_in_trash' => $name . ' not found in trash.'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => $menu,
        'query_var' => true,
        'rewrite' => !empty($rewrite) ? $rewrite : ['slug' => $slug, 'with_front' => false],
        'exclude_from_search' => false,
        'has_archive' => $has_archive,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => $icon,
        'supports' => $supports,
    ];

    register_post_type($slug, $args);
}


function make_taxonomy($name, $slug, $post_types, $is_hierarchical = true , $supports = ['title', 'thumbnail', 'editor'])
{
    $labels = [
        'name' => $name . 's',
        'singular_name' => $name,
        'search_items' => 's' . $name . ' search in',
        'all_items' => 'all' . $name . 's',
        'edit_item' => ' edit ' . $name,
        'update_item' => 'update' . $name,
        'add_new_item' => 'add ' . $name . ' new',
        'new_item_name' => $name . ' new',
        'menu_name' => $name,
    ];

    $args = [
        'hierarchical' => $is_hierarchical,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => $slug],
        'supports' => $supports,

    ];

    register_taxonomy($slug, $post_types, $args);
}
