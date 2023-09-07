<?php

namespace MC\App\Fields\Layouts;

use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\WysiwygEditor;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\ColorPicker;

/**
 * Class Hero
 *
 * @package MC\App\Fields\Layouts
 */
class Hero extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/hero',
            Layout::make(__('Hero', 'mc-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Textarea::make(__('Headline', 'mc-starter'))
                        ->rows(2),
                    WysiwygEditor::make(__('Content', 'mc-starter'))
                        ->mediaUpload(false),
                    Link::make(__('Button', 'mc-starter'))
                        ->returnFormat('array'),
                    $this->optionsTab(),
                    Group::make(__('Background', 'mc-starter'))
                        ->layout('block')
                        ->fields([
                            Image::make(__('Image', 'mc-starter'))
                                ->previewSize('thumbnail'),
                            ColorPicker::make(__('Color', 'mc-starter')),
                            Select::make(__('Repeat', 'mc-starter'))
                                ->choices([
                                    'no-repeat' => __('No Repeat', 'mc-starter'),
                                    'repeat'    => __('Repeat', 'mc-starter'),
                                    'repeat-x'  => __('Repeat (X)', 'mc-starter'),
                                    'repeat-y'  => __('Repeat (Y)', 'mc-starter'),
                                ])
                                ->defaultValue('no-repeat')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                            Select::make(__('Position', 'mc-starter'))
                                ->choices([
                                    'left top'      => __('Left / Top', 'mc-starter'),
                                    'left center'   => __('Left / Center', 'mc-starter'),
                                    'left bottom'   => __('Left / Bottom', 'mc-starter'),
                                    'right top'     => __('Right / Top', 'mc-starter'),
                                    'right center'  => __('Right / Center', 'mc-starter'),
                                    'right bottom'  => __('Right / Bottom', 'mc-starter'),
                                    'center top'    => __('Center / Top', 'mc-starter'),
                                    'center center' => __('Center / Center', 'mc-starter'),
                                    'center bottom' => __('Center / Bottom', 'mc-starter'),
                                ])
                                ->defaultValue('center center')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                            Select::make(__('Size', 'mc-starter'))
                                ->choices([
                                    'auto auto' => __('Auto', 'mc-starter'),
                                    'cover'     => __('Cover', 'mc-starter'),
                                    'contain'   => __('Contain', 'mc-starter'),
                                    'inherit'   => __('Inherit', 'mc-starter'),
                                ])
                                ->defaultValue('cover')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                        ])
                ])
        );
    }
}
