<?php
/**
 * Saiyans Gym Theme Functions
 */

if (!defined('ABSPATH')) exit("Direct access forbidden");

// Theme base directory path helper
$saiyansgym_inc = get_template_directory() . '/includes/';

// load modular files

// WP features  supported by the theme
require_once $saiyansgym_inc . 'setup.php';
// register style sheets and scripts
require_once $saiyansgym_inc . 'scripts.php';
// register menus
require_once $saiyansgym_inc . 'menus.php';
//add custom widgets
require_once $saiyansgym_inc . 'widgets.php';
//add shortcodes
require_once $saiyansgym_inc . 'shortcodes/location.php';
//add widget areas (sidebars)
require_once $saiyansgym_inc . 'sidebars.php';
// custom query functions (functions can be used directly without requiring the file)
require_once $saiyansgym_inc . 'queries.php';