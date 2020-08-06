<?php

namespace AD\App\Fields\Options;

use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Image;

/**
 * Class Branding
 *
 * @package AD\App\Fields\Options
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
        return [
            Tab::make('Branding')
                ->placement('left'),
            Image::make('Site Logo')
                ->returnFormat('array')
                ->previewSize('thumbnail')
        ];
    }
}
