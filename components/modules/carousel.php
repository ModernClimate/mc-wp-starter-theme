<?php

/**
 * ACF Module: Image
 *
 * @var array $data
 * @var string $row_id
 */

use MC\App\Fields\ACF;
use MC\App\Fields\Util;
use MC\App\Media;

$items = ACF::getRowsLayout('carousel-items', $data);

if (!$items) {
    return;
}

$animation_type = ACF::getField('carousel-animation-type', $data, 'slide');
$show_arrows_nav = ACF::getField('show-carousel-arrows-nav', $data, 'true');
$show_indicators = ACF::getField('show-carousel-indicators', $data, 'false');

do_action('mc/modules/styles', $row_id, $data);
?>

<section class="module carousel" id="<?php echo esc_html($row_id); ?>">
    <div class="uk-container uk-container-large">
        <div ukgrid>
            <div class="uk-slideshow uk-width-1-2 uk-position-relative uk-visible-toggle uk-light" tabindex="-1" data-animation="<?php echo esc_attr($animation_type) ?>">
                <ul class="uk-slideshow-items">
                    <?php
                    foreach ($items as $item) {
                        printf(
                            '<li>
                                %1$s
                                <div class="uk-position-center uk-position-small uk-text-center uk-light">
                                    <h2 class="uk-margin-remove">Center</h2>
                                    <p class="uk-margin-remove">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </li>',
                            Util::getImageHTML(Media::getAttachmentByID($item['image']), 'full', ['uk-cover' => true])
                        );
                    }
                    ?>
                </ul>

                <?php if ($show_arrows_nav !== 'false') : ?>
                    <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                <?php endif; ?>

                <?php if ($show_indicators === 'true') : ?>
                    <div class="uk-flex uk-flex-center uk-margin">
                        <ul class="uk-dotnav">
                            <?php
                            foreach ($items as $key => $item) {
                                printf(
                                    '<li uk-slideshow-item="%1$s">
                                        <a href="#">%2$s %1$s</a>
                                    </li>',
                                    $key,
                                    __('Item', 'mc-starter')
                                );
                            }
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>