<article class="hentry">
  <div class="property-featured">
    <?php if($fields['field_real_properties_featured']->content) : ?><span class="featured"><i class="fa fa-star"></i></span><?php endif; ?>
    <a class="content-thumb" href="<?php print $fields['path']->content; ?>">
      <img src="<?php print image_style_url('home_recent_properties', $fields['field_real_thumbnail']->content); ?>" alt="">
    </a>
    <?php if(isset($fields['field_real_label']->content)) : ?><span class="property-label"><?php print $fields['field_real_label']->content; ?></span><?php endif; ?>
    <span class="property-category"><?php print $fields['field_real_type']->content; ?></span>
  </div>
  <div class="property-wrap">
    <h2 class="property-title">
      <a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><?php print $fields['title']->content; ?></a>
    </h2>
    <div class="property-excerpt">
      <p><?php print strip_tags($fields['body']->content); ?></p>
      <p class="property-fullwidth-excerpt"><?php print strip_tags($fields['body']->content); ?></p>
    </div>
    <div class="property-summary">
      <div class="property-info property-fullwidth-info">
        <div class="property-price">
          <span>
          	<span class="amount">
				<?php if($fields['field_real_currency_display']->content == "before") print $fields['field_real_currency']->content; ?>
                <?php print $fields['field_real_price']->content; ?>
                <?php if($fields['field_real_currency_display']->content == "after") print $fields['field_real_currency']->content; ?>
            </span>
          </span>
        </div>
        <div class="size"><span><?php print $fields['field_real_area']->content; ?> <?php print t('sqft'); ?></span></div>
        <div class="bathrooms"><span><?php print $fields['field_real_bathrooms']->content; ?></span></div>
        <div class="bedrooms"><span><?php print $fields['field_real_bedrooms']->content; ?></span></div>
      </div>
    </div>
  </div>
  <div class="property-action property-fullwidth-action">
    <a href="<?php print $fields['path']->content; ?>"><?php print t('More Details'); ?></a>
  </div>
</article>