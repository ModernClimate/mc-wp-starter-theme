<?php

namespace MC\App\Components;

use MC\App\Interfaces\WordPressHooks;

class Styles implements WordPressHooks
{
    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('hr/components/styles', [$this, 'outputStyles'], 10, 2);
    }

    /**
     * Print component specific styles if set
     *
     * @param string $id
     * @param array $data
     */
    public function outputStyles($id, $data)
    {
        if (empty($id) || empty($data)) {
            return false;
        }

        // Get component specific styles
    }
}
