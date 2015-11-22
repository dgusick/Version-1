<?php

/**
 * Make sub-location denpend on location field
 */
function noo_citilights_location_ajax_handler(&$form, &$form_state) {
  $field_real_location = &$form['field_real_location'][LANGUAGE_NONE];
  $field_real_sub_location = &$form['field_real_sub_location'][LANGUAGE_NONE];
  
  $field_real_location['#options'] = noo_citilights_get_locations();
  $field_real_location['#ajax'] = array(
    'callback' => 'noo_citilights_sublocation_refresh',
    'wrapper' => 'wrapper-sub-location',
  );

  $field_real_sub_location['#prefix'] = '<div id="wrapper-sub-location">';
  $field_real_sub_location['#suffix'] = '</div>';
  
  $field_real_sub_location['#options'] = array();
  // Looking for location id.
  if (isset($form_state['triggering_element']['#field_name']) && 'field_real_location' == $form_state['triggering_element']['#field_name']) {
    if (isset($form_state['values']['field_real_location'][LANGUAGE_NONE][0]['tid'])) {
      $location_tid = $form_state['values']['field_real_location'][LANGUAGE_NONE][0]['tid'];
      $field_real_sub_location['#options'] = noo_citilights_find_sublocation($location_tid);
    }
  }
  elseif (isset($field_real_location['#default_value']) && !empty ($field_real_location['#default_value'])) {
    $location_tid = $field_real_location['#default_value'][0];
    $field_real_sub_location['#options'] = noo_citilights_find_sublocation($location_tid);
  }
  
}

function noo_citilights_sublocation_refresh(&$form, &$form_state) {
  return $form['field_real_sub_location'][LANGUAGE_NONE];
}

/**
 * Get all taxonomy term below of a taxonomy term
 */
function noo_citilights_find_sublocation($location_tid) {
  $result = array();
  $locations = noo_citilights_get_depth_locations();
  foreach ($locations as $location) {
    if ($location->depth == 1 && in_array($location_tid, $location->parents)) {
      $result[$location->tid] = $location->name;
    }
  }
  return $result;
}

/**
 * Get all taxonomy term of property_location
 */
function noo_citilights_get_depth_locations() {
  $machine_name = 'property_location';
  $v = taxonomy_vocabulary_machine_name_load($machine_name);
  
  $locations = taxonomy_get_tree($v->vid, 0, 2);
  return $locations;
}

/**
 * Get all taxonomy term with depth = 0
 */
function noo_citilights_get_locations() {
  $result = array();
  
  $locations = noo_citilights_get_depth_locations();
  foreach ($locations as $location) {
    if ($location->depth == 0) {
      $result[$location->tid] = $location->name;
    }
  }
  return $result;
}
