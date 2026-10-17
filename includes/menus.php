<?php

if (!defined('ABSPATH')) die();


function  saiyansgym_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'saiyansgym'),
        'footer-menu' => __('Footer Menu', 'saiyansgym'),
        'socials-menu' => __('Socials Menu', 'saiyansgym')
    ));
}

add_action('init', 'saiyansgym_menus');