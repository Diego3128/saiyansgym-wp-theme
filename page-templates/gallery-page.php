<?php
/*
 * Template name: Image Gallery
 * Template post type: page
*/
if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="mx-auto px-3 lg:px-10 max-w-5xl">
    <?php
    while (have_posts()) : the_post(); ?>
        <h1 class="main-title text-center text-main">
            <?php
            the_title();
            ?>
        </h1>

        <div class="about-content">
            <?php
            // the_content(); 
            $post_id = get_the_ID();
            // get gallery of the current post with no html
            $gallery = get_post_gallery($post_id, false);
            $imgIdList = isset($gallery['ids']) ? explode(',', $gallery['ids'])  : [];

            if (count($imgIdList) > 0): ?>
                <ul class="img-gallery">
                    <?php
                    foreach ($imgIdList as $id):
                        $largeImg = wp_get_attachment_image_src($id, 'large');
                        $fullImg = wp_get_attachment_image_src($id, 'full');
                        $largeUrl = $largeImg[0];
                        $fullUrl = $fullImg[0];
                    ?>
                        <li>
                            <a data-lightbox="gallery" href="<?=  $fullUrl  ?>?>">
                                <img src="<?= $largeUrl ?> ?>" alt="gallery image item">
                            </a>
                        </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            <?php
            else:
            ?>
                <p>No images in the gallery </p>
            <?php
            endif;


            ?>
        </div>
    <?php

    // the_permalink();
    endwhile;

    ?>
</main>

<?php
get_footer();
?>