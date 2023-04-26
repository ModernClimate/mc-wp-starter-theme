<?php

/**
 * ACF Module: Content Area
 *
 * @var array $data
 * @var string $row_id
 */

use MC\App\Fields\ACF;
use MC\App\Fields\Util;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);

do_action('mc/modules/styles', $row_id, $data);
?>

<section class="module content-area" id="<?php echo esc_html($row_id); ?>">
    <div class="uk-container">
        <div class="module__heading">
            <?php
            echo nl2br(Util::getHTML(
                $headline,
                'h2',
                ['class' => 'module__title hdg hdg--2']
            ));
            ?>
        </div>
        <div class="module__body">
            <?php echo apply_filters('the_content', $content); ?>
        </div>
    </div>
</section>