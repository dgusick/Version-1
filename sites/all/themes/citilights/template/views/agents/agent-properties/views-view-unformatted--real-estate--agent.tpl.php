<div class="agent-properties">
  <div class="properties grid">
    <div class="properties-header">
      <h1 class="page-title"><?php print t('Properties'); ?></h1>
    </div>
    <div class="properties-content">
      <?php foreach ($rows as $id => $row): ?>
        <?php print $row; ?>
      <?php endforeach; ?>

    </div>
  </div>
</div>