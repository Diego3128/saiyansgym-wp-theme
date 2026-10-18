<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();

$object            = get_queried_object();
$user_display_name = $object->display_name;
$user_registered   = $object->user_registered;
$description       = get_the_author_meta("description");
$author_avatar     = get_avatar_url($object->ID, ['size' => 128]);
$joined_date       = date_i18n(get_option('date_format'), strtotime($user_registered));
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 font-main">

    <!-- Author Profile Header Card -->
    <header class="bg-gray-100 border border-gray-200 rounded-2xl p-6 sm:p-8 mb-12 shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-6 text-center sm:text-left">
        
        <!-- Author Avatar -->
        <?php if ($author_avatar) : ?>
            <div class="shrink-0 w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden border-2 border-main/30 shadow-md">
                <img src="<?= esc_url($author_avatar); ?>" alt="<?= esc_attr($user_display_name); ?>" class="w-full h-full object-cover">
            </div>
        <?php endif; ?>

        <!-- Author Info -->
        <div class="grow space-y-3">
            <div>
                <span class="text-xs uppercase font-semibold text-main tracking-wider">Author Profile</span>
                <h1 class="font-title text-3xl sm:text-4xl text-gray-900 tracking-wide mt-1">
                    <?= esc_html($user_display_name); ?>
                </h1>
            </div>

            <?php if ($description) : ?>
                <p class="text-gray-600 leading-relaxed text-base max-w-2xl">
                    <?= esc_html($description); ?>
                </p>
            <?php else : ?>
                <p class="text-gray-400 italic text-sm">
                    No bio description provided for this author yet.
                </p>
            <?php endif; ?>

            <div class="pt-2 text-xs text-gray-400 border-t border-gray-200/80 inline-block">
                <span>Member since: </span>
                <strong class="text-gray-600 font-medium"><?= esc_html($joined_date); ?></strong>
            </div>
        </div>

    </header>

    <!-- Author Posts Section -->
    <section>
        <div class="mb-8 border-b border-gray-200 pb-4">
            <h2 class="font-title text-2xl sm:text-3xl text-gray-900 tracking-wide">
                Posts by <span class="text-main"><?= esc_html($user_display_name); ?></span>
            </h2>
        </div>

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