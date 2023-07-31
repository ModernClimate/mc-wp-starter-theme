<?php

namespace MC\App\Fields;

use MC\App\Media;

/**
 * Class Util
 *
 * @package MC\App\Fields
 */
class Util
{

    /**
     * Wraps data in HTML w/ optional attributes / escaping.
     *
     * @param       $data - the content (typically text) to wrap
     * @param       $element - the HTML element to wrap the content with
     * @param array $atts - any attributes that should be added to the HTML element
     * @param mixed $escape - whether to escape $data - defaults to true - can be an escaping function
     * @param bool  $self_closing - whether the element is self closing i.e. <img />
     *
     * @return string - an HTML element.
     */
    public static function getHTML($data = null, $element = 'span', $atts = [], $escape = true, $self_closing = false)
    {
        $atts_output = ' ';

        // data cannot be empty without the element being self-closing
        if (empty($data) && $self_closing === false) {
            return '';
        }

        if (is_callable($escape)) {
            $data = $escape($data);
        } elseif ($escape) {
            $data = esc_html($data);
        }

        foreach ($atts as $key => $att) {
            // do not proceed if key is empty
            if (empty($key)) {
                continue;
            }

            // if key is present and attribute is empty, add only key to output.
            // This allows for HTML5 boolean attributes.
            // e.g. <input type="checkbox" checked disabled>Test</input>
            if (!isset($att) || empty($att)) {
                $atts_output .= esc_attr($key) . ' ';
                continue;
            }

            $atts_output .= esc_attr($key) . '="' . esc_attr($att) . '" ';
        }

        return $self_closing ? '<' . $element . $atts_output . ' />' : '<' . $element . $atts_output . '>' . $data . '</' . $element . '>';
    }

    /**
     * Helper/wrapper function that makes dealing with ACF image objects easier.
     * Grabs the required data from the ACF image object renders values into proper image markup.
     *
     * @param object $attachment
     * @param string $size
     * @param array $args
     *
     * @return string
     */
    public static function getImageHTML(object $attachment, string $size = 'medium', array $args = [])
    {
        $src    = ACF::getField($size, $attachment->sizes, $attachment->url);
        $alt    = !empty($attachment->alt) ? esc_attr($attachment->alt) : esc_attr($attachment->title);
        $params = '';
        foreach ($args as $attr => $value) {
            $params .= sprintf(
                ' %1$s="%2$s"',
                $attr,
                esc_attr($value)
            );
        }
        $image_markup = sprintf(
            '<img src="%1$s" alt="%2$s"%3$s>',
            esc_url($src),
            esc_attr($alt),
            $params
        );
        // check for image caption
        if (!empty($attachment->caption)) {
            $image_markup = sprintf(
                '<figure class="image__caption">%1$s <figcaption>%2$s</figcaption></figure>',
                $image_markup,
                esc_html($attachment->caption)
            );
        }

        return $image_markup;
    }


    /**
     * Check for background options in module data and output inline styles.
     *
     * @param array $data
     * @param number $data['background_image'] - id of attachment
     * @param string $data['background_color']
     * @param string $data['background_repeat']
     * @param string $data['background_position']
     * @param string $data['background_size']
     * @param string $size
     *
     * @return string
     */
    public static function getInlineBackgroundStyles(array $data, string $size = 'full')
    {
        if (empty($data) || !isset($data['background'])) {
            return '';
        }

        $image      = ACF::getField('background_image', $data);
        $attachment = !empty($image) ? Media::getAttachmentByID($image) : false;
        $src        = ACF::getField($size, $attachment->sizes, $attachment->url);

        // build out our inline background styles
        $styles = sprintf(
            'style="background: %1$s %2$s %3$s %4$s/%5$s;"',
            ACF::getField('background_color', $data, '#FFFFFF'),
            'url( ' . (!empty($attachment) ? esc_url($src) : '') . ')',
            ACF::getField('background_repeat', $data, 'no-repeat'),
            ACF::getField('background_position', $data, 'center center'),
            ACF::getField('background_size', $data, 'auto auto')
        );

        return $styles;
    }
}
