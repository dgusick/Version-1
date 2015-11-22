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
  
    <div class="contact-map">
      <?php if($map_contact_info_display) : ?>
      	<div class="row contact-info1">
          <div class="col-md-12">
            <div class="text-block">
                <h4>Contact Info</h4>
                </div>
              <div class="text-block">
                <ul>
                  <li><b>Address</b>376 Baker Str., NYC</li>
                  <li><b>Phone</b>(+01)-486-2857</li>
                  <li><b>Email</b>info@citilights.com</li>
                  <li><b>Fax</b>(+01)-486-2858</li>
                  <li><b>Website</b>http://citilights.com</li>
                </ul>
              </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="text-block">
        <?php print render($title_prefix); ?>
		<?php if ($title): ?>
            <h4><?php print $title; ?></h4>
            <?php if($subtitle) : ?>
              <p><?php print $subtitle; ?></p>
            <?php endif; ?>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      </div>
      <div class="noo-gmaps">
        <?php print $map_location; ?>
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
