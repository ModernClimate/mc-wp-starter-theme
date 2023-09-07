<?php

namespace MC\App\Fields\Layouts;

use Extended\ACF\Fields\ButtonGroup;
use Extended\ACF\Fields\Image as WPImage;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;

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
                    Select::make(__('Animation Type', 'mc-starter'), 'carousel-animation-type')
                        ->choices([
                            'fade'  => __('Fade', 'mc-starter'),
                            'pull'  => __('Pull', 'mc-starter'),
                            'push'  => __('Push', 'mc-starter'),
                            'scale' => __('Scale', 'mc-starter'),
                            'slide' => __('Slide', 'mc-starter'),
                        ])
                        ->defaultValue('slide')
                        ->returnFormat('value')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Arrow Navigation', 'mc-starter'), 'show-carousel-arrows-nav')
                        ->choices([
                            'true'  => __('Enable', 'mc-starter'),
                            'false' => __('Disable', 'mc-starter'),
                        ])
                        ->instructions(__('Enabling will show a previous and next navigation arrow overlayed on the carousel.', 'mc-starter'))
                        ->defaultValue('true')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Indicators', 'mc-starter'), 'show-carousel-indicators')
                        ->choices([
                            'true'  => __('Enable', 'mc-starter'),
                            'false' => __('Disable', 'mc-starter'),
                        ])
                        ->instructions(__('Enabling will show a dot navigation button group.', 'mc-starter'))
                        ->defaultValue('false')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                ])
        );
    }
}
