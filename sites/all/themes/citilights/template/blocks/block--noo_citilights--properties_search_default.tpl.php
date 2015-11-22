<!-- START FIND PROPERTY -->
<div class="<?php print $classes; ?>" <?php print $attributes; ?> id="<?php print $block_html_id; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h3><?php print $block->subject; ?></h3>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content; ?>
</div>
<!-- END FIND PROPERTY -->
