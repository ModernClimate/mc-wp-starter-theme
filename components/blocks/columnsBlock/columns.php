
  <?php
  /**
   * Block Name: MC: Columns Block
   *
   * Description: 
   */
  
  // Dynamic block ID
  $block_id = 'mc-columns-block-' . $block['id'];
  if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
  }
  
  // Create class attribute allowing for custom "className" and "align" values.
  $className = 'mc-columns-block';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  $template = [
    [
      'core/columns',
      [
        'className'     => 'mc-column',
      ]
    ]
  ];

  $allowed_blocks = array('core/columns')
  ?>
  
  <div id="<?php echo $block_id; ?>" class="<?php echo $className; ?>">
  <InnerBlocks 
        template="<?php echo esc_attr(wp_json_encode($template)); ?>"
        allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" 
        templatLock="all"/>
  </div>
  