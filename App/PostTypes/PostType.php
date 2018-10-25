<?php

namespace AD\App\PostTypes;

abstract class PostType
{
    const POST_TYPE = null;
    const META_CACHE_PREFIX = 'ad_post_meta_';
    const META_CACHE_GROUP = 'post_meta';

    protected $postId = null;
    protected $metaKeys = [];
    protected $meta = null;

    abstract public static function register();
    abstract public function setMetaKeys();

    // TODO: setup public and private defaults

    protected static function registerPostType(
        $label,
        $icon = 'dashicons-admin-post',
        $supports = ['title', 'editor', 'thumbnail'],
        $plural = 's'
    ) {
        if (post_type_exists(static::POST_TYPE)) {
            return true;
        }

        $pluralLabel = $label . $plural;
        $pluralSlug = static::POST_TYPE . $plural;

        return register_post_type(
            static::POST_TYPE,
            [
                'labels' => [
                    'name' => __($pluralLabel, 'pawgo'),
                    'singular_name' => __($label, 'pawgo'),
                    'all_items' => __('All '.$pluralLabel, 'pawgo'),
                    'new_item' => __('New '.$label, 'pawgo'),
                    'add_new' => __('Add New', 'pawgo'),
                    'add_new_item' => __('Add New '.$label, 'pawgo'),
                    'edit_item' => __('Edit '.$label, 'pawgo'),
                    'view_item' => __('View '.$label, 'pawgo'),
                    'search_items' => __('Search '.$pluralLabel, 'pawgo'),
                    'not_found' => __('No '.$pluralLabel.' found', 'pawgo'),
                    'not_found_in_trash' => __('No '.$pluralLabel.' found in trash', 'pawgo'),
                    'parent_item_colon' => __('Parent '.$label, 'pawgo'),
                    'menu_name' => __($pluralLabel, 'pawgo'),
                ],
                'hierarchical' => false,
                'supports' => $supports,
                'menu_icon' => $icon,
                'show_in_rest' => false,
                'rest_controller_class' => 'WP_REST_Posts_Controller',
                'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
                'publicly_queryable' => true,  // you should be able to query it
                'show_ui' => true,  // you should be able to edit it in wp-admin
                'exclude_from_search' => true,  // you should exclude it from search results
                'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
                'has_archive' => false,  // it shouldn't have archive page
                'rewrite' => false,  // it shouldn't have rewrite rules
            ]
        );
    }

    public static function postsExist(array $postIdsToCheck)
    {
        global $wpdb;

        $postIdsForQuery = implode(', ', $postIdsToCheck);
        $postsQuery = $wpdb->get_results("SELECT ID 
            FROM $wpdb->posts
            WHERE ID IN ($postIdsForQuery)
            AND post_status = 'publish'");

        $postsInDatabase = array_map(function ($post) {
            return (int) $post->ID;
        }, $postsQuery);

        $missingPosts = array_diff($postIdsToCheck, $postsInDatabase);
        if (!empty($missingPosts)) {
            return new \WP_Error('posts_do_not_exist', __('Post(s) '.implode(', ', $missingPosts).' do not exist.', 'pawgo'));
        }

        return true;
    }

    public static function userOwnsPost(int $postId, int $userId)
    {
        $postAuthorId = get_post_field('post_author', $postId);

        return $userId == $postAuthorId;
    }

    private function setMeta() : array
    {
        if (is_null($this->postId)) {
            return Error::get('no_post_id_set', 'You must set a post ID in order to get meta.');
        }

        global $wpdb;

        $cacheKey = self::META_CACHE_PREFIX . $this->postId;
        $postMeta = wp_cache_get($cacheKey, self::META_CACHE_GROUP);
        $metaFields = '"' . implode('","', $this->metaKeys) . '"';

        if (!$postMeta) {
            $postMetaQuery = $wpdb->get_results(
                "SELECT meta_key, meta_value 
                FROM $wpdb->postmeta 
                WHERE post_id = $post_id 
                AND meta_value IN ($metaFields)"
            );
            $postMeta = [];
            foreach ((array) $postMetaQuery as $post) {
                $postMeta[ $post->meta_key ] = maybe_unserialize($post->meta_value);
            }

            if (!wp_installing()) {
                wp_cache_add($cacheKey, $postMeta, self::META_CACHE_GROUP);
            }
        }

        return $this->meta = $postMeta;
    }

    public function getMetaField(string $metaKey, $default)
    {
        if (is_null($this->meta)) {
            $this->setMeta();
        }
        return !empty($this->meta[$metaKey]) ? $this->meta[$metaKey] : $default;
    }
}
