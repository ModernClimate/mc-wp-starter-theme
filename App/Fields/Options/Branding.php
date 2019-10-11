<?php

namespace AD\App\Fields\Options;

use AD\App\Fields\ACF;

/**
 * Class Branding
 *
 * @package StoryMate\App\Fields\Options
 */
class Branding
{

    public $slug = 'branding';

    /**
     * Defines fields used within this module.
     *
     * @return mixed|void
     */
    public function layoutFields()
    {
        $prefix = "site-options_$this->slug";

        $fields = [
            [
                'label'     => __('Branding', 'ad-starter'),
                'type'      => 'tab',
                'placement' => 'left',
            ],
            [
                'label'         => __('Site Logo', 'ad-starter'),
                'name'          => 'site_logo',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'thumbnail',
                'library'       => 'all',
            ]
        ];

        // get our field keys
        $fields = ACF::generateFieldKeys($prefix, $fields);

        return apply_filters('ad/options/branding', $fields);
    }
}
