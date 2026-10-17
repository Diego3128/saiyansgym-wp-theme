<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();
?>

<main>

    <h2>Index.php</h2>
    <?php

    while (have_posts()) :

        the_post();

        the_title();

        the_content();

        the_permalink();

    endwhile;

    ?>
</main>


<?php
get_footer();
?>