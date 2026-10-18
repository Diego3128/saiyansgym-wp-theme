<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

function saiyansgym_widgets()
{
    register_sidebar([
        'id' => 'sidebar_2',
        'name' => 'Sidebar',
        'before_widget' => '<aside class="bg-gray-100 py-8 px-2 rounded-lg border border-gray-300 self-start">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="text-main font-bold text-xl text-center mb-8">',
        'after_title' => '</h3>',
    ]);
}

add_action('widgets_init', 'saiyansgym_widgets');