<?php
/*
 * Template name: Centered container (No sidebars)
 * Template post type: page
*/

get_header();
?>

<main class="container container__centered">
    <?php
    // get_template_part(get_theme_file_uri('template-parts/post-template'));
    get_template_part('template-parts/content-page');
    ?>
</main>

<?php
get_footer();
?>