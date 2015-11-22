<div class="col-xs-12 col-sm-6 col-md-<?php print theme_get_setting('col_num','citilights'); ?> footer-nav-col <?php print $classes; ?>"<?php print $attributes; ?> id="<?php print $block_html_id; ?>">
    <div class="ft-useful-links">
	  <?php print render($title_prefix); ?>
      <?php if ($block->subject): ?>
          <h4 class="ft-col-title"><?php print $block->subject;?></h4>
      <?php endif;?>
      <?php print render($title_suffix); ?>
      <nav class="useful-links-menu" role="navigation">
        <?php print $content ;?>
      </nav>
    </div>
</div>