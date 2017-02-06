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
use AD\App\ACF;
use AD\App\HybridMods;
use AD\App\Shortcodes;

/**
 * Define Theme Version
 * Define Theme directories
 * Defines custom Hybrid Core directories.
 */
define( 'THEME_VERSION', '1.0.1' );
define( 'AD_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'AD_THEME_PATH_URL', trailingslashit( get_template_directory_uri() ) );
define( 'HYBRID_DIR', AD_THEME_DIR . 'vendor/justintadlock/hybrid-core/' );
define( 'HYBRID_URI', AD_THEME_PATH_URL . 'vendor/justintadlock/hybrid-core/' );

// Require Autoloader
require_once 'vendor/autoload.php';

new Hybrid();

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function () {

    new Krumo();
    ( new Init() )
        ->add( new Setup() )
        ->add( new Scripts() )
        ->add( new ACF() )
        ->add( new HybridMods() )
        ->add( new Shortcodes() )
        ->initialize();
    new Media();

    // Translation setup
    load_theme_textdomain( 'ad-starter', AD_THEME_DIR . '/languages' );

    // Theme layouts.
    add_theme_support( 'theme-layouts', [ 'default' => is_rtl() ? 'sidebar-left' : 'sidebar' ] );

    // Enable custom template hierarchy.
    add_theme_support( 'hybrid-core-template-hierarchy' );

    // Add automatic feed links in header
    add_theme_support( 'automatic-feed-links' );

    // Add Post Thumbnail Image sizes and support
    add_theme_support( 'post-thumbnails' );

    // Switch default core markup to output valid HTML5.
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ] );

} );