<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- skip to main content -->
    <a href="#primary" class="screen-reader-text"><?php _e('Skip to Main Content', 'mc-starter'); ?></a>

    <header id="masthead" class="header" role="banner">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="uk-container uk-container-large">
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php _e('Toggle navigation', 'mc-starter'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                // Loads the menu/primary.php template.
                get_template_part('menu/primary');
                ?>
            </div>
        </nav>
    </header><!-- .header -->

    <div id="jsoneditor"></div>

    <script type="module">
        // import {
        //     JSONEditor
        // } from 'vanilla-jsoneditor'
        import {
            JSONEditor
        } from '/app/themes/mc-wp-starter-theme-default/node_modules/vanilla-jsoneditor/index.js';

        let content = {
            text: undefined,
            json: {
                greeting: 'Hello World'
            }
        }

        const editor = new JSONEditor({
            target: document.getElementById('jsoneditor'),
            props: {
                content,
                onChange: (updatedContent, previousContent, {
                    contentErrors,
                    patchResult
                }) => {
                    // content is an object { json: JSONValue } | { text: string }
                    console.log('onChange', {
                        updatedContent,
                        previousContent,
                        contentErrors,
                        patchResult
                    })
                    content = updatedContent
                }
            }
        })

        // use methods get, set, update, and onChange to get data in or out of the editor.
        // Use updateProps to update properties.
    </script>