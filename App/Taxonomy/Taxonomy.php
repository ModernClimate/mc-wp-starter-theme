<?php

namespace AD\App\Abstracts;

class Taxonomy
{
    const TAXONOMY_SLUG = null;

    public static function registerTaxonomy(
        string $label,
        array $postType,
        string $plural = 's'
    ) {
        if (taxonomy_exists(static::TAXONOMY_SLUG)) {
            return true;
        }

        $pluralLabel = $label . $plural;
        $pluralSlug = static::TAXONOMY_SLUG . $plural;

        $labels = [
            'name' => _x($pluralLabel, 'taxonomy general name', 'pawgo'),
            'singular_name' => _x($label, 'taxonomy singular name', 'pawgo'),
            'search_items' => __('Search ' . $pluralLabel, 'pawgo'),
            'popular_items' => __('Popular ' . $pluralLabel, 'pawgo'),
            'all_items' => __('All ' . $pluralLabel, 'pawgo'),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit ' . $label, 'pawgo'),
            'update_item' => __('Update ' . $label, 'pawgo'),
            'add_new_item' => __('Add New ' . $label, 'pawgo'),
            'new_item_name' => __('New ' . $label . ' Name', 'pawgo'),
            'separate_items_with_commas' => __('Separate ' . $pluralLabel . ' with commas', 'pawgo'),
            'add_or_remove_items' => __('Add or remove ' . $pluralLabel, 'pawgo'),
            'choose_from_most_used' => __('Choose from the most used ' . $pluralLabel, 'pawgo'),
            'not_found' => __('No ' . $pluralLabel . ' found.', 'pawgo'),
            'menu_name' => __($pluralLabel, 'pawgo')
        ];
    
        $args = [
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => [ 'slug' => static::TAXONOMY_SLUG ]
        ];
    
        register_taxonomy(static::TAXONOMY_SLUG, $postType, $args);
    }
    
    public static function set(int $postId, int $termId)
    {
        global $wpdb;
        $data = [
            'object_id' => $postId,
            'term_taxonomy_id' => $termId
        ];
        return $wpdb->insert($wpdb->term_relationships, $data);
    }
}
