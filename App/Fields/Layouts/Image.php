<?php

namespace MC\App\Fields\Layouts;

use Extended\ACF\Fields\Image as WPImage;
use Extended\ACF\Fields\Layout;

/**
 * Class Image
 *
 * @package MC\App\Fields\Layouts
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
        return apply_filters(
            'mc/layout/image',
            Layout::make(__('Image', 'mc-starter'), 'image')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    WPImage::make(__('Image', 'mc-starter'), 'image')
                        ->returnFormat('array')
                ])
        );
    }
}
