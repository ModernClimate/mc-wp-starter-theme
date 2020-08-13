<?php

namespace MC\App\Blocks\Types;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class CarouselBlock
 *
 * @package MC\App\Blocks\Types
 */
class CarouselBlock implements WordPressHooks
{
    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('acf/init', [$this, 'registerBlockType']);
    }

    /**
     * Register block type
     */
    public function registerBlockType()
    {
        if (!function_exists('acf_register_block_type')) {
            return;
        }

        acf_register_block_type(
            [
                'name'              => 'carousel',
                'title'             => __('Carousel', 'mc-starter'),
                'description'       => __('MC Carousel block initialized with slick.'),
                'render_template'   => 'components/blocks/carousel.php',
                'category'          => 'mc_blocks',
                'icon'              => 'slides',
                'keywords'          => ['carousel', 'slider'],
            ]
        );
    }
}
