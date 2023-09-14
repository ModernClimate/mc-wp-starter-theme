<?php

namespace NAME_SPACE_ID\App\Fields\Layouts;

use NAME_SPACE_ID\App\Fields\Common;
use WordPlate\Acf\Fields\Layout;

/**
 * Class PASCAL_CASE_MODULE_NAME
 *
 * @package NAME_SPACE_ID\App\Fields\Layouts
 */
class PASCAL_CASE_MODULE_NAME extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'NAME_SPACE_ID_LOWERCASE/layout/KEBAB_CASE_MODULE_NAME',
            Layout::make(__('MODULE_NAME', 'crop-nutrition'), 'KEBAB_CASE_MODULE_NAME')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    $this->styleTab(),
                ])
        );
    }
}
