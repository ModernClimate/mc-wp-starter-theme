<?php

namespace MC\App\Posts;

/**
 * Class PostTypes
 *
 * @package MC\App\Posts
 */
class PostTypes
{

    /**
     * PostTypes constructor.
     *
     * Example Usage:
     *
     * PostTypes::registerPostType(
     * 'project',
     * __( 'Project', 'mc-starter' ),
     * __( 'Projects', 'mc-starter' ),
     * [
     * 'menu_icon'   => 'dashicons-portfolio'
     * ]
     * );
     *
     * @param $slug
     * @param $singular
     * @param $plural
     * @param array $args
     */
    public static function registerPostType($slug, $singular, $plural, $args = [])
    {
        $labels = [
            'name'               => $plural,
            'singular_name'      => $singular,
            'menu_name'          => $plural,
            'name_admin_bar'     => $singular,
            'add_new'            => sprintf(__('Add %1$s', 'mc-starter'), $singular),
            'add_new_item'       => sprintf(__('Add New %1$s', 'mc-starter'), $singular),
            'new_item'           => sprintf(__('New %1$s', 'mc-starter'), $singular),
            'edit_item'          => sprintf(__('Edit %1$s', 'mc-starter'), $singular),
            'view_item'          => sprintf(__('View %1$s', 'mc-starter'), $plural),
            'all_items'          => sprintf(__('%1$s', 'mc-starter'), $plural),
            'search_items'       => sprintf(__('search %1$s', 'mc-starter'), $plural),
            'parent_item_colon'  => sprintf(__('Parent %1$s:', 'mc-starter'), $plural),
            'not_found'          => sprintf(__('No %1$s found.', 'mc-starter'), $plural),
            'not_found_in_trash' => sprintf(__('No %1$s found in Trash.', 'mc-starter'), $plural)
        ];

        $defaults = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => ['title', 'editor', 'thumbnail'],
            'menu_icon'          => 'dashicons-admin-site'
        ];

        register_post_type($slug, wp_parse_args($args, $defaults));
    }
}
