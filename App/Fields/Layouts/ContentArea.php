<?php

namespace AD\App\Fields\Layouts;

use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class ContentArea
 *
 * @package AD\App\Fields\Layouts
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
        return Layout::make(__('Content Area', 'mc-starter'))
            ->layout('block')
            ->fields([
                $this->contentTab(),
                Textarea::make(__('Headline', 'mc-starter'))
                    ->rows(2),
                Wysiwyg::make(__('Content', 'mc-starter'))
                    ->mediaUpload(false)
            ]);
    }
}
