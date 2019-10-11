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
                ],
                [
                    'label'     => __('Options', 'ad-starter'),
                    'type'      => 'tab',
                    'placement' => 'left',
                    'endpoint'  => 0,
                ],
                [
                    'label'        => __('Background', 'ad-starter'),
                    'name'         => 'background',
                    'type'         => 'group',
                    'instructions' => '',
                    'layout'       => 'block',
                    'sub_fields'   => [
                        [
                            'label'        => __('Image', 'ad-starter'),
                            'name'         => 'image',
                            'type'         => 'image',
                            'preview_size' => 'thumbnail',
                            'library'      => 'all'
                        ],
                        [
                            'label'        => __('Color', 'ad-starter'),
                            'name'         => 'color',
                            'type'         => 'color_picker',
                            'instructions' => ''
                        ],
                        [
                            'label'         => __('Repeat', 'ad-starter'),
                            'name'          => 'repeat',
                            'type'          => 'select',
                            'wrapper'       => [
                                'width' => '33.33'
                            ],
                            'choices'       => [
                                'no-repeat' => __('No Repeat', 'ad-starter'),
                                'repeat'    => __('Repeat', 'ad-starter'),
                                'repeat-x'  => __('Repeat (X)', 'ad-starter'),
                                'repeat-y'  => __('Repeat (Y)', 'ad-starter'),
                            ],
                            'default_value' => [
                                0 => 'no-repeat',
                            ],
                            'ui'            => 1
                        ],
                        [
                            'label'         => __('Position', 'ad-starter'),
                            'name'          => 'position',
                            'type'          => 'select',
                            'wrapper'       => [
                                'width' => '33.33'
                            ],
                            'choices'       => [
                                'left top'      => __('Left / Top', 'ad-starter'),
                                'left center'   => __('Left / Center', 'ad-starter'),
                                'left bottom'   => __('Left / Bottom', 'ad-starter'),
                                'right top'     => __('Right / Top', 'ad-starter'),
                                'right center'  => __('Right / Center', 'ad-starter'),
                                'right bottom'  => __('Right / Bottom', 'ad-starter'),
                                'center top'    => __('Center / Top', 'ad-starter'),
                                'center center' => __('Center / Center', 'ad-starter'),
                                'center bottom' => __('Center / Bottom', 'ad-starter'),
                            ],
                            'default_value' => [
                                0 => 'center center',
                            ],
                            'ui'            => 1
                        ],
                        [
                            'label'         => __('Size', 'ad-starter'),
                            'name'          => 'size',
                            'type'          => 'select',
                            'wrapper'       => [
                                'width' => '33.33'
                            ],
                            'choices'       => [
                                'auto auto' => __('Auto', 'ad-starter'),
                                'cover'     => __('Cover', 'ad-starter'),
                                'contain'   => __('Contain', 'ad-starter'),
                                'inherit'   => __('Inherit', 'ad-starter'),
                            ],
                            'default_value' => [
                                0 => 'cover',
                            ],
                            'ui'            => 1
                        ],
                    ],
                ],
            ],
        ];

        // get our field keys
        $fields['sub_fields'] = ACF::generateFieldKeys($prefix, $fields['sub_fields']);

        return apply_filters('ad/layout/hero', $fields);
    }
}
