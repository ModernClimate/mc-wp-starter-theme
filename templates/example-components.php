<?php

/**
 * Template Name: Example Components
 *
 * @package MC
 */

get_header();
?>

<style>
    h1 {
        font-size: 2.75rem;
        font-weight: bold;
        margin: 4rem 0;
    }

    h2 {
        font-size: 2.25rem;
        font-weight: bold;
        margin: 2rem 0;
    }

    h3 {
        font-size: 1.8rem;
        font-weight: normal;
        margin: 1rem 0;
    }

    h4 {
        font-size: 1.5rem;
        font-weight: normal;
        margin: 1rem 0;
    }

    hr {
        padding-bottom: 8px;
        padding-top: 8px;
    }

    pre {
        background-color: #eee;
        white-space: pre-wrap;
    }

    section {
        margin-bottom: 4rem;
        margin-top: 4rem;
    }

    .code {
        background-color: lightgreen;
        font-size: 1.25rem;
        margin: 15px 0;
        padding: 15px;
    }

    .code--usage {
        background-color: lightblue;
    }

    .code strong {
        opacity: .5;
    }

    .example {
        margin-bottom: 4rem;
    }
</style>

<div id="primary" class="example-components">
    <section>
        <div class="uk-container uk-container-large">
            <div class="uk-width-1-1">
                <h1>Components</h1>
            </div>
        </div>
    </section>

    <?php
    $hero_example_template = $file = locate_template("components/examples/hero.php");
    if (file_exists($hero_example_template)) {
        include $hero_example_template;
    }
    ?>

    <?php
    $accordion_example_template = $file = locate_template("components/examples/accordion.php");
    if (file_exists($accordion_example_template)) {
        include $accordion_example_template;
    }
    ?>

    <?php
    $card_example_template = $file = locate_template("components/examples/card.php");
    if (file_exists($card_example_template)) {
        include $card_example_template;
    }
    ?>
</div>

<?php
get_footer();
