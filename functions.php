<?php

// register menus
function  saiyansgym_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'saiyansgym'),
        'footer-menu' => __('Footer Menu', 'saiyansgym'),
        'socials-menu' => __('Socials Menu', 'saiyansgym')
    ));
}

add_action('init', 'saiyansgym_menus');

// register style sheets

function saiyansgym_scripts_and_styles()
{
    // styles
    wp_enqueue_style('normalize', get_theme_file_uri("/assets/css/normalize.css"), [], '8.0.1');

    wp_enqueue_style(
        'style', //unique handle
        get_stylesheet_uri(), //gets the theme's style.css file
        ["normalize"], //depends on normalize
        '1.0.0'
    );

    // scripts
}

add_action('wp_enqueue_scripts', 'saiyansgym_scripts_and_styles');
