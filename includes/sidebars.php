<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

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