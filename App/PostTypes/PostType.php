<?php

namespace AD\App\PostTypes;

abstract class PostType
{
    /** @var string The post slug to be used in register(), meant to be overwritten in  */
    const POST_TYPE = null;
    
    /** @var string The post ID, usually set from the constructor */
    protected $postId = null;

    /** @var string Meta keys and options to be set with setMeta() */
    protected $metaFormats = [];

    /** @var string Meta values to be stored with registerMetaKeys() */
    protected $meta = null;

    /**
     * Registering of meta keys and options meant to executed from registerMeta()
     *
     * USAGE:
     * ```php
     * const POST_TYPE = 'order';
     *
     * public static function register() {
     *     $label = 'Order';
     *     $icon = 'dashicons-admin-post';
     *     $supports = ['title', 'editor', 'thumbnail'];
     *     $plural = 's';
     *
     *     $this->registerPostType($label, $icon, $supports, $plural);
     *
     * }
     * ```
     * @return void
     */
    abstract public static function register();

    /**
     * Registering of meta keys and options meant to executed from registerMeta()
     *
     * USAGE:
     * ```php
     * public static function registerMeta(){
     *     $this->registerMetaFormats([
     *         'total' => ['type' => 'currency', 'default' => 0],
     *         'quantity' => ['type' => 'integer', 'default' => 0]
     *     ]);
     * }
     * ```
     * @param array $metaFormats
     *
     * @return void
     */
    abstract public function registerMeta(array $metaFormats);
    
    /** Registers the post type, meant to be called by register() */
    protected static function registerPostType(
        $label,
        $icon = 'dashicons-admin-post',
        $supports = ['title', 'editor', 'thumbnail'],
        $plural = 's'
    ) {
        if (post_type_exists(static::POST_TYPE)) {
            return true;
        }

        if (is_null(static::POST_TYPE)) {
            return new WP_Error(
                'no_post_type_set',
                'A POST_TYPE needs to be set in order to register a post type.'
            );
        }

        $pluralLabel = $label . $plural;
        $pluralSlug = static::POST_TYPE . $plural;

        return register_post_type(
            static::POST_TYPE,
            [
                'labels' => [
                    'name' => __($pluralLabel, 'ad-starter'),
                    'singular_name' => __($label, 'ad-starter'),
                    'all_items' => __('All '.$pluralLabel, 'ad-starter'),
                    'new_item' => __('New '.$label, 'ad-starter'),
                    'add_new' => __('Add New', 'ad-starter'),
                    'add_new_item' => __('Add New '.$label, 'ad-starter'),
                    'edit_item' => __('Edit '.$label, 'ad-starter'),
                    'view_item' => __('View '.$label, 'ad-starter'),
                    'search_items' => __('Search '.$pluralLabel, 'ad-starter'),
                    'not_found' => __('No '.$pluralLabel.' found', 'ad-starter'),
                    'not_found_in_trash' => __('No '.$pluralLabel.' found in trash', 'ad-starter'),
                    'parent_item_colon' => __('Parent '.$label, 'ad-starter'),
                    'menu_name' => __($pluralLabel, 'ad-starter'),
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

    /** Registers the meta keys, meant to be called by registerMeta() */
    protected function registerMetaFormats(array $metaFormats)
    {
        $this->metaFormats = $metaFormats;
    }

    protected function getMeta(array $returnFields = null)
    {
        global $wpdb;

        $metaKeys = empty($returnFields) ? $returnFields : array_keys($this->metaFormats);
        $metaKeyList = join(',', $metaKeys);

        $query = "SELECT $metaKeyList FROM $wpdb->postmeta WHERE post_id = $this->postId";
        $metaResults = $wpdb->get_results($query, ARRAY_A);

        if ($metaResults === false) {
            return new \WP_Error(
                'get_meta_failed',
                'Sorry, get meta for this post has failed',
                [
                    'order_id' => $this->orderId,
                    'meta_keys' => $metaKeys
                ]
            );
        }

        $formattedResults = $this->formatMetaResults($metaResults);

        $this->meta = $formattedResults;
        return $this->meta;
    }

    private function formatMetaResults(array $metaResults)
    {
        $formattedResults = [];

        foreach ((array) $metaResults as $meta) {
            $metaKey = $meta['meta_key'];
            if (empty($this->metaFormats[$metaKey])) {
                return new WP_Error(
                    'meta_key_not_registered',
                    __('This meta key must be registered.', 'ad-starter'),
                    [
                        'meta_key' => $metaKey,
                        'meta_key_formats' => $this->metaFormats
                    ]
                );
            }
            $options = $this->metaFormats[$metaKey];
            $format = $options['type'];
            $default = $options['default'];
            $formattedResults[$meta['meta_key']] = $this->formatValue($format, $meta['meta_value'], $default);
        }

        return $formattedResults;
    }

    private function formatValue(string $format, $value, $default)
    {
        if (empty($value)) {
            return $default;
        }
        switch ($format) {
            case 'int':
                return (int) $value;
            case 'float':
                return (float) $value;
            case 'bool':
                return (bool) $value;
            case 'string':
                return (string) $value;
            case 'array':
                return maybe_unserialize($value);
        }
        return null;
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
            return new \WP_Error(
                'posts_do_not_exist',
                __('Post(s) '.implode(', ', $missingPosts).' do not exist.', 'ad-starter')
            );
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
            return new \WP_Error(
                'no_post_id_set',
                __('You must set a post ID in order to get meta.', 'ad-starter')
            );
        }

        global $wpdb;

        $postMetaQuery = $wpdb->get_results(
            "SELECT meta_key, meta_value 
            FROM $wpdb->postmeta 
            WHERE post_id = $post_id 
            AND meta_value IN ($metaFields)"
        );

        $meta = [];
        foreach ((array) $postMetaQuery as $post) {
            $postMeta[ $post->meta_key ] = maybe_unserialize($post->meta_value);
        }

        return $this->meta = $meta;
    }

    public function getMetaField(string $metaKey, $default)
    {
        if (is_null($this->meta)) {
            $this->setMeta();
        }
        return !empty($this->meta[$metaKey]) ? $this->meta[$metaKey] : $default;
    }
}
