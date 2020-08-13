<?php

namespace MC\App\Fields\FieldGroups;

use MC\App\Fields\FieldGroups\RegisterFieldGroups;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Wysiwyg;

/**
 * Class CarouselBlockFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class CarouselBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Carousel', 'mc-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/carousel')
            ],
            'style' => 'default'
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        return apply_filters('mc/field-group/carousel-block/fields', [
            Repeater::make('Carousel')
                ->fields([
                    Tab::make('Content'),
                    Wysiwyg::make('Caption'),
                    Tab::make('Media'),
                    Image::make('Image'),
                ])
                ->min(1)
                ->buttonLabel('Add Slide')
                ->layout('block')
        ]);
    }
}
