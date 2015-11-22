<?php $j = 0; ?>
<div class="testimonial-content">
  <div class="carousel slide" id="carousel-testimonial">
    <ol class="carousel-indicators">
      <?php for($i=0; $i < count($rows); $i++) : ?>
      	<?php if($i==0) : ?>
        	<li data-target="#carousel-testimonial" data-slide-to="<?php print $i; ?>" class="active"></li>
        <?php else: ?>
        	<li data-target="#carousel-testimonial" data-slide-to="<?php print $i; ?>"></li>
        <?php endif; ?>
	  <?php endfor; ?>
    </ol>
    <div class="carousel-inner">
    	<?php foreach ($rows as $id => $row): ?>
            <div class="item <?php ($j==0) ? print 'active' : print ''; ?>">
				<?php print $row; ?>
            </div>
            <?php $j++; ?>
        <?php endforeach; ?>  
    </div>
  </div>            
</div>