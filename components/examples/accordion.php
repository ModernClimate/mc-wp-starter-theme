<?php

use MC\App\Components\Models\Accordion;
?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2>Accordion</h2>
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
        <h4>Class</h4>
        <?php
        printf(
            '<p class="code">
                <code>use MC\App\Components\Models\Accordion;</code><br>
                <br>
                <code>$component = new Accordion(%1$s, %2$s);</code><br>
            </p>',
            '<strong>string</strong> <em>$template_name</em>',
            '<strong>array</strong> <em>$data</em>'
        );
        ?>

        <h4>Usage</h4>
        <?php
        printf(
            '<p class="code code--usage">
                <code>$data = Accordion::getMockData(\'accordion\');</code><br>
                <code>$accordion = new Accordion(\'accordion\', $data);</code><br>
                <code>echo $accordion->render();</code>
            </p>',
        );
        ?>

        <h4>Expected Data Shape</h4>
        <?php
        echo '<pre>';
        print_r($data_accordion);
        echo '</pre>';
        ?>
    </div>
</section>