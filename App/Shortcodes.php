<?php

namespace MC\App;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Shortcodes
 *
 * @package MC\App
 */
class Shortcodes implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_shortcode('button', [$this, 'button']);
        add_shortcode('tooltip', [$this, 'tooltip']);
    }

    /**
     * Generate button markup
     *
     * @param $atts
     * @param null $content
     *
     * @return string
     */
    public function button($atts, $content = null)
    {
        $atts = shortcode_atts(
            [
                'link'    => '#',
                'target'  => '_blank',
                'classes' => 'btn',
                'style'   => 'btn-default',
                'block'   => ''
            ],
            $atts,
            'button'
        );

        $classes = $atts['classes'] . ' ' . $atts['style'];
        $classes .= (!empty($atts['block']) && 'true' === $atts['block']) ? ' btn-block' : '';

        return "<a class=\"{$classes}\" href=\"{$atts['link']}\" target=\"{$atts['target']}\">{$content}</a>";
    }

    /**
     * Bootstrap tooltip markup
     *
     * @param $atts
     * @param null $content
     *
     * @return string
     */
    public function tooltip($atts, $content = null)
    {
        $atts = shortcode_atts(
            [
                'text'      => 'NO TEXT ENTERED',
                'placement' => 'top'
            ],
            $atts,
            'tooltip'
        );

        return "<span data-toggle=\"tooltip\" data-placement=\"{$atts['placement']}\" title=\"{$atts['text']}\">" . do_shortcode($content) . "</span>";
    }
}
