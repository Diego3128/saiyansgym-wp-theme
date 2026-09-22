<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaiyansGym</title>
    <?php wp_head(); ?>
</head>

<body>

    <header class="header">
        <div class="container nav-bar">
            <div class="nav-bar__logo">
                <img src="<?= get_theme_file_uri('/assets/img/logo.svg')?>" alt="Saiyans gym logo">
            </div>

            <?php 
            $args = array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'nav-bar__menu'
            );
            wp_nav_menu($args);
            ?>
        </div>
    </header>

    <main>
        <?php

        while (have_posts()) :

            the_post();

            the_title();

            the_content();

            the_permalink();

        endwhile;

        ?>
    </main>


</body>

</html>