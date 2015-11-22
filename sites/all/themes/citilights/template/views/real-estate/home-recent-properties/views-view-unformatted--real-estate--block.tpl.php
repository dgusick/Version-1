<?php
	$i = 0;
	$visible = 4;
	$r=0;
?>
<div class="recent-properties-content">
  <div class="caroufredsel-wrap">
    <ul>
	  <?php foreach ($rows as $id => $row): ?>
          <?php if ($r++ % $visible == 0):?>
          <li>
          <?php endif;?>
          <?php if ($i++ % 2 == 0):?>
          <div class="property-row">
          <?php endif;?>
		  <?php print $row; ?>
          <?php if ($i % 2 == 0 || $i == count($rows)):?>
          </div>
          <?php endif;?>
          <?php if ($r % $visible == 0 || $r == count($rows)):?>
          </li>
          <?php endif;?>
      <?php endforeach; ?>
    </ul>
  </div>
  <a class="caroufredsel-prev" href="#"></a>
  <a class="caroufredsel-next" href="#"></a>
</div>