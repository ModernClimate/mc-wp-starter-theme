<?php

namespace MC\App;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package MC\App
 */
class Scripts implements WordPressHooks
{
    private $stylesheet_directory_uri;

    public function __construct()
    {
        $this->stylesheet_directory_uri = get_stylesheet_directory_uri();
    }

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
        wp_enqueue_script(
            'mc-scripts-vendor',
            $this->stylesheet_directory_uri . '/build/js/vendor.min.js',
            ['jquery'],
            THEME_VERSION,
            true
        );

        // set the unminified file type if we're in development env.
        $filename = '.min';
        if (isset($_ENV['WP_ENV']) && 'development' === $_ENV['WP_ENV']) {
            $filename = '';
        }

        wp_enqueue_script(
            'mc-scripts-theme',
            $this->stylesheet_directory_uri . "/build/js/theme{$filename}.js",
            ['jquery', 'mc-scripts-vendor'],
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
            'mc-styles-vendor',
            $this->stylesheet_directory_uri . '/build/css/vendor.min.css',
            [],
            THEME_VERSION
        );

        wp_enqueue_style(
            'mc-styles-theme',
            $this->stylesheet_directory_uri . '/build/css/theme.min.css',
            ['mc-styles-vendor'],
            THEME_VERSION
        );
    }
}
