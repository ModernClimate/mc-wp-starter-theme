<?php

namespace AD\App\Fields\Layouts;

use AD\App\Fields\ACF;

/**
 * Class Image
 *
 * @package AD\App\Fields\Layouts
 */
class Image
{

    public $slug = 'image';

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
            'label'      => __('Image', 'ad-starter'),
            'display'    => 'block',
            'sub_fields' => [
                [
                    'label'        => __('Content', 'ad-starter'),
                    'type'         => 'tab',
                    'placement'    => 'left',
                    'endpoint'     => 0,
                ],
                [
                    'label'         => __('Image', 'ad-starter'),
                    'name'          => 'image',
                    'type'          => 'image',
                    'instructions'  => '',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'library'       => 'all',
                ]
            ],
        ];

        // get our field keys
        $fields['sub_fields'] = ACF::generateFieldKeys($prefix, $fields['sub_fields']);

        return apply_filters('ad/layout/image', $fields);
    }
}
