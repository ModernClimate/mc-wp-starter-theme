<?php

namespace MC\App\Components\Models;

use MC\App\Components\Component;

class Card extends Component
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
     * @return self
     */
    public static function getMockData($variant = null)
    {
        // TODO media
        $eyebrow = __('Eyebrow', 'mc-starter');
        $headline = __('Card', 'mc-starter');
        $content = __('Lorem ipsum card content. Consetetur sadipscing elitr.', 'crop-nutrition');

        if ($variant === 'c1') {
            $eyebrow = __('C1 Eyebrow', 'mc-starter');
            $headline = __('Card C1', 'mc-starter');
            $content = __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd.', 'crop-nutrition');
        } else if ($variant ===  'c1-2') {
            $eyebrow = __('C1-2 Eyebrow', 'mc-starter');
            $headline = __('Card C1-2', 'mc-starter');
            $content = __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam.', 'crop-nutrition');
        } else if ($variant ===  'c1-3') {
            $eyebrow = __('C1-3 Eyebrow', 'mc-starter');
            $headline = __('Card C1-3', 'mc-starter');
            $content = __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam.', 'crop-nutrition');
        } else if ($variant ===  'c1-4') {
            $eyebrow = __('C1-4 Eyebrow', 'mc-starter');
            $headline = __('Card C1-4', 'mc-starter');
            $content = __('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam.', 'crop-nutrition');
        }

        $data = [
            'eyebrow' => $eyebrow,
            'headline' => $headline,
            'content' => $content,
            'cta' => [
                'label' => __('Read more', 'mc-starter'),
                'url' => '#',
            ],
            'media' => [
                'mobile' => [
                    'url' => 'https://via.placeholder.com/600x400',
                    'alt' => 'Placeholder',
                ],
                'desktop' => [
                    'url' => 'https://via.placeholder.com/600x400',
                    'alt' => 'Placeholder',
                ],
            ],
        ];

        return $data;
    }
}
