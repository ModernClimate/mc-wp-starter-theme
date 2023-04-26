<?php

namespace MC\App\Fields;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Modules
 *
 * @package MC\App\Fields
 */
class Modules implements WordPressHooks
{

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('mc/modules/output', [$this, 'outputFlexibleModules']);
        add_action('hr/modules/styles', [$this, 'outputModuleStyles'], 10, 2);
        add_action('admin_head', [$this, 'disableClassicEditor']);
        add_filter('gutenberg_can_edit_post_type', [$this, 'disableGutenberg'], 10, 2);
        add_filter('use_block_editor_for_post_type', [$this, 'disableGutenberg'], 10, 2);
    }

    /**
     * Loop through flexible modules meta and include each module file to the page.
     * $data is set to the scope of just the current module, so that only relevant values are passed to each file.
     *
     * @param $post_id
     */
    public function outputFlexibleModules($post_id)
    {
        $post_id = $post_id ?: get_the_ID();
        $meta    = ACF::getPostMeta($post_id);

        if (!empty($meta['modules']) && is_array($meta['modules'])) {
            $modules = ACF::getRowsLayout('modules', $meta);

            foreach ($meta['modules'] as $index => $module) {
                $data   = $modules[$index];
                $row_id = $module . '-' . $index;

                $file = locate_template("components/modules/{$module}.php");
                if (file_exists($file)) {
                    include($file);
                }
            }
        }
    }

    /**
     * Disable Classic Editor by template
     */
    public function disableClassicEditor()
    {
        $post_id = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT);
        $screen  = get_current_screen();
        if ('page' !== $screen->id || !isset($post_id)) {
            return;
        }
        if (!self::disableEditor($_GET['post'])) {
            remove_post_type_support('page', 'editor');
        }
    }

    /**
     * Disable Gutenberg by template
     *
     * @param $can_edit
     * @param $post_type
     *
     * @return bool
     */
    public function disableGutenberg($can_edit, $post_type)
    {
        $post_id = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT);
        if (!(is_admin() && !empty($post_id))) {
            return $can_edit;
        }

        return self::disableEditor($post_id);
    }

    /**
     * Templates and Page IDs without editor
     *
     * @param bool $id
     *
     * @return bool
     */
    public static function disableEditor($id = false)
    {
        $disabled_templates = [
            'templates/page-builder.php',
        ];

        if (empty($id)) {
            return false;
        }

        $template = get_page_template_slug($id);

        return !in_array($template, $disabled_templates);
    }


    /**
     * Print module specific styles if set
     *
     * @param string $row_id
     * @param array $data
     */
    public function outputModuleStyles($row_id, $data)
    {
        if (empty($row_id) || empty($data)) {
            return false;
        }

        // Get module specific styles
    }
}
