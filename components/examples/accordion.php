<?php

use MC\App\Components\Models\Accordion;
?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2><?php _e('Accordion', 'mc-starter'); ?></h2>
            <p><a href="https://getuikit.com/docs/accordion" target="_blank">https://getuikit.com/docs/accordion</a></p>
        </div>
    </div>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Basic Use', 'mc-starter'); ?></h3>
        </div>
    </div>
    <div class="example">
        <div class="uk-container uk-container-small">
            <?php
            $data_accordion = Accordion::getMockData();
            $accordion = new Accordion('accordion', $data_accordion);
            echo $accordion->render();
            ?>
        </div>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <h4><?php _e('Class', 'mc-starter'); ?></h4>
        <?php
        printf(
            '<pre><code>use MC\App\Components\Models\Accordion;
$component = new Accordion(string $template_name, array $data);</code></pre>'
        );
        ?>

        <h4><?php _e('Usage', 'mc-starter'); ?></h4>
        <?php
        printf(
            '<pre><code>$data = Accordion::getMockData(\'accordion\');
$accordion = new Accordion(\'accordion\', $data);
echo $accordion->render();</code></pre>',
        );
        ?>

        <h4><?php _e('Expected Data Shape', 'mc-starter'); ?></h4>
        <?php
        echo '<pre><code>';
        print_r($data_accordion);
        echo '</code></pre>';
        ?>
    </div>
</section>