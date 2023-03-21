<?php

namespace MC\App;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Media
 *
 * @package MC\App
 */
class Media implements WordPressHooks
{

    public function __construct()
    {
        $this->addImageSizes();
    }

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_filter('upload_mimes', [$this, 'mimeTypes']);
        add_filter('wp_check_filetype_and_ext', [$this, 'checkFiletype'], 10, 4);
    }

    /**
     * Retrieve an image to represent an attachment and return the attachment object of the image
     *
     * @param $attachment_id
     *
     * @return null|object
     */
    public static function getAttachmentByID($attachment_id)
    {
        $attachment = acf_get_attachment($attachment_id);

        return $attachment ? (object) $attachment : null;
    }

    /**
     * Register new image sizes
     *
     * Use this method to register additional image sizes in the theme
     *
     * @since 1.0.1
     */
    public function addImageSizes()
    {
    }

    /**
     * Allow uploading of SVG file types within the WP Media Uploader.
     *
     * @param $data
     * @param $file
     * @param $filename
     * @param $mimes
     *
     * @return array
     */
    public function checkFiletype($data, $file, $filename, $mimes)
    {
        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
    }

    /**
     * Adds SVGs to array of allowed mime types and file extensions
     *
     * @param $mimes
     *
     * @return mixed
     */
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }
}
