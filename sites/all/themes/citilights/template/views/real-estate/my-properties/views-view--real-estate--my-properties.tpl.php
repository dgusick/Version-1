<div class="properties list my-properties">
  <div class="properties-header">
    <h1 class="page-title"><?php print t('My Properties');?></h1>
  </div>
  <div class="properties-content">
    <?php if ($rows): ?>
      <?php print $rows; ?>
    <?php elseif ($empty): ?>
      <div class="view-empty">
        <?php print $empty; ?>
      </div>
    <?php endif; ?>
  </div>
</div>