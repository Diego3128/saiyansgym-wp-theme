<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");
?>

<article class="bg-gray-100 border border-gray-200 rounded-2xl p-6 sm:p-10 shadow-sm font-main">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Post Header -->
        <header class="text-center mb-8">
            <h1 class="font-title text-3xl sm:text-4xl lg:text-5xl text-main tracking-wide uppercase mb-6">
                <?php the_title(); ?>
            </h1>

            <!-- Meta Details (Categories, Author, Date) -->
            <?php
            $author_name      = get_the_author_meta("display_name");
            $author_posts_url = get_author_posts_url(get_the_author_meta("ID"));
            ?>
            
            <div class="flex flex-wrap items-center justify-center gap-4 text-xs sm:text-sm text-gray-500 pt-2 border-t border-b border-gray-200/80 py-3">
                
                <!-- Categories -->
                <div class="blog-post-categories">
                    <?php the_category(' '); ?>
                </div>

                <span class="text-gray-300 hidden sm:inline">•</span>

                <!-- Author -->
                <?php if ($author_name && $author_posts_url) : ?>
                    <a class="hover:text-main transition-colors font-medium text-gray-700 flex items-center space-x-1" href="<?= esc_url($author_posts_url); ?>">
                        <span>By:</span>
                        <span class="text-main font-semibold"><?= esc_html($author_name); ?></span>
                    </a>
                <?php endif; ?>

                <span class="text-gray-300 hidden sm:inline">•</span>

                <!-- Date -->
                <time class="text-gray-500 flex items-center space-x-1" datetime="<?php echo get_the_date('c'); ?>">
                    <span><?php the_time(get_option("date_format")); ?></span>
                </time>

            </div>
        </header>

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-8 overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-gray-200">
                <?php the_post_thumbnail('large', [
                    'class' => 'w-full h-auto max-h-[500px] object-cover object-center'
                ]); ?>
            </div>
        <?php endif; ?>

        <!-- Post Content Block -->
        <div class="page-content text-gray-800 leading-relaxed text-base sm:text-lg space-y-6">
            <?php the_content(); ?>
        </div>

    <?php endwhile; ?>
</article>