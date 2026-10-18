<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- Main Class Content (Spans 2 columns on large screens) -->
        <section class="lg:col-span-2">
            <?php
            get_template_part('template-parts/class-post');
            ?>
        </section>

        <!-- already is a Sidebar element -->
        <?php
        get_sidebar("secondary");
        ?>
    </div>
</main>

<?php
get_footer();
?>