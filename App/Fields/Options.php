<?php

namespace AD\App\Fields;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Options
 *
 * @package AD\App\Fields
 */
class Options implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_action( 'ad/modules/output', [ $this, 'outputFlexibleModules' ] );
    }

    public function outputFlexibleModules( $post_id ) {

    }
}