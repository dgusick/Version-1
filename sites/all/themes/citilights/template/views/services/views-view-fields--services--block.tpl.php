<span class="service-icon">
  <i class="fa <?php print $fields['field_services_icon']->content;?>"></i>
</span>
<hr class="noo-gap">
<div class="text-block">
  <h5><?php print $fields['title']->content;?></h5>
  <p><?php print $fields['field_services_description']->content;?></p>
  <p><a class="icon-right" href="<?php print $fields['field_services_link']->content;?>"><?php print t('See latest list'); ?><i class="fa fa-arrow-circle-o-right"></i></a></p>
</div>