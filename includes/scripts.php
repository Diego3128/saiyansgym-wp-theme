<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

// Styles and scripts are included here

function saiyansgym_scripts_and_styles()
{
    // styles
    // wp_enqueue_style('normalize', get_theme_file_uri("/assets/css/normalize.css"), [], '8.0.1');

    // wp_enqueue_style('lightboxcss', get_theme_file_uri("/assets/css/lightbox.min.css"), [], '2.12.0');

    wp_enqueue_style('main-styles', get_theme_file_uri("/assets/css/style.css"), [], '1.0.0');

    // wp_enqueue_style(
    //     'style', //unique handle
    //     get_stylesheet_uri(), //gets the theme's style.css file
    //     ["normalize"], //depends on normalize
    //     '1.0.0'
    // );


    // js scripts
    // wp_enqueue_script("jquery");
    // wp_enqueue_script("lightboxjs", get_theme_file_uri("/assets/js/lightbox.min.js"), ["jquery"], "2.12.0");
}

add_action('wp_enqueue_scripts', 'saiyansgym_scripts_and_styles');
