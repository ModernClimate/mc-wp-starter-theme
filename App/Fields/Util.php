<?php

namespace AD\App\Fields;

/**
 * Class Util
 *
 * @package AD\App\Fields
 */
class Util {

    /**
     * Wraps data in HTML w/ optional attributes / escaping.
     *
     * @param       $data - the content (typically text) to wrap
     * @param       $element - the HTML element to wrap the content with
     * @param array $atts - any attributes that should be added to the HTML element
     * @param mixed $escape - whether to escape $data - defaults to true - can be an escaping function
     * @param bool $self_closing - whether the element is self closing i.e. <img />
     *
     * @return string - an HTML element.
     */
    public static function getHTML( $data = null, $element = 'span', $atts = [], $escape = true, $self_closing = false ) {
        $atts_output = ' ';

        // data cannot be empty without the element being self-closing
        if ( empty( $data ) && $self_closing === false ) {
            return '';
        }

        if ( is_callable( $escape ) ) {
            $data = $escape( $data );
        } else if ( $escape ) {
            $data = esc_html( $data );
        }

        foreach ( $atts as $key => $att ) {
            // do not proceed if key is empty
            if ( empty( $key ) ) {
                continue;
            }

            // if key is present and attribute is empty, add only key to output.
            // This allows for HTML5 boolean attributes.
            // e.g. <input type="checkbox" checked disabled>Test</input>
            if ( ! isset( $att ) || empty( $att ) ) {
                $atts_output .= esc_attr( $key ) . ' ';
                continue;
            }

            $atts_output .= esc_attr( $key ) . '="' . esc_attr( $att ) . '" ';
        }

        return $self_closing ? '<' . $element . $atts_output . ' />' : '<' . $element . $atts_output . '>' . $data . '</' . $element . '>';
    }

    /**
     * Helper/wrapper function that makes dealing with ACF image arrays easier.
     * Grabs the required data from the ACF image array and passes it to self::getHTML().
     * Assumes ACF image field is configured to save data as an image array.
     * Default data can be overwritten if passed in $atts.
     * Example usage: echo ACF::getImageHTML( $slide['image'], [ 'class' => 'slide__img' ], 'large' );
     *
     * @param        $acf_image_array
     * @param array $atts
     * @param string $size
     *
     * @return string - an HTML img element.
     */
    public static function getImageHTML( $acf_image_array, $atts = [], $size = 'medium' ) {
        if ( ! isset( $acf_image_array['sizes'][ $size ] ) ) {
            return '';
        }

        if ( ! isset( $atts['src'] ) ) {
            $atts['src'] = $acf_image_array['sizes'][ $size ];
        }

        if ( ! isset( $atts['alt'] ) ) {
            $atts['alt'] = $acf_image_array['alt'];
        }

        if ( ! isset( $atts['height'] ) ) {
            $atts['height'] = $acf_image_array['sizes'][ $size . '-height' ];
        }

        if ( ! isset( $atts['width'] ) ) {
            $atts['width'] = $acf_image_array['sizes'][ $size . '-width' ];
        }

        return self::getHTML( null, 'img', $atts, false, true );
    }

}
