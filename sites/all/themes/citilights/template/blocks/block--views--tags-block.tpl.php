<div class="block-sidebar tag-cloud <?php print $classes; ?>"<?php print $attributes; ?> id="<?php print $block_html_id; ?>">
    <?php print render($title_prefix); ?>
	<?php if ($block->subject): ?>
        <h4 class="title-block-sidebar"><?php print $block->subject;?></h4>
    <?php endif;?>
    <?php print render($title_suffix); ?>
    <?php print $content ;?>
</div>