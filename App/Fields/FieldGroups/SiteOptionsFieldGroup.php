<?php

namespace AD\App\Fields\FieldGroups;

use AD\App\Fields\Options\Branding;

/**
 * Class SiteOptionsFieldGroup
 *
 * @package StoryMate\App\Fields\SiteOptionsFieldGroup
 */
class SiteOptionsFieldGroup extends RegisterFieldGroups
{

    public $group_key = 'site-options';

    /**
     * Define location parameters for this Field Group.
     */
    public function registerLocalFieldGroup()
    {
        $location = apply_filters('ad/field-group/site-options/location', [
            [
                [
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'theme-general-options',
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
        return apply_filters('ad/field-group/site-options/params', [
            'key'    => "ad_field-group_{$this->group_key}",
            'title'  => __('Site Options', 'ad-starter'),
            'fields' => $this->getFields(),
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        // merge our fields into a single array
        $fields = array_merge(
            (new Branding())->layoutFields()
        );

        // flexible modules require additional layout parameters
        return apply_filters('ad/field-group/site-options/fields', $fields); // end return
    }
}
