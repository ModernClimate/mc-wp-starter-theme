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
        add_action('acf/init', [$this, 'registerTestimonialBlockType']);
    }

    /**
     * Register block type
     */
    public function registerTestimonialBlockType()
    {
        if (!function_exists('acf_register_block_type')) {
            return;
        }
    }
}