<?php

namespace MC\App\Components;

class El
{
    /**
     * Returns standardized icon html by name
     *
     * @param string $icon_name
     *
     * @return string
     */
    public static function icon(string $icon_name)
    {
        if (empty($icon_name)) {
            return '';
        }

        return sprintf(
            '<svg class="icon icon-%1$s" aria-hidden="true">
                <use xlink:href="#icon-%1$s"></use>
            </svg>',
            $icon_name
        );
    }

    /**
     * Wrapper function for parsing button data and outputting proper markup.
     *
     * @param array $link
     * @param string $link['title']
     * @param string $link['url']
     * @param string $link['target']
     * @param array $args
     * @param string $args['class']
     * @param string $args['icon-end']
     * @param string $args['icon-start']
     *
     * @return string
     */
    public static function button(array $link, array $args = [])
    {
        $output = '';
        if (!isset($link['title'])) {
            return $output;
        }

        $defaults = [
            'class' => 'btn btn-primary',
            'icon-end' => '',
            'icon-start' => ''
        ];
        $atts = wp_parse_args($args, $defaults);
        $icon_start = self::icon($atts['icon-start']);
        $icon_end = self::icon($atts['icon-end']);

        $output = sprintf(
            '<a href="%2$s" target="%3$s" class="%4$s">%5$s%1$s%6$s</a>',
            esc_html($link['title']),
            esc_url($link['url']),
            esc_attr($link['target']),
            $atts['class'],
            $icon_start,
            $icon_end,
        );

        return $output;
    }
}
