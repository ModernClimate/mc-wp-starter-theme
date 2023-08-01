<?php

namespace MC\App\Components;

use MC\App\Interfaces\WordPressHooks;

class Documentation implements WordPressHooks
{

    public function addHooks()
    {
        add_filter('template_include', [$this, 'customTemplateLoader']);
    }

    public function customTemplateLoader($template)
    {
        foreach (MC_COMPONENT_PAGES as $slug => $page) {
            $custom_url = '/components/' . $slug . '/';

            // Check if the requested URL matches the custom URL
            if (esc_url_raw($_SERVER['REQUEST_URI']) === $custom_url && !get_page_by_path($slug)) {
                // Load the custom template file
                return get_stylesheet_directory() . '/templates/component.php';
            }
        }

        // Return the original template for other pages
        return $template;
    }
}
