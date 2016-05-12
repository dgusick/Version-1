<?php
/**
 * @file
 * edivvy_cck.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function edivvy_cck_field_group_info() {
  $field_groups = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_soft_skills|node|evaluation|form';
  $field_group->group_name = 'group_soft_skills';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'evaluation';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Personality and Communication Skills',
    'weight' => '6',
    'children' => array(
      0 => 'field_sskill_1_rating',
      1 => 'field_sskill_2_rating',
      2 => 'field_sskill_3_rating',
      3 => 'field_sskill_4_rating',
      4 => 'field_sskill_5_rating',
    ),
    'format_type' => 'div',
    'format_settings' => array(
      'label' => 'Personality and Communication Skills',
      'instance_settings' => array(
        'required_fields' => 1,
        'id' => '',
        'classes' => '',
        'description' => '',
        'show_label' => '1',
        'label_element' => 'h3',
        'effect' => 'none',
        'speed' => 'fast',
      ),
      'formatter' => 'open',
    ),
  );
  $field_groups['group_soft_skills|node|evaluation|form'] = $field_group;

  // Translatables
  // Included for use with string extractors like potx.
  t('Personality and Communication Skills');

  return $field_groups;
}
