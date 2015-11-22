<?php

require_once drupal_get_path('module', 'profile2_page') . '/profile2_page.inc';
/**
 * Implements hook_menu().
 */
function noo_citilights_menu() {
  $items['my-profile'] = array(
    'title' => 'My pprofile',
    'page callback' => 'noo_citilights_my_profile',
    'access callback' => 'noo_citilights_my_profile_access',
    'type' => MENU_CALLBACK,
  );
  $items['submit-proprety'] = array(
    'title' => 'Submit proprety',
    'page callback' => 'node_add',
    'page arguments' => array('real_estate'),
    'access callback' => 'node_access',
    'access arguments' => array('create', 'real_estate'),
    'file' => 'node.pages.inc',
    'file path' => drupal_get_path('module', 'node')
  );
  return $items;
}

function noo_citilights_form_real_estate_node_form_alter(&$form, $form_state, $form_id) {
  foreach (element_children($form) as $name) {
    if (in_array($form[$name]['#type'], array('fieldset', 'value', 'vertical_tabs', 'hidden'))) {
      continue;
    }
    
    if ($form[$name]['#type'] == 'container') {
      if (isset($form[$name]['und'][0]['value'])) {
        $form[$name]['und'][0]['value']['#attributes']['class'] = array();
        $form[$name]['und'][0]['value']['#attributes']['class'][] = 'form-control';
      }
      
      if (isset($form[$name]['und']['#type']) && $form[$name]['und']['#type'] == 'select') {
        $form[$name]['und']['#field_prefix']= '<div class="dropdown label-select">';
        $form[$name]['und']['#field_suffix']= '</div>';
        $form[$name]['und']['#attributes']['class'][] = 'form-control';
      }
      continue;
    }
    $form[$name]['#attributes']['class'][] = 'form-control';
  }
  
  $features = &$form['field_real_features']['und'][0];
  foreach (element_children($features) as $name) {
    if ($features[$name]['#type'] == 'container') {
      $features[$name]['und']['#prefix'] = '<div class="col-md-6">';
      $features[$name]['und']['#suffix'] = '</div>';
    }
  }
  $form['body']['#after_build'][] = 'noo_citilights_node_real_estate_hide_format';
  $form['field_real_map']['und'][0]['field_real_map_latitude']['und'][0]['value']['#attributes']['class'][] = 'form-control';
  $form['field_real_map']['und'][0]['field_real_map_longitude']['und'][0]['value']['#attributes']['class'][] = 'form-control';
  $form['#attributes']['class'][] = 'noo-form property-form';
  
  $form['actions']['submit']['#attributes']['class'][] = 'btn btn-lg rounded metro btn-primary';
  $form['actions']['submit']['#value'] = t('Submit Property');
  $form['actions']['preview']['#access'] = FALSE;
  $form['actions']['delete']['#access'] = FALSE;
  $form['actions']['#attributes']['class'] = array();
  
  noo_citilights_location_ajax_handler($form, $form_state);
}

function noo_citilights_node_real_estate_hide_format(&$form) {
  $form[LANGUAGE_NONE][0]['format']['guidelines']['#access'] = FALSE;
  $form[LANGUAGE_NONE][0]['format']['help']['#access'] = FALSE;
  $form[LANGUAGE_NONE][0]['format']['format']['#field_prefix']= '<div class="dropdown label-select">';
  $form[LANGUAGE_NONE][0]['format']['format']['#field_suffix']= '</div>';
  return $form;
}
    

function noo_citilights_my_profile_access() {
  if (user_is_anonymous()) {
    drupal_goto('user/login');
  }
  global $user;
  $role = user_role_load_by_name('Agent');
  return in_array($role->rid, array_keys($user->roles));
}


function noo_citilights_my_profile() {
  global $user;
  $agent = profile2_load_by_user($user, 'agent');
  if (!$agent) {
    $agent = profile2_create(array(
      'type' => 'agent', 
      'uid' => $user->uid)
    )->save();
  }
  module_load_include('inc', 'profile2_page', 'profile2_page');
  return entity_ui_get_form('profile2', $agent);
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function noo_citilights_form_profile2_edit_agent_form_alter(&$form, &$form_state, $form_id) {
  foreach ($form['profile_agent'] as $name => $field) {
    if (is_array($field) && isset($form['profile_agent'][$name]['und'][0]['value'])) {
      $form['profile_agent'][$name]['und'][0]['value']['#attributes']['class'][] = 'form-control';
      continue;
    }
    if (is_array($field) && isset($form['profile_agent'][$name]['und'][0]['email'])) {
      $form['profile_agent'][$name]['und'][0]['email']['#attributes']['class'][] = 'form-control';
    }
  }
  $form['actions']['submit']['#attributes']['class'][] = 'btn btn-primary btn-lg';
}

function noo_citilights_change_password_form($form, &$form_state) {
  
  form_load_include($form_state, 'inc', 'user', 'user.pages');
  global $user;
  $form_state['user'] = $form['#user'] = $user;
  $form['#user_category'] = 'account';
  user_account_form($form, $form_state);
  $fields = array(
    'pass',
    'current_pass',
  );

  $form['account']['current_pass']['#title'] = t('Old Password');
  foreach ($form['account'] as $name => &$field) {
    if (!in_array($name, $fields) && is_array($field)) {
      $field['#access'] = FALSE;
    } elseif (is_array($field)) {
      $field['#attributes']['class'][] = 'form-control';
    }
  }
  foreach ($form as $name => &$field) {
    if (!in_array($name, array('account', 'actions', '#validate')) && is_array($field)) {
      $field['#access'] = FALSE;
    }
  }
  $form['account']['pass']['#process'] = array(
    'form_process_password_confirm', 
    'user_form_process_password_confirm', 
    'noo_citilights_password_confirm_process'
  );
  
  // Actions
  $form['actions'] = array('#type' => 'actions');
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Change password'),
    '#attributes' => array('class' => array('btn btn-primary btn-lg'))
  );
  $form['#validate'][] = 'user_profile_form_validate';
  // Add the final user profile form submit handler.
  $form['#submit'][] = 'user_profile_form_submit';
  
  return $form;
}

function noo_citilights_password_confirm_process($element) {
  $element['pass1']['#attributes']['class'][] = 'form-control';
  $element['pass2']['#attributes']['class'][] = 'form-control';
  return $element;
}