<?php

namespace MC\App\Fields\FieldGroups;

use MC\App\Fields\Common;
use MC\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Textarea;

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
            'title'    => __('MC Carousel', 'mc-starter'),
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
                    Accordion::make('Slide'),
                    Image::make('Image'),
                    Textarea::make('Caption')
                        ->rows(2),
                ])
                ->min(1)
                ->buttonLabel('Add Slide')
                ->layout('block'),
            Accordion::make('Block Settings'),
            Common::marginGroup()
        ]);
    }
}