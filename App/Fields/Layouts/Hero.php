<?php

namespace AD\App\Fields\Layouts;

use AD\App\Fields\ACF;

/**
 * Class Hero
 *
 * @package AD\App\Fields\Layouts
 */
class Hero
{

    public $slug = 'hero';

    /**
     * Defines fields used within this module.
     *
     * @param $key
     *
     * @return mixed|void
     */
    public function layoutFields($key)
    {
        $prefix = "field_{$key}_{$this->slug}";

        $fields = [
            'name'       => $this->slug,
            'label'      => __('Hero', 'ad-starter'),
            'display'    => 'block',
            'sub_fields' => [
                [
                    'label'     => __('Content', 'ad-starter'),
                    'type'      => 'tab',
                    'placement' => 'left',
                    'endpoint'  => 0,
                ],
                [
                    'label'        => __('Headline', 'ad-starter'),
                    'name'         => 'headline',
                    'type'         => 'textarea',
                    'instructions' => '',
                    'rows'         => 2
                ],
                [
                    'label'        => __('Content', 'ad-starter'),
                    'name'         => 'content',
                    'type'         => 'wysiwyg',
                    'instructions' => '',
                    'tabs'         => 'all',
                    'toolbar'      => 'full',
                    'media_upload' => 0
                ],
                [
                    'label'         => __('Button', 'ad-starter'),
                    'name'          => 'button',
                    'type'          => 'link',
                    'return_format' => 'array',
                ]
            ],
        ];

        // get our field keys
        $fields['sub_fields'] = ACF::generateFieldKeys($prefix, $fields['sub_fields']);

        return apply_filters('ad/layout/hero', $fields);
    }
}
