<?php

use MC\App\Components\El;

/**
 * Component: Accordion
 *
 * @var array $data
 * @var string $data['id']
 * @var array $data['items']
 * @var array $data['options']
 */

$id = $data['id'] ?? '';
$items = $data['items'] ?? [];
$options = $data['options'] ?? null;

if (!$items) {
    return;
}

$options = sprintf(
    'multiple: %1$s; collapsible: %2$s; toggle: > button',
    $options['multiple'] ?? false,
    $options['collapsible'] ?? false
);

do_action('mc/components/styles', $id, $data);
?>

<div class="mcx-accordion" id="<?php echo esc_html($id); ?>">
    <div class="uk-container uk-container-large">
        <div ukgrid>
            <ul uk-accordion="<?php echo $options; ?>">
                <?php
                foreach ($items as $key => $item) {
                    $title = $item['title'] ?? '';
                    $open = $item['open'] ?? false;
                    $content = $item['content'] ?? 'No content...';

                    $accordion_title = sprintf(
                        '<button class="uk-accordion-title accordion-title">
                            <div class="accordion-title__text">%1$s</div>
                            <div class="accordion-title__icon">%2$s</div>
                        </button>',
                        $title,
                        El::icon('arrow-dropdown')
                    );

                    $accordion_content = sprintf(
                        '<div class="uk-accordion-content accordion-content">
                            %1$s
                        </div>',
                        $content
                    );

                    printf(
                        '<li class="%1$s">
                            %2$s
                            %3$s
                        </li>',
                        $open ? 'uk-open' : '',
                        $accordion_title,
                        $accordion_content
                    );
                }
                ?>
            </ul>
        </div>
    </div>
</div>