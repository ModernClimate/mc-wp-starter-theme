<?php

namespace MC\App\Fields;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class ACF
 *
 * @package MC\App\Fields
 */
class ACF implements WordPressHooks
{

    /**
     * Add hooks.
     */
    public function addHooks()
    {
        // ACF field PHP exports will wrap text in the mc-starter text domain.
        add_filter('acf/settings/l10n_textdomain', function () {
            return 'mc-starter';
        });
    }

    /**
     * Custom db query for grabbing all post meta while excluding ACF field key rows
     *
     * @param $post_id
     *
     * @return bool|mixed
     */
    public static function getPostMeta($post_id)
    {
        global $wpdb;

        $cache_key = 'mc_post_meta_' . $post_id;
        $post_meta = wp_cache_get($cache_key, 'meta');

        if (!$post_meta) {
            $post_meta_db = $wpdb->get_results(
                "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id AND meta_value NOT LIKE 'field\_%'"
            );
            $post_meta    = [];
            foreach ((array)$post_meta_db as $o) {
                $post_meta[$o->meta_key] = maybe_unserialize($o->meta_value);
            }

            if (!wp_installing() || !is_multisite()) {
                wp_cache_add($cache_key, $post_meta, 'meta');
            }
        }

        return $post_meta;
    }

    /**
     * This function loops through Flexible Modules or Repeater Fields and compiles a multidimensional array
     * containing the field keys/values in the post meta.
     *
     * @param $selector
     * @param $meta
     *
     * @return mixed $modules
     */
    public static function getRowsLayout($selector = '', $meta = [])
    {
        $modules = [];
        if (!$selector || empty($meta[$selector])) {
            return $modules;
        }

        // check if this selector is a flexible module or a repeater row
        $counter = is_array($meta[$selector]) ? count($meta[$selector]) : $meta[$selector];

        for ($i = 0; $i < $counter; $i++) {
            $prefix = $selector . '_' . $i . '_';
            // Loop through meta and set selector rows into our array.
            foreach ($meta as $key => $value) {
                // check if our key matches the selector we need.
                if (strpos($key, $prefix) === 0) {
                    // strip the current key of its prefixed selector to clean up our return array.
                    $new_key = str_replace($prefix, '', $key);

                    // set our key and value.
                    $modules[$i][$new_key] = $value;
                }
            }
        }

        return $modules;
    }

    /**
     * Check for and return the selected key value from the array passed in.
     * A default return value can be passed if the key value does not exist.
     *
     * @param $selector
     * @param $data
     * @param string $default
     *
     * @return string
     */
    public static function getField($selector, $data, $default = '')
    {
        return !empty($data[$selector]) ? $data[$selector] : $default;
    }
}
