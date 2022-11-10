<?php

namespace MC\App\Fields\FieldGroups;

use MC\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class ContentBlockFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class ContentBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(MC_THEME_DIR . 'components/blocks/contentBlock/block.json');

        register_extended_field_group([
            'title'    => __('MC Content', 'mc-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/content')
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
        return apply_filters('mc/field-group/contentBlock/fields', [
            Text::make(__('Title', 'mc-starter')),
            Textarea::make(__('Copy', 'mc-starter'))
        ]);
    }
}