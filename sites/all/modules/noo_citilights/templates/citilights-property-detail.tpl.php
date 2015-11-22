<?php $obj = node_load(arg(1)); ?>
<div class="property-detail">
  <h4 class="property-detail-title"><?php print t('Property Detail'); ?></h4>
  <div class="property-detail-content">
    <div class="detail-field row">
      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Type'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_type['und'])) : ?>
			<a href="<?php print base_path()."taxonomy/term/".$obj->field_real_type['und'][0]['tid']; ?>"><?php print $obj->field_real_type['und'][0]['taxonomy_term']->name; ?></a>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Status'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_status['und'])) : ?>
			<a href="<?php print base_path()."taxonomy/term/".$obj->field_real_status['und'][0]['tid']; ?>"><?php print $obj->field_real_status['und'][0]['taxonomy_term']->name; ?></a>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Location'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
        <?php if(isset($obj->field_real_location['und'])) : ?>
			<a href="<?php print base_path()."taxonomy/term/".$obj->field_real_location['und'][0]['tid']; ?>"><?php print $obj->field_real_location['und'][0]['taxonomy_term']->name; ?></a>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Price'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
        <span class="amount">
            <?php if($obj->field_real_currency_display['und'][0]['value'] == "before") print $obj->field_real_currency['und'][0]['value']; ?>
            <?php if(isset($obj->field_real_price['und'])) : ?>
                <?php print number_format($obj->field_real_price['und'][0]['value']); ?>
            <?php endif; ?>
            <?php if($obj->field_real_currency_display['und'][0]['value'] == "after") print $obj->field_real_currency['und'][0]['value']; ?>
        </span> /
		<?php if(isset($obj->field_real_price_label['und'])) : ?>
			<?php print $obj->field_real_price_label['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Area'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_area['und'])) : ?>
			<?php print number_format($obj->field_real_area['und'][0]['value']); ?> <?php print t('sqft'); ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Bedrooms'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_bedrooms['und'])) : ?>
			<?php print $obj->field_real_bedrooms['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Bathrooms'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_bathrooms['und'])) : ?>
			<?php print $obj->field_real_bathrooms['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Lot Area'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_lot_area['und'])) : ?>
			<?php print number_format($obj->field_real_lot_area['und'][0]['value']); ?> <?php print t('sqft'); ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Year Built'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_year_built['und'])) : ?>
			<?php print $obj->field_real_year_built['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Flooring'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_flooring['und'])) : ?>
			<?php print $obj->field_real_flooring['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Roofling'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_roofling['und'])) : ?>
			<?php print $obj->field_real_roofling['und'][0]['value']; ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Parking'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
      	<?php if(isset($obj->field_real_slot['und'])) : ?>
			<?php print $obj->field_real_slot['und'][0]['value']; ?> <?php print t('slots'); ?>
        <?php endif; ?>
      </span>

      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Style'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_style['und'])) : ?>
			<?php print $obj->field_real_style['und'][0]['value']; ?>
        <?php endif; ?>
      </span>
      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Garage Size'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_garage_size['und'])) : ?>
			<?php print $obj->field_real_garage_size['und'][0]['value']; ?>
        <?php endif; ?>
      </span>
      <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Address'); ?></span>
      <span class="col-xs-6 col-md-7 detail-field-value">
	  	<?php if(isset($obj->field_real_address['und'])) : ?>
			<?php print $obj->field_real_address['und'][0]['value']; ?>
        <?php endif; ?>
      </span>
    </div>
  </div>
</div>