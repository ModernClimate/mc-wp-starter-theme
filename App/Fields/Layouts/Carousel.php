<?php

namespace MC\App\Fields\Layouts;

use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Repeater;

/**
 * Class Carousel
 *
 * @package MC\App\Fields\Layouts
 */
class Carousel extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/carousel',
            Layout::make(__('Carousel'), 'carousel')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Repeater::make(__('Carousel Items'))
                    ->layout('block')
                    ->min(1)
                    ->buttonLabel(__('Add Item'))
                    ->fields([
                        WPImage::make('Image')
                          ->returnFormat('array'),
                    ]),
                    $this->optionsTab(),
                    // Group::make(__('Module Layout', 'mc-starter'))
                    //     ->layout('block')
                    //     ->fields([
                    //         Common::width('full'),
                    //         Common::contentAlignment('center')
                    //     ]),
                    // Common::paddingGroup('Padding', [3, 3, 3, 3]),
                ])
        );
    }
}
