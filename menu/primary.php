<?php
/**
 * The Primary Site navigation
 *
 * @package AD Starter
 */

use AD\App\Menus\PrimaryMenuWalker;

// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
    return;
}
?>

<nav id="site-navigation" role="navigation">
    <?php
    wp_nav_menu( [
        'theme_location'  => 'primary',
        'menu_class'      => 'nav navbar-nav',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'primary-menu',
        'fallback_cb'     => false,
        'depth'           => 2,
        'walker'          => new PrimaryMenuWalker()
    ] );
    ?>
</nav>