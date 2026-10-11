<?php
// archive page - mainly used for normal posts
get_header();
?>

<main class="container">
    <h1 class="main-title text-center text-main">
        Our Blog
    </h1>

    <ul style="margin-top: 7rem;" class="grid-list">
        <?php get_template_part('template-parts/blog-posts')  ?>
    </ul>
</main>

<?php
get_footer();
?>