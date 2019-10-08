<?php

namespace AD\App\Fields\FieldGroups;

use AD\App\Fields\Layouts\ContentArea;
use AD\App\Fields\Layouts\Hero;
use AD\App\Fields\Layouts\Image;

/**
 * Class PageBuilderFieldGroup
 *
 * @package AD\App\Fields\PageBuilderFieldGroup
 */
class PageBuilderFieldGroup extends RegisterFieldGroups
{

    public $group_key = 'page-builder';

    /**
     * Define location parameters for this Field Group.
     */
    public function registerLocalFieldGroup()
    {
        $location = apply_filters('ad/field-group/page-builder/location', [
            [
                [
                    'param'    => 'page_template',
                    'operator' => '==',
                    'value'    => 'templates/page-builder.php',
                ],
            ],
        ]);

        $this->addLocalFieldGroup($this->getLocalFieldGroup(), $location);
    }

    /**
     * Build parameters array to include when we register this field group.
     *
     * @return array
     */
    public function getLocalFieldGroup()
    {
        return apply_filters('ad/field-group/page-builder/params', [
            'key'    => 'ad_field-group_' . $this->group_key,
            'title'  => __('Page Builder', 'ad-starter'),
            'fields' => $this->getFields()
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        // flexible modules require additional layout parameters
        return apply_filters('ad/field-group/page-builder/fields', [
            [
                'key'          => "group_{$this->group_key}",
                'label'        => __('Modules', 'ad-starter'),
                'name'         => 'modules',
                'type'         => 'flexible_content',
                'button_label' => __('Add Module', 'ad-starter'),
                'layouts'      => [
                    (new ContentArea())->layoutFields($this->group_key),
                    (new Hero())->layoutFields($this->group_key),
                    (new Image())->layoutFields($this->group_key),
                ]
            ]
        ]); // end return
    }
}
