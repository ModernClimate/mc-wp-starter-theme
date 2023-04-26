<?php

/**
 * ACF Module: Image
 *
 * @var array $data
 * @var string $row_id
 */

use MC\App\Fields\ACF;
use MC\App\Media;
use MC\App\Fields\Util;

$image = ACF::getField('image', $data);

if (!$image) {
    return;
}

do_action('mc/modules/styles', $row_id, $data);
?>

<section class="module image" id="<?php echo esc_html($row_id); ?>">
    <div class="uk-container">
        <div class="module__image">
            <?php echo Util::getImageHTML(Media::getAttachmentByID($image)); ?>
        </div>
    </div>
</section>