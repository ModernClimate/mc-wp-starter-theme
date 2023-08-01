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
     * Wrapper function for parsing link data and outputting proper markup.
     *
     * @param array $link
     * @param string $link['title']
     * @param string $link['url']
     * @param string $link['target']
     * @param array $args
     * @param string $args['icon-end']
     * @param string $args['icon-start']
     * @param array $args['attributes']
     * @param string $args['attributes']['class']
     * @param string $args['attributes']etc
     *
     * @return string
     */
    public static function link(array $link, array $args = [])
    {
        $output = '';
        if (!isset($link['title'])) {
            return $output;
        }

        $defaults = [
            'class' => 'btn btn-primary',
            'icon-end' => '',
            'icon-start' => '',
            'attributes' => [
                'class' => 'btn btn-primary'
            ],
        ];
        $atts = wp_parse_args($args, $defaults);
        $icon_start = self::icon($atts['icon-start']);
        $icon_end = self::icon($atts['icon-end']);
        $atts = $args['attributes'] ?? [];

        $attributes = sprintf(
            ' href="%1$s" target="%2$s"',
            esc_url($link['url']),
            esc_attr($link['target']),
        );

        foreach ($atts as $key => $value) {
            $attributes .= sprintf(
                ' %1$s="%2$s"',
                $key,
                $value
            );
        }

        $output = sprintf(
            '<a%4$s>%1$s%2$s%3$s</a>',
            $icon_start,
            esc_html($link['title']),
            $icon_end,
            $attributes
        );

        return $output;
    }

    /**
     * Wrapper function for parsing button data and outputting proper markup.
     *
     * @param string $text
     * @param array $args
     * @param string $args['icon-end']
     * @param string $args['icon-start']
     * @param array $args['attributes']
     * @param string $args['attributes']['class']
     * @param string $args['attributes']etc
     *
     * @return string
     */
    public static function button(string $text, array $args = [])
    {
        $default_args = [
            'icon-end' => '',
            'icon-start' => '',
            'attributes' => [
                'class' => 'btn btn-primary'
            ],
        ];
        $args = wp_parse_args($args, $default_args);
        $icon_start = self::icon($args['icon-start']);
        $icon_end = self::icon($args['icon-end']);
        $atts = $args['attributes'] ?? [];
        $attributes = '';

        foreach ($atts as $key => $value) {
            $attributes .= sprintf(
                ' %1$s="%2$s"',
                $key,
                $value
            );
        }

        $output = sprintf(
            '<button%4$s>%1$s%2$s%3$s</button>',
            $icon_start,
            $text,
            $icon_end,
            $attributes
        );

        return $output;
    }
}
