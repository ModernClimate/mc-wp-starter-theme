<?php
/**
 * Functions and definitions
 *
 * @package AD Starterr
 */

use AD\App\Core\Init;
use AD\App\Setup;
use AD\App\Scripts;
use AD\App\ACF;
use AD\App\HybridMods;
use AD\App\Shortcodes;

/**
 * Define Theme Version
 * Defines custom Hybrid Core directory.
 */
define( 'THEME_VERSION', '1.0' );
define( 'HYBRID_DIR', __DIR__ . '/vendor/justintadlock/hybrid-core/' );
define( 'HYBRID_URI', get_template_directory_uri() . '/vendor/justintadlock/hybrid-core/' );

// Require Autoloader
require_once 'vendor/autoload.php';

// Loads the Hybrid Core framework.
require_once HYBRID_DIR . 'hybrid.php';

// loads Krumo
require_once 'vendor/oodle/krumo/class.krumo.php';

/**
 * Theme Setup
 */
add_action( 'after_setup_theme', function () {

	new Hybrid();
	( new Init() )
		->add( new Setup() )
		->add( new Scripts() )
		->add( new ACF() )
		->add( new HybridMods() )
		->add( new Shortcodes() )
		->initialize();

	// Translation setup
	load_theme_textdomain( 'adstarter', get_template_directory() . '/languages' );

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