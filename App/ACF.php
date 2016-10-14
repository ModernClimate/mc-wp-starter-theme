<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class ACF
 *
 * @package AD Starter\App
 */
class ACF implements WordPressHooks {

    public function __construct() {
        // load ACF Fields
        require_once get_template_directory() . '/inc/acf/fields.php';
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
     * Helper method to retrieve all ACF site options and cache the result
     *
     * @return array|bool
     */
    public function getACFOptions() {
        global $wpdb;

        $acf_options = wp_cache_get( 'ad_acf_options', 'options' );

        if ( ! $acf_options ) {
            $suppress       = $wpdb->suppress_errors();
            $acf_options_db = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE option_name LIKE 'options_%'" );
            $wpdb->suppress_errors( $suppress );
            $acf_options = [ ];
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
}