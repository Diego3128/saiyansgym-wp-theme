<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="container container__centered">
    <!-- <h2>page.php</h2> -->
    <?php
    get_template_part('template-parts/blog-post-detail');
    ?>
</main>


<?php
get_footer();
?>