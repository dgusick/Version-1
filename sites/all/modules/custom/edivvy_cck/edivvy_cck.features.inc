<?php
/**
 * @file
 * edivvy_cck.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function edivvy_cck_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function edivvy_cck_node_info() {
  $items = array(
    'evaluation' => array(
      'name' => t('evaluation'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'requirement' => array(
      'name' => t('Requirement'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
