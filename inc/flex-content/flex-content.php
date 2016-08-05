<?php
if ( function_exists('have_rows') ) {
  if( have_rows('content_rows') ) {
    while ( have_rows('content_rows') ) {
      the_row();
      $layout_name = get_row_layout();
      echo "<div class=\"row row-flex-content {$layout_name}\">";
      switch( $layout_name ) {
        case 'row_columns':
          include( AD_THEME_DIR . 'inc/flex-content/columns.php' );
          break;
        case 'row_slideshow':
          include( AD_THEME_DIR . 'inc/flex-content/slideshow.php' );
          break;
        case 'row_tabs':
          include( AD_THEME_DIR . 'inc/flex-content/tabs.php' );
          break;
        case 'row_accordion':
          include( AD_THEME_DIR . 'inc/flex-content/accordion.php' );
          break;
      }
      echo "</div>";
    }
  }
}
