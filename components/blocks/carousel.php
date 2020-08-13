<?php
/**
 * Block Template: Carousel
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

use MC\App\Fields\ACF;
use MC\App\Fields\Util;

// Create id attribute allowing for custom "anchor" value.
$id = 'mc-carousel-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" value.
$className = 'mc-carousel';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> slick-carousel">
    <?php
    if (have_rows('carousel')) {
        while (have_rows('carousel')) {
            the_row();

            $caption = get_sub_field('caption') ?: null;
            $image   = get_sub_field('image') ?: null;

            var_dump(get_sub_field('caption'));
            var_dump($image);

            // printf(
            //     '<div class="mc-carousel__slide">%1$s</div>',
            //     Util::getImageHTML()
            // )
        }
    } ?>
</div>