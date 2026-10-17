<?php 

if (!defined('ABSPATH')) exit("Direct access forbidden");

// Features the theme will support 

// theme setup
function saiyansgym_setup()
{
    // enable post thumbnails
    add_theme_support('post-thumbnails');

    // dinamic titles for SEO
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'saiyansgym_setup');