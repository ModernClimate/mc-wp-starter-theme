<?php
/**
 * Functions and definitions
 *
 * @package MC
 */

use MC\App\Core\Init;
use MC\App\Setup;
use MC\App\Scripts;
use MC\App\Media;
use MC\App\Shortcodes;
use MC\App\Blocks\RegisterBlocks;
use MC\App\Blocks\Types\CarouselBlock;
use MC\App\Blocks\Types\TestimonialBlock;
use MC\App\Fields\ACF;
use MC\App\Fields\Options;
use MC\App\Fields\Modules;
use MC\App\Fields\FieldGroups\CarouselBlockFieldGroup;
use MC\App\Fields\FieldGroups\TestimonialBlockFieldGroup;
use MC\App\Fields\FieldGroups\ContentBlockFieldGroup;
use MC\App\Fields\FieldGroups\PageBuilderFieldGroup;
use MC\App\Fields\FieldGroups\SiteOptionsFieldGroup;
use MC\App\Fields\FieldGroups\HeroBlockFieldGroup;
use MC\App\Fields\FieldGroups\ColumnsBlockFieldGroup;
use MC\App\Theme\Styles;

/**
 * Define Theme Version
 * Define Theme directories
 */
define('THEME_VERSION', '3.0.2');
define('MC_THEME_DIR', trailingslashit(get_template_directory()));
define('MC_THEME_PATH_URL', trailingslashit(get_template_directory_uri()));

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
        ->add(new RegisterBlocks())
        ->add(new CarouselBlock())
        ->add(new TestimonialBlock())
        ->add(new ACF())
        ->add(new Options())
        ->add(new Modules())
        ->add(new Styles())
        ->add(new TestimonialBlockFieldGroup())
        ->add(new CarouselBlockFieldGroup())
        ->add(new PageBuilderFieldGroup())
        ->add(new SiteOptionsFieldGroup())
        ->add(new HeroBlockFieldGroup())
        ->add(new ContentBlockFieldGroup())
        ->add(new ColumnsBlockFieldGroup())
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