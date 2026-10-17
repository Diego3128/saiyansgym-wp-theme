<?php
/*
 * Template name: Class List (No sidebars)
 * Template post type: page
*/
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();


?>

<main class="container">
    <?php
    // include title and content for this post (page) before performing custom wp query
    get_template_part('template-parts/content-page');
    ?>


    <?php
    $args = [
        'post_type' => 'saiyansgym_classes', // query this kind of post types
    ];

    $classes = new WP_Query($args);
    if ($classes->have_posts()):
    ?>
        <ul class="grid-list">
            <?php
            while ($classes->have_posts()) :
                $classes->the_post();
            ?>
                <li class="card">
                    <a href="<?php the_permalink() ?>">
                        <div class="image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="content">

                            <h3 class="title"><?php the_title(); ?></h3>
                            <?php
                            $start_time  = get_field('start_time');
                            $finish_time = get_field('finish_time');
                            $schedule    = get_field('class_days_schedule');
                            ?>
                            <?php if ($start_time && $finish_time) : ?>
                                <p>
                                    <span><?= esc_html($start_time); ?></span> -
                                    <span><?= esc_html($finish_time); ?></span>
                                </p>
                            <?php endif; ?>
                            <?php if ($schedule) : ?>
                                <p class="schedule"><?= esc_html($schedule); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    <?php
    else : ?>
        <p>No classes found.</p>
    <?php
    endif;
    ?>
</main>


<?php
get_footer();
?>