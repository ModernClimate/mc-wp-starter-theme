<?php
/**
 * ACF Module: Columns
 *
 * @global $data
 */

use AD\App\Fields\Modules;

$size  = ! empty( $data['col-size'] ) ? esc_attr( $data['col-size'] ) : 'md';
$rows  = Modules::getRowsLayout( 'columns', $data );
$class = "col-$size-" . ( 12 / count( $rows ) );
?>

<?php if ( ! empty( $rows ) ) : ?>
    <div class="row row-flex-content">
        <?php foreach ( $rows as $column ): ?>
            <div class="<?php echo $class ?>">
                <?php echo apply_filters( 'the_content', $column["column_content"] ); ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>