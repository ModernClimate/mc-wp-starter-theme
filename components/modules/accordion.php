<?php
/**
 * ACF Module: Accordian
 */

$panels     = get_sub_field( 'accordion' );
$open_first = get_sub_field( 'open_first' );
?>

<div class="panel-group" id="<?php echo $rowId; ?>" role="tablist">
    <?php foreach ( $panels as $index => $panel ) : ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#<?php echo $rowId; ?>"
                       href="<?php echo "#{$rowId}-{$index}"; ?>">
                        <?php echo $panel['accordion_title']; ?>
                    </a>
                </h4>
            </div>
            <div id="<?php echo "{$rowId}-{$index}"; ?>"
                 class="panel-collapse collapse <?php echo ( $open_first and $index === 0 ) ? 'in' : ''; ?>"
                 role="tabpanel">
                <div class="panel-body">
                    <?php echo $panel['accordion_content']; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
