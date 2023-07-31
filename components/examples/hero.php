<?php

use MC\App\Components\Models\Hero;

?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2>Hero</h2>
        </div>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3>Hero A1</h3>
        </div>
    </div>
    <div class="example">
        <?php
        $hero_a1_data = Hero::getMockData('a1');
        $hero_a1 = new Hero('hero-a1', $hero_a1_data);
        echo $hero_a1->render();
        ?>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3>Hero A2</h3>
        </div>
    </div>
    <div class="example">
        <?php
        $hero_a2_data = Hero::getMockData('a2');
        $hero_a2 = new Hero('hero-a2', $hero_a2_data);
        echo $hero_a2->render();
        ?>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <div class="uk-width-1-1">
            <h4>Class</h4>
            <?php
            printf(
                '<p class="code">
                    <code>%1$s</code><br>
                    <br>
                    <code>$component = new Hero(%2$s, %3$s);</code><br>
                </p>',
                'use MC\App\Components\Models\Hero;',
                '<strong>string</strong> <em>$template_name</em>',
                '<strong>array</strong> <em>$data</em>'
            );
            ?>

            <h4>Usage</h4>
            <?php
            printf(
                '<p class="code code--usage">
                    <code>%1$s</code><br>
                    <code>%2$s</code><br>
                    <code>%3$s</code>
                </p>',
                '$hero_a1_data = Hero::getMockData(\'a1\');',
                '$hero_a1 = new Hero(\'hero-a1\', $hero_a1_data);',
                'echo $hero_a1->render();'
            );
            ?>

            <h4>Expected Data Shape</h4>
            <?php
            echo '<pre>';
            print_r($hero_a1_data);
            echo '</pre>';
            ?>
        </div>
    </div>
</section>