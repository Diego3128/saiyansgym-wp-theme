<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

while (have_posts()) : the_post(); ?>
    <h1 class="main-title text-center text-main">
        <?php
        the_title();
        ?>
    </h1>

    <div class="class-information">
        <?php
        $start_time  = get_field('start_time');
        $finish_time = get_field('finish_time');
        $schedule    = get_field('class_days_schedule');
        ?>
        <?php if ($start_time && $finish_time) : ?>
            <p class="time">
                <span><?= esc_html($start_time); ?></span> -
                <span><?= esc_html($finish_time); ?></span>
            </p>
        <?php endif; ?>
        <?php if ($schedule) : ?>
            <p class="schedule"><?= esc_html($schedule); ?></p>
        <?php endif; ?>
    </div>

    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail('large', ['class' => 'featured-image']);
    }
    ?>
    <div class="about-content">
        <?php
        the_content(); ?>
    </div>
<?php

// the_permalink();
endwhile;

?>