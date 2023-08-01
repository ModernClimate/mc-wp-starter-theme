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
        add_shortcode('component', [$this, 'component']);
    }

    /**
     * Generate button markup
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function button(array $atts, $content = null)
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
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function tooltip(array $atts, $content = null)
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

    /**
     * Outputs example component and info
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function component(array $atts, $content = null)
    {
        $atts = shortcode_atts(
            [
                'name' => __('NO NAME ENTERED', 'mc-starter'),
            ],
            $atts,
            'component'
        );

        if (in_array($atts['name'], MC_COMPONENTS)) {
            $example_template = locate_template("components/examples/{$atts['name']}.php");
            if (file_exists($example_template)) {
                ob_start();
                echo '<div class="example-components">';
                include $example_template;
                echo '</div>';
                return ob_get_clean();
            } else {
                throw new Exception(__('Template file not found.', 'mc-starter'));
            }
        }

        return __('Template file not found.', 'mc-starter');
    }
}
