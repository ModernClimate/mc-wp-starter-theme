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
        add_action('widgets_init', [$this, 'registerSidebars'], 5);
        add_action('acf/init', [$this, 'my_acf_init_block_types']);
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

    public function my_acf_init_block_types() {
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {
            // register a Carousel block.
            acf_register_block_type(array(
                'name'              => 'carousel',
                'title'             => __('Carousel'),
                'description'       => __('A custom carousel block.'),
                'render_template'   => 'components/blocks/carousel/carousel.php',
                'category'          => 'mc_blocks',
                'icon'              => 'slides',
                'keywords'          => array( 'carousel', 'slider' ),
                'align'             => 'wide',
                'mode'              => 'preview'
            ));
        }
    }
}
