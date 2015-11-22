<?php
	$term = taxonomy_term_load($row->field_field_real_type[0]['raw']['tid']);
	$markerPath = "";
	if($term->field_property_type_marker['und'][0]['uri']) :
		$markerPath = file_create_url($term->field_property_type_marker['und'][0]['uri']);
	else :
		$markerPath = base_path().path_to_theme().'/images/icon/spotlight-poi.png';
	endif;
?>
<?php
$price = "";
if($fields['field_real_currency_display']->content == "before") : 
	$price = $fields['field_real_currency']->content . $fields['field_real_price_1']->content;
else :
	$price = $fields['field_real_price_1']->content . $fields['field_real_currency']->content;
endif;

print '{
    "latitude": "'.$row->field_field_real_map[0]['rendered']['entity']['field_collection_item'][$row->field_field_real_map[0]['raw']['value']]['field_real_map_latitude']['#items'][0]['value'].'",
    "longitude": "'.$row->field_field_real_map[0]['rendered']['entity']['field_collection_item'][$row->field_field_real_map[0]['raw']['value']]['field_real_map_longitude']['#items'][0]['value'].'",
    "image": "<img src=\''.image_style_url('properties_map_thumbnail', $fields['field_real_thumbnail']->content).'\' class=\'attachment-property-infobox\' alt=\'\' />",
    "title": "'.$fields['title']->content.'",
    "area": "'.$fields['field_real_area']->content.' sqft",
    "bedrooms": '.$fields['field_real_bedrooms']->content.',
    "bathrooms": '.$fields['field_real_bathrooms']->content.',
    "price": "'.$fields['field_real_price']->content.'",
    "price_html": "<span class=\'amount\'>'.$price.'</span> ",
    "url": "'.$fields['path']->content.'",
    "icon": "'.$markerPath.'"
  },';
?>