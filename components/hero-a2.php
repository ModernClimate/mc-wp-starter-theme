<?php

/**
 * Component: Hero A2
 *
 * @var array $data
 * @var string $data['id']
 * @var string $data['headline']
 * @var string $data['content']
 * @var array $data['media']
 */

$id = $data['id'] ?? '';
$headline = $data['headline'] ?? '';
$content = $data['content'] ?? '';
$media = $data['media'] ?? [];

do_action('mc/components/styles', $id, $data);
?>

<div class="mcx-hero mcx-hero--a2 hero" id="<?php echo esc_html($id); ?>">
    <div class="hero__media">
        <div class="uk-container uk-container-large">
            <div class="hero__headline">
                <h1>
                    <?php echo $headline; ?>
                </h1>
            </div>
        </div>
        <div class="overlay overlay--l20"></div>
    </div>

    <div class="uk-container uk-container-large">
        <div class="uk-flex uk-flex-center">
            <div class="uk-width-3-4">
                <div class="hero__content">
                    <?php echo apply_filters('the_content', $content); ?>
                    <!-- button one and two -->
                    <!-- TODO move this guy up a bit over the image -->
                </div>
            </div>
        </div>
    </div>
</div>