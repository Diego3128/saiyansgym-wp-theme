<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

while (have_posts()) :
    the_post();
    $status = get_post_status();
    if ($status === "publish"):
?>
        <li class="bg-gray-100 border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:border-main/50 hover:-translate-y-1 flex flex-col">
            <article class="flex flex-col h-full">
                
                <!-- Card Link & Thumbnail -->
                <a href="<?php the_permalink(); ?>" class="group block flex-col grow">
                    <div class="relative w-full h-52 overflow-hidden bg-gray-200">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large', [
                                'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105'
                            ]); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_theme_file_uri("/assets/img/placeholder.png")); ?>" alt="placeholder image" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>

                    <!-- Title Content -->
                    <div class="p-6">
                        <h3 class="font-title text-xl text-gray-900 group-hover:text-main transition-colors line-clamp-2">
                            <?php the_title(); ?>
                        </h3>
                    </div>
                </a>

                <!-- Meta Footer (Author, Date, Categories) -->
                <?php
                $author_name      = get_the_author_meta("display_name");
                $author_posts_url = get_author_posts_url(get_the_author_meta("ID"));
                ?>
                <div class="px-6 pb-6 pt-0 mt-auto border-t border-gray-200/80 text-xs text-gray-500 flex flex-col space-y-2">
                    
                    <div class="flex items-center justify-between pt-3 mb-5">
                        <?php if ($author_name) : ?>
                            <a class="hover:text-main transition-colors font-medium text-gray-700" href="<?= esc_url($author_posts_url); ?>">
                                By: <span class="text-main"><?= esc_html($author_name); ?></span>
                            </a>
                        <?php endif; ?>

                        <time class="text-gray-400" datetime="<?php echo get_the_date('c'); ?>">
                            <?php the_time(get_option("date_format")); ?>
                        </time>
                    </div>

                    <!-- Categories -->
                    <div class="blog-post-categories text-xs text-gray-500">
                        <?php the_category(', '); ?>
                    </div>

                </div>

            </article>
        </li>
<?php
    endif;
endwhile; 
?>