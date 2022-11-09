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
$image            = get_field('image');
$background_color = get_field('background-color');
$text_color       = get_field('text-color');



$template = [
    [
        'core/paragraph', 
        [
            'content' => 'Testimonial', 
            'align' => 'left',
            'className'     => 'mc-testimonial__message',
        ] 
    ],
    [
        'core/heading',
        [
            'level'         => 2,
            'content'       => 'Author',
            'algin'         => 'left',
            'className'     => 'mc-testimonial__title',
        ]
    ],
    [
        'core/heading',
        [
            'level'         => 6,
            'content'       => 'Role',
            'align'         => 'left',
            'className'     => 'mc-testimonial__role',
        ]
    ],
];

$allowed_blocks = array( 'core/heading', 'core/paragraph' );

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="testimonial-blockquote">
    <InnerBlocks 
        template="<?php echo esc_attr(wp_json_encode($template)); ?>"
        allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" 
        templatLock="all"/>
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