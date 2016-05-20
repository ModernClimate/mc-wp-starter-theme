<?php
  $columns = get_sub_field( 'columns' );
  switch ( count($columns) ) {
    case 1:
      $col_class = 'col-sm-12';
      break;
    case 2:
      $col_class = 'col-sm-6';
      break;
    case 3:
      $col_class = 'col-sm-4';
      break;
    case 4:
      $col_class = 'col-sm-3';
      break;
    default:
      $col_class = 'col-sm-2';
      break;
  }
?>
<div class="row row-flex-content row-columns">
  <?php foreach ($columns as $column): ?>
    <div class="<?php echo $col_class ?>">
      <?php echo $column['column_content']; ?>
    </div>
  <?php endforeach; ?>
</div>
