<?php
/**
 * @file panels-pane.tpl.php
 * Main panel pane template
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */
?>
<?php if ($pane_prefix): ?>
  <?php print $pane_prefix; ?>
<?php endif; ?>
<div class="<?php print $classes; ?>" <?php print $id; ?> <?php print $attributes; ?>>
  <?php if ($admin_links): ?>
    <?php print $admin_links; ?>
  <?php endif; ?>
  
    <div class="recent-properties">
      <div class="properties list">
        <!-- START PROPERTIES HEADER -->
        <div class="properties-header">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
              <h1 class="page-title"><?php print $title; ?></h1>
              <?php if($subtitle) : ?>
                <p><?php print $subtitle; ?></p>
              <?php endif; ?>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <div class="properties-toolbar">
            <a href="<?php print base_path() ?>grid-sidebar" data-toggle="tooltip" data-placement="bottom" title="Grid"><i class="fa fa-th-large"></i></a>
            <a class="selected" href="<?php print base_path() ?>list-sidebar" data-toggle="tooltip" data-placement="bottom" title="List"><i class="fa fa-list"></i></a>
            <?php
              $block = module_invoke('noo_citilights', 'block_view', 'real_estate_sort');
              print render($block['content']);
            ?>
          </div>
        </div>
        <!-- END PROPERTIES HEADER -->

        <!-- START PROPERTIES CONTENT -->
        <?php print render($content); ?>
        <!-- END PROPERTIES CONTENT -->
      </div>
    </div>

  <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <div class="more-link">
      <?php print $more; ?>
    </div>
  <?php endif; ?>
</div>
<?php if ($pane_suffix): ?>
  <?php print $pane_suffix; ?>
<?php endif; ?>
