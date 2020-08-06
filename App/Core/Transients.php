<?php

namespace MC\App\Core;

use MC\App\Interfaces\WordPressHooks;

/**
 * Class Transients
 *
 * Class for handling transient data in the theme
 *
 * @package MC\App\Core
 */
class Transients implements WordPressHooks
{

    const KEY = 'mc_transient_keys';

    public $transientKeys = [];

    /**
     * Setup the Post Transients
     */
    public function addHooks()
    {
        add_action('save_post', [$this, 'deleteTransients']);
        add_action('create_term', [$this, 'deleteTransients'], 10, 3);
        add_action('edit_term', [$this, 'deleteTransients'], 10, 3);
        add_action('delete_term', [$this, 'deleteTransients'], 10, 3);
    }

    /**
     * Store all transient keys in an option array
     *
     * @param string $key
     */
    public function registerTransients($key)
    {
        $this->transientKeys = get_option(self::KEY, []);

        if (! in_array($key, $this->transientKeys)) {
            $this->transientKeys[] = $key;
        }

        update_option(self::KEY, $this->transientKeys);
    }

    /**
     * Delete the stored transients
     *
     * @param string
     */
    public function deleteTransients()
    {
        $this->transientKeys = get_option(self::KEY, []);

        foreach ($this->transientKeys as $key) {
            delete_transient($key);
        }
    }
}
