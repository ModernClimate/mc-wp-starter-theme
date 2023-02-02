<?php

/**
 * ACF Module: Hero
 *
 * @global $data
 */

use MC\App\Fields\ACF;
use MC\App\Fields\Util;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
$button   = ACF::getField('button', $data);
?>

<div class="module hero" <?php echo Util::getInlineBackgroundStyles($data); ?>>
    <div class="uk-container">
        <div class="module__heading">
            <?php
            echo nl2br(Util::getHTML(
                $headline,
                'h1',
                ['class' => 'module__title hdg hdg--1']
            ));
            ?>
        </div>
        <div class="module__body">
            <?php echo apply_filters('the_content', $content); ?>
        </div>

        <?php echo Util::getButtonHTML($button); ?>
    </div>
</div>