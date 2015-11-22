<li>
  <article class="hentry has-featured">
    <div class="property-featured">
      <a class="content-thumb" href="<?php print $fields['path']->content; ?>">
        <img src="<?php print image_style_url('home_featured_properties', $fields['field_real_thumbnail']->content); ?>" class="attachment-property-image" alt="" /> </a>
      <span class="property-category"><?php print $fields['field_real_type']->content; ?></span>
    </div>
    <div class="property-wrap">
      <h2 class="property-title"><a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><?php print $fields['title']->content; ?></a></h2>
      <div class="property-excerpt">
        <p><?php print strip_tags($fields['body']->content); ?></p>
      </div>
      <div class="property-summary">
        <div class="property-detail">
          <div class="size"><span><?php print $fields['field_real_area']->content; ?> <?php print t('sqft'); ?></span>
          </div>
          <div class="bathrooms"><span><?php print $fields['field_real_bathrooms']->content; ?></span>
          </div>
          <div class="bedrooms"><span><?php print $fields['field_real_bedrooms']->content; ?></span>
          </div>
        </div>
        <div class="property-info">
          <div class="property-price">
            <span>
            	<span class="amount">
                	<?php if($fields['field_real_currency_display']->content == "before") print $fields['field_real_currency']->content; ?>
					<?php print $fields['field_real_price']->content; ?>
                    <?php if($fields['field_real_currency_display']->content == "after") print $fields['field_real_currency']->content; ?>
                </span>
            </span>
          </div>
          <div class="property-action">
            <a href="<?php print $fields['path']->content; ?>"><?php print t('More Details'); ?> <i class="fa fa-arrow-circle-o-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </article>
</li>