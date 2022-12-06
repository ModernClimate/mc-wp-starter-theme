<?php

namespace MC\App\Fields\FieldGroups;

use MC\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;

/**
 * Class HeroBlockFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class HeroBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(MC_THEME_DIR . 'components/blocks/hero/block.json');

        register_extended_field_group([
            'title'    => __('MC Hero', 'mc-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/hero')
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
        return apply_filters('mc/field-group/hero-block/fields', [
            Image::make('Hero Image')
        ]);
    }
}