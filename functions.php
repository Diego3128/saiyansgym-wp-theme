<?php

//add widgets
function saiyansgym_widgets()
{
    register_sidebar([
        'id' => 'sidebar_1',
        'name' => 'Sidebar 1',
        'before_widget' => '<div class="widget sidebar_1">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget__title text-center text-main">',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'id' => 'sidebar_2',
        'name' => 'Sidebar 2',
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

    wp_enqueue_style(
        'style', //unique handle
        get_stylesheet_uri(), //gets the theme's style.css file
        ["normalize"], //depends on normalize
        '1.0.0'
    );

    // scripts
}

add_action('wp_enqueue_scripts', 'saiyansgym_scripts_and_styles');
