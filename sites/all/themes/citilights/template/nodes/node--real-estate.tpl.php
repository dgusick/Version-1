<!-- START ARTICLE PROPERTY -->
<article class="property">
  <?php if($content['field_real_display']['#items'][0]['value'] == "style-1") : ?>
      <h1 class="property-title">
        <?php print $title; ?>
      </h1>
    
      <ul class="social-list property-share clearfix">
        <li><a href="http://www.facebook.com/sharer.php?u=<?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>&t=<?php print $title; ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com/home?status=<?php print $title; ?> <?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>/&amp;title=<?php print $title; ?>" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
      </ul>
  <?php endif; ?>

  <div class="property-featured clearfix">
    <div class="images">
      <div class="caroufredsel-wrap">
      	<?php if(isset($content['field_real_gallery']['#items']) && is_array($content['field_real_gallery']['#items'])): ?>
	        <ul>
	          <?php foreach ($content['field_real_gallery']['#items'] as $item): ?>
	            <?php if ($item['type'] == 'image'): ?>
	              <li><a href="<?php print file_create_url($item['uri']); ?>"><img src="<?php print file_create_url($item['uri']); ?>" alt="" /></a></li>
	            <?php endif; ?>
	          <?php endforeach; ?>
	        </ul>
        <?php endif;?>
      </div>
    </div>
    <div class="thumbnails">
      <div class="thumbnails-wrap">
      	<?php if(isset($content['field_real_gallery']['#items']) && is_array($content['field_real_gallery']['#items'])): ?>
      		<ul>
	          <?php foreach ($content['field_real_gallery']['#items'] as $item): ?>
	            <?php if ($item['type'] == 'image'): ?>
	              <li><a href="#"><img src="<?php print file_create_url($item['uri']); ?>" alt="" /></a></li>
	            <?php endif; ?>
	          <?php endforeach; ?>
	        </ul>
  		<?php endif;?>
      </div>
      <a class="caroufredsel-prev" href="#"></a>
      <a class="caroufredsel-next" href="#"></a>
    </div>
  </div>

  <div class="property-summary">
    <div class="row">
      <?php if($content['field_real_display']['#items'][0]['value'] == "style-1") : ?>
          <div class="col-md-4">
            <div class="property-detail">
              <h4 class="property-detail-title"><?php print t('Property Detail'); ?></h4>
              <div class="property-detail-content">
                <div class="detail-field row">
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Type'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_type']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Status'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_status']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Location'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_location']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Price'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value">
                    <span class="amount">
                        <?php if($content['field_real_currency_display']['#items'][0]['value'] == "before") print render($content['field_real_currency']); ?>
                        <?php print render($content['field_real_price']); ?>
                        <?php if($content['field_real_currency_display']['#items'][0]['value'] == "after") print render($content['field_real_currency']); ?>
                    </span> /<?php print render($content['field_real_price_label']); ?>
                  </span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Area'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_area']); ?> <?php print t('sqft'); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Bedrooms'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_bedrooms']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Bathrooms'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_bathrooms']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Lot Area'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_lot_area']); ?> <?php print t('sqft'); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Year Built'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_year_built']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Flooring'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_flooring']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Roofling'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_roofling']); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Parking'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_slot']); ?> <?php print t('slots'); ?></span>
    
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Style'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_style']); ?></span>
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Garage Size'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_garage_size']); ?></span>
                  <span class="col-xs-6 col-md-5 detail-field-label"><?php print t('Address'); ?></span>
                  <span class="col-xs-6 col-md-7 detail-field-value"><?php print render($content['field_real_address']); ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="property-desc">
              <h4 class="property-detail-title"><?php print t('Property Description'); ?></h4>
              <p><?php print render($content['body']); ?></p>
            </div>
          </div>
       <?php elseif($content['field_real_display']['#items'][0]['value'] == "style-2") : ?>
          <div class="col-md-12">
            <div class="property-desc">
              <h4 class="property-detail-title"><?php print t('Property Description'); ?></h4>
              <p><?php print render($content['body']); ?></p>
            </div>
          </div>
	   <?php endif; ?>
    </div>
  </div>

  <div class="property-feature">

    <?php
    $features = FALSE;
    if (!empty($node->field_real_features)) {
      $feature = entity_metadata_wrapper('node', $node)->field_real_features->value();
    }
    ?>
    <h4 class="property-feature-title"><?php print t('Property Features'); ?></h4>
    <div class="property-feature-content clearfix">
      <div class="<?php print citilights_check_feature($feature, 'field_real_features_attic'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_attic'); ?>"></i> <?php print t('attic'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_heat'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_heat'); ?>"></i> <?php print t('gas heat'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_balcony'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_balcony'); ?>"></i> <?php print t('balcony'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_wine'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_wine'); ?>"></i> <?php print t('wine cellar'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_bb_court'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_bb_court'); ?>"></i> <?php print t('basketball court'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_trash'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_trash'); ?>"></i> <?php print t('trash compactors'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_gym'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_gym'); ?>"></i> <?php print t('gym'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_fireplace'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_fireplace'); ?>"></i> <?php print t('fireplace'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_pool'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_pool'); ?>"></i> <?php print t('pool'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_lake'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_lake'); ?>"></i> <?php print t('lake view'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_sheat'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_sheat'); ?>"></i> <?php print t('solar Heat'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_windows'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_windows'); ?>"></i> <?php print t('storm Windows'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_shower'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_shower'); ?>"></i> <?php print t('separate Shower'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_wet_bar'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_wet_bar'); ?>"></i> <?php print t('wet bar'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_remodeled'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_remodeled'); ?>"></i> <?php print t('remodeled'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_skylights'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_skylights'); ?>"></i> <?php print t('skylights'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_stone'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_stone'); ?>"></i> <?php print t('stone Surfaces'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_kitchen'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_kitchen'); ?>"></i> <?php print t('open entertaining Kitchen'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_golf'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_golf'); ?>"></i> <?php print t('golf course'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_club'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_club'); ?>"></i> <?php print t('health club'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_backyard'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_backyard'); ?>"></i> <?php print t('backyard'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_pet'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_pet'); ?>"></i> <?php print t('pet allowed'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_office'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_office'); ?>"></i> <?php print t('office/den'); ?></div>

      <div class="<?php print citilights_check_feature($feature, 'field_real_features_laundry'); ?>">
        <i class="fa <?php print citilights_check_feature_icon($feature, 'field_real_features_laundry'); ?>"></i> <?php print t('laundry'); ?></div>

    </div>
  </div>

  <div class="property-video">
    <h4 class="property-video-title"><?php print t('Property Video'); ?></h4>
    <div class="property-video-content">
      <?php if(isset($node->field_real_video['und'])) : ?>
		  <?php if($node->field_real_video['und'][0]['file']->type == 'video') : ?>
            <?php $uri = explode('v/',$node->field_real_video['und'][0]['file']->uri); ?>
            <div class="video-inner">
                <?php if($node->field_real_video['und'][0]['file']->filemime == 'video/vimeo') : ?>
                    <iframe src="http://player.vimeo.com/video/<?php print $uri[1]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" ></iframe>
                <?php else : ?>
                    <iframe src="http://www.youtube.com/embed/<?php print $uri[1]; ?>?feature=oembed" ></iframe>
                <?php endif; ?>
            </div>
          <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>

  <?php if(isset($node->field_real_map['und'])) : ?>
      <div class="property-map">
        <h4 class="property-map-title"><?php print t('Find this property on map'); ?></h4>
        <div class="property-map-content">
          <div class="property-map-search">
            <input placeholder="Search your map" type="text" autocomplete="off" id="property_map_search_input">
          </div>
          <div id="property-map-7292" class="property-map-box" data-latitude="<?php print render($content['field_real_map'][0]['entity']['field_collection_item'][$node->field_real_map['und'][0]['value']]['field_real_map_latitude']['#items'][0]['value']); ?>" data-longitude="<?php print render($content['field_real_map'][0]['entity']['field_collection_item'][$node->field_real_map['und'][0]['value']]['field_real_map_longitude']['#items'][0]['value']); ?>"></div>
        </div>
      </div>
  <?php endif; ?>
</article>
<!-- END ARTICLE PROPERTY -->
<?php if($content['field_real_display']['#items'][0]['value'] == "style-1") : ?>
	<?php $agent = profile2_load_by_user(user_load($node->uid), 'agent'); ?>
    <?php if ($agent): ?>
      <!-- START AGENT PROPERTY -->
      <div class="agent-property">
        <div class="agent-property-title">
          <h3><?php print t('Contact Agent'); ?></h3>
        </div>
        <div class="agents grid clearfix">
          <article class="hentry">
            <div class="agent-featured">
              <a class="content-thumb" href="<?php print url('user/' . $agent->uid); ?>">
                <img src="<?php print image_style_url('agent_avatar', $agent->field_agent_thumbnail['und'][0]['uri']); ?>" class="attachment-agent-thumb" alt="">
              </a>
            </div>
            <div class="agent-wrap">
              <div class="agent-summary">
                <div class="agent-info">
    
                  <div>
                    <i class="fa fa-phone"></i>
                    &nbsp;
                    <?php if(isset($agent->field_agent_phone['und'])) print $agent->field_agent_phone['und'][0]['value']; ?>
                  </div>
                  <div>
                    <i class="fa fa-tablet"></i>
                    &nbsp;
                    <?php if(isset($agent->field_agent_mobile['und'])) print $agent->field_agent_mobile['und'][0]['value']; ?>
                  </div>
                  <div>
                    <i class="fa fa-envelope-square"></i>
                    &nbsp;
                    <?php if(isset($agent->field_agent_email['und'])) print $agent->field_agent_email['und'][0]['email']; ?>
                  </div>
                  <div>
                    <i class="fa fa-skype"></i>
                    &nbsp;
                    <?php if(isset($agent->field_agent_skype['und'])) print $agent->field_agent_skype['und'][0]['value']; ?></div>
                </div>
                <div class="agent-desc">
                  <ul class="social-list agent-social clearfix">
                    <li><a href="<?php print $agent->field_agent_facebook_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="<?php print $agent->field_agent_twitter_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="<?php print $agent->field_agent_google_plus_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="<?php print $agent->field_agent_linkedin_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="<?php print $agent->field_agent_pinterest_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                  </ul>
                  <div class="agent-action">
                    <?php if(isset($agent->field_agent_name['und'])) print l($agent->field_agent_name['und'][0]['value'], 'user/' . $agent->uid); ?>
                  </div>
                </div>
    
              </div>
            </div>
          </article>
          <div class="conact-agent">
            <?php
            $block = module_invoke('webform', 'block_view', 'client-block-49');
            print render($block['content']);
            ?>
          </div>
        </div>
      </div>
      <!-- START AGENT PROPERTY -->
    <?php endif; ?>
<?php endif;?>

<!-- START SIMILAR PROPERTY -->
<div class="similar-property">
  <div class="similar-property-title">
    <h3><?php print t('Similar Properties'); ?></h3>
  </div>
  <div class="similar-property-content">
    <div class="properties grid clearfix">
      <?php print views_embed_view('real_estate', 'similar'); ?>
    </div>
  </div>
</div>	
<!-- END SIMILAR PROPERTY -->