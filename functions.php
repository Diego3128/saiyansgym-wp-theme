<?php

//includes

//add custom widgets
require_once get_template_directory() . '/includes/widgets.php';

//add shortcodes
require_once get_template_directory() . '/includes/shortcodes/location.php';

//add widget areas
function saiyansgym_widgets()
{
    register_sidebar([
        'id' => 'sidebar_2',
        'name' => 'Sidebar',
        'before_widget' => '<div class="widget sidebar_2">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget__title text-center text-main">',
        'after_title' => '</h3>',
    ]);
}

add_action('widgets_init', 'saiyansgym_widgets');


// theme setup
function saiyansgym_setup()
{
    // enable post thumbnails
    add_theme_support('post-thumbnails');

    // dinamic titles for SEO
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'saiyansgym_setup');

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

    wp_enqueue_style('lightboxcss', get_theme_file_uri("/assets/css/lightbox.min.css"), [], '2.12.0');

    wp_enqueue_style(
        'style', //unique handle
        get_stylesheet_uri(), //gets the theme's style.css file
        ["normalize"], //depends on normalize
        '1.0.0'
    );


    // js scripts
    wp_enqueue_script("jquery");
    wp_enqueue_script("lightboxjs", get_theme_file_uri("/assets/js/lightbox.min.js"), ["jquery"], "2.12.0" );

}

add_action('wp_enqueue_scripts', 'saiyansgym_scripts_and_styles');
