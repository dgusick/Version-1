<div class="block-sidebar recent-property <?php print $classes; ?>" <?php print $attributes; ?> id="<?php print $block_html_id; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
      <h3 class="title-block-sidebar"><?php print $block->subject; ?></h3>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content; ?>
</div>