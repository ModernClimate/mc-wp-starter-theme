<?php

/**
 * Template Name: Component
 *
 * @package MC
 */

get_header();

$page_slug = basename(esc_url_raw($_SERVER['REQUEST_URI']));
$page_title = MC_COMPONENT_PAGES[$page_slug]['title'];
?>

<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css"> -->
<link rel="stylesheet" href="//highlightjs.org/static/demo/styles/base16/material-palenight.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();
</script>

<div id="primary" class="example-component">
    <?php echo do_shortcode('[component name="' . esc_html($page_slug) . '"][/component]'); ?>

    <section>
        <div class="uk-container uk-container-large">
            <h2><?php _e('Other Components', 'mc-starter'); ?></h2>
            <ul>
                <?php
                foreach (MC_COMPONENT_PAGES as $slug => $page) {
                    printf(
                        '<li>
                            <a href="%1$s" target="_self">%2$s</a>
                        </li>',
                        '/components/' . $slug . '/',
                        esc_html($page['title'])
                    );
                }
                ?>
            </ul>
        </div>
    </section>
</div>

<?php
get_footer();
