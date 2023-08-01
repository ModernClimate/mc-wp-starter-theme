<?php

/**
 * Template Name: Example Components
 *
 * @package MC
 */

get_header();
?>

<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css"> -->
<link rel="stylesheet" href="//highlightjs.org/static/demo/styles/base16/material-palenight.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>

<div id="primary" class="example-components">
    <section>
        <div class="uk-container uk-container-large">
            <div class="uk-width-1-1">
                <h1>Components</h1>
            </div>
        </div>
    </section>

    <?php
    $hero_example_template = locate_template("components/examples/hero.php");
    if (file_exists($hero_example_template)) {
        include $hero_example_template;
    }
    ?>

    <?php
    $el_example_template = locate_template("components/examples/el.php");
    if (file_exists($el_example_template)) {
        include $el_example_template;
    }
    ?>

    <?php
    $accordion_example_template = locate_template("components/examples/accordion.php");
    if (file_exists($accordion_example_template)) {
        include $accordion_example_template;
    }
    ?>

    <?php
    $card_example_template = locate_template("components/examples/card.php");
    if (file_exists($card_example_template)) {
        include $card_example_template;
    }
    ?>

    <?php
    $modal_example_template = locate_template("components/examples/modal.php");
    if (file_exists($modal_example_template)) {
        include $modal_example_template;
    }
    ?>
</div>

<?php
get_footer();
