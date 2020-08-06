<?php

namespace AD\App\Fields\Layouts;

use AD\App\Fields\ACF;
use WordPlate\Acf\Fields\Tab;

/**
 * Class Layouts
 *
 * @package AD\App\Fields\Layouts
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
