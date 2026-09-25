<?php
get_header();
?>

<main class="container with-sidebar">
    <section>
        <?php
        get_template_part('template-parts/class-post');
        ?>
    </section>

    <?php
    get_sidebar("secondary");
    ?>

</main>


<?php
get_footer();
?>