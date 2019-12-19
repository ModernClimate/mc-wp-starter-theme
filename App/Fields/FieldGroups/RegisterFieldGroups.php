<?php

namespace AD\App\Fields\FieldGroups;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class RegisterFieldGroups
 *
 * @package AD\App\Fields
 */
abstract class RegisterFieldGroups implements WordPressHooks
{

    /**
     * Define location parameters for this Field Group.
     */
    abstract public function registerLocalFieldGroup();

    /**
     * Build parameters array to include when we register this field group.
     *
     * @return array
     */
    abstract public function getLocalFieldGroup();

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    abstract public function getFields();

    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('admin_init', [$this, 'registerLocalFieldGroup']);
    }

    /**
     * Add acf local field groups.
     *
     * @param array $params
     * @param array $location
     * @param string $position
     *
     * @return bool|void
     */
    public function addLocalFieldGroup($params, $location, $position = 'normal')
    {
        if (! function_exists('acf_add_local_field_group')) {
            return false;
        }

        $default = [
            'location'              => $location,
            'menu_order'            => 0,
            'position'              => $position,
            'style'                 => 'default',
            'label_placement'       => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen'        => '',
            'active'                => true,
            'description'           => '',
        ];

        // merge default with registered values
        $params = array_merge($default, $params);

        // Adds a local field group.
        acf_add_local_field_group($params);
    }
}
