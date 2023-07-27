<?php

namespace MC\App\Fields\Custom;

use WordPlate\Acf\Fields\Field;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;

class JsonField extends Field
{
    use Instructions;
    use Required;

    public $settings = [];
    protected $type = 'json';
}
