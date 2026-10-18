<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

// Archive page for posts page
get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main">
    
    <!-- Page Header -->
    <header class="mb-12 text-center">
        <h1 class="font-title text-3xl  lg:text-4xl text-main tracking-wide uppercase">
            Our Blog
        </h1>
        <p class="mt-3 text-gray-600 max-w-2xl mx-auto text-base sm:text-lg">
            Tips, guides, and updates from the Saiyans Gym community.
        </p>
    </header>

    <!-- Blog Posts Grid -->
    <?php if (have_posts()) : ?>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php get_template_part('template-parts/blog-posts'); ?>
        </ul>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination(array(
                'prev_text'          => __('&laquo; Previous', 'textdomain'),
                'next_text'          => __('Next &raquo;', 'textdomain'),
                'class'              => 'flex space-x-2',
            ));
            ?>
        </div>
    <?php else : ?>
        <div class="text-center py-16 bg-gray-100 border border-gray-200 rounded-2xl">
            <p class="text-gray-600 text-lg">No posts published yet.</p>
        </div>
    <?php endif; ?>

</main>

<?php
get_footer();
?>