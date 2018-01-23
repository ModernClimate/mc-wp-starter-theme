<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class ACF
 *
 * @package AD\App
 */
class ACF implements WordPressHooks {

    /**
     * Holds any ACF fields that should allow a helper image.
     * Modify this list to allow helper images on additional fields.
     *
     * @var array
     */
    private $helper_image_fields = [
        'message'
    ];

    public function __construct() {
        // load ACF Fields
        require_once AD_THEME_DIR . 'inc/acf/fields.php';
    }

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'init', [ $this, 'addOptionsPage' ] );

        // Add helper images.
        add_action( 'acf/render_field_settings', [ $this, 'addImage' ] );
        add_action( 'acf/render_field', [ $this, 'renderImage' ] );
    }


    /**
     * ACF Options Panels
     */
    public function addOptionsPage() {
        if ( function_exists( 'acf_add_options_page' ) ) {
            acf_add_options_page( [
                'page_title' => __( 'Site Options', 'ad-starter' ),
                'menu_title' => __( 'Options', 'ad-starter' ),
                'menu_slug'  => 'theme-general-options',
                'capability' => 'edit_posts',
                'position'   => 28,
                'icon_url'   => 'dashicons-admin-settings',
                'redirect'   => false
            ] );
        }
    }

    /**
     * Custom db query for grabbing all post meta while excluding ACF field key rows
     *
     * @param $post_id
     *
     * @return bool|mixed
     */
    public static function getPostMeta( $post_id ) {
        global $wpdb;

        $cache_key = 'ad_post_meta_' . $post_id;
        $post_meta = wp_cache_get( $cache_key, 'meta' );

        if ( ! $post_meta ) {
            $post_meta_db = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=%s AND meta_value NOT LIKE 'field_%'",
                    $post_id
                )
            );
            $post_meta    = [];
            foreach ( (array) $post_meta_db as $o ) {
                $post_meta[ $o->meta_key ] = maybe_unserialize( $o->meta_value );
            }

            if ( ! wp_installing() || ! is_multisite() ) {
                wp_cache_add( $cache_key, $post_meta, 'meta' );
            }
        }

        return $post_meta;
    }

    /**
     * Helper method to retrieve all ACF site options and cache the result
     *
     * @return array|bool
     */
    public static function getACFOptions() {
        global $wpdb;

        $acf_options = wp_cache_get( 'ad_acf_options', 'options' );

        if ( ! $acf_options ) {
            $acf_options_db = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE 'options_%'" );
            $acf_options    = [];
            foreach ( (array) $acf_options_db as $o ) {
                $new_key                 = str_replace( 'options_', '', $o->option_name );
                $acf_options[ $new_key ] = maybe_unserialize( $o->option_value );
            }
            if ( ! wp_installing() || ! is_multisite() ) {
                wp_cache_add( 'ad_acf_options', $acf_options, 'options' );
            }
        }

        return $acf_options;
    }

    /**
     * Helper function for retrieving a single option.
     *
     * @param $option
     *
     * @return mixed|null
     */
    public static function getACFOption( $option ) {

        $acf_options = self::getACFOptions();

        return isset( $acf_options[ $option ] ) ? $acf_options[ $option ] : null;
    }

    /**
     * Returns an option wrapped in HTML. Not conducive to anchors, images, etc. Does work well for
     * headings, spans, divs, etc.
     *
     * @param       $option
     * @param       $element
     * @param array $atts
     * @param bool  $escape
     *
     * @return string
     */
    public static function getOptionHTML( $option, $element, $atts = [], $escape = true ) {
        $option = self::getACFOption( $option );

        return self::getHTML( $option, $element, $atts, $escape );
    }

    /**
     * Returns an ACF subfield wrapped in HTML. Automatically escapes content.
     * Example usage: echo ACF::getSubFieldHTML('heading', 'h1', ['class'=>'block__heading', 'id'=>'my-heading']);
     * Example usage: echo ACF::getSubFieldHTML('wysiwyg_content', 'div', ['class'=>'block__content wysiwyg'], false);
     *
     * @param       $subfield
     * @param       $element
     * @param array $atts
     * @param bool  $escape
     *
     * @return string - an HTML element.
     */
    public static function getSubFieldHTML( $subfield, $element, $atts = [], $escape = true ) {
        if ( ! function_exists( 'get_sub_field' ) ) {
            return '';
        }

        $data = get_sub_field( $subfield );

        return self::getHTML( $data, $element, $atts, $escape );
    }

    /**
     * Wraps data in HTML w/ optional attributes / escaping.
     *
     * @param       $data         - the content (typically text) to wrap
     * @param       $element      - the HTML element to wrap the content with
     * @param array $atts         - any attributes that should be added to the HTML element
     * @param bool  $escape       - whether to escape $data - defaults to true
     * @param bool  $self_closing - whether the element is self closing i.e. <img />
     *
     * @return string - an HTML element.
     */
    public static function getHTML( $data = null, $element = 'span', $atts = [], $escape = true, $self_closing = false ) {
        $atts_output = ' ';

        // data cannot be empty without the element being self-closing
        if ( empty( $data ) && $self_closing === false ) {
            return '';
        }

        if ( $escape ) {
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
     * @param array  $atts
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

    /**
     * Add the extra helper image field (when configuring ACF fields).
     * A helper image is useful in portraying (i.e. through a screenshot)
     * how a field will be represented on the frontend.
     *
     * @param $field
     */
    public function addImage( $field ) {

        if ( isset( $field['type'] ) && ! in_array( $field['type'], $this->helper_image_fields ) ) {
            return;
        }

        if ( ! function_exists( 'acf_render_field' ) ) {
            return;
        }

        acf_render_field_setting( $field, [
            'label'        => __( 'Helper Image', 'summit' ),
            'instructions' => __( 'Upload an image that will help a user discern what this field is used for.', 'summit' ),
            'name'         => 'helper_image',
            'type'         => 'image',
            'ui'           => 1,
        ], true );
    }

    /**
     * Renders the helper image within the ACF field (when editing a post).
     *
     * @param $field
     *
     * @return mixed
     */
    public function renderImage( $field ) {

        if ( isset( $field['type'] ) && ! in_array( $field['type'], $this->helper_image_fields ) ) {
            return $field;
        }

        // bail early if no 'admin_only' setting
        if ( ! isset( $field['helper_image'] ) || empty( $field['helper_image'] ) ) {
            return $field;
        }

        $image = wp_get_attachment_image_src( $field['helper_image'], 'medium' );

        if ( ! isset( $image[0] ) ) {
            return $field;
        }

        echo '<img src="' . esc_url( $image[0] ) . '" alt="' . __( 'Helper Image', 'summit' ) . '" height="' . esc_attr( $image[2] ) . '" width="' . esc_attr( $image[1] ) . '" />';

        return $field;
    }

}
