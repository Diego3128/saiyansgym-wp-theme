<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

while (have_posts()) :
    the_post();
    $status = get_post_status();
    if ($status === "publish"):
?>
        <li class="card card-post">
            <a href="<?php the_permalink() ?>">
                <div class="image">
                    <?php
                    if(has_post_thumbnail()):
                    the_post_thumbnail(); 
                    else: ?>
                    <img src="<?php echo get_theme_file_uri("/assets/img/placeholder.png")?>" alt="placeholder image">
                    <?php
                    endif;
                    ?>
                </div>
                <div class="content">

                    <h3 class="title"><?php the_title(); ?></h3>
                </div>
            </a>
            <?php
            $author_name = get_the_author_meta("display_name");
            $author_posts_url = get_author_posts_url(get_the_author_meta("ID"));
            ?>
            <?php if ($author_name) : ?>
                <div class="meta">
                    <a class="author" href="<?= $author_posts_url ?>">By: <span><?= $author_name ?></span></a>
                    <p class="date"><?php the_time(get_option("date_format")) ?></p>
                    <div class="categories"><?php the_category()?></div>
                </div>
            <?php endif; ?>
        </li>
<?php
    endif;
endwhile; ?>