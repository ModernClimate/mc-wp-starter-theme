<?php

namespace AD\App\UserRoles;

use AD\App\Error;

abstract class UserRole implements WordPressHooks
{
    const ROLE = null;
    const META_CACHE_PREFIX = 'ad_user_meta_';
    const META_CACHE_GROUP = 'user_meta';

    protected $userId = null;
    protected $metaKeys = [];

    public function __construct()
    {
        $this->setCurrentUser();
        $this->acf = new ACF();
    }

    public static function register($label)
    {
        add_role(
            static::ROLE,
            __($label, 'pawgo'),
            [
                'read' => true,
                'delete_posts' => true,
                'edit_posts' => true,
                'delete_published_posts' => true,
                'publish_posts' => true,
                'upload_files' => true,
                'edit_published_posts' => true
            ]
        );
    }

    public function addHooks()
    {
    }

    public function hasRole(string $role)
    {
    }

    private function setMeta() : array
    {
        if (is_null($this->userId)) {
            return Error::get('no_user_id_set', 'You must set a user ID in order to get meta.');
        }
        global $wpdb;

        $cacheKey = self::META_CACHE_PREFIX . $post_id;
        $postMeta = wp_cache_get($cacheKey, self::META_CACHE_GROUP);
        $metaFields = '"' . implode('","', $this->metaKeys) . '"';

        if (!$postMeta) {
            $userMetaQuery = $wpdb->get_results(
                "SELECT meta_key, meta_value 
                FROM $wpdb->usermeta 
                WHERE user_id = $this->userId 
                AND meta_value IN ($metaFields)"
            );
            $postMeta = [];
            foreach ((array) $userMetaQuery as $post) {
                $postMeta[ $post->meta_key ] = maybe_unserialize($post->meta_value);
            }

            if (!wp_installing()) {
                wp_cache_add($cacheKey, $postMeta, self::META_CACHE_GROUP);
            }
        }

        return $postMeta;
    }

    public function getMetaField(string $metaKey, $default)
    {
        if (is_null($this->meta)) {
            $this->setMeta();
        }
        return !empty($this->meta[$metaKey]) ? $this->meta[$metaKey] : $default;
    }
}
