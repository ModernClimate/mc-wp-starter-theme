<?php

namespace MC\App;

use MC\App\Interfaces\WordPressHooks;
use MC\App\Fields\ACF;

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
     * @param number $attachment_id
     *
     * @return null|object
     */
    public static function getAttachmentByID($attachment_id)
    {
        $attachment = acf_get_attachment($attachment_id);

        if (!$attachment) {
            return null;
        }

        return (object) $attachment;
    }

    /**
     * Retrieve an image's src by attachment object and size
     *
     * @param object $attachment
     * @param string $size
     *
     * @return null|string
     *
     * @since 3.1.7
     */
    public static function getAttachmentSrc($attachment, $size = 'full')
    {
        if (!$attachment || !property_exists($attachment, 'sizes')) {
            return null;
        }

        return ACF::getField($size, $attachment->sizes, $attachment->url);
    }

    /**
     * Retrieve an image's src by attachment ID and size
     *
     * @param number $attachment_id
     * @param string $size
     *
     * @return null|string
     *
     * @since 3.1.7
     */
    public static function getAttachmentSrcByID($attachment_id, $size = 'full')
    {
        $attachment = self::getAttachmentByID($attachment_id);

        if (!$attachment || !property_exists($attachment, 'sizes')) {
            return null;
        }

        return ACF::getField($size, $attachment->sizes, $attachment->url);
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
     * @param array $data
     * @param $file
     * @param string $filename
     * @param string[] $mimes
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
     * @param array $mimes
     *
     * @return mixed
     */
    public function mimeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;
    }
}
