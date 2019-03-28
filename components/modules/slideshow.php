<?php
/**
 * ACF Module: Slideshow
 *
 * @global $data
 * @global $row_id
 */

use AD\App\Fields\ACF;
use AD\App\Media;

$slides = ACF::getRowsLayout('slides', $data);

if (empty($slides)) {
    return false;
}
?>

<div id="<?php echo $row_id; ?>" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <?php foreach ($slides as $index => $slide) : ?>
            <li data-target="#<?php echo $row_id; ?>" data-slide-to="<?php echo $index; ?>"
                class="<?php echo (0 === $index) ? 'active' : ''; ?>"></li>
        <?php endforeach; ?>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php foreach ($slides as $index => $slide) : ?>
            <?php $image = Media::getAttachmentByID($slide['slide_image']); ?>
            <div class="item <?php echo (0 === $index) ? 'active' : ''; ?>">
                <img src="<?php echo esc_url($image->url); ?>"
                     alt="<?php echo esc_attr($image->alt); ?>">
                <div class="carousel-caption">
                    <h3><?php echo esc_html($image->title); ?></h3>
                    <?php echo ! empty($image->caption) ? wpautop($image->caption) : ''; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a class="left carousel-control" href="#<?php echo $row_id; ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?php _e('Previous', 'ad-starter'); ?></span>
    </a>

    <a class="right carousel-control" href="#<?php echo $row_id; ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?php _e('Next', 'ad-starter'); ?></span>
    </a>
</div>
