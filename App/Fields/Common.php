<?php

namespace MC\App\Fields;

use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\ButtonGroup;
use WordPlate\Acf\Fields\ColorPicker;
use WordPlate\Acf\Fields\File;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Range;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Number;


class Common
{
   /**
 * Margin Options Group
 *
 * @param  string $label
 * @return void
 */
public static function marginGroup($label = 'Margin',  $defaults = [3, 3])
{
    return Group::make(__($label, 'par-systems'))
        ->layout('block')
        ->fields([
            Group::make(__('Mobile', 'par-systems'))
                ->layout('block')
                ->fields([
                    Range::make('Top')
                        ->min(0)
                        ->max(10)
                        ->step(0.5)
                        ->DefaultValue($defaults[0])
                        ->wrapper([
                            'width' => '50'
                        ])
                        ->append('rem'),
                ]),
            Group::make(__('Desktop', 'par-systems'))
                ->layout('block')
                ->fields([
                    Range::make('Top')
                        ->min(0)
                        ->max(10)
                        ->step(0.5)
                        ->DefaultValue($defaults[1])
                        ->wrapper([
                            'width' => '50'
                        ])
                        ->append('rem')
                ]),
        ]);
} 
}
