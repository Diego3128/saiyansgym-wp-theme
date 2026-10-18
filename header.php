<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>SaiyansGym</title> 
    title is not included! Automatically included 
    -->
    <?php wp_head(); ?>
</head>

<body>
    <header class="sticky top-0 z-50 bg-gray-dark/95 backdrop-blur-md border-b border-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="<?= esc_url(home_url('/')); ?>" class="block">
                    <img src="<?= esc_url(get_theme_file_uri('/assets/img/logo.svg')); ?>" alt="Saiyans gym logo" class="h-10 w-auto">
                </a>
            </div>

            <!-- Desktop Navigation Menu -->
            <nav id="desktop-menu" class="hidden md:flex items-center">
                <?php
                $args = array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'desktop-menu flex items-center space-x-4 font-main text-sm font-medium tracking-wide',
                    'fallback_cb'    => false,
                );
                wp_nav_menu($args);
                ?>
            </nav>

            <!-- Mobile Hamburger Button -->
            <div class="flex md:hidden items-center">
                <button id="mobile-menu-button" type="button" aria-expanded="false" aria-label="Toggle Menu" class="text-gray-light hover:text-main focus:outline-none p-2 rounded-lg">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer Container -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-800 bg-gray-dark px-4 pt-3 pb-6 font-main">
                <?php
                $mobile_args = array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'mobile-menu flex flex-col space-y-3 text-base font-medium',
                    'fallback_cb'    => false,
                );
                wp_nav_menu($mobile_args);
                ?>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const menuBtn = document.getElementById('mobile-menu-button');
                    const mobileMenu = document.getElementById('mobile-menu');

                    // Toggle Mobile Drawer
                    if (menuBtn && mobileMenu) {
                        menuBtn.addEventListener('click', () => {
                            const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
                            menuBtn.setAttribute('aria-expanded', !isExpanded);
                            mobileMenu.classList.toggle('hidden');
                        });
                    }

                    // Toggle Mobile Sub-menus (Accordion)
                    const mobileParents = mobileMenu ? mobileMenu.querySelectorAll('.menu-item-has-children > a') : [];
                    mobileParents.forEach(parentLink => {
                        parentLink.addEventListener('click', (e) => {
                            e.preventDefault(); // Prevent navigating away so user can see sub-items
                            const subMenu = parentLink.nextElementSibling;
                            if (subMenu && subMenu.classList.contains('sub-menu')) {
                                subMenu.classList.toggle('active-mobile');
                            }
                        });
                    });
                });
            </script>
    </header>
