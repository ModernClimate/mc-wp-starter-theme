<?php

/**
 * Functions and definitions
 *
 * @package MC
 */

use MC\App\Core\Init;
use MC\App\Scripts;
use MC\App\Media;
use MC\App\Setup;
use MC\App\Shortcodes;
use MC\App\Fields\ACF;
use MC\App\Fields\Modules;
use MC\App\Fields\Options;
use MC\App\Fields\FieldGroups\PageBuilderFieldGroup;
use MC\App\Fields\FieldGroups\SiteOptionsFieldGroup;

// use MC\App\Blocks\RegisterBlocks;

/**
 * Define Theme Version
 * Define Theme directories
 */
define('THEME_VERSION', '3.2.2');
define('MC_THEME_DIR', trailingslashit(get_template_directory()));
define('MC_THEME_PATH_URL', trailingslashit(get_template_directory_uri()));

require __DIR__ . '/constants.php';

// Require Autoloader
require_once MC_THEME_DIR . 'vendor/autoload.php';

/**
 * Theme Setup
 */
add_action('after_setup_theme', function () {

    (new Init())
        ->add(new Setup())
        ->add(new Scripts())
        ->add(new Media())
        ->add(new Shortcodes())
        ->add(new ACF())
        ->add(new Options())
        ->add(new Modules())
        ->add(new SiteOptionsFieldGroup())
        ->add(new PageBuilderFieldGroup())
        // ->add(new RegisterBlocks())
        ->initialize();

    // Translation setup
    load_theme_textdomain('mc-starter', MC_THEME_DIR . '/languages');

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
