<?php
if (!defined('ABSPATH')) exit("Direct access forbidden");
?>

<footer class="bg-gray-dark border-t border-gray-800 text-gray-light py-10 mt-auto font-main">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-between space-y-6 md:flex-row md:space-y-0">
        
        <!-- Footer Menu -->
        <nav class="footer-menu">
            <?php
            $args = array(
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'flex flex-wrap justify-center md:justify-start gap-6 text-sm font-medium',
                'fallback_cb'    => false,
            );
            wp_nav_menu($args);
            ?>
        </nav>

        <!-- Copyright Text -->
        <div class="text-xs text-gray-400 text-center md:text-right">
            <p>&copy; Copyright <?= date('Y') ?> <span class="text-white font-semibold"><?= get_bloginfo('name'); ?></span>. All rights reserved.</p>
        </div>

    </div>
</footer>

<?php
wp_footer();
?>

</body>
</html>