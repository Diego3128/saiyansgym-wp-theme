<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

while (have_posts()) : the_post(); ?>
    <article class="bg-gray-100 border border-gray-300 rounded-2xl p-6 sm:p-8 shadow-xl">
        
        <!-- Class Title -->
        <h1 class="font-title text-3xl sm:text-2xl lg:text-3xl text-main tracking-wide uppercase mb-6">
            <?php the_title(); ?>
        </h1>

        <!-- Class Information Box (Time & Schedule) -->
        <?php 
        $start_time  = get_field('start_time');
        $finish_time = get_field('finish_time');
        $schedule    = get_field('class_days_schedule');
        ?>

        <?php if ($start_time && $finish_time || $schedule) : ?>
            <div class="flex flex-wrap items-center gap-4 mb-8  border border-gray-400 p-4 rounded-xl">
                <?php if ($start_time && $finish_time) : ?>
                    <div class="flex items-center space-x-2 text-gray-800 text-sm sm:text-base">
                        <svg class="w-5 h-5 text-main shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span><strong>Time:</strong> <?= esc_html($start_time); ?> - <?= esc_html($finish_time); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($schedule) : ?>
                    <div class="flex items-center space-x-2 text-gray-800 text-sm sm:text-base">
                        <svg class="w-5 h-5 text-main shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span><strong>Days:</strong> <?= esc_html($schedule); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="mb-8 overflow-hidden rounded-xl border border-gray-800 bg-gray-900">
                <?php the_post_thumbnail('large', [
                    'class' => 'w-full h-auto max-h-[450px] object-cover object-center'
                ]); ?>
            </div>
        <?php endif; ?>

        <!-- Content Description -->
        <div class="page-content text-gray-800 leading-relaxed space-y-4 text-base sm:text-lg">
            <?php the_content(); ?>
        </div>

    </article>
<?php
endwhile;
?>