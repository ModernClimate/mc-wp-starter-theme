<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Setup
 *
 * @package AD Starter\App
 */
class Setup implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'registerMenus']);
        add_action('widgets_init', [$this, 'registerSidebars'], 5);
    }

    /**
     * Registers nav menu locations.
     */
    public function registerMenus()
    {
        register_nav_menu('primary', __('Primary', 'ad-starter'));
    }

    /**
     * Registers sidebars.
     */
    public function registerSidebars()
    {
        register_sidebar([
            'id'            => 'primary',
            'name'          => __('Sidebar', 'ad-starter'),
            'description'   => __('Main sidebar area displayed on right side of page via trigger.', 'ad-starter'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ]);
    }
}
