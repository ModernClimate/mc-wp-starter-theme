<?php

namespace AD\App\Fields\Layouts;

use AD\App\Fields\ACF;

/**
 * Class ContentArea
 *
 * @package AD\App\Fields\Layouts
 */
class ContentArea
{

    public $slug = 'content-area';

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
            'label'      => __('Content Area', 'ad-starter'),
            'display'    => 'block',
            'sub_fields' => [
                [
                    'label'        => __('Content', 'ad-starter'),
                    'type'         => 'tab',
                    'placement'    => 'left',
                    'endpoint'     => 0,
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
                ]
            ],
        ];

        // get our field keys
        $fields['sub_fields'] = ACF::generateFieldKeys($prefix, $fields['sub_fields']);

        return apply_filters('ad/layout/content-area', $fields);
    }
}
