<div class="form-group col-md-6 col-sm-6">
  <?php print drupal_render($form['submitted']['your_name']); ?>
</div>
<div class="form-group  col-md-6 col-sm-6">
  <?php print drupal_render($form['submitted']['your_email']); ?>
</div>
<div class="form-group message col-md-12 col-sm-12">
  <?php print drupal_render($form['submitted']['message']); ?>
</div>
<div class="form-action col-md-12 col-sm-12">
  <a class="btn btn-default click-other-action" data-click=".hide-actions .form-submit" href="#">Send Me</a>
</div>
<div class="js-hide hide-actions"><?php print drupal_render_children($form); ?></div>
