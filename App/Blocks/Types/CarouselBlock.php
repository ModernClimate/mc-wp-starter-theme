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
    }
}