
  <?php
  /**
   * Block Name: MC: Content Block
   *
   * Description: 
   */
  
  // Dynamic block ID
  $block_id = 'Content-block-' . $block['id'];
  if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
  }
  
  
  // Create class attribute allowing for custom "className" and "align" values.
  $className = 'Content-block';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  
  ?>
  
  <div id="<?php echo $block_id; ?>" class="<?php echo $className; ?>">
  </div>
  