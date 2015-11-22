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
  
    <!-- START MAP VERTICAL -->
      <section id="search_map_horizontal" class="wrap noo_advanced_search_property horizontal">
        <div class="noo-map" id="noo-map">
          <div id="gmap"></div>
          <div class="gmap-search">
            <input placeholder="<?php print t('Search your map'); ?>" type="text" autocomplete="off" id="gmap_search_input">
          </div>
          <div class="gmap-control">
            <a class="gmap-mylocation" href="#"><i class="fa fa-map-marker"></i><?php print t('My Location'); ?></a>
            <a class="gmap-full" href="#"><i class="fa fa-expand"></i></a>
            <a class="gmap-prev" href="#"><i class="fa fa-angle-left"></i></a>
            <a class="gmap-next" href="#"><i class="fa fa-angle-right"></i></a>
          </div>
          <div class="gmap-zoom">
            <a href="#" class="zoom-in"><i class="fa fa-plus"></i></a>
            <a href="#" class="zoom-out"><i class="fa fa-minus"></i></a>
          </div>
          <div class="gmap-loading"><?php print t('Loading Maps'); ?>
            <div class="gmap-loader">
              <div class="rect1"></div>
              <div class="rect2"></div>
              <div class="rect3"></div>
              <div class="rect4"></div>
              <div class="rect5"></div>
            </div>
          </div>

          <?php
          	$block = module_invoke('noo_citilights', 'block_view', 'properties_search_horizontal');
  			print render($block['content']);
		  ?>
          <?php print render($content); ?>
        </div>
      </section>
      <!-- END MAP VERTICAL -->

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