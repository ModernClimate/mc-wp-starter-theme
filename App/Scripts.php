<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package AD\App
 */
class Scripts implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts()
    {
        /**
         * wp_enqueue_script(
         * 'ad-vendor',
         * get_stylesheet_directory_uri() . '/build/js/vendor.min.js',
         * ['jquery'],
         * THEME_VERSION,
         * true
         * );
         */

        // set the unminified file type if we're in development env.
        $filename = '.min';
        if (isset($_ENV['WP_ENV']) && 'development' === $_ENV['WP_ENV']) {
            $filename = '';
        }

        wp_enqueue_script(
            'ad-theme',
            get_stylesheet_directory_uri() . "/build/js/theme{$filename}.js",
            ['jquery'],
            THEME_VERSION,
            true
        );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Load stylesheets for the front end.
     */
    public function enqueueStyles()
    {
        wp_enqueue_style(
            'ad-styles',
            get_stylesheet_directory_uri() . '/build/css/theme.min.css',
            [],
            THEME_VERSION
        );
    }
}
