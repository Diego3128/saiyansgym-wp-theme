<?php
/*
 * Template name: Centered container (No sidebars)
 * Template post type: page
*/

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="max-w-7x mx-auto">
    <?php
    // get_template_part(get_theme_file_uri('template-parts/post-template'));
    get_template_part('template-parts/content-page');
    ?>
</main>

<?php
get_footer();
?>