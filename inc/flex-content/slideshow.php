<?php
  $row_id = "slideshow-" . get_row_index();
  $slides = get_sub_field( 'slides' );
?>

<div class="col-xs-12">

  <div id="<?php echo $row_id; ?>" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <?php foreach ($slides as $index => $slide): ?>
        <li data-target="#<?php echo $row_id; ?>" data-slide-to="<?php echo $index; ?>" class="<?php echo ($index == 0) ? 'active' : ''; ?>"></li>
      <?php endforeach; ?>
    </ol>

    <div class="carousel-inner" role="listbox">
      <?php foreach ($slides as $index => $slide): ?>
        <div class="item <?php echo ($index == 0) ? 'active' : ''; ?>">
          <img src="<?php echo $slide['slide_image']['url']; ?>" alt="<?php echo $slide['slide_image']['alt']; ?>">
          <div class="carousel-caption">
            <h3><?php echo $slide['slide_image']['title']; ?></h3>
            <p><?php echo $slide['slide_image']['caption']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <a class="left carousel-control" href="#<?php echo $row_id; ?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#<?php echo $row_id; ?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

</div>
