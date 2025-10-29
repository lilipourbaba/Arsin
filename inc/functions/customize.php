<?php
add_action('customize_register', 'website_basic_settings');

function website_basic_settings($wp_customize)
{

    $wp_customize->add_section('basic_settings', [
        'title' => 'Site Settings',
        'priority' => 1
    ]);

    function make_customize_option($name, $label, $type, $place_holder)
    {
        global $wp_customize;

        $wp_customize->add_setting(
            "$name",
            [
                'type' => 'option'
            ]
        );

        $wp_customize->add_control(new WP_Customize_Upload_Control(
            $wp_customize,
            $name,
            [
                'label' => $label,
                'section' => 'basic_settings',
                'type' => $type,
                'settings' => $name,
                'description' => 'for Example: ' . $place_holder,

            ]
        ));
    }

    make_customize_option('phone_number_one', 'Phone Number 1', 'tel', '+18143511276');
    make_customize_option('phone_number_two', 'Phone Number 2', 'tel', '+18143511276');
    make_customize_option('text_address', 'Address', 'textarea', 'Mr John Smith. 132, My Street, Kingston, New York 12401');
    make_customize_option('address_map', 'Google map link', 'url', 'https://www.google.com/maps/');
    make_customize_option('instagram', 'Instagram Link', 'url', 'https://www.instagram.com/username');
    make_customize_option('pinterest', 'Pinterest Link', 'url', 'https://www.pinterest.com/username');
    make_customize_option('facebook', 'Facebook Link', 'url', 'https://www.facebook.com/username');
    make_customize_option('_x', 'x Link', 'url', 'https://twitter.com/username');
}
