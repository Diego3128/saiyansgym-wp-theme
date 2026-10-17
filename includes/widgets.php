<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

class Saiyansgym_Classes_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'saiyansgym_widget',
            esc_html__('Saiyansgym classes', 'saiyansgym'),
            ['description' => esc_html__('Add classes as a widget', 'saiyansgym')]
        );
    }

    public function widget($args, $instance)
    {
        $amount = !empty($instance['amount']) ? absint($instance['amount']) : 3;
        $title = !empty($instance['title']) ? esc_html($instance['title']) : 'Latests Posts';

        // Echo theme widget wrapper
        echo $args['before_widget'];

        $query_args = [
            'post_type'      => 'saiyansgym_classes',
            'posts_per_page' => $amount,
            'order'          => 'ASC',
            'orderby' => 'rand'
        ];

        echo $args['before_title'];
        echo $title;
        echo $args['after_title'];

        $classes = new WP_Query($query_args);

        if ($classes->have_posts()) : ?>
            <ul class="sidebar-classes-list">
                <?php while ($classes->have_posts()) : $classes->the_post(); ?>
                    <li class="class">
                        <a href="<?php the_permalink() ?>">
                            <?php
                            $start_time  = get_field('start_time');
                            $finish_time = get_field('finish_time');
                            $schedule    = get_field('class_days_schedule');
                            ?>

                            <div class="image">
                                <?php the_post_thumbnail("medium"); ?>
                            </div>
                            <div class="content">
                                <h4 class="title"><?php the_title(); ?></h4>

                                <?php if ($start_time && $finish_time && $schedule) : ?>
                                    <div class="schedule">
                                        <span class="label">Schedule:</span>
                                        <span class="value"><?= esc_html($schedule); ?></span>
                                    </div>
                                    <div class="time-range">
                                        <span class="start-time"><?= esc_html($start_time); ?></span>
                                        <span class="separator">-</span>
                                        <span class="finish-time"><?= esc_html($finish_time); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); // Restores original single class page post data 
            ?>
        <?php else : ?>
            <p class="empty-widget">No classes yet</p>
        <?php endif;

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        //1- fetch saved amount or use fallback
        $amount = !empty($instance['amount']) ? $instance['amount'] : 3;
        $title = !empty($instance['title']) ? $instance['title'] : 'Latests Posts';

        ?>
        <p>
            <!-- 2- label linked to dynamyc field id -->
            <label for="<?php echo esc_attr($this->get_field_id('amount'))  ?>">
                <?php esc_attr_e('How many classes do you want to list?', "saiyansgym")  ?>
            </label>

            <input
                class="widefat tiny text"
                type="number"

                id="<?php echo esc_attr($this->get_field_id('amount'))  ?>"
                name="<?php echo esc_attr($this->get_field_name('amount'))  ?>"
                value="<?php echo esc_attr($amount) ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title'))  ?>">
                <?php esc_attr_e('The title for this widget?', "saiyansgym")  ?>
            </label>

            <input
                class="widefat tiny text"
                type="text"

                id="<?php echo esc_attr($this->get_field_id('title'))  ?>"
                name="<?php echo esc_attr($this->get_field_name('title'))  ?>"
                value="<?php echo esc_attr($title) ?>">
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        // $new_instance and $old_intance are passed automatically
        $instance = [];

        // For the amount: Sanitize and ensure positive integer for class count
        $instance['amount'] =
            (!empty($new_instance['amount']) ?
                absint($new_instance['amount'])
                : 3
            );

        // For the title:  Sanitize before storing it in db
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : 'Latests Posts';
        // Return the clean array to be saved in wp_options
        return $instance;
    }
}

function saiyansgym_register_widget()
{
    register_widget('Saiyansgym_Classes_Widget');
}
add_action('widgets_init', 'saiyansgym_register_widget');
