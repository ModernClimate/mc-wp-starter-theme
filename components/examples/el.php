<?php

use MC\App\Components\El;
?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2><?php _e('Simple Elements', 'mc-starter'); ?></h2>
        </div>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Button', 'mc-starter'); ?></h3>
            <p>
                <a href="https://getuikit.com/docs/button" target="_blank">https://getuikit.com/docs/button</a>
            </p>
        </div>
    </div>
    <div class="example">
        <div class="uk-container uk-container-small">
            <h4><?php _e('Default', 'mc-starter'); ?></h4>
            <div>
                <?php
                $default_button_html = El::button('Button', [
                    'attributes' => [
                        'class' => 'uk-button uk-button-default',
                    ]
                ]);
                echo $default_button_html;

                $primary_button_html = El::button(__('Button', 'mc-starter'), [
                    'attributes' => [
                        'class' => 'uk-button uk-button-primary',
                    ]
                ]);
                echo $primary_button_html;

                $secondary_button_html = El::button(__('Button', 'mc-starter'), [
                    'attributes' => [
                        'class' => 'uk-button uk-button-secondary',
                    ]
                ]);
                echo $secondary_button_html;

                $danger_button_html = El::button(__('Button', 'mc-starter'), [
                    'attributes' => [
                        'class' => 'uk-button uk-button-danger',
                    ]
                ]);
                echo $danger_button_html;

                $text_button_html = El::button(__('Button', 'mc-starter'), [
                    'attributes' => [
                        'class' => 'uk-button uk-button-text',
                    ]
                ]);
                echo $text_button_html;

                $link_button_html = El::button(__('Button', 'mc-starter'), [
                    'attributes' => [
                        'class' => 'uk-button uk-button-link',
                    ]
                ]);
                echo $link_button_html;
                ?>
            </div>
            <h4><?php _e('With Icons', 'mc-starter'); ?></h4>
            <div>
                <?php
                $default_button_html = El::button(__('Close', 'mc-starter'), [
                    'icon-end' => 'x',
                    'attributes' => [
                        'class' => 'button uk-button uk-button-default uk-button-small',
                    ]
                ]);
                echo $default_button_html;

                $default_button_html = El::button(__('Go Somewhere', 'mc-starter'), [
                    'icon-start' => 'arrow-start',
                    'attributes' => [
                        'class' => 'button uk-button uk-button-secondary',
                    ]
                ]);
                echo $default_button_html;

                $default_button_html = El::button(__('Start and End', 'mc-starter'), [
                    'icon-start' => 'arrow-start',
                    'icon-end' => 'arrow-end',
                    'attributes' => [
                        'class' => 'button uk-button uk-button-danger',
                    ]
                ]);
                echo $default_button_html;

                $default_button_html = El::button('', [
                    'icon-start' => 'arrow-start',
                    'attributes' => [
                        'class' => 'button uk-button uk-button-link',
                    ]
                ]);
                echo $default_button_html;
                ?>
            </div>
        </div>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <h4><?php _e('Class', 'mc-starter'); ?></h4>
        <pre><code>El::button(string $button_text, array $attributes): string</code></pre>';

        <h4><?php _e('Usage', 'mc-starter'); ?></h4>
        <?php
        echo '<pre><code>';
        printf(
            'use MC\App\Components\El;
echo El::button(
    __(\'Click Me\', \'mc-starter\'),
    [
        \'icon-end\' => \'link\',
        \'attributes\' => [
            \'class\' => \'uk-button uk-button-default uk-button-small\',
        ]
    ]
);',
        );
        echo '</code></pre>';
        ?>

        <h4><?php _e('Expected Data Shape', 'mc-starter'); ?></h4>
        <?php
        echo '<pre><code>';
        print_r([
            'icon-end' => '',
            'icon-start' => '',
            'attributes' => [
                'class' => 'uk-button uk-button-default uk-button-small',
                'id' => 'my-button',
                'some-custom-attribute' => 'some string value'
            ]
        ]);
        echo '</code></pre>';
        ?>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Link', 'mc-starter'); ?></h3>
            <p>
                <a href="https://getuikit.com/docs/link" target="_blank">https://getuikit.com/docs/link</a>
            </p>
        </div>
    </div>
    <div class="example">
        <div class="uk-container uk-container-small">
            <?php
            $link = [
                'title' => __('Link', 'mc-starter'),
                'target' => '_blank',
                'url' => 'https://getuikit.com/docs/link',
            ];

            $default_link_html = El::link($link, [
                'attributes' => [
                    'class' => 'uk-button uk-button-default',
                ]
            ]);
            echo $default_link_html;
            ?>
        </div>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <h4><?php _e('Class', 'mc-starter'); ?></h4>

        <p class="code">
        <pre><code>use MC\App\Components\El;
$button_html = El::link(string $link_array, array $attributes);
</code></pre>
        </p>

        <h4><?php _e('Usage', 'mc-starter'); ?></h4>

        <p class="code code--usage">
        <pre><code>echo El::link($link, [
    'attributes' => [
        'class' => 'uk-button uk-button-default uk-button-small',
    ]
])</code></pre>
        </p>

        <h4><?php _e('Expected Data Shape', 'mc-starter'); ?></h4>
        <h5><?php _e('Link', 'mc-starter'); ?></h5>
        <?php
        echo '<pre><code>';
        print_r([
            'title' => __('Link', 'mc-starter'),
            'target' => '_blank',
            'url' => 'https://getuikit.com/docs/link',
        ]);
        echo '</pre></code>';
        ?>

        <h5><?php _e('Attributes', 'mc-starter'); ?></h5>
        <?php
        echo '<pre><code>';
        print_r([
            'icon-end' => '',
            'icon-start' => '',
            'attributes' => [
                'class' => 'uk-button uk-button-default uk-button-small',
                'id' => 'my-button',
                'some-custom-attribute' => 'some string value'
            ]
        ]);
        echo '</code></pre>';
        ?>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Icon', 'mc-starter'); ?></h3>
            <p><?php _e('Inline SVG usage. See: /theme-name/assets/images/icons/global.svg', 'mc-starter'); ?></p>
        </div>
    </div>
    <div class="example">
        <div class="uk-container uk-container-small">
            <h4><?php _e('Basic', 'mc-starter'); ?></h4>
            <div class="example__icons">
                <?php
                $x_icon_html = El::icon('x');
                echo $x_icon_html;

                $arrow_start_icon_html = El::icon('arrow-start');
                echo $arrow_start_icon_html;

                $arrow_end_icon_html = El::icon('arrow-end');
                echo $arrow_end_icon_html;
                ?>
            </div>
        </div>
    </div>

    <div class="example">
        <div class="uk-container uk-container-small">
            <h4><?php _e('Changing Color', 'mc-starter'); ?></h4>
            <div class="example__icons">
                <?php
                $x_icon_html = El::icon('x');
                echo '<span style="color: tan;">' .  $x_icon_html . '</span>';

                $arrow_start_icon_html = El::icon('arrow-start');
                echo '<span style="color: pink;">' . $arrow_start_icon_html . '</span>';

                $arrow_end_icon_html = El::icon('arrow-end');
                echo '<span style="color: green;">' . $arrow_end_icon_html . '</span>';

                $x_icon_html = El::icon('x');
                echo '<span style="color: gray;">' .  $x_icon_html . '</span>';

                $arrow_start_icon_html = El::icon('arrow-start');
                echo '<span style="color: rgba(255, 0, 255, .25);">' . $arrow_start_icon_html . '</span>';

                $arrow_end_icon_html = El::icon('arrow-end');
                echo '<span style="color: #ddd;">' . $arrow_end_icon_html . '</span>';
                ?>
            </div>
        </div>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <h4><?php _e('Class', 'mc-starter'); ?></h4>
        <pre><code>use MC\App\Components\El;
$button_html = El::icon(string $icon_name);</code></pre>

        <h4><?php _e('Usage', 'mc-starter'); ?></h4>
        <pre><code>echo El::icon('x')</code></pre>

        <h4><?php _e('Alternate Usage', 'mc-starter'); ?></h4>
        <?php
        echo '<pre><code class="language-html">';
        printf(
            '<textarea><svg class="icon icon-x" aria-hidden="true">
    <use xlink:href="#icon-x">`</use>
</svg></textarea>'
        );
        echo '</pre></code>';
        ?>
    </div>
</section>