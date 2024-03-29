<?php

namespace MC\App\Fields\FieldGroups;

use Extended\ACF\Location;
use Extended\ACF\Fields\FlexibleContent;
use MC\App\Fields\Layouts\Carousel;
use MC\App\Fields\Layouts\ContentArea;
use MC\App\Fields\Layouts\Hero;
use MC\App\Fields\Layouts\Image;
use MC\App\Fields\FieldGroups\RegisterFieldGroups;

/**
 * Class PageBuilderFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class PageBuilderFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Extended ACF
     */
    public function registerFieldGroup()
    {
        register_extended_field_group([
            'title'    => __('Page Builder', 'mc-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::where('page_template', 'templates/page-builder.php')
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
                    (new Carousel())->fields(),
                    (new ContentArea())->fields(),
                    (new Hero())->fields(),
                    (new Image())->fields(),
                ])
        ]);
    }
}
