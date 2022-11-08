<?php

namespace MC\App\Theme;

use MC\App\Fields\ACF;
use MC\App\Interfaces\WordPressHooks;

/**
 * Class Styles
 *
 * @package MC\App\Theme
 */
class Styles implements WordPressHooks
{
    /**
     * Add Class Hooks
     */
    public function addHooks()
    {
        add_action('mc/styles/margin', [$this, 'outputBlockMarginStyles'], 10, 2);
    }

        /**
     * Output internal css before block markup for custom margin options
     *
     * @param  [type] $block_id
     * @param  [type] $block
     * @return void
     */
    public function outputBlockMarginStyles($block_id, $block)
    {
        // print styles
        printf(
            '<style>
                #%1$s {
                    margin-top: %2$srem;
                }
                @media screen and (min-width: 1024px) {
                    #%1$s {
                        padding-top: %3$srem;
                    }
                }
            </style>',
            $block_id,
            $block['data']['margin_desktop_top'] ?: '0',
            $block['data']['margin_mobile_top'] ?: '0',
        );
    }
}