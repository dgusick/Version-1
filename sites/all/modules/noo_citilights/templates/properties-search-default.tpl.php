<!-- START GSEARCH WRAP -->
<div class="gsearch-wrap">
  <div class="gsearchform">
    <div class="gsearch-content">
      <div class="gsearch-field">
        <div class="form-group glocation">
          <div class="label-select">
            <?php print render($form['glocation']); ?>
          </div>
        </div>

        <div class="form-group gsub-location">
          <div class="label-select">
            <?php print render($form['gsub-location']); ?>
          </div>
        </div>

        <div class="form-group gstatus">
          <div class="label-select">
            <?php print render($form['gstatus']); ?>
          </div>
        </div>

        <div class="form-group gtype">
          <div class="label-select">
            <?php print render($form['gtype']); ?>
          </div>
        </div>

        <div class="form-group gbed">
          <div class="label-select">
            <?php print render($form['gbed']); ?>
          </div>
        </div>

        <div class="form-group gbath">
          <div class="label-select">
            <?php print render($form['gbath']); ?>
          </div>
        </div>

        <div class="form-group gprice">
          <span class="gprice-label"><?php print t('Price'); ?></span>
          <div class="gslider-range gprice-slider-range"></div>
          <span class="gslider-range-value gprice-slider-range-value-min"></span>
          <span class="gslider-range-value gprice-slider-range-value-max"></span>
          <div class="gprice-input js-hide">
            <?php print render($form['gprice-min']); ?>
            <?php print render($form['gprice-max']); ?>
          </div>
        </div>

        <div class="form-group garea">
          <span class="garea-label"><?php print t('Area'); ?></span>
          <div class="gslider-range garea-slider-range"></div>
          <span class="gslider-range-value garea-slider-range-value-min"></span>
          <span class="gslider-range-value garea-slider-range-value-max"></span>
          <div class="garea-input js-hide">
            <?php print render($form['garea-min']); ?>
            <?php print render($form['garea-max']); ?>
          </div>
        </div>
      </div>

      <div class="gsearch-action">
        <div class="gsubmit">
          <a class="btn btn-deault gsubmit-button-action" href="javascript:void(0)"><?php print t('Search Property'); ?></a>
          <div class="js-hide gsubmit-button"><?php print render($form['actions']); ?></div>
        </div>
      </div>
    </div>
    <?php print drupal_render_children($form); ?> 
  </div>
</div>
<!-- END GSEARCH WRAP -->

<?php 

$form['filter'] = array(
      '#type' => 'fieldset',
      '#title' => 'Filter settings',
      '#collapsible' => FALSE,
      '#tree' => TRUE,
      '#weight' => 1
    );
    $form['filter']['gprice_min'] = array(
      '#type' => 'textfield',
      '#title' => t('Minimum price'),
      '#default_value' => variable_get('gprice_min', 0),
    );
    $form['filter']['gprice_max'] = array(
      '#type' => 'textfield',
      '#title' => t('Maximum price'),
      '#default_value' => variable_get('gprice_max', 10000),
    );
    $form['filter']['garea_min'] = array(
      '#type' => 'textfield',
      '#title' => t('Minimum area'),
      '#default_value' => variable_get('garea_min', 0),
    );
    $form['filter']['garea_max'] = array(
      '#type' => 'textfield',
      '#title' => t('Maximum area'),
      '#default_value' => variable_get('garea_max', 10000),
    );
    $form['filter']['gbed'] = array(
      '#type' => 'textfield',
      '#title' => t('Min Beds'),
      '#default_value' => variable_get('gbed', '1, 2, 3, 4, 5'),
      '#description' => 'Please enter list of number follow 1, 2, 3, 4, 5'
    );
    $form['filter']['gbath'] = array(
      '#type' => 'textfield',
      '#title' => t('Min Baths'),
      '#default_value' => variable_get('gbath', '1, 2, 3, 4, 5'),
      '#description' => 'Please enter list of number follow 1, 2, 3, 4, 5'
    );