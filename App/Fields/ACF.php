<?php

namespace AD\App\Fields;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class ACF
 *
 * @package AD\App\Fields
 */
class ACF implements WordPressHooks {


    public function __construct() {
        // load ACF Fields
        require_once AD_THEME_DIR . 'inc/acf/fields.php';
    }

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'init', [ $this, 'addOptionsPage' ] );
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
     * Returns an option wrapped in HTML. Works well for headings, spans, divs, etc.
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

        return Util::getHTML( $option, $element, $atts, $escape );
    }

}
