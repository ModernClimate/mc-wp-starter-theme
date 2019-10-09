<?php
/**
 * ACF Module: Content Area
 *
 * @global $data
 */

use AD\App\Fields\ACF;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
?>

<div class="module content-area">
    <div class="container">
        <div class="module__heading">
            <h2 class="module__title hdg hdg--2">
                <?php echo esc_html($headline); ?>
            </h2>
        </div>
        <div class="module__body">
            <?php echo apply_filters('the_content', $content); ?>
        </div>
    </div>
</div>
