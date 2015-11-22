<div class="noo-control-group">
  <div class="group-title"><?php print t('Change Password'); ?></div>
  <div class="group-container row">
    <div class="form-message">
    </div>
    <div class="col-md-6">
      <div class="form-group s-profile-old_pass">
        <?php print render($form['account']['current_pass']); ?>
      </div>
      <?php print render($form['account']['pass']); ?>
    </div>
    <div class="col-md-12">
      <div class="noo-submit">
        <?php print render($form['actions']); ?>
      </div>
    </div>
  </div>
</div>

<?php print drupal_render_children($form); ?>