<ul class="detail-contact-info">
  <?php
	  $array = theme_get_setting('ft_detail','citilights') ;
	  if(!empty($array)) :
		  foreach($array as $key => $value) :
			  print '<li><i class="fa '.$value['icon']['icon'].'"></i>&nbsp;'.$value['des'].'</li>'; 
		  endforeach;
	  endif;
  ?>
</ul>