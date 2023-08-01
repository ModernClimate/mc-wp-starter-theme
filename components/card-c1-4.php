<?php

use MC\App\Fields\Util;

/**
 * Component: Card C4
 *
 * @var array $data
 * @var string $data['id']
 * @var array $data['eyebrow']
 * @var array $data['headline']
 * @var array $data['content']
 */

$id = $data['id'] ?? '';
$eyebrow = $data['eyebrow'] ?? '';
$headline = $data['headline'] ?? '';
$content = $data['content'] ?? '';
$desktop_image = $data['media']['desktop'] ?? '';
$mobile_image = $data['media']['mobile'] ?? '';

// $bg_inline_desktop = Util::getInlineBackgroundStyles($desktop_image);
// $bg_inline_mobile = Util::getInlineBackgroundStyles($mobile_image);

$bg_desktop_styles = sprintf(
    'style="background: %1$s %2$s %3$s %4$s/%5$s;"',
    '#FFFFFF',
    'url(' . $desktop_image['url'] . ')',
    'no-repeat',
    'center center',
    'auto auto'
);

do_action('mc/components/styles', $id, $data);
?>

<div class="mcx-card mcx-card--c1-4 card" id="<?php echo esc_html($id); ?>">
    <div class="card__media card__media--desktop uk-hidden@l">
        mobile image
        <div class="overlay"></div>
    </div>

    <div class="card__media card__media--desktop uk-visible@l" <?php echo $bg_desktop_styles; ?>>
        <div class="overlay"></div>
    </div>

    <div class="card__body">
        <?php if (!empty($eyebrow)) : ?>
            <div class="card__eyebrow">
                <?php echo $eyebrow; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($headline)) : ?>
            <div class="card__headline">
                <?php echo $headline; ?>
            </div>
        <?php endif; ?>
        <div class="card__content">
            <?php echo apply_filters('the-content', $content); ?>
        </div>
    </div>
</div>