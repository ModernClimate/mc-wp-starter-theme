<?php

namespace AD\App\Fields\Layouts;

use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;

/**
 * Class Image
 *
 * @package AD\App\Fields\Layouts
 */
class Image extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return Layout::make('Image')
            ->layout('block')
            ->fields([
                $this->contentTab(),
                WPImage::make('Image')
                    ->returnFormat('array')
            ]);
    }
}
