<?php

/**
 * Testimonial Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

use MC\App\Fields\Util;
use MC\App\Media;
 
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'mc-testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text             = get_field('testimonial') ?: 'Your testimonial here...';
$author           = get_field('author') ?: 'Author name';
$role             = get_field('role') ?: 'Author role';
$image            = get_field('image');
$background_color = get_field('background_color');
$text_color       = get_field('text_color');

var_dump($image)

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="testimonial-blockquote">
        <div class="testimonial-text"><?php echo $text; ?></div>
        <div class="testimonial-author"><?php echo $author; ?></div>
        <dov class="testimonial-role"><?php echo $role; ?></dov>
    </blockquote>
    <div class="testimonial-image">
        <?php 
            printf(
                '<img src="%1$s">',
                $image['url']
            )
        ?>
    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
            display: grid;
            grid-template-columns: 40% 40%;
            gap: 20%;
            align-content: center;
            align-items: center;
        }
    </style>
</div>