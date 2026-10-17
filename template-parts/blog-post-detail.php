<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

?>
<div class="single-post post">
    <?php
    while (have_posts()) : the_post(); ?>
        <h1 style="margin-top: 3rem;" class="title text-center text-main">
            <?php
            the_title();
            ?>
        </h1>

        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('large', ['class' => 'featured-image']);
        }
        ?>
        <?php
        $author_name = get_the_author_meta("display_name");
        $author_posts_url = get_author_posts_url(get_the_author_meta("ID"));
        ?>
        <?php if ($author_name && $author_posts_url) : ?>
            <div class="meta">
                <div class="categories"><?php the_category() ?></div>
                <a class="author" href="<?= $author_posts_url ?>">By: <span class="name"><?= $author_name ?></span></a>
                <p class="date"><?php the_time(get_option("date_format")) ?></p>
            </div>
        <?php endif; ?>
        <div class="content">
            <?php
            the_content(); ?>
        </div>
    <?php

    // the_permalink();
    endwhile;

    ?>
</div>