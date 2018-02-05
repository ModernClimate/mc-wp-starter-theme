<?php
/**
 * ACF Module: Accordian
 *
 * @global $data
 * @global $row_id
 */

use AD\App\Fields\ACF;

$panels     = ACF::getRowsLayout( 'accordion', $data );
$open_first = ACF::getField( 'open_first', $data );
?>

<div class="panel-group" role="tablist">
    <?php foreach ( $panels as $index => $panel ) : ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#<?php echo $row_id; ?>"
                       href="<?php echo "#{$row_id}-{$index}"; ?>">
                        <?php echo esc_html( $panel['accordion_title'] ); ?>
                    </a>
                </h4>
            </div>
            <div id="<?php echo "{$row_id}-{$index}"; ?>"
                 class="panel-collapse collapse <?php echo ( $open_first && 0 === $index ) ? 'in' : ''; ?>"
                 role="tabpanel">
                <div class="panel-body">
                    <?php echo apply_filters( 'the_content', $panel['accordion_content'] ); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
