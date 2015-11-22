<?php $cols = 12/count($row->field_field_pricing_item); ?>
<?php for($i=0; $i < count($row->field_field_pricing_item); $i++) : ?>
  <div id="noo-pricing-column-<?php print $i; ?>" class="noo-pricing-column <?php if($row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_highlight']['#items'][0]['value']) print "featured"; ?> col-xs-6 col-md-3">
    <div class="pricing-content">
      <div class="pricing-header">
          <h2 class="pricing-title"><?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_title']['#items'][0]['value'] ?></h2>
          <h3 class="pricing-value">
              <span class="noo-price"><?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_price']['#items'][0]['value'] ?></span> /<?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_unit']['#items'][0]['value'] ?>
          </h3>
      </div>
      <div class="pricing-info">
        <ul class="noo-ul-icon fa-ul">
          <?php foreach($row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_features']['#items'] as $key => $value) : ?>
            <li class="noo-li-icon"><i></i>
              <p><?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_features']['#items'][$key]['value']; ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="pricing-footer">
        <a href="<?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_link']['#items'][0]['value'] ?>" class="btn btn-lg btn-primary" role="button"><?php print $row->field_field_pricing_item[$i]['rendered']['entity']['field_collection_item'][$row->field_field_pricing_item[$i]['raw']['value']]['field_pricing_item_label']['#items'][0]['value'] ?></a>
      </div>
    </div>
   
  </div>
<?php endfor; ?>