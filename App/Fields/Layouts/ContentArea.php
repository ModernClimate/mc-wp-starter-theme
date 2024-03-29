<?php

namespace MC\App\Fields\Layouts;

use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\WysiwygEditor;
use Extended\ACF\Fields\Textarea;

/**
 * Class ContentArea
 *
 * @package MC\App\Fields\Layouts
 */
class ContentArea extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/content-area',
            Layout::make(__('Content Area', 'mc-starter'), 'content-area')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Textarea::make(__('Headline', 'mc-starter'), 'headline')
                        ->rows(2),
                    WysiwygEditor::make(__('Content', 'mc-starter'), 'content')
                        ->mediaUpload(false)
                ])
        );
    }
}
