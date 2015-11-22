<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
        <h4 class="title-block-sidebar"><?php print $block->subject; ?></h4>
    <?php endif;?>
    <?php print render($title_suffix); ?>
	<?php print $content ;?>
</div>