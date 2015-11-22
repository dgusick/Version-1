<!-- START FIND PROPERTY -->
<div class="block-sidebar find-property <?php print $classes; ?>" <?php print $attributes; ?> id="<?php print $block_html_id; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h3 class="title-block-sidebar"><?php print $block->subject; ?></h3>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <div class="gsearch">
    <div class="gsearch-wrap">
      <?php print $content; ?>
    </div>
  </div>
</div>
<!-- END FIND PROPERTY -->
