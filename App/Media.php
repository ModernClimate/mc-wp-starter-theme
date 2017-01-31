<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Media
 *
 * @package AD Starter\App
 */
class Media implements WordPressHooks {

    public function __construct() {
        // add_image_size( 'featured', 760, 9999 );
    }

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_filter( 'wp_check_filetype_and_ext', [ $this, 'checkFiletype' ], 10, 4 );
        add_filter( 'upload_mimes', [ $this, 'mimeTypes' ] );
        add_action( 'admin_head', [ $this, 'fixSVGStyles' ] );
    }

    /**
     * Patch fix for filetype checks for previous WordPress versions
     *
     * @param $data
     * @param $file
     * @param $filename
     * @param $mimes
     *
     * @return array
     */
    public function checkFiletype( $data, $file, $filename, $mimes ) {
        global $wp_version;

        if ( (float) $wp_version > 4.7 ) {
            return $data;
        }

        $filetype = wp_check_filetype( $filename, $mimes );

        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    }

    /**
     * Add SVG to list of accepted file types
     *
     * @param $mimes
     *
     * @return mixed
     */
    public function mimeTypes( $mimes ) {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }

    /**
     * Output additional CSS to fix SVG viewing in the WP Admin
     */
    public function fixSVGStyles() {
        echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
    }
}