<?php

namespace MC\App\Components\Models;

use MC\App\Components\Component;

class Accordion extends Component
{

    public function __construct($template_name, $data)
    {
        $this->setTemplate("{$template_name}.php");
        $this->setData($data);
    }

    /**
     * Get mock data for the component.
     *
     * @return self
     */
    public static function getMockData()
    {
        $item1 = (array) new AccordionItem([
            'title' => 'Item 1',
            'content' => 'Content of Item 1',
            'open' => true
        ]);

        $item2 = (array) new AccordionItem([
            'title' => 'Item 2',
            'content' => 'Content of Item 2',
        ]);

        $item3 = (array) new AccordionItem([
            'title' => 'Item 3',
            'content' => 'Content of Item 3',
            'open' => false
        ]);

        $data = [
            'id' => 'accordion-1',
            'items' => [$item1, $item2, $item3],
            'options' => [
                'multiple' => true,
                'collapsible' => false
            ]
        ];

        return $data;
    }
}
