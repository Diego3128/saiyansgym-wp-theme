<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");

?>
<footer class="footer">
    <hr>
        <nav class="nav-bar__menu container">
            <?php
            $args = array(
                'theme_location' => 'main-menu',
                'container' => false,
                // 'container_class' => 'nav-bar__menu'
            );
            wp_nav_menu($args);
            ?>
        </nav>
    <p class="copyright">&copy; Copyright <?=  date('Y') ?> - <?= get_bloginfo('name') ?> - All rights reserved.</p>
</footer>

<?php
wp_footer();
?>

</body>

</html>