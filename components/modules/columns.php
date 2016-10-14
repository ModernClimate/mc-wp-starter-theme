<?php
/**
 * ACF Module: Columns
 */

$column_size = get_sub_field( 'col_size' );
$columns     = get_sub_field( 'columns' );
$col_class   = "col-$column_size-" . ( 12 / count( $columns ) );
?>

<?php if ( ! empty( $columns ) ) : ?>
    <div class="row row-flex-content <?php echo $row_name; ?>">
        <?php foreach ( $columns as $column ): ?>
            <div class="<?php echo $col_class ?>">
                <?php echo $column["column_content"]; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>