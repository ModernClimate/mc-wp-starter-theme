<?php

namespace MC\App;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Setup
 *
 * @package MC\App
 */
class Setup implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'registerMenus']);
        add_action('mc/styles/icons', [$this, 'outputInlineIcons']);
        add_action('admin_head', [$this, 'outputInlineIcons']);
        add_action('widgets_init', [$this, 'registerSidebars'], 5);
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus()
    {
        register_nav_menu('primary', __('Primary', 'mc-starter'));
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars()
    {
        register_sidebar(
            [
                'id'            => 'primary',
                'name'          => __('Sidebar', 'mc-starter'),
                'description'   => __('Main sidebar area displayed on right side of page via trigger.', 'mc-starter'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
            ]
        );
    }

    /**
     * Output inline svg icons
     */
    public function outputInlineIcons()
    {
        $file = locate_template('/assets/images/icons/global.svg');
        if (file_exists($file)) {
            include($file);
        }
    }
}
