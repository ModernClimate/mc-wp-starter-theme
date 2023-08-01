<?php

/**
 * Component: Modal
 *
 * @var array $data
 * @var string $data['id']
 * @var string $data['body']
 * @var array $options
 */

$id = $data['id'] ?? '';
$content = $data['body'] ?? '';
$options = $data['options'] ?? [
    'fit-container' => false,
    'center-modal' => false,
    'full-screen' => false,
    'overflow-auto' => false,
    'show-close-button' => true,
    'close-button-icon' => '',
    'close-outside' => false,
];

$option_fit_container = $options['fit-container'] ?? false;
$option_center_modal = $options['center-modal'] ?? false;
$option_full_screen = $options['full-screen'] ?? false;
$option_overflow_auto = $options['overflow-auto'] ?? false;
$option_show_close_button = $options['show-close-button'] ?? true;
$option_close_outside = $options['close-outside'] ?? false;
$option_close_button_icon = $options['close-button-icon'] ?? '';

$modal_container_class = sprintf(
    'mcx-modal modal%1$s%2$s%3$s',
    $option_fit_container ? ' uk-modal-container' : '',
    $option_center_modal ? ' uk-flex-top' : '',
    $option_full_screen ? ' uk-modal-full' : '',
);

$modal_body_class = 'uk-modal-dialog uk-modal-body';
if ($option_overflow_auto) {
    $modal_body_class .= ' uk-overflow-auto';
}

$close_button_html = '';
if ($option_show_close_button) {
    $class = 'uk-modal-close-default';

    if ($option_close_outside) {
        $class = 'uk-modal-close-outside';
    }

    $close_button_html = sprintf(
        '<button class="%1$s" type="button" uk-close></button>',
        $class,
    );

    if (!empty($option_close_button_icon)) {
        $close_button_html = sprintf(
            '<button class="mcx-modal__close uk-button-link %1$s" type="button">%2$s</button>',
            $class,
            $option_close_button_icon,
        );
    }
}

do_action('mc/components/styles', $id, $data);
?>

<div id="<?php echo esc_html($id); ?>" class="<?php echo esc_attr($modal_container_class); ?>" uk-modal>
    <div class="<?php echo esc_attr($modal_body_class); ?>">
        <?php
        echo esc_html($content);
        echo $close_button_html;
        ?>
    </div>
</div>