<?php
/**
 * The sidebar containing the main widget area
 *
 * @package MC
 */
if (! is_active_sidebar('primary')) {
    return;
}
?>

<aside id="secondary" class="widget-area w-full md:w-1/4" role="complementary">
    <?php dynamic_sidebar('primary'); ?>
</aside><!-- #secondary -->
