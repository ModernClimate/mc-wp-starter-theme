<?php
  $row_id = get_row_index();
  $parent = "accordion-{$row_id}";
  $panels = get_sub_field( 'accordion' );
  $open_first = get_sub_field( 'open_first' );
?>

<div class="col-xs-12">
  <div class="panel-group" id="<?php echo $parent; ?>" role="tablist">
    <?php foreach ($panels as $index => $panel): ?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#<?php echo $parent; ?>" href="<?php echo "#{$parent}-{$index}"; ?>">
              <?php echo $panel['accordion_title']; ?>
            </a>
          </h4>
        </div>
        <div id="<?php echo "{$parent}-{$index}"; ?>" class="panel-collapse collapse <?php echo ($open_first and $index === 0) ? 'in' : '' ; ?>" role="tabpanel">
          <div class="panel-body">
            <?php echo $panel['accordion_content']; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
