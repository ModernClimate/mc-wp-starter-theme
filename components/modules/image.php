<?php

/**
 * ACF Module: Image
 *
 * @global $data
 */

use MC\App\Fields\ACF;
use MC\App\Media;
use MC\App\Fields\Util;

$image = ACF::getField('image', $data);

if (!$image) {
    return;
}
?>

<div class="module image">
    <div class="uk-container">
        <div class="module__image">
            <?php echo Util::getImageHTML(Media::getAttachmentByID($image)); ?>
        </div>
    </div>
</div>