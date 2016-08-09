<?php
// Constants
define( 'AD_THEME_DIR', get_template_directory() . '/' );
define( 'AD_THEME_PATH_URL', get_template_directory_uri() . '/' );

// Global variable for theme class
if ( !isset( $theme ) ) {
  global $theme;
  $theme = new AD_Theme();
}

// Theme class init
add_action( 'after_setup_theme', [ $theme, 'after_setup_theme' ] );

class AD_Theme {

  public function after_setup_theme() {

    // Theme includes
    include_once 'inc/enqueue.php';
    include_once 'inc/acf-fields.php';
    include_once 'inc/shortcodes.php';

    // Register primary menu
    register_nav_menus(['primary' => 'Primary Menu']);

    // Register sidebar
    register_sidebar([
      'name'            => 'Sidebar',
      'id'              => 'sidebar-1',
      'before_widget'   => '<div id="%1$s" class="widget %2$s">',
      'after_widget'    => '</div>',
      'before_title'    => '<h4 class="widgettitle">',
      'after_title'     => '</h4>',
    ]);

    // Theme supports
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );

    // ACF options page
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page();
    }
  }

}

if ( defined('WP_ENV') )
  require_once 'krumo/class.krumo.php';
