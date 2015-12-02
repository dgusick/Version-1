<?php 
// 
function edivvy_preprocess_html(&$vars) {
    global $user; 
  $path = drupal_get_path_alias();
  $aliases = explode('/', $path);
  if($aliases[0] == 'user' && !$user->uid ) { 
       $vars['classes_array'][] = 'gray-bg'; 
  }
}

function edivvy_theme() {
  $items = array();
    
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'edivvy') . '', ///templates 
    'template' => 'user-login',
    'preprocess functions' => array(
       'edivvy_preprocess_user_login'
    ),
  );
  
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'edivvy') . '',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'edivvy_preprocess_user_register_form'
    ),
  );
  $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'edivvy') . '',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'edivvy_preprocess_user_pass'
    ),
  );
  return $items;
}
function edivvy_form_user_register_form_alter(&$form, &$form_state, $form_id) {
    $form['account']['pass']['#type'] = 'password';
    $form['account']['pass']['#title'] = 'Password';
}

function edivvy_preprocess_user_login(&$vars) {
  $vars['intro_text'] = t('');
}

function edivvy_preprocess_user_register_form(&$vars) {
  $vars['intro_text'] = t('');
}

function edivvy_preprocess_user_pass(&$vars) {
  $vars['intro_text'] = t('');
}

