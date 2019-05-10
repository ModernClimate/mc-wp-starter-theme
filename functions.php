<?php
/**
 * Functions and definitions
 *
 * @package AD Starter
 */

use AD\App\Core\Init;
use AD\App\Setup;
use AD\App\Scripts;
use AD\App\Media;
use AD\App\Fields\ACF;
use AD\App\Fields\Options;
use AD\App\Fields\Modules;
use AD\App\Shortcodes;

/**
 * Define Theme Version
 * Define Theme directories
 */
define('THEME_VERSION', '2.4.0');
define('AD_THEME_DIR', trailingslashit(get_template_directory()));
define('AD_THEME_PATH_URL', trailingslashit(get_template_directory_uri()));

// Require Autoloader
require_once AD_THEME_DIR . 'vendor/autoload.php';

/**
 * Theme Setup
 */
add_action('after_setup_theme', function () {

    (new Init())
        ->add(new Setup())
        ->add(new Scripts())
        ->add(new Options())
        ->add(new Media())
        ->add(new Modules())
        ->add(new Shortcodes())
        ->add(new ACF())
        ->initialize();


    // Translation setup
    load_theme_textdomain('ad-starter', AD_THEME_DIR . '/languages');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Add automatic feed links in header
    add_theme_support('automatic-feed-links');

    // Add Post Thumbnail Image sizes and support
    add_theme_support('post-thumbnails');

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);
});
