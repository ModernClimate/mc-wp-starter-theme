<?php
/**
 * Check for flexible content rows and include module file if exists
 *
 * @package AD Starter
 */

if ( ! function_exists( 'have_rows' ) && ! have_rows( 'content_rows' ) ) {
    return false;
}

while ( have_rows( 'content_rows' ) ) {
    the_row();
    $row_name = get_row_layout();
    $row_id   = $row_name . '-' . get_row_index();

    include( locate_template( "components/modules/{$row_name}.php" ) );
}
