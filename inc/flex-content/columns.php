<?php
  $column_size = get_sub_field( 'col_size' );
  $columns = get_sub_field( 'columns' );
  switch ( count($columns) ) {
    case 1:
      $col_class = "col-{$column_size}-12";
      break;
    case 2:
      $col_class = "col-{$column_size}-6";
      break;
    case 3:
      $col_class = "col-{$column_size}-4";
      break;
    case 4:
      $col_class = "col-{$column_size}-3";
      break;
    default:
      $col_class = "col-{$column_size}-2";
      break;
  }
?>

<?php foreach ($columns as $column): ?>
  <div class="<?php echo $col_class ?>">
    <?php echo $column["column_content"]; ?>
  </div>
<?php endforeach; ?>
