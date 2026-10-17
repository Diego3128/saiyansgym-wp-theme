<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

get_header();

$category = get_queried_object();
$categoryName = $category->name;;
// echo "<pre>";
// var_dump($category);
// echo "</pre>";
?>

<main class="container">

    <h1>Category: <?= $categoryName ?></h1>

    <ul style="margin-top: 7rem;" class="grid-list">
        <?php get_template_part('template-parts/category-list')  ?>
    </ul>

</main>

<?php

get_footer();
?>