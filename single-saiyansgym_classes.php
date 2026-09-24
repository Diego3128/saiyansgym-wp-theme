<?php
get_header();
?>

<main class="container with-sidebar">
    <section>
        <?php
        get_template_part('template-parts/class-post');
        ?>
    </section>
    <aside class="sidebar">
        <h3>Sidebar here!</h3>
    </aside>
</main>


<?php
get_footer();
?>