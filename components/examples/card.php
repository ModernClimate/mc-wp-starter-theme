<?php

use MC\App\Components\Models\Card;
?>

<section>
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2><?php _e('Cards', 'mc-starter'); ?></h2>
        </div>
    </div>

    <div class="uk-container uk-container-large">
        <h3><?php _e('Card C4', 'mc-starter'); ?></h3>
        <div class="uk-grid-small" uk-grid>
            <?php
            $data_card_c1_4 = Card::getMockData('c1-4');

            for ($i = 1; $i <= 4; $i++) {
                $data_card_c1_4['id'] = 'card-c1-4-' . $i;
                $card_c1_4 = new Card('card-c1-4', $data_card_c1_4);

                printf(
                    '<div class="uk-width-1-1 uk-width-1-4@l">
                        %1$s
                    </div>',
                    $card_c1_4->render()
                );
            }
            ?>
        </div>

        <h3><?php _e('Card C3', 'mc-starter'); ?></h3>
        <div class="uk-grid-small" uk-grid>
            <?php
            $data_card_c1_3 = Card::getMockData('c1-3');
            for ($i = 1; $i <= 3; $i++) {
                $data_card_c1_3['id'] = 'card-c1-3-' . $i;
                $card_c1_3 = new Card('card-c1-3', $data_card_c1_3);
                printf(
                    '<div class="uk-width-1-1 uk-width-1-3@l">
                        %1$s
                    </div>',
                    $card_c1_3->render()
                );
            }
            ?>
        </div>

        <h3><?php _e('Card C2', 'mc-starter'); ?></h3>
        <div class="uk-grid-small" uk-grid>
            <?php
            $data_card_c1_2 = Card::getMockData('c1-2');
            for ($i = 1; $i <= 2; $i++) {
                $data_card_c1_2['id'] = 'card-c1-2-' . $i;
                $card_c1_2 = new Card('card-c1-2', $data_card_c1_2);
                printf(
                    '<div class="uk-width-1-1 uk-width-1-2@l">
                        %1$s
                    </div>',
                    $card_c1_2->render()
                );
            }
            ?>
        </div>

        <h3><?php _e('Card C1', 'mc-starter'); ?></h3>
        <div class="uk-grid-small" uk-grid>
            <?php
            $data_card_c1 = Card::getMockData('c1');
            $data_card_c1['id'] = 'card-c1-1';
            $card_c1 = new Card('card-c1', $data_card_c1);
            printf(
                '<div class="uk-width-1-1">
                    %1$s
                </div>',
                $card_c1->render()
            );
            ?>
        </div>
    </div>
</section>