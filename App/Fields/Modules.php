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
            $modules = self::getRowsLayout( 'modules', $meta );

            foreach ( $meta['modules'] as $index => $module ) {
                $data = $modules[ $index ];

                $file = locate_template( "components/modules/{$module}.php" );
                if ( file_exists( $file ) ) {
                    include( $file );
                }
            }
        }
    }

    /**
     * This function loops through Flexible Modules or Repeater Fields and compiles a multidimensional array
     * containing the field keys/values in the post meta.
     *
     * @param $selector
     * @param $meta
     *
     * @return mixed $modules
     */
    public static function getRowsLayout( $selector = '', $meta ) {
        $modules = [];
        if ( ! $selector || empty( $meta[ $selector ] ) ) {
            return $modules;
        }

        // check if this selector is a flexible module or a repeater row
        $counter = is_array( $meta[ $selector ] ) ? count( $meta[ $selector ] ) : $meta[ $selector ];

        for ( $i = 0; $i < $counter; $i ++ ) {
            $prefix = $selector . '_' . $i . '_';
            // Loop through meta and set selector rows into our array.
            foreach ( $meta as $key => $value ) {
                // check if our key matches the selector we need.
                if ( strpos( $key, $prefix ) === 0 ) {
                    // strip the current key of its prefixed selector to clean up our return array.
                    $new_key = str_replace( $prefix, '', $key );

                    // set our key and value.
                    $modules[ $i ][ $new_key ] = $value;
                }
            }
        }

        return $modules;
    }
}