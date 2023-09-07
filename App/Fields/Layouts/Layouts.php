<?php

namespace MC\App\Fields\Layouts;

use MC\App\Fields\ACF;
use Extended\ACF\Fields\Tab;

/**
 * Class Layouts
 *
 * @package MC\App\Fields\Layouts
 */
abstract class Layouts
{
    /**
     * Defines fields for layout.
     *
     * @return object
     */
    abstract public function fields();

    /**
     * Creates Content Tab Field.
     *
     * @return object
     */
    public function contentTab()
    {
        return Tab::make(__('Content', 'mc-starter'), 'content-tab')
            ->placement('left');
    }

    /**
     * Creates Options Tab Field.
     *
     * @return object
     */
    public function optionsTab()
    {
        return Tab::make(__('Options', 'mc-starter'), 'options-tab')
            ->placement('left');
    }
}
