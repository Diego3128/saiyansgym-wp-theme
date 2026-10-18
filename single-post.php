<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main">
    <?php
    get_template_part('template-parts/blog-post-detail');
    ?>
</main>

<?php
get_footer();
?>