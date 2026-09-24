<?php
while (have_posts()) : the_post(); ?>
    <h1 class="main-title text-center text-main">
        <?php
        the_title();
        ?>
    </h1>

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