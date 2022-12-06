
  <?php
  /**
   * Block Name: MC: Content Block
   *
   * Description: 
   */
  
  // Dynamic block ID
  $block_id = 'content-block-' . $block['id'];
  if( !empty($block['anchor']) ) {
    $block_id = $block['anchor'];
  }
  
  // Create class attribute allowing for custom "className" and "align" values.
  $className = 'content-block';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }

  $title = get_field('title') ?? 'Title';
  $content = get_field('copy') ?? 'Content...';
  ?>
  
  <div id="<?php echo $block_id; ?>" class="<?php echo $className; ?>">
    <h2><?php echo esc_html($title); ?></h2>
    <p><?php echo esc_html($content); ?></p>
  </div>
  