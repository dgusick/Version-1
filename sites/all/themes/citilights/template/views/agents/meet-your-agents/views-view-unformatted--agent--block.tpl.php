<div class="recent-agents-content">
  <div class="caroufredsel-wrap row">
    <ul>
	  <?php foreach ($rows as $id => $row): ?>
          <li class="col-md-4 col-sm-6">
              <?php print $row; ?>
          </li>
      <?php endforeach; ?>
	</ul>
  </div>
  <a class="caroufredsel-prev" href="javascript:void(0)"></a>
  <a class="caroufredsel-next" href="javascript:void(0)"></a>
</div>