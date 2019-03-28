<?php
/**
 * The sidebar containing the main widget area
 *
 * @package AD Starter
 */
if (! is_active_sidebar('primary')) {
    return;
}
?>

<aside id="secondary" class="widget-area col-sm-4" role="complementary">
    <?php dynamic_sidebar('primary'); ?>
</aside><!-- #secondary -->