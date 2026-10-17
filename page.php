<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main class="container">
    <!-- <h2>page.php</h2> -->
    <?php
    get_template_part('template-parts/content-page');
    ?>
</main>


<?php
get_footer();
?>