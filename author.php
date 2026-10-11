<?php
get_header();

$object = get_queried_object();
$user_display_name = $object->display_name;
$user_registered = $object->user_registered;
$description = get_the_author_meta("description") ;
?>
<main style="margin-top: 3rem;" class="container container__centered">

    <h1 class="title">Author <?= $user_display_name ?></h1>

    <p><?= $description ?></p>

    <h2 style="margin-top: 3rem; margin-bottom: 3rem;">Posts:</h2>
    <ul style="margin-top: 7rem;" class="grid-list">
        <?php get_template_part("template-parts/blog-posts") ?>
    </ul>

    <p style="margin-top: 5rem;">Joined: <?= $user_registered ?></p>

</main>

<?php

get_footer();
?>