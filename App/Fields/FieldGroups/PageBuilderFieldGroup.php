<?php

namespace MC\App\Fields\FieldGroups;

use MC\App\Fields\Layouts\Hero;
use MC\App\Fields\Layouts\Image;
use MC\App\Fields\Layouts\ContentArea;
use MC\App\Fields\FieldGroups\RegisterFieldGroups;

use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\FlexibleContent;

/**
 * Class PageBuilderFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class PageBuilderFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Page Builder', 'mc-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('page_template', 'templates/page-builder.php')
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
        return apply_filters('mc/field-group/page-builder/fields', [
            FlexibleContent::make(__('Modules', 'mc-starter'))
                ->buttonLabel(__('Add Module', 'mc-starter'))
                ->layouts([
                    (new ContentArea())->fields(),
                    (new Hero())->fields(),
                    (new Image())->fields(),
                ])
        ]);
    }
}
