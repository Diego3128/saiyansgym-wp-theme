<?php

if (!defined('ABSPATH')) exit("Direct access forbidden");

if (is_active_sidebar('sidebar_2')):
?>
    <aside class="sidebar sidebar-2">
        <?php
        dynamic_sidebar('sidebar_2');
        ?>
    </aside>

<?php endif;  ?>