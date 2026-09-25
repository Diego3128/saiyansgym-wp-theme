<?php
if (is_active_sidebar('sidebar_2')):

?>
    <aside class="sidebar sidebar-1">
        <?php
        dynamic_sidebar('sidebar_1');
        ?>
    </aside>

<?php endif; ?>