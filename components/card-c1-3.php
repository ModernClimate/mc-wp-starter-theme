<?php

/**
 * Component: Card C3
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

do_action('mc/components/styles', $id, $data);
?>

<div class="mcx-card mcx-card--c1-3 card" id="<?php echo esc_html($id); ?>">
    <div class="card__media">
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