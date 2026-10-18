<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('py-3 font-main'); ?>>
        
        <!-- Page Title -->
        <header class="mb-8 text-center">
            <h1 class="font-title text-2xl  lg:text-4xl text-main tracking-wide uppercase">
                <?php the_title(); ?>
            </h1>
        </header>

        <!-- Featured Image (If available) -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-10 overflow-hidden rounded-2xl border border-gray-800 shadow-xl bg-gray-900">
                <?php the_post_thumbnail('large', [
                    'class' => 'w-full h-auto max-h-[450px] object-cover object-center transition-transform duration-500 hover:scale-102'
                ]); ?>
            </div>
        <?php endif; ?>

        <!-- Page Main Content Block -->
        <div class="bg-gray-200 p-5 border-main/20 border-2 rounded-xl page-content text-gray-600 leading-relaxed text-base sm:text-lg space-y-6">
            <?php the_content(); ?>
        </div>

    </article>
<?php
endwhile;
?>