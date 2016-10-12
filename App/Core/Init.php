<?php

namespace AD\App\Core;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class Init
 *
 * Adds the class objects into a container so we can iterate and call common methods on initialization
 *
 * @package AD\App\Core
 */
class Init implements \IteratorAggregate {

    /**
     * A container for objects that implement WordPressHooks interface
     *
     * @var array
     */
    public $plugin_components = [ ];

    /**
     * Adds an object to $container property
     *
     * @param WordPressHooks $object
     *
     * @return $this
     */
    public function add( WordPressHooks $object ) {
        $this->plugin_components[] = $object;

        return $this;
    }

    /**
     * All the methods that need to be performed upon plugin initialization should
     * be done here.
     */
    public function initialize() {

        foreach ( $this as $container_object ) {
            if ( $container_object instanceof WordPressHooks ) {
                $container_object->addHooks();
            }
        }
    }

    /**
     * Provides an iterator over the $container property
     *
     * @return \ArrayIterator
     */
    public function getIterator() {
        return new \ArrayIterator( $this->plugin_components );
    }
}