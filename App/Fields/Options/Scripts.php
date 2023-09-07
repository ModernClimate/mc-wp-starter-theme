<?php

namespace MC\App\Fields\Options;

use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Textarea;

/**
 * Class Scripts
 *
 * @package MC\App\Fields\Options
 */
class Scripts
{
    /**
     * Defines fields used within Options tab.
     *
     * @return array
     */
    public function fields()
    {
        return apply_filters(
            'mc/options/scripts',
            [
                Tab::make(__('Scripts', 'mc-starter'))
                    ->placement('left'),
                Textarea::make(__('Head Scripts', 'crop-nutrition'), 'head-scripts')
                    ->rows(10),
                Textarea::make(__('Body Scripts', 'crop-nutrition'), 'body-scripts')
                    ->rows(10),
                Textarea::make(__('Footer Scripts', 'crop-nutrition'), 'footer-scripts')
                    ->rows(10),
            ]
        );
    }
}
