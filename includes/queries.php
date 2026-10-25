<?php

/***
 * Returns formatted html list of classes
*/
function get_formatted_class_list(int $limit = -1)
{
?>
    <?php
    $args = [
        'post_type' => 'saiyansgym_classes',
        'posts_per_page' => $limit,
    ];

    $classes = new WP_Query($args);
    if ($classes->have_posts()):
    ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while ($classes->have_posts()) :
                $classes->the_post();
            ?>
                <article class="bg-gray-50 border border-gray-200 rounded-2xl overflow-hidden shadow-lg transition-all duration-300 hover:border-main/50 hover:-translate-y-1 flex flex-col">
                    <a href="<?php the_permalink() ?>" class="flex flex-col h-full group">

                        <!-- Thumbnail Container -->
                        <div class="relative w-full h-56 overflow-hidden bg-gray-900">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105']); ?>
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-gray-500 bg-gray-800 text-sm">
                                    No Image Available
                                </div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-linear-to-t from-gray-dark/80 via-transparent to-transparent opacity-60"></div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex flex-col grow justify-between text-white">
                            <div>
                                <h3 class="font-title text-xl tracking-wide text-gray-700 group-hover:text-main transition-colors mb-3">
                                    <?php the_title(); ?>
                                </h3>
                            </div>

                            <div class="space-y-2 pt-4 border-t border-gray-800/30 text-sm text-gray-700">
                                <?php
                                $start_time  = get_field('start_time');
                                $finish_time = get_field('finish_time');
                                $schedule    = get_field('class_days_schedule');
                                ?>

                                <?php if ($start_time && $finish_time) : ?>
                                    <div class="flex items-center space-x-2 text-gray-700">
                                        <svg class="w-4 h-4 text-main shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span><?= esc_html($start_time); ?> - <?= esc_html($finish_time); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($schedule) : ?>
                                    <div class="flex items-center space-x-2 text-gray-700">
                                        <svg class="w-4 h-4 text-main shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="schedule"><?= esc_html($schedule); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </a>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php
    else : ?>
        <div class="text-center py-16 bg-gray-dark border border-gray-800 rounded-2xl">
            <p class="text-gray-400 text-lg">No classes found at the moment. Check back soon!</p>
        </div>
    <?php
    endif;
    ?>
<?php
}

?>