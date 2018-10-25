<?php

namespace AD\App;

/**
 * Class Media
 *
 * @package AD\App
 */
class Media {

    public function __construct() {
        $this->addImageSizes();
    }

    /**
     * Retrieve an image to represent an attachment and return the attachment object of the image
     *
     * @param $attachment_id
     *
     * @return object
     */
    public static function getAttachmentByID( $attachment_id ) {
        $attachment = acf_get_attachment( $attachment_id );

        return (object) $attachment;
    }

    /**
     * Register new image sizes
     *
     * Use this method to register additional image sizes in the theme
     *
     * @since 1.0.1
     */
    public function addImageSizes() {
    }
}