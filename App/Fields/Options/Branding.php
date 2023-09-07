<?php

namespace MC\App\Fields\Options;

use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Image;

/**
 * Class Branding
 *
 * @package MC\App\Fields\Options
 */
class Branding
{
    /**
     * Defines fields used within Options tab.
     *
     * @return array
     */
    public function fields()
    {
        return apply_filters(
            'mc/options/branding',
            [
                Tab::make(__('Branding', 'mc-starter'))
                    ->placement('left'),
                Image::make(__('Site Logo', 'mc-starter'), 'site-logo')
                    ->returnFormat('array')
                    ->previewSize('thumbnail')
            ]
        );
    }
}
