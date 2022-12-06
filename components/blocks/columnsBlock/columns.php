
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
      'core/group',
      [],
      [
        [
          'core/columns',
          [],
          [
            [
              'core/column',
              [],
            
            ],
            [
              'core/column',
              [],
            ],
          ],
        ],
      ]
    ]
  ];

  $allowed_blocks = [
    'core/column',
    'core/columns',
    'core/group',
    'core/heading',
    'core/paragraph',
  ];

  do_action('mc/styles/margin', $block_id, $block);
  ?>
  
  <div id="<?php echo $block_id; ?>" class="<?php echo $className; ?>">
  <InnerBlocks 
        template="<?php echo esc_attr(wp_json_encode($template)); ?>"
        allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" 
        templatLock="all"/>
  </div>
  