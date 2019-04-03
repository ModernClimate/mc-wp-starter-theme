<?php
/**
 * ACF Module: Hero
 *
 * @global $data
 */

use AD\App\Fields\ACF;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
$button   = ACF::getField('button', $data);
?>

<div class="module hero">
    <div class="container">
        <div class="module__heading">
            <h1 class="module__title hdg hdg--1">
                <?php echo apply_filters('the_content', $headline); ?>
            </h1>
        </div>
        <div class="module__body">
            <?php echo apply_filters('the_content', $content); ?>
        </div>
    </div>
</div>

