<?php

use MC\App\Components\Models\Hero;

?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2><?php _e('Hero', 'mc-starter'); ?></h2>
        </div>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Hero A1', 'mc-starter'); ?></h3>
        </div>
    </div>
    <div class="example">
        <?php
        $data_hero_a1 = Hero::getMockData('a1');
        $hero_a1 = new Hero('hero-a1', $data_hero_a1);
        echo $hero_a1->render();
        ?>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h3><?php _e('Hero A2', 'mc-starter'); ?></h3>
        </div>
    </div>
    <div class="example">
        <?php
        $data_hero_a2 = Hero::getMockData('a2');
        $hero_a2 = new Hero('hero-a2', $data_hero_a2);
        echo $hero_a2->render();
        ?>
    </div>

    <div class="uk-container uk-container-small entry__content">
        <div class="uk-width-1-1">
            <h4><?php _e('Class', 'mc-starter'); ?></h4>
            <?php
            printf(
                '<pre><code>use MC\App\Components\Models\Hero;
$component = new Hero(string $template_name, array $data);</code></pre>'
            );
            ?>

            <h4><?php _e('Usage', 'mc-starter'); ?></h4>
            <?php
            printf(
                '<pre><code>$data_hero_a1 = Hero::getMockData(\'a1\');
$hero_a1 = new Hero(\'hero-a1\', $data_hero_a1);
echo $hero_a1->render();</code></pre>',
            );
            ?>

            <h4><?php _e('Expected Data Shape', 'mc-starter'); ?></h4>
            <?php
            echo '<pre><code>';
            print_r($data_hero_a1);
            echo '</code></pre>';
            ?>
        </div>
    </div>
</section>