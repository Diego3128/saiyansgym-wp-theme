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
        $title  = !empty($instance['title']) ? esc_html($instance['title']) : 'Latest Posts';

        // Echo theme widget wrapper
        echo $args['before_widget'];

        $query_args = [
            'post_type'      => 'saiyansgym_classes',
            'posts_per_page' => $amount,
            'order'          => 'ASC',
            'orderby'        => 'rand'
        ];

        echo $args['before_title'];
        echo $title;
        echo $args['after_title'];

        $classes = new WP_Query($query_args);

        if ($classes->have_posts()) : ?>
            <ul class="space-y-4 font-main">
                <?php while ($classes->have_posts()) : $classes->the_post(); ?>
                    <li class="bg-gray-100 border border-gray-300 rounded-xl overflow-hidden transition-all duration-300 hover:border-main/50 ">
                        <a href="<?php the_permalink(); ?>" class="flex items-center p-3 space-x-4 group">

                            <?php
                            $start_time  = get_field('start_time');
                            $finish_time = get_field('finish_time');
                            $schedule    = get_field('class_days_schedule');
                            ?>

                            <!-- Image Container -->
                            <div class="shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-gray-800 border border-gray-300">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', [
                                        'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105'
                                    ]); ?>
                                <?php else : ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-500 text-xs text-center p-1">
                                        No Image
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Details Content -->
                            <div class="min-w-0 space-y-1">
                                <h4 class="font-title text-base text-gray-800 truncate transition-colors group-hover:text-main">
                                    <?php the_title(); ?>
                                </h4>

                                <?php if ($start_time || $finish_time || $schedule) : ?>
                                    <?php if ($schedule) : ?>
                                        <div class="text-xs text-gray-600 flex flex-wrap gap-1 leading-snug">
                                            <span class="font-semibold text-gray-600">Schedule:</span>
                                            <span class="text-gray-600"><?= esc_html($schedule); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($start_time && $finish_time) : ?>
                                        <div class="text-xs text-main font-medium flex items-center space-x-1 pt-0.5">
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span><?= esc_html($start_time); ?></span>
                                            <span>-</span>
                                            <span><?= esc_html($finish_time); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="text-gray-400 text-sm italic text-center py-4 bg-gray-900/40 rounded-xl border border-gray-800">
                No classes found.
            </p>
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
