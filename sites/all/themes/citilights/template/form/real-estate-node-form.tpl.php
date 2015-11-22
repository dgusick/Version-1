<div class="noo-control-group">
  <div class="group-title"><?php print t('Property Description &amp; Price'); ?></div>
  <div class="group-container row">
    <div class="col-md-8">
      <div class="form-group s-prop-title">
        <?php print render($form['title']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-area">
        <?php print render($form['field_real_area']); ?>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group s-prop-desc">
        <?php print render($form['body']); ?>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group s-prop-price row">
        <div class="form-group price col-md-4">
          <?php print render($form['field_real_price']); ?>
        </div>
        <div class="form-group price col-md-5">
          <?php print render($form['field_real_currency']); ?>
        </div>
        <div class="price_label col-md-8">
          <?php print render($form['field_real_price_label']); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group price">
	  	<?php print render($form['field_real_currency_display']); ?>
      </div>
      <div class="form-group s-prop-status">
        <?php print render($form['field_real_status']); ?>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group s-prop-type">
        <?php print render($form['field_real_type']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-type">
        <?php print render($form['field_real_label']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-bedrooms">
        <?php print render($form['field_real_bedrooms']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-bathrooms">
        <?php print render($form['field_real_bathrooms']); ?>
      </div>
    </div>
  </div>
</div>

<div class="noo-control-group">
  <div class="group-title"><?php print t('Property Images'); ?></div>
  <div class="group-container row">
    <div class="col-md-12">
      <div id="upload-container">
        <div id="aaiu-upload-thumbnail-container">
          <?php print render($form['field_real_thumbnail']); ?>
        </div>
        <div id="aaiu-upload-gallery-container">
          <?php print render($form['field_real_gallery']); ?>
        </div>
        <div id="aaiu-upload-slider-image-container">
          <?php print render($form['field_real_slider_image']); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="noo-control-group">
  <div class="group-title"><?php print t('Additional Info'); ?></div>
  <div class="group-container row">
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_lot_area">
        <?php print render($form['field_real_lot_area']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_year_built">
        <?php print render($form['field_real_year_built']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_flooring">
        <?php print render($form['field_real_flooring']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_garage_size">
        <?php print render($form['field_real_garage_size']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_roofling">
        <?php print render($form['field_real_roofling']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_parking">
        <?php print render($form['field_real_slot']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-_noo_property_field_style">
        <?php print render($form['field_real_style']); ?>
      </div>
    </div>
  </div>
</div>
<div class="noo-control-group">
  <div class="group-title"><?php print t('Listing Location'); ?></div>
  <div class="group-container row">
    <div class="col-md-8">
      <div class="form-group s-prop-address">
        <?php print render($form['field_real_address']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-location">
        <?php print render($form['field_real_location']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-sub_location">
        <?php print render($form['field_real_sub_location']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-lat">
        <?php print render($form['field_real_map']['und'][0]['field_real_map_latitude']); ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group s-prop-long">
        <?php print render($form['field_real_map']['und'][0]['field_real_map_longitude']); ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-5">
    <div class="noo-control-group small-group">
      <div class="group-title"><?php print t('Featured Submission'); ?></div>
      <div class="group-container row">
        <div class="col-md-12">
          <div class="form-group s-prop-featured">
            <p><?php print t('You can make this listing featured after your property is approved.'); ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="noo-control-group small-group">
      <div class="group-title"><?php print t('Property Video'); ?></div>
      <div class="group-container row">
        <div class="col-md-12">
          <div class="form-group s-prop-video">
            <?php print render($form['field_real_video']); ?>
            <small><?php print t('Enter a Youtube, Vimeo, Soundcloud, etc... URL.'); ?></small>
          </div>
        </div>
      </div>
    </div>
    <div class="noo-control-group small-group">
      <div class="group-title"><?php print t('Property Display'); ?></div>
      <div class="group-container row">
        <div class="col-md-12">
          <div class="form-group s-prop-video">
            <?php print render($form['field_real_display']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="noo-control-group small-group">
      <div class="group-title"><?php print t('Amenities &amp; Features'); ?></div>
      <div class="group-container row">
        <?php print render($form['field_real_features']); ?>
      </div>
      <div class="group-title"><?php print t('Extra'); ?></div>
      <div class="group-container row">
        <?php print render($form['field_real_properties_featured']); ?>
      </div>
    </div>
  </div>
</div>
<div class="noo-submit row">
  <div class="col-md-12">
    <?php print drupal_render_children($form['actions']); ?>
    <br />
    <br />
    <label><?php print t('Your submission will be reviewed by Administrator before it can be published'); ?></label>
  </div>
</div>

<?php print drupal_render_children($form); ?>
