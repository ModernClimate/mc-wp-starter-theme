<?php

namespace MC\App;

use MC\App\Fields\ACF;
use MC\App\Fields\Options;
use MC\App\Interfaces\WordPressHooks;

/**
 * Class Scripts
 *
 * @package MC\App
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
        add_action('mc/scripts/head', [$this, 'outputHeadScripts']);
        add_action('mc/scripts/body', [$this, 'outputBodyScripts']);
        add_action('mc/scripts/footer', [$this, 'outputFooterScripts']);
    }

    /**
     * Load scripts for the front end.
     */
    public function enqueueScripts()
    {
        wp_enqueue_script(
            'mc-theme',
            get_template_directory_uri() . "/build/scripts/theme-scripts.min.js",
            [],
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
            'mc-styles',
            get_template_directory_uri() . '/build/styles/theme-styles.min.css',
            [],
            THEME_VERSION
        );
    }

    /**
     * Output scripts in the head.
     */
    public function outputHeadScripts()
    {
        $options = Options::getSiteOptions();
        $scripts = ACF::getField('head-scripts', $options);
        echo $scripts;
    }

    /**
     * Output scripts in the body.
     */
    public function outputBodyScripts()
    {
        $options = Options::getSiteOptions();
        $scripts = ACF::getField('body-scripts', $options);
        echo $scripts;
    }

    /**
     * Output scripts in the footer.
     */
    public function outputFooterScripts()
    {
        $options = Options::getSiteOptions();
        $scripts = ACF::getField('footer-scripts', $options);
        echo $scripts;
    }
}
