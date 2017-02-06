<?php

namespace AD\App;

use AD\App\Interfaces\WordPressHooks;

/**
 * Class HybridMods
 * Hybrid Core compatibility and modifications.
 *
 * @package AD\App
 */
class HybridMods implements WordPressHooks {

    /**
     * Add class hooks.
     */
    public function addHooks() {
        add_filter( 'hybrid_attr_layout', [ $this, 'attrSiteLayout' ], 10, 1 );
        add_filter( 'hybrid_attr_primary', [ $this, 'attrPrimaryContent' ], 10, 2 );
        add_filter( 'hybrid_attr_sidebar', [ $this, 'attrSidebarContent' ], 10, 2 );
        add_filter( 'hybrid_content_template_hierarchy', [ $this, 'contentTemplateHierarchy' ] );
    }

    /**
     * Check main site options for global layout setting
     *
     * @param array $attr
     *
     * @return array
     */
    public function attrSiteLayout( array $attr ) {
        global $site_layout;
        if ( function_exists( 'get_field' ) ) {
            $site_layout = get_field( 'site_layout', 'options' );
        }
        $attr['class'] = $site_layout ?: 'container';

        return $attr;
    }

    /**
     * Sets the main container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrPrimaryContent( array $attr, $context = '' ) {
        $attr['id']    = 'primary';
        $attr['class'] = 'content-area';

        switch ( $context ) {
            case 'full' :
                $attr['class'] .= ' col-sm-12';
                break;
            case 'sidebar-left' :
                $attr['class'] .= ' col-sm-8 col-sm-push-4';
                break;
            default:
                $attr['class'] .= ' col-sm-8';
        }

        return $attr;
    }

    /**
     * Sets the sidebar container ID/class.
     *
     * @param $attr
     * @param  string $context
     *
     * @return array
     */
    public function attrSidebarContent( array $attr, $context = '' ) {
        $attr['id']    = 'sidebar';
        $attr['class'] = $context;

        switch ( $context ) {
            case 'sidebar-left' :
                $attr['class'] .= ' col-sm-4 col-sm-pull-8';
                break;
            default:
                $attr['class'] .= ' col-sm-4';
        }

        return $attr;
    }

    /**
     * Search the template paths and replace them with singular and archive versions.
     *
     * @param string $templates
     *
     * @return string
     */
    public function contentTemplateHierarchy( $templates ) {

        if ( is_singular() || is_attachment() ) {
            $templates = str_replace( 'content/', 'content/singular/', $templates );
        } else {
            $templates = str_replace( 'content/', 'content/archive/', $templates );
        }

        return $templates;
    }
}