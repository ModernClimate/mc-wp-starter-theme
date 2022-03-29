<?php
/**
 * ACF Module: Image
 *
 * @global $data
 */

use MC\App\Fields\ACF;
use MC\App\Media;
use MC\App\Fields\Util;

$carousel_items = ACF::getRowsLayout('carousel-items', $data);

if (! $carousel_items) {
    return;
}
?>

<div class="module carousel">
    <div class="uk-container uk-container-large">
        <div ukgrid>
            <div id="test" class="uk-slideshow uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                <ul class="uk-slideshow-items">
                    <?php
                    foreach ($carousel_items as $item) {
                        printf(
                            '<li>
                                %1$s
                            </li>',
                            Util::getImageHTML(Media::getAttachmentByID($item['image']), 'full', ['uk-cover' => true])
                        );
                    }
                    ?>
                </ul>
                <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            </div>
        </div>
    </div>
</div>
