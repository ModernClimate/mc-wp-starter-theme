<?php

namespace MC\App\Components\Models;

use MC\App\Components\Component;

class Hero extends Component
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
        $id = "hero-{$variant}";
        $headline = __('Hero', 'mc-starter');
        $content = __('Used on Home Page only, body copy is larger, statement style. Should be shorter and succinct. Overlay is black set to luminosity with 20% opacity, over looping video or images.', 'crop-nutrition');

        if ($variant === 'a1') {
            $headline = __('Hero A1', 'mc-starter');
            $content = __('Body copy for hero is larger, statement style 8 column card. Should be shorter and succinct. Overlay is Cinnabar set to overlay with 40% opacity.', 'crop-nutrition');
        } else if ($variant === 'a2') {
            $headline = __('Hero A2', 'mc-starter');
            $content = __('Body copy for hero is larger, statement style 8 column card. Should be shorter and succinct. Overlay is Cinnabar set to overlay with 40% opacity.', 'crop-nutrition');
        }

        $data = [
            'id' => $id,
            'headline' => $headline,
            'content' => $content,
            'media' => [
                'https://via.placeholder.com/1920x1080'
            ]
        ];

        return $data;
    }
}
