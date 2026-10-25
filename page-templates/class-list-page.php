<?php
/*
 * Template name: Class List (No sidebars)
 * Template post type: page
*/
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl py-12 font-main">
    
    <!-- Page Header / Title Content -->
    <div class="mb-10 text-center md:text-left">
        <?php
        get_template_part('template-parts/content-page');
        ?>
    </div>

    <?php get_formatted_class_list(-1) ?>
</main>

<?php
get_footer();
?>