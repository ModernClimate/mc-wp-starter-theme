<?php
/**
 * ACF Module: Tabs
 *
 * @global $data
 * @global $row_id
 */

use AD\App\Fields\ACF;

$tab_pos = ACF::getField( 'tab_pos', $data, 'top' );
$tabs    = ACF::getRowsLayout( 'tabs', $data );
?>
<div class="row row-flex-content">
    <div class="<?php echo ( $tab_pos == 'side' ) ? 'col-sm-3' : 'col-xs-12'; ?> col-tabs">
        <ul class="nav <?php echo ( $tab_pos == 'side' ) ? 'nav-pills nav-stacked' : 'nav-tabs'; ?>" role="tablist">
            <?php foreach ( $tabs as $index => $tab ): ?>
                <li role="presentation" <?php echo ( 0 === $index ) ? "class=\"active\"" : ""; ?>>
                    <a href="<?php echo "#{$row_id}-{$index}"; ?>" role="tab"
                       data-toggle="tab"><?php echo $tab['tab_button']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="<?php echo ( $tab_pos == 'side' ) ? 'col-sm-9' : 'col-xs-12'; ?>">
        <div class="tab-content">
            <?php foreach ( $tabs as $index => $tab ): ?>
                <div role="tabpanel" class="tab-pane <?php echo ( 0 === $index ) ? "active" : ""; ?>"
                     id="<?php echo "{$row_id}-{$index}"; ?>">
                    <?php echo $tab['tab_content']; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
