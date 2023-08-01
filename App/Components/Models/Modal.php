<?php

namespace MC\App\Components\Models;

use MC\App\Components\Component;

class Modal extends Component
{
    public function __construct($template_name, $data)
    {
        $this->setTemplate("{$template_name}.php");
        $this->setData($data);
    }

    /**
     * Get mock data for the component.
     *
     * @param string $variant
     *
     * @return array
     */
    public static function getMockData($variant = null)
    {
        $id = "modal-{$variant}";
        $headline = __('Modal?', 'mc-starter');
        $content = __('Modal!', 'crop-nutrition');

        $data = [
            'id' => $id,
            'headline' => $headline,
            'body' => $content,
        ];

        return $data;
    }
}
