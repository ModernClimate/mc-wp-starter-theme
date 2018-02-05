<?php

namespace AD\App\Fields;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Modules
 *
 * @package AD\App\Fields
 */
class Modules implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'ad/modules/output', [ $this, 'outputFlexibleModules' ] );
    }

    /**
     * Loop through flexible modules meta and include each module file to the page.
     * $data is set to the scope of just the current module, so that only relevant values are passed to each file.
     *
     * @param $post_id
     */
    public function outputFlexibleModules( $post_id ) {
        $meta = ACF::getPostMeta( $post_id );
        if ( ! empty( $meta['modules'] ) && is_array( $meta['modules'] ) ) {
            $modules = ACF::getRowsLayout( 'modules', $meta );

            foreach ( $meta['modules'] as $index => $module ) {
                $data   = $modules[ $index ];
                $row_id = $module . '-' . $index;

                $file = locate_template( "components/modules/{$module}.php" );
                if ( file_exists( $file ) ) {
                    include( $file );
                }
            }
        }
    }
}