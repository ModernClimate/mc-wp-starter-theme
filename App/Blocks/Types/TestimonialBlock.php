<?php

namespace MC\App\Blocks\Types;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class TestimonialBlock
 *
 * @package MC\App\Blocks\Types
 */
class TestimonialBlock implements WordPressHooks
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
                'name'              => 'testimonial',
                'title'             => __('Testimonial', 'mc-starter'),
                'description'       => __('MC Testimonial block initialized with slick.'),
                'render_template'   => 'components/blocks/testimonial.php',
                'category'          => 'mc_blocks',
                'icon'              => 'slides',
                'keywords'          => ['testimonial', 'quote'],
            ]
        );
    }
}