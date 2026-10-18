<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();

$category     = get_queried_object();
$categoryName = $category->name;
$categoryDesc = term_description();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main min-h-[70vh]">

    <!-- Category Header Card -->
    <header class="bg-gray-100 border border-gray-200 rounded-2xl p-6 sm:p-10 mb-12 shadow-sm text-center">
        <span class="text-xs uppercase font-semibold text-main tracking-wider block mb-2">Category Archive</span>
        <h1 class="font-title text-3xl sm:text-4xl lg:text-5xl text-gray-900 tracking-wide mb-4">
            <?= esc_html($categoryName); ?>
        </h1>

        <?php if ($categoryDesc) : ?>
            <div class="text-gray-600 max-w-2xl mx-auto text-base sm:text-lg leading-relaxed">
                <?= $categoryDesc; ?>
            </div>
        <?php else : ?>
            <p class="text-gray-500 text-sm">
                Browsing all articles filed under <strong class="text-gray-700"><?= esc_html($categoryName); ?></strong>.
            </p>
        <?php endif; ?>
    </header>

    <!-- Category Posts Section -->
    <section>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php get_template_part('template-parts/blog-posts'); ?>
        </ul>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination(array(
                'prev_text' => __('&laquo; Previous', 'textdomain'),
                'next_text' => __('Next &raquo;', 'textdomain'),
            ));
            ?>
        </div>
    </section>

</main>

<?php
get_footer();
?>