<?php
/**
 * The Primary Site navigation
 *
 * @package AD Starter
 */

use AD\App\Menus\PrimaryMenuWalker;
?>

    <?php
    wp_nav_menu( [
        'theme_location'  => 'primary',
        'menu_class'      => 'navbar-nav',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'primary-menu',
        'fallback_cb'     => false,
        'depth'           => 2,
        'walker'          => new PrimaryMenuWalker()
    ] );
    ?>