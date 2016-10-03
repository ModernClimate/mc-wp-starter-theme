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
	$rowName = get_row_layout();
	$rowId   = $rowName . '-' . get_row_index();

	include( locate_template( "components/modules/{$rowName}.php" ) );
}
