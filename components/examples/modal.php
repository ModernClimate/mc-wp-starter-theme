<?php

use MC\App\Components\El;
use MC\App\Components\Models\Modal;
?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2><?php _e('Modal', 'mc-starter'); ?></h2>
            <p><a href="https://getuikit.com/docs/modal" target="_blank">https://getuikit.com/docs/modal</a></p>
        </div>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Examples', 'mc-starter'); ?></h3>
        </div>
    </div>
    <div class="example">
        <div class="uk-container uk-container-small">
            <?php
            $modal_id = 'my-modal-id';

            echo El::button(__('Open Modal', 'mc-starter'), [
                'attributes' => [
                    'class' => 'uk-button uk-button-primary',
                    'uk-toggle' => "target: #{$modal_id}",
                ]
            ]);
            ?>

            <?php
            $modal_data = Modal::getMockData();
            $modal_data['id'] = $modal_id;
            $modal_data['body'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
            $modal_data['options'] = [
                'close-button-icon' => El::icon('x')
            ];
            $modal = new Modal('modal', $modal_data);
            echo $modal->render();
            ?>
        </div>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <div class="uk-width-1-1">
            <h4><?php _e('Class', 'mc-starter'); ?></h4>
            <?php
            printf(
                '<pre><code>use MC\App\Components\Models\Modal;
$component = new Modal(string $template_name, array $data);</code></pre>',
            );
            ?>

            <h4><?php _e('Usage', 'mc-starter'); ?></h4>
            <?php
            printf(
                '<pre><code>$modal_data = Modal::getMockData();
$modal = new Modal(\'modal\', $modal_data);
echo $modal->render();</code></pre>',
            );
            ?>

            <h4><?php _e('Expected Data Shape', 'mc-starter'); ?></h4>
            <?php
            echo '<pre><code><textarea>';
            print_r($modal_data);
            echo '</textarea></code></pre>';
            ?>
        </div>
    </div>
</section>