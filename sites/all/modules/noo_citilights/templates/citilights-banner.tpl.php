<div id="noo-slider-1" class="noo-slider noo-property-slide-wrap">
  <ul class="sliders">
    <?php
    	$ids = explode(',',theme_get_setting('header_content_ids', 'citilights'));
		for($i=0; $i < count($ids); $i++) :
			$node = node_load($ids[$i]);
	?>
    		<li class="slide-item noo-property-slide">
              <?php if(isset($node->field_real_slider_image['und'])) : ?>
              	<img src="<?php print file_create_url($node->field_real_slider_image['und'][0]['uri']); ?>" class="attachment-property-slider" alt="" />
              <?php endif; ?>
              <div class="slide-caption">
                <div class="slide-caption-info">
                  <h3><a href="<?php print drupal_get_path_alias("node/$node->nid"); ?>"><?php print $node->title; ?></a>
                    <small><?php print $node->field_real_address['und'][0]['value']; ?></small>
                  </h3>
                  <div class="info-summary">
                    <div class="size">
                      <span><?php print $node->field_real_area['und'][0]['value']; ?> <?php print t('sqft'); ?></span>
                    </div>
                    <div class="bathrooms">
                      <span><?php print $node->field_real_bathrooms['und'][0]['value']; ?></span>
                    </div>
                    <div class="bedrooms">
                      <span><?php print $node->field_real_bedrooms['und'][0]['value']; ?></span>
                    </div>
                    <div class="property-price">
                      <span>
                        <span class="amount">
							<?php if($node->field_real_currency_display['und'][0]['value'] == "before") print $node->field_real_currency['und'][0]['value']; ?>
                            <?php print number_format($node->field_real_price['und'][0]['value']); ?>
                            <?php if($node->field_real_currency_display['und'][0]['value'] == "after") print $node->field_real_currency['und'][0]['value']; ?>
                        </span>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="slide-caption-action"><a href="<?php print drupal_get_path_alias("node/$node->nid"); ?>"><?php print t('More Detail'); ?></a>
                </div>
              </div>
            </li>
    <?php
		endfor;
	?>
  </ul>
  <div class="clearfix"></div>
  <div id="noo-slider-1-pagination" class="slider-indicators indicators-center-bottom"></div>
  <a id="noo-slider-1-prev" class="slider-control prev-btn" role="button" href="#">
    <span class="slider-icon-prev"></span>
  </a>
  <a id="noo-slider-1-next" class="slider-control next-btn" role="button" href="#">
    <span class="slider-icon-next"></span>
  </a>
</div>