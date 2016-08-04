<?php
  $row_id = get_row_index();
  $tab_pos = get_sub_field( 'tab_pos' );
  $tabs = get_sub_field( 'tabs' );
?>

<div class="<?php echo ( $tab_pos == 'side' ) ? 'col-sm-3' : 'col-xs-12'; ?> col-tabs">
  <ul class="nav <?php echo ( $tab_pos == 'side' ) ? 'nav-pills nav-stacked' : 'nav-tabs'; ?>" role="tablist">
    <?php foreach ($tabs as $index => $tab): ?>
      <li role="presentation" <?php echo ($index === 0) ? "class=\"active\"" : ""; ?>>
        <a href="#tab-<?php echo $row_id; ?>-<?php echo $index; ?>" role="tab" data-toggle="tab"><?php echo $tab['tab_button']; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<div class="<?php echo ( $tab_pos == 'side' ) ? 'col-sm-9' : 'col-xs-12'; ?>">
  <div class="tab-content">
    <?php foreach ($tabs as $index => $tab): ?>
      <div role="tabpanel" class="tab-pane <?php echo ($index === 0) ? "active" : ""; ?>" id="tab-<?php echo $row_id; ?>-<?php echo $index; ?>">
        <?php echo $tab['tab_content']; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
