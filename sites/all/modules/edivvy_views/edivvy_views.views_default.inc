<?php
/**
 * @file
 * edivvy_views.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function edivvy_views_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'Followers';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Clone of my Followers';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'List of Followers';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No results found.';
  $handler->display->display_options['empty']['area']['format'] = 'full_html';
  /* Relationship: Flags: User's flaggings */
  $handler->display->display_options['relationships']['flag_user_content_rel']['id'] = 'flag_user_content_rel';
  $handler->display->display_options['relationships']['flag_user_content_rel']['table'] = 'users';
  $handler->display->display_options['relationships']['flag_user_content_rel']['field'] = 'flag_user_content_rel';
  $handler->display->display_options['relationships']['flag_user_content_rel']['flag'] = 'follow';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['link_to_user'] = 'user';
  /* Field: Flags: Flag link */
  $handler->display->display_options['fields']['ops']['id'] = 'ops';
  $handler->display->display_options['fields']['ops']['table'] = 'flagging';
  $handler->display->display_options['fields']['ops']['field'] = 'ops';
  $handler->display->display_options['fields']['ops']['relationship'] = 'flag_user_content_rel';
  /* Contextual filter: Flags: Entity ID */
  $handler->display->display_options['arguments']['entity_id']['id'] = 'entity_id';
  $handler->display->display_options['arguments']['entity_id']['table'] = 'flagging';
  $handler->display->display_options['arguments']['entity_id']['field'] = 'entity_id';
  $handler->display->display_options['arguments']['entity_id']['relationship'] = 'flag_user_content_rel';
  $handler->display->display_options['arguments']['entity_id']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['entity_id']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['entity_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['entity_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['entity_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['entity_id']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['entity_id']['validate']['type'] = 'user';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'user/%/my_followers';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Followers';
  $handler->display->display_options['menu']['weight'] = '5';
  $handler->display->display_options['menu']['name'] = 'user-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['Followers'] = $view;

  $view = new view();
  $view->name = 'access_list';
  $view->description = 'Shows someone\'s related users';
  $view->tag = '';
  $view->base_table = 'user_relationships';
  $view->human_name = 'access-list';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Defaults */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->display->display_options['title'] = 'My Candidates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['style_options']['grouping'] = 'plural_name';
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['inline'] = array(
    'name_1' => 'name_1',
  );
  $handler->display->display_options['row_options']['separator'] = ', ';
  /* Relationship: User relationships: Requestee user */
  $handler->display->display_options['relationships']['requestee_id']['id'] = 'requestee_id';
  $handler->display->display_options['relationships']['requestee_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requestee_id']['field'] = 'requestee_id';
  /* Relationship: User relationships: Requester user */
  $handler->display->display_options['relationships']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['relationships']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requester_id']['field'] = 'requester_id';
  /* Relationship: User relationships: RTID */
  $handler->display->display_options['relationships']['rtid']['id'] = 'rtid';
  $handler->display->display_options['relationships']['rtid']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['rtid']['field'] = 'rtid';
  /* Field: User relationship types: Plural name */
  $handler->display->display_options['fields']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['fields']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['relationship'] = 'rtid';
  $handler->display->display_options['fields']['plural_name']['label'] = '';
  $handler->display->display_options['fields']['plural_name']['exclude'] = TRUE;
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'requestee_id';
  $handler->display->display_options['fields']['name']['label'] = '';
  /* Field: User relationships: Updated date */
  $handler->display->display_options['fields']['changed']['id'] = 'changed';
  $handler->display->display_options['fields']['changed']['table'] = 'user_relationships';
  $handler->display->display_options['fields']['changed']['field'] = 'changed';
  $handler->display->display_options['fields']['changed']['label'] = 'Added';
  $handler->display->display_options['fields']['changed']['date_format'] = 'time ago';
  /* Sort criterion: User relationship types: Plural name */
  $handler->display->display_options['sorts']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['sorts']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['relationship'] = 'rtid';
  /* Contextual filter: User relationships: Requester user */
  $handler->display->display_options['arguments']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['arguments']['requester_id']['field'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['default_action'] = 'default';
  $handler->display->display_options['arguments']['requester_id']['exception']['title_enable'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['default_argument_type'] = 'current_user';
  $handler->display->display_options['arguments']['requester_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['requester_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['requester_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['requester_id']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['validate']['type'] = 'numeric';
  /* Filter criterion: User relationships: Relationship status */
  $handler->display->display_options['filters']['approved']['id'] = 'approved';
  $handler->display->display_options['filters']['approved']['table'] = 'user_relationships';
  $handler->display->display_options['filters']['approved']['field'] = 'approved';
  $handler->display->display_options['filters']['approved']['value'] = '1';
  $handler->display->display_options['filters']['approved']['group'] = '0';
  $handler->display->display_options['filters']['approved']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'access-request';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'All Relationships';
  $handler->display->display_options['menu']['weight'] = '0';
  $export['access_list'] = $view;

  $view = new view();
  $view->name = 'access_request';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Access Request';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Access Request';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    6 => '6',
    5 => '5',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '0';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: User Candidate UID */
  $handler->display->display_options['fields']['field_user_candidate_uid']['id'] = 'field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['table'] = 'field_data_field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['field'] = 'field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['exclude'] = TRUE;
  /* Field: User: Approved Recruiter UID */
  $handler->display->display_options['fields']['field_approved_recruiter_uid']['id'] = 'field_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_approved_recruiter_uid']['table'] = 'field_data_field_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_approved_recruiter_uid']['field'] = 'field_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_approved_recruiter_uid']['exclude'] = TRUE;
  /* Field: User: Can Approved Recruiter UID  */
  $handler->display->display_options['fields']['field_can_approved_recruiter_uid']['id'] = 'field_can_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_can_approved_recruiter_uid']['table'] = 'field_data_field_can_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_can_approved_recruiter_uid']['field'] = 'field_can_approved_recruiter_uid';
  $handler->display->display_options['fields']['field_can_approved_recruiter_uid']['exclude'] = TRUE;
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'access-request';
  $export['access_request'] = $view;

  $view = new view();
  $view->name = 'approved_recruiters';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Approved Recruiters';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Approved Recruiters';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'ds';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: User: Uid */
  $handler->display->display_options['arguments']['uid']['id'] = 'uid';
  $handler->display->display_options['arguments']['uid']['table'] = 'users';
  $handler->display->display_options['arguments']['uid']['field'] = 'uid';
  $handler->display->display_options['arguments']['uid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['uid']['default_argument_type'] = 'user';
  $handler->display->display_options['arguments']['uid']['default_argument_options']['user'] = FALSE;
  $handler->display->display_options['arguments']['uid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['uid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['uid']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'user/%/approved';
  $export['approved_recruiters'] = $view;

  $view = new view();
  $view->name = 'candidate_search';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Candidate Search';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Search Candidates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['group_by'] = TRUE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['distinct'] = TRUE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Footer: Global: Result summary */
  $handler->display->display_options['footer']['result']['id'] = 'result';
  $handler->display->display_options['footer']['result']['table'] = 'views';
  $handler->display->display_options['footer']['result']['field'] = 'result';
  /* Relationship: User: Profile */
  $handler->display->display_options['relationships']['profile']['id'] = 'profile';
  $handler->display->display_options['relationships']['profile']['table'] = 'users';
  $handler->display->display_options['relationships']['profile']['field'] = 'profile';
  $handler->display->display_options['relationships']['profile']['bundle_types'] = array(
    'main' => 'main',
  );
  /* Relationship: Field: Skills (field_skills_rating) */
  $handler->display->display_options['relationships']['field_skills_rating_value']['id'] = 'field_skills_rating_value';
  $handler->display->display_options['relationships']['field_skills_rating_value']['table'] = 'field_data_field_skills_rating';
  $handler->display->display_options['relationships']['field_skills_rating_value']['field'] = 'field_skills_rating_value';
  $handler->display->display_options['relationships']['field_skills_rating_value']['relationship'] = 'profile';
  $handler->display->display_options['relationships']['field_skills_rating_value']['delta'] = '-1';
  /* Relationship: Field collection item: Enter Skill (field_skills) */
  $handler->display->display_options['relationships']['field_skills_tid']['id'] = 'field_skills_tid';
  $handler->display->display_options['relationships']['field_skills_tid']['table'] = 'field_data_field_skills';
  $handler->display->display_options['relationships']['field_skills_tid']['field'] = 'field_skills_tid';
  $handler->display->display_options['relationships']['field_skills_tid']['relationship'] = 'field_skills_rating_value';
  /* Relationship: User: Invite */
  $handler->display->display_options['relationships']['invite_invitee']['id'] = 'invite_invitee';
  $handler->display->display_options['relationships']['invite_invitee']['table'] = 'users';
  $handler->display->display_options['relationships']['invite_invitee']['field'] = 'invite_invitee';
  $handler->display->display_options['relationships']['invite_invitee']['bundle_types'] = array(
    'invite_by_email' => 'invite_by_email',
  );
  /* Field: User: Picture */
  $handler->display->display_options['fields']['picture']['id'] = 'picture';
  $handler->display->display_options['fields']['picture']['table'] = 'users';
  $handler->display->display_options['fields']['picture']['field'] = 'picture';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: Broken/missing handler */
  $handler->display->display_options['fields']['field_job_level']['id'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['table'] = 'field_data_field_job_level';
  $handler->display->display_options['fields']['field_job_level']['field'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['label'] = 'Job Level';
  /* Field: User: Role/Department */
  $handler->display->display_options['fields']['field_role_department']['id'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['table'] = 'field_data_field_role_department';
  $handler->display->display_options['fields']['field_role_department']['field'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['type'] = 'taxonomy_term_reference_plain';
  /* Field: User: picture-url */
  $handler->display->display_options['fields']['field_picture_url']['id'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['table'] = 'field_data_field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['field'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_picture_url']['type'] = 'text_plain';
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['exclude'] = TRUE;
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['exclude'] = TRUE;
  /* Field: COUNT(DISTINCT Field collection item: Enter Skill) */
  $handler->display->display_options['fields']['field_skills']['id'] = 'field_skills';
  $handler->display->display_options['fields']['field_skills']['table'] = 'field_data_field_skills';
  $handler->display->display_options['fields']['field_skills']['field'] = 'field_skills';
  $handler->display->display_options['fields']['field_skills']['relationship'] = 'field_skills_rating_value';
  $handler->display->display_options['fields']['field_skills']['group_type'] = 'count_distinct';
  $handler->display->display_options['fields']['field_skills']['label'] = 'Select Skill';
  $handler->display->display_options['fields']['field_skills']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_skills']['separator'] = ', ';
  /* Field: Profile: User uid */
  $handler->display->display_options['fields']['user']['id'] = 'user';
  $handler->display->display_options['fields']['user']['table'] = 'profile';
  $handler->display->display_options['fields']['user']['field'] = 'user';
  $handler->display->display_options['fields']['user']['relationship'] = 'profile';
  $handler->display->display_options['fields']['user']['exclude'] = TRUE;
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Field: User: User Candidate UID */
  $handler->display->display_options['fields']['field_user_candidate_uid']['id'] = 'field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['table'] = 'field_data_field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['field'] = 'field_user_candidate_uid';
  $handler->display->display_options['fields']['field_user_candidate_uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_user_candidate_uid']['type'] = 'text_plain';
  /* Field: Invite: Inviter uid */
  $handler->display->display_options['fields']['inviter']['id'] = 'inviter';
  $handler->display->display_options['fields']['inviter']['table'] = 'invite';
  $handler->display->display_options['fields']['inviter']['field'] = 'inviter';
  $handler->display->display_options['fields']['inviter']['relationship'] = 'invite_invitee';
  $handler->display->display_options['fields']['inviter']['exclude'] = TRUE;
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_job_level_tid']['id'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['table'] = 'field_data_field_job_level';
  $handler->display->display_options['filters']['field_job_level_tid']['field'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_job_level_tid']['value'] = array();
  $handler->display->display_options['filters']['field_job_level_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_job_level_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['operator_id'] = 'field_job_level_tid_op';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['operator'] = 'field_job_level_tid_op';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['identifier'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: Role/Department (field_role_department) */
  $handler->display->display_options['filters']['field_role_department_tid']['id'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['table'] = 'field_data_field_role_department';
  $handler->display->display_options['filters']['field_role_department_tid']['field'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_role_department_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['operator_id'] = 'field_role_department_tid_op';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['operator'] = 'field_role_department_tid_op';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['identifier'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_role_department_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_role_department_tid']['vocabulary'] = 'role_department';
  /* Filter criterion: Field collection item: Enter Skill (field_skills) */
  $handler->display->display_options['filters']['field_skills_tid']['id'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['table'] = 'field_data_field_skills';
  $handler->display->display_options['filters']['field_skills_tid']['field'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['relationship'] = 'field_skills_rating_value';
  $handler->display->display_options['filters']['field_skills_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_skills_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_skills_tid']['expose']['operator_id'] = 'field_skills_tid_op';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['operator'] = 'field_skills_tid_op';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['identifier'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_skills_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_skills_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_skills_tid']['vocabulary'] = 'skills';
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    6 => '6',
  );
  $handler->display->display_options['filters']['rid']['group'] = 1;
  /* Filter criterion: User: Job Title (field_job_title) */
  $handler->display->display_options['filters']['field_job_title_tid']['id'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['table'] = 'field_data_field_job_title';
  $handler->display->display_options['filters']['field_job_title_tid']['field'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_job_title_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['operator_id'] = 'field_job_title_tid_op';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['operator'] = 'field_job_title_tid_op';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['identifier'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_job_title_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_job_title_tid']['vocabulary'] = 'job_title';
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_specialization_tid']['id'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['table'] = 'field_data_field_specialization';
  $handler->display->display_options['filters']['field_specialization_tid']['field'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_specialization_tid']['value'] = array();
  $handler->display->display_options['filters']['field_specialization_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_specialization_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['operator_id'] = 'field_specialization_tid_op';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['operator'] = 'field_specialization_tid_op';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['identifier'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_certification_tid']['id'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['table'] = 'field_data_field_certification';
  $handler->display->display_options['filters']['field_certification_tid']['field'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_certification_tid']['value'] = array();
  $handler->display->display_options['filters']['field_certification_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_certification_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_certification_tid']['expose']['operator_id'] = 'field_certification_tid_op';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['operator'] = 'field_certification_tid_op';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['identifier'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: State (field_expertise) */
  $handler->display->display_options['filters']['field_expertise_tid']['id'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['table'] = 'field_data_field_expertise';
  $handler->display->display_options['filters']['field_expertise_tid']['field'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_expertise_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['operator_id'] = 'field_expertise_tid_op';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['operator'] = 'field_expertise_tid_op';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['identifier'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_expertise_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_expertise_tid']['vocabulary'] = 'expertise';
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_technology_tid']['id'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['table'] = 'field_data_field_technology';
  $handler->display->display_options['filters']['field_technology_tid']['field'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_technology_tid']['value'] = array();
  $handler->display->display_options['filters']['field_technology_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_technology_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_technology_tid']['expose']['operator_id'] = 'field_technology_tid_op';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['operator'] = 'field_technology_tid_op';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['identifier'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: Years of Experience (field_experience) */
  $handler->display->display_options['filters']['field_experience_tid']['id'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['table'] = 'field_data_field_experience';
  $handler->display->display_options['filters']['field_experience_tid']['field'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_experience_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_experience_tid']['expose']['operator_id'] = 'field_experience_tid_op';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['operator'] = 'field_experience_tid_op';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['identifier'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_experience_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_experience_tid']['vocabulary'] = 'experience';

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'candidate-search';
  $export['candidate_search'] = $view;

  $view = new view();
  $view->name = 'candidate_search_top';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Candidate Search Top';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Search Candidates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['group_by'] = TRUE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Relationship: User: Profile */
  $handler->display->display_options['relationships']['profile']['id'] = 'profile';
  $handler->display->display_options['relationships']['profile']['table'] = 'users';
  $handler->display->display_options['relationships']['profile']['field'] = 'profile';
  $handler->display->display_options['relationships']['profile']['bundle_types'] = array(
    'main' => 'main',
  );
  /* Relationship: Field: Skills (field_skills_rating) */
  $handler->display->display_options['relationships']['field_skills_rating_value']['id'] = 'field_skills_rating_value';
  $handler->display->display_options['relationships']['field_skills_rating_value']['table'] = 'field_data_field_skills_rating';
  $handler->display->display_options['relationships']['field_skills_rating_value']['field'] = 'field_skills_rating_value';
  $handler->display->display_options['relationships']['field_skills_rating_value']['relationship'] = 'profile';
  $handler->display->display_options['relationships']['field_skills_rating_value']['delta'] = '-1';
  /* Relationship: Field collection item: Enter Skill (field_skills) */
  $handler->display->display_options['relationships']['field_skills_tid']['id'] = 'field_skills_tid';
  $handler->display->display_options['relationships']['field_skills_tid']['table'] = 'field_data_field_skills';
  $handler->display->display_options['relationships']['field_skills_tid']['field'] = 'field_skills_tid';
  $handler->display->display_options['relationships']['field_skills_tid']['relationship'] = 'field_skills_rating_value';
  /* Field: User: Picture */
  $handler->display->display_options['fields']['picture']['id'] = 'picture';
  $handler->display->display_options['fields']['picture']['table'] = 'users';
  $handler->display->display_options['fields']['picture']['field'] = 'picture';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: Broken/missing handler */
  $handler->display->display_options['fields']['field_job_level']['id'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['table'] = 'field_data_field_job_level';
  $handler->display->display_options['fields']['field_job_level']['field'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['label'] = 'Job Level';
  /* Field: User: Role/Department */
  $handler->display->display_options['fields']['field_role_department']['id'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['table'] = 'field_data_field_role_department';
  $handler->display->display_options['fields']['field_role_department']['field'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['type'] = 'taxonomy_term_reference_plain';
  /* Field: User: picture-url */
  $handler->display->display_options['fields']['field_picture_url']['id'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['table'] = 'field_data_field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['field'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_picture_url']['type'] = 'text_plain';
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['exclude'] = TRUE;
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['exclude'] = TRUE;
  /* Field: Field collection item: Enter Skill */
  $handler->display->display_options['fields']['field_skills']['id'] = 'field_skills';
  $handler->display->display_options['fields']['field_skills']['table'] = 'field_data_field_skills';
  $handler->display->display_options['fields']['field_skills']['field'] = 'field_skills';
  $handler->display->display_options['fields']['field_skills']['relationship'] = 'field_skills_rating_value';
  $handler->display->display_options['fields']['field_skills']['label'] = 'Select Skill';
  $handler->display->display_options['fields']['field_skills']['exclude'] = TRUE;
  /* Field: Profile: User uid */
  $handler->display->display_options['fields']['user']['id'] = 'user';
  $handler->display->display_options['fields']['user']['table'] = 'profile';
  $handler->display->display_options['fields']['user']['field'] = 'user';
  $handler->display->display_options['fields']['user']['relationship'] = 'profile';
  $handler->display->display_options['fields']['user']['exclude'] = TRUE;
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_job_level_tid']['id'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['table'] = 'field_data_field_job_level';
  $handler->display->display_options['filters']['field_job_level_tid']['field'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_job_level_tid']['value'] = array();
  $handler->display->display_options['filters']['field_job_level_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_job_level_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['operator_id'] = 'field_job_level_tid_op';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['operator'] = 'field_job_level_tid_op';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['identifier'] = 'field_job_level_tid';
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_job_level_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: Role/Department (field_role_department) */
  $handler->display->display_options['filters']['field_role_department_tid']['id'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['table'] = 'field_data_field_role_department';
  $handler->display->display_options['filters']['field_role_department_tid']['field'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_role_department_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['operator_id'] = 'field_role_department_tid_op';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['operator'] = 'field_role_department_tid_op';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['identifier'] = 'field_role_department_tid';
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_role_department_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_role_department_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_role_department_tid']['vocabulary'] = 'role_department';
  /* Filter criterion: Field collection item: Enter Skill (field_skills) */
  $handler->display->display_options['filters']['field_skills_tid']['id'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['table'] = 'field_data_field_skills';
  $handler->display->display_options['filters']['field_skills_tid']['field'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['relationship'] = 'field_skills_rating_value';
  $handler->display->display_options['filters']['field_skills_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_skills_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_skills_tid']['expose']['operator_id'] = 'field_skills_tid_op';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['operator'] = 'field_skills_tid_op';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['identifier'] = 'field_skills_tid';
  $handler->display->display_options['filters']['field_skills_tid']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_skills_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_skills_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_skills_tid']['vocabulary'] = 'skills';
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    6 => '6',
  );
  $handler->display->display_options['filters']['rid']['group'] = 1;
  /* Filter criterion: User: Job Title (field_job_title) */
  $handler->display->display_options['filters']['field_job_title_tid']['id'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['table'] = 'field_data_field_job_title';
  $handler->display->display_options['filters']['field_job_title_tid']['field'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_job_title_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['operator_id'] = 'field_job_title_tid_op';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['operator'] = 'field_job_title_tid_op';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['identifier'] = 'field_job_title_tid';
  $handler->display->display_options['filters']['field_job_title_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_job_title_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_job_title_tid']['vocabulary'] = 'job_title';
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_specialization_tid']['id'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['table'] = 'field_data_field_specialization';
  $handler->display->display_options['filters']['field_specialization_tid']['field'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_specialization_tid']['value'] = array();
  $handler->display->display_options['filters']['field_specialization_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_specialization_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['operator_id'] = 'field_specialization_tid_op';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['operator'] = 'field_specialization_tid_op';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['identifier'] = 'field_specialization_tid';
  $handler->display->display_options['filters']['field_specialization_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_certification_tid']['id'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['table'] = 'field_data_field_certification';
  $handler->display->display_options['filters']['field_certification_tid']['field'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_certification_tid']['value'] = array();
  $handler->display->display_options['filters']['field_certification_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_certification_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_certification_tid']['expose']['operator_id'] = 'field_certification_tid_op';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['operator'] = 'field_certification_tid_op';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['identifier'] = 'field_certification_tid';
  $handler->display->display_options['filters']['field_certification_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: State (field_expertise) */
  $handler->display->display_options['filters']['field_expertise_tid']['id'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['table'] = 'field_data_field_expertise';
  $handler->display->display_options['filters']['field_expertise_tid']['field'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_expertise_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['operator_id'] = 'field_expertise_tid_op';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['operator'] = 'field_expertise_tid_op';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['identifier'] = 'field_expertise_tid';
  $handler->display->display_options['filters']['field_expertise_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_expertise_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_expertise_tid']['vocabulary'] = 'expertise';
  /* Filter criterion: Broken/missing handler */
  $handler->display->display_options['filters']['field_technology_tid']['id'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['table'] = 'field_data_field_technology';
  $handler->display->display_options['filters']['field_technology_tid']['field'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['operator'] = 'or';
  $handler->display->display_options['filters']['field_technology_tid']['value'] = array();
  $handler->display->display_options['filters']['field_technology_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_technology_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_technology_tid']['expose']['operator_id'] = 'field_technology_tid_op';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['operator'] = 'field_technology_tid_op';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['identifier'] = 'field_technology_tid';
  $handler->display->display_options['filters']['field_technology_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: User: Years of Experience (field_experience) */
  $handler->display->display_options['filters']['field_experience_tid']['id'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['table'] = 'field_data_field_experience';
  $handler->display->display_options['filters']['field_experience_tid']['field'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_experience_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_experience_tid']['expose']['operator_id'] = 'field_experience_tid_op';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['operator'] = 'field_experience_tid_op';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['identifier'] = 'field_experience_tid';
  $handler->display->display_options['filters']['field_experience_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_experience_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_experience_tid']['vocabulary'] = 'experience';

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'candidate-search-top';
  $export['candidate_search_top'] = $view;

  $view = new view();
  $view->name = 'candidates_access_list';
  $view->description = 'Shows someone\'s related users';
  $view->tag = '';
  $view->base_table = 'user_relationships';
  $view->human_name = 'candidates access-list';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Defaults */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->display->display_options['title'] = 'My Candidates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['inline'] = array(
    'name_1' => 'name_1',
  );
  $handler->display->display_options['row_options']['separator'] = ', ';
  /* Relationship: User relationships: Requestee user */
  $handler->display->display_options['relationships']['requestee_id']['id'] = 'requestee_id';
  $handler->display->display_options['relationships']['requestee_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requestee_id']['field'] = 'requestee_id';
  /* Relationship: User relationships: Requester user */
  $handler->display->display_options['relationships']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['relationships']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requester_id']['field'] = 'requester_id';
  /* Relationship: User relationships: RTID */
  $handler->display->display_options['relationships']['rtid']['id'] = 'rtid';
  $handler->display->display_options['relationships']['rtid']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['rtid']['field'] = 'rtid';
  /* Field: User relationship types: Plural name */
  $handler->display->display_options['fields']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['fields']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['relationship'] = 'rtid';
  $handler->display->display_options['fields']['plural_name']['label'] = '';
  $handler->display->display_options['fields']['plural_name']['exclude'] = TRUE;
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'requestee_id';
  $handler->display->display_options['fields']['name']['label'] = '';
  /* Field: User relationships: Updated date */
  $handler->display->display_options['fields']['changed']['id'] = 'changed';
  $handler->display->display_options['fields']['changed']['table'] = 'user_relationships';
  $handler->display->display_options['fields']['changed']['field'] = 'changed';
  $handler->display->display_options['fields']['changed']['label'] = 'Added';
  $handler->display->display_options['fields']['changed']['date_format'] = 'time ago';
  /* Sort criterion: User relationship types: Plural name */
  $handler->display->display_options['sorts']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['sorts']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['relationship'] = 'rtid';
  /* Contextual filter: User relationships: Requester user */
  $handler->display->display_options['arguments']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['arguments']['requester_id']['field'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['default_action'] = 'default';
  $handler->display->display_options['arguments']['requester_id']['exception']['title_enable'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['default_argument_type'] = 'current_user';
  $handler->display->display_options['arguments']['requester_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['requester_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['requester_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['requester_id']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['validate']['type'] = 'numeric';
  /* Filter criterion: User relationships: Relationship status */
  $handler->display->display_options['filters']['approved']['id'] = 'approved';
  $handler->display->display_options['filters']['approved']['table'] = 'user_relationships';
  $handler->display->display_options['filters']['approved']['field'] = 'approved';
  $handler->display->display_options['filters']['approved']['value'] = '1';
  $handler->display->display_options['filters']['approved']['group'] = '0';
  $handler->display->display_options['filters']['approved']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'candidates-access-request';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'All Relationships';
  $handler->display->display_options['menu']['weight'] = '0';
  $export['candidates_access_list'] = $view;

  $view = new view();
  $view->name = 'clone_of_my_following';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Clone of my Following';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'List of Following';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Relationship: Flags: follow */
  $handler->display->display_options['relationships']['flag_content_rel']['id'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['table'] = 'users';
  $handler->display->display_options['relationships']['flag_content_rel']['field'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['flag'] = 'follow';
  $handler->display->display_options['relationships']['flag_content_rel']['user_scope'] = 'any';
  /* Relationship: Flags: User */
  $handler->display->display_options['relationships']['uid']['id'] = 'uid';
  $handler->display->display_options['relationships']['uid']['table'] = 'flagging';
  $handler->display->display_options['relationships']['uid']['field'] = 'uid';
  $handler->display->display_options['relationships']['uid']['relationship'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['uid']['required'] = TRUE;
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['link_to_user'] = 'user';
  /* Field: Flags: Flag link */
  $handler->display->display_options['fields']['ops']['id'] = 'ops';
  $handler->display->display_options['fields']['ops']['table'] = 'flagging';
  $handler->display->display_options['fields']['ops']['field'] = 'ops';
  $handler->display->display_options['fields']['ops']['relationship'] = 'flag_content_rel';
  /* Contextual filter: User: Uid */
  $handler->display->display_options['arguments']['uid']['id'] = 'uid';
  $handler->display->display_options['arguments']['uid']['table'] = 'users';
  $handler->display->display_options['arguments']['uid']['field'] = 'uid';
  $handler->display->display_options['arguments']['uid']['relationship'] = 'uid';
  $handler->display->display_options['arguments']['uid']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['uid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['uid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['uid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['uid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['uid']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['uid']['validate']['type'] = 'user';
  $handler->display->display_options['arguments']['uid']['validate_options']['restrict_roles'] = TRUE;
  $handler->display->display_options['arguments']['uid']['validate_options']['roles'] = array(
    5 => '5',
  );
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'user/%/my_following';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Following';
  $handler->display->display_options['menu']['weight'] = '3';
  $handler->display->display_options['menu']['name'] = 'user-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $handler->display->display_options['tab_options']['title'] = 'User Profile';
  $handler->display->display_options['tab_options']['weight'] = '0';
  $export['clone_of_my_following'] = $view;

  $view = new view();
  $view->name = 'list_candidates';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'List Candidates';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'List Candidates';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    5 => '5',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '20';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Relationship: User: Invite */
  $handler->display->display_options['relationships']['invite_invitee']['id'] = 'invite_invitee';
  $handler->display->display_options['relationships']['invite_invitee']['table'] = 'users';
  $handler->display->display_options['relationships']['invite_invitee']['field'] = 'invite_invitee';
  /* Relationship: User: Profile */
  $handler->display->display_options['relationships']['profile']['id'] = 'profile';
  $handler->display->display_options['relationships']['profile']['table'] = 'users';
  $handler->display->display_options['relationships']['profile']['field'] = 'profile';
  $handler->display->display_options['relationships']['profile']['bundle_types'] = array(
    'evaluation' => 'evaluation',
  );
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  /* Field: User: Created date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'users';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['date_format'] = 'short';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'long';
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = 'Action';
  $handler->display->display_options['fields']['nothing']['exclude'] = TRUE;
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '<a href="../../node/add/evaluation?canid=[uid]">Create new evaluation</a>';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Action';
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
$result = db_query("SELECT n.uid,n.nid FROM field_data_field_user_id candidate, node n WHERE candidate.field_user_id_value = $row->uid AND n.nid = candidate.entity_id AND n.type = candidate.bundle");
$view_result = $result->fetchAssoc();
if($view_result[\'uid\']==\'\'){
        echo \'<a href="../../node/add/evaluation?canid=\'.$row->uid.\'">Create new evaluation</a>\';          
}else{
echo \'<a href="../../node/\'.$view_result[\'nid\'].\'">View evaluation</a>\';
}
?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Invite: Inviter uid */
  $handler->display->display_options['arguments']['inviter']['id'] = 'inviter';
  $handler->display->display_options['arguments']['inviter']['table'] = 'invite';
  $handler->display->display_options['arguments']['inviter']['field'] = 'inviter';
  $handler->display->display_options['arguments']['inviter']['relationship'] = 'invite_invitee';
  $handler->display->display_options['arguments']['inviter']['default_action'] = 'default';
  $handler->display->display_options['arguments']['inviter']['default_argument_type'] = 'user';
  $handler->display->display_options['arguments']['inviter']['default_argument_options']['user'] = FALSE;
  $handler->display->display_options['arguments']['inviter']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['inviter']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['inviter']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Name */
  $handler->display->display_options['filters']['uid']['id'] = 'uid';
  $handler->display->display_options['filters']['uid']['table'] = 'users';
  $handler->display->display_options['filters']['uid']['field'] = 'uid';
  $handler->display->display_options['filters']['uid']['value'] = '';
  $handler->display->display_options['filters']['uid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['uid']['expose']['operator_id'] = 'uid_op';
  $handler->display->display_options['filters']['uid']['expose']['label'] = 'Name';
  $handler->display->display_options['filters']['uid']['expose']['operator'] = 'uid_op';
  $handler->display->display_options['filters']['uid']['expose']['identifier'] = 'uid';
  $handler->display->display_options['filters']['uid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'user/%/list-candidates';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'List Candidates';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'user-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['list_candidates'] = $view;

  $view = new view();
  $view->name = 'my_requirements';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'My Requirements';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'My Requirements';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'requirement' => 'requirement',
  );

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $export['my_requirements'] = $view;

  $view = new view();
  $view->name = 'paid_membership';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Paid Membership';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'BECOME A PAID MEMBER';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '2';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Image */
  $handler->display->display_options['fields']['uc_product_image']['id'] = 'uc_product_image';
  $handler->display->display_options['fields']['uc_product_image']['table'] = 'field_data_uc_product_image';
  $handler->display->display_options['fields']['uc_product_image']['field'] = 'uc_product_image';
  $handler->display->display_options['fields']['uc_product_image']['label'] = '';
  $handler->display->display_options['fields']['uc_product_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uc_product_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['uc_product_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  $handler->display->display_options['fields']['uc_product_image']['delta_offset'] = '0';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Field: Product: SKU */
  $handler->display->display_options['fields']['model']['id'] = 'model';
  $handler->display->display_options['fields']['model']['table'] = 'uc_products';
  $handler->display->display_options['fields']['model']['field'] = 'model';
  $handler->display->display_options['fields']['model']['label'] = '';
  $handler->display->display_options['fields']['model']['exclude'] = TRUE;
  $handler->display->display_options['fields']['model']['element_label_colon'] = FALSE;
  /* Field: Product: Display price */
  $handler->display->display_options['fields']['display_price']['id'] = 'display_price';
  $handler->display->display_options['fields']['display_price']['table'] = 'uc_products';
  $handler->display->display_options['fields']['display_price']['field'] = 'display_price';
  $handler->display->display_options['fields']['display_price']['exclude'] = TRUE;
  /* Field: Product: List price */
  $handler->display->display_options['fields']['list_price']['id'] = 'list_price';
  $handler->display->display_options['fields']['list_price']['table'] = 'uc_products';
  $handler->display->display_options['fields']['list_price']['field'] = 'list_price';
  $handler->display->display_options['fields']['list_price']['label'] = 'Price';
  $handler->display->display_options['fields']['list_price']['exclude'] = TRUE;
  $handler->display->display_options['fields']['list_price']['precision'] = '0';
  /* Field: Product: Sell price */
  $handler->display->display_options['fields']['sell_price']['id'] = 'sell_price';
  $handler->display->display_options['fields']['sell_price']['table'] = 'uc_products';
  $handler->display->display_options['fields']['sell_price']['field'] = 'sell_price';
  $handler->display->display_options['fields']['sell_price']['label'] = '';
  $handler->display->display_options['fields']['sell_price']['exclude'] = TRUE;
  $handler->display->display_options['fields']['sell_price']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['sell_price']['precision'] = '0';
  /* Field: Global: PHP */
  $handler->display->display_options['fields']['php']['id'] = 'php';
  $handler->display->display_options['fields']['php']['table'] = 'views';
  $handler->display->display_options['fields']['php']['field'] = 'php';
  $handler->display->display_options['fields']['php']['label'] = 'Price';
  $handler->display->display_options['fields']['php']['use_php_setup'] = 0;
  $handler->display->display_options['fields']['php']['php_output'] = '<?php
if($row->model == \'1-mon\' || $row->model == \'sub-116-1\' ){
  echo \'$\'.round($row->list_price,2).\'/Annual\'; 
  if($row->sell_price == 0) { 
    echo \'<br/>Free trial 1 Month\'; 
 }
}else{
if($row->model == \'1-year\'){
echo \'$\'.round($row->list_price,2).\'/Annual\';
}
}

?>';
  $handler->display->display_options['fields']['php']['use_php_click_sortable'] = '0';
  $handler->display->display_options['fields']['php']['php_click_sortable'] = '';
  /* Field: Product: Add to cart form */
  $handler->display->display_options['fields']['addtocartlink']['id'] = 'addtocartlink';
  $handler->display->display_options['fields']['addtocartlink']['table'] = 'uc_products';
  $handler->display->display_options['fields']['addtocartlink']['field'] = 'addtocartlink';
  $handler->display->display_options['fields']['addtocartlink']['label'] = '';
  $handler->display->display_options['fields']['addtocartlink']['element_label_colon'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'product' => 'product',
    'uc_recurring_subscription' => 'uc_recurring_subscription',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'paid-membership';
  $export['paid_membership'] = $view;

  $view = new view();
  $view->name = 'rec_friend_list';
  $view->description = 'Shows someone\'s related users';
  $view->tag = '';
  $view->base_table = 'user_relationships';
  $view->human_name = 'rec-friend-list';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Defaults */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->display->display_options['title'] = 'My Friends';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['inline'] = array(
    'name_1' => 'name_1',
  );
  $handler->display->display_options['row_options']['separator'] = ', ';
  /* Relationship: User relationships: Requestee user */
  $handler->display->display_options['relationships']['requestee_id']['id'] = 'requestee_id';
  $handler->display->display_options['relationships']['requestee_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requestee_id']['field'] = 'requestee_id';
  /* Relationship: User relationships: Requester user */
  $handler->display->display_options['relationships']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['relationships']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requester_id']['field'] = 'requester_id';
  /* Relationship: User relationships: RTID */
  $handler->display->display_options['relationships']['rtid']['id'] = 'rtid';
  $handler->display->display_options['relationships']['rtid']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['rtid']['field'] = 'rtid';
  /* Field: User relationship types: Plural name */
  $handler->display->display_options['fields']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['fields']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['relationship'] = 'rtid';
  $handler->display->display_options['fields']['plural_name']['label'] = '';
  $handler->display->display_options['fields']['plural_name']['exclude'] = TRUE;
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'requestee_id';
  $handler->display->display_options['fields']['name']['label'] = '';
  /* Field: User relationships: Updated date */
  $handler->display->display_options['fields']['changed']['id'] = 'changed';
  $handler->display->display_options['fields']['changed']['table'] = 'user_relationships';
  $handler->display->display_options['fields']['changed']['field'] = 'changed';
  $handler->display->display_options['fields']['changed']['label'] = 'Added';
  $handler->display->display_options['fields']['changed']['date_format'] = 'time ago';
  /* Sort criterion: User relationship types: Plural name */
  $handler->display->display_options['sorts']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['sorts']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['relationship'] = 'rtid';
  /* Contextual filter: User relationships: Requester user */
  $handler->display->display_options['arguments']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['arguments']['requester_id']['field'] = 'requester_id';
  $handler->display->display_options['arguments']['requester_id']['default_action'] = 'default';
  $handler->display->display_options['arguments']['requester_id']['exception']['title_enable'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['default_argument_type'] = 'current_user';
  $handler->display->display_options['arguments']['requester_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['requester_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['requester_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['requester_id']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['requester_id']['validate']['type'] = 'numeric';
  /* Filter criterion: User relationships: Relationship status */
  $handler->display->display_options['filters']['approved']['id'] = 'approved';
  $handler->display->display_options['filters']['approved']['table'] = 'user_relationships';
  $handler->display->display_options['filters']['approved']['field'] = 'approved';
  $handler->display->display_options['filters']['approved']['value'] = '1';
  $handler->display->display_options['filters']['approved']['group'] = '0';
  $handler->display->display_options['filters']['approved']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'rec-friend-list';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'All Relationships';
  $handler->display->display_options['menu']['weight'] = '0';
  $export['rec_friend_list'] = $view;

  $view = new view();
  $view->name = 'recruiter_access_list';
  $view->description = 'Shows someone\'s related users';
  $view->tag = '';
  $view->base_table = 'user_relationships';
  $view->human_name = 'recruiter access-list';
  $view->core = 0;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Defaults */
  $handler = $view->new_display('default', 'Defaults', 'default');
  $handler->display->display_options['title'] = 'My Recruiters';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['inline'] = array(
    'name_1' => 'name_1',
  );
  $handler->display->display_options['row_options']['separator'] = ', ';
  /* Relationship: User relationships: Requestee user */
  $handler->display->display_options['relationships']['requestee_id']['id'] = 'requestee_id';
  $handler->display->display_options['relationships']['requestee_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requestee_id']['field'] = 'requestee_id';
  /* Relationship: User relationships: Requester user */
  $handler->display->display_options['relationships']['requester_id']['id'] = 'requester_id';
  $handler->display->display_options['relationships']['requester_id']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['requester_id']['field'] = 'requester_id';
  /* Relationship: User relationships: RTID */
  $handler->display->display_options['relationships']['rtid']['id'] = 'rtid';
  $handler->display->display_options['relationships']['rtid']['table'] = 'user_relationships';
  $handler->display->display_options['relationships']['rtid']['field'] = 'rtid';
  /* Field: User relationship types: Plural name */
  $handler->display->display_options['fields']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['fields']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['fields']['plural_name']['relationship'] = 'rtid';
  $handler->display->display_options['fields']['plural_name']['label'] = '';
  $handler->display->display_options['fields']['plural_name']['exclude'] = TRUE;
  /* Field: User relationships: Updated date */
  $handler->display->display_options['fields']['changed']['id'] = 'changed';
  $handler->display->display_options['fields']['changed']['table'] = 'user_relationships';
  $handler->display->display_options['fields']['changed']['field'] = 'changed';
  $handler->display->display_options['fields']['changed']['label'] = 'Added';
  $handler->display->display_options['fields']['changed']['date_format'] = 'time ago';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name_1']['id'] = 'name_1';
  $handler->display->display_options['fields']['name_1']['table'] = 'users';
  $handler->display->display_options['fields']['name_1']['field'] = 'name';
  $handler->display->display_options['fields']['name_1']['relationship'] = 'requester_id';
  $handler->display->display_options['fields']['name_1']['label'] = 'Recruiter Name';
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['relationship'] = 'requester_id';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Sort criterion: User relationship types: Plural name */
  $handler->display->display_options['sorts']['plural_name']['id'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['table'] = 'user_relationship_types';
  $handler->display->display_options['sorts']['plural_name']['field'] = 'plural_name';
  $handler->display->display_options['sorts']['plural_name']['relationship'] = 'rtid';
  /* Contextual filter: User relationships: Requestee user */
  $handler->display->display_options['arguments']['requestee_id']['id'] = 'requestee_id';
  $handler->display->display_options['arguments']['requestee_id']['table'] = 'user_relationships';
  $handler->display->display_options['arguments']['requestee_id']['field'] = 'requestee_id';
  $handler->display->display_options['arguments']['requestee_id']['default_action'] = 'default';
  $handler->display->display_options['arguments']['requestee_id']['default_argument_type'] = 'current_user';
  $handler->display->display_options['arguments']['requestee_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['requestee_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['requestee_id']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['requestee_id']['specify_validation'] = TRUE;
  /* Filter criterion: User relationships: Relationship status */
  $handler->display->display_options['filters']['approved']['id'] = 'approved';
  $handler->display->display_options['filters']['approved']['table'] = 'user_relationships';
  $handler->display->display_options['filters']['approved']['field'] = 'approved';
  $handler->display->display_options['filters']['approved']['value'] = '1';
  $handler->display->display_options['filters']['approved']['group'] = '0';
  $handler->display->display_options['filters']['approved']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'recruiter-access-request';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'All Relationships';
  $handler->display->display_options['menu']['weight'] = '0';
  $export['recruiter_access_list'] = $view;

  $view = new view();
  $view->name = 'recruiter_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Recruiter List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'List of recruiters';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    2 => '2',
    6 => '6',
    5 => '5',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Relationship: Flags: follow */
  $handler->display->display_options['relationships']['flag_content_rel']['id'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['table'] = 'users';
  $handler->display->display_options['relationships']['flag_content_rel']['field'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['required'] = 0;
  $handler->display->display_options['relationships']['flag_content_rel']['flag'] = 'follow';
  $handler->display->display_options['relationships']['flag_content_rel']['user_scope'] = 'any';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = 'Username';
  $handler->display->display_options['fields']['name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['link_to_user'] = 'user';
  /* Field: User: Created date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'users';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['date_format'] = 'short';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'privatemsg_current_day';
  /* Field: Flags: Flag link */
  $handler->display->display_options['fields']['ops']['id'] = 'ops';
  $handler->display->display_options['fields']['ops']['table'] = 'flagging';
  $handler->display->display_options['fields']['ops']['field'] = 'ops';
  $handler->display->display_options['fields']['ops']['relationship'] = 'flag_content_rel';
  $handler->display->display_options['fields']['ops']['label'] = 'Follow';
  $handler->display->display_options['fields']['ops']['element_class'] = 'btn btn-block btn-outline btn-primary follow-btn';
  $handler->display->display_options['fields']['ops']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['ops']['link_type'] = 'toggle';
  /* Field: Privatemsg: Send Privatemsg link */
  $handler->display->display_options['fields']['privatemsg_link']['id'] = 'privatemsg_link';
  $handler->display->display_options['fields']['privatemsg_link']['table'] = 'users';
  $handler->display->display_options['fields']['privatemsg_link']['field'] = 'privatemsg_link';
  $handler->display->display_options['fields']['privatemsg_link']['label'] = '';
  $handler->display->display_options['fields']['privatemsg_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['privatemsg_link']['return'] = 1;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['exclude'] = TRUE;
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['exclude'] = TRUE;
  /* Field: User: picture-url */
  $handler->display->display_options['fields']['field_picture_url']['id'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['table'] = 'field_data_field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['field'] = 'field_picture_url';
  $handler->display->display_options['fields']['field_picture_url']['exclude'] = TRUE;
  /* Field: User: Link */
  $handler->display->display_options['fields']['view_user']['id'] = 'view_user';
  $handler->display->display_options['fields']['view_user']['table'] = 'users';
  $handler->display->display_options['fields']['view_user']['field'] = 'view_user';
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    5 => '5',
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'recruiter-list';
  $handler->display->display_options['menu']['type'] = 'normal';
  $handler->display->display_options['menu']['title'] = 'Recruiters';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'main-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['recruiter_list'] = $view;

  $view = new view();
  $view->name = 'recruiters_list';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Recruiters List';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Recruiters List';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '25';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
    'field_first_name' => 'field_first_name',
    'field_last_name' => 'field_last_name',
    'field_recruiter_status' => 'field_recruiter_status',
    'access' => 'access',
    'created' => 'created',
    'edit_node' => 'edit_node',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_first_name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_last_name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_recruiter_status' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'access' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'created' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'edit_node' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Field: Bulk operations: User */
  $handler->display->display_options['fields']['views_bulk_operations']['id'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['table'] = 'users';
  $handler->display->display_options['fields']['views_bulk_operations']['field'] = 'views_bulk_operations';
  $handler->display->display_options['fields']['views_bulk_operations']['label'] = 'Operation';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['display_type'] = '0';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['enable_select_all_pages'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['row_clickable'] = 1;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['force_single'] = 0;
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_settings']['entity_load_capacity'] = '10';
  $handler->display->display_options['fields']['views_bulk_operations']['vbo_operations'] = array(
    'action::views_bulk_operations_user_cancel_action' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'override_label' => 0,
      'label' => '',
    ),
    'action::views_bulk_operations_modify_action' => array(
      'selected' => 1,
      'postpone_processing' => 0,
      'skip_confirmation' => 0,
      'override_label' => 1,
      'label' => 'Change Status',
      'settings' => array(
        'show_all_tokens' => 1,
        'display_values' => array(
          'user::field_recruiter_status' => 'user::field_recruiter_status',
        ),
      ),
    ),
  );
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  /* Field: User: Recruiter Status */
  $handler->display->display_options['fields']['field_recruiter_status']['id'] = 'field_recruiter_status';
  $handler->display->display_options['fields']['field_recruiter_status']['table'] = 'field_data_field_recruiter_status';
  $handler->display->display_options['fields']['field_recruiter_status']['field'] = 'field_recruiter_status';
  /* Field: User: Last access */
  $handler->display->display_options['fields']['access']['id'] = 'access';
  $handler->display->display_options['fields']['access']['table'] = 'users';
  $handler->display->display_options['fields']['access']['field'] = 'access';
  $handler->display->display_options['fields']['access']['date_format'] = 'privatemsg_current_day';
  $handler->display->display_options['fields']['access']['second_date_format'] = 'privatemsg_current_day';
  /* Field: User: Created date */
  $handler->display->display_options['fields']['created']['id'] = 'created';
  $handler->display->display_options['fields']['created']['table'] = 'users';
  $handler->display->display_options['fields']['created']['field'] = 'created';
  $handler->display->display_options['fields']['created']['date_format'] = 'privatemsg_current_day';
  $handler->display->display_options['fields']['created']['second_date_format'] = 'privatemsg_current_day';
  /* Field: User: Edit link */
  $handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['table'] = 'users';
  $handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
  /* Sort criterion: User: Created date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'users';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    5 => '5',
  );
  /* Filter criterion: User: Recruiter Status (field_recruiter_status) */
  $handler->display->display_options['filters']['field_recruiter_status_value']['id'] = 'field_recruiter_status_value';
  $handler->display->display_options['filters']['field_recruiter_status_value']['table'] = 'field_data_field_recruiter_status';
  $handler->display->display_options['filters']['field_recruiter_status_value']['field'] = 'field_recruiter_status_value';
  $handler->display->display_options['filters']['field_recruiter_status_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_recruiter_status_value']['expose']['operator_id'] = 'field_recruiter_status_value_op';
  $handler->display->display_options['filters']['field_recruiter_status_value']['expose']['label'] = 'Status';
  $handler->display->display_options['filters']['field_recruiter_status_value']['expose']['operator'] = 'field_recruiter_status_value_op';
  $handler->display->display_options['filters']['field_recruiter_status_value']['expose']['identifier'] = 'field_recruiter_status_value';
  $handler->display->display_options['filters']['field_recruiter_status_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'admin/people/recruiters';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Recruiters List';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'management';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['recruiters_list'] = $view;

  $view = new view();
  $view->name = 'searchapi_candidate';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'search_api_index_default_candidate';
  $view->human_name = 'searchapi candidate';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Search Candidate';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'role';
  $handler->display->display_options['access']['role'] = array(
    3 => '3',
    5 => '5',
  );
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['submit_button'] = 'Search';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'uid' => 'uid',
    'field_role_department' => 'field_role_department',
    'name' => 'name',
    'profile_evaluation_field_skills_rating_field_skills' => 'profile_evaluation_field_skills_rating_field_skills',
    'field_job_title' => 'field_job_title',
    'rendered_entity' => 'rendered_entity',
    'field_job_level' => 'field_job_level',
    'field_experience' => 'field_experience',
    'field_expertise' => 'field_expertise',
    'field_first_name' => 'field_first_name',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'uid' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_role_department' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'name' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'profile_evaluation_field_skills_rating_field_skills' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_job_title' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'rendered_entity' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_job_level' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_experience' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_expertise' => array(
      'sortable' => 1,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_first_name' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No results matched your search.';
  $handler->display->display_options['empty']['area']['format'] = 'full_html';
  /* Field: Indexed User: User ID */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_entity'] = 0;
  /* Field: Indexed User: Role/Department */
  $handler->display->display_options['fields']['field_role_department']['id'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_role_department']['field'] = 'field_role_department';
  $handler->display->display_options['fields']['field_role_department']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_role_department']['link_to_entity'] = 0;
  $handler->display->display_options['fields']['field_role_department']['view_mode'] = 'full';
  $handler->display->display_options['fields']['field_role_department']['bypass_access'] = 0;
  /* Field: Indexed User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['link_to_entity'] = 0;
  /* Field: Evaluation profile » Hard Skills: Enter Skill (indexed) */
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['id'] = 'profile_evaluation_field_skills_rating_field_skills';
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['field'] = 'profile_evaluation_field_skills_rating_field_skills';
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['label'] = '';
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['exclude'] = TRUE;
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['link_to_entity'] = 0;
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['view_mode'] = 'full';
  $handler->display->display_options['fields']['profile_evaluation_field_skills_rating_field_skills']['bypass_access'] = 0;
  /* Field: Indexed User: Job Title */
  $handler->display->display_options['fields']['field_job_title']['id'] = 'field_job_title';
  $handler->display->display_options['fields']['field_job_title']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_job_title']['field'] = 'field_job_title';
  $handler->display->display_options['fields']['field_job_title']['link_to_entity'] = 0;
  $handler->display->display_options['fields']['field_job_title']['view_mode'] = 'full';
  $handler->display->display_options['fields']['field_job_title']['bypass_access'] = 0;
  /* Field: User: Rendered User */
  $handler->display->display_options['fields']['rendered_entity']['id'] = 'rendered_entity';
  $handler->display->display_options['fields']['rendered_entity']['table'] = 'views_entity_user';
  $handler->display->display_options['fields']['rendered_entity']['field'] = 'rendered_entity';
  $handler->display->display_options['fields']['rendered_entity']['exclude'] = TRUE;
  $handler->display->display_options['fields']['rendered_entity']['link_to_entity'] = 1;
  $handler->display->display_options['fields']['rendered_entity']['view_mode'] = 'full';
  $handler->display->display_options['fields']['rendered_entity']['bypass_access'] = 0;
  /* Field: Broken/missing handler */
  $handler->display->display_options['fields']['field_job_level']['id'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_job_level']['field'] = 'field_job_level';
  $handler->display->display_options['fields']['field_job_level']['label'] = 'Job Level';
  $handler->display->display_options['fields']['field_job_level']['exclude'] = TRUE;
  /* Field: Indexed User: Years of Experience */
  $handler->display->display_options['fields']['field_experience']['id'] = 'field_experience';
  $handler->display->display_options['fields']['field_experience']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_experience']['field'] = 'field_experience';
  $handler->display->display_options['fields']['field_experience']['label'] = 'Experience';
  $handler->display->display_options['fields']['field_experience']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_experience']['link_to_entity'] = 1;
  $handler->display->display_options['fields']['field_experience']['view_mode'] = 'full';
  $handler->display->display_options['fields']['field_experience']['bypass_access'] = 0;
  /* Field: Indexed User: State */
  $handler->display->display_options['fields']['field_expertise']['id'] = 'field_expertise';
  $handler->display->display_options['fields']['field_expertise']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_expertise']['field'] = 'field_expertise';
  $handler->display->display_options['fields']['field_expertise']['link_to_entity'] = 0;
  $handler->display->display_options['fields']['field_expertise']['view_mode'] = 'full';
  $handler->display->display_options['fields']['field_expertise']['bypass_access'] = 0;
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = 'Rating';
  /* Field: Indexed User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['label'] = 'Actions';
  /* Field: Indexed User: Email */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['label'] = '';
  $handler->display->display_options['fields']['mail']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['mail']['link_to_entity'] = 0;
  /* Sort criterion: Search: Relevance */
  $handler->display->display_options['sorts']['search_api_relevance']['id'] = 'search_api_relevance';
  $handler->display->display_options['sorts']['search_api_relevance']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['sorts']['search_api_relevance']['field'] = 'search_api_relevance';
  $handler->display->display_options['sorts']['search_api_relevance']['order'] = 'DESC';
  /* Sort criterion: Indexed User: Entity ID */
  $handler->display->display_options['sorts']['search_api_id']['id'] = 'search_api_id';
  $handler->display->display_options['sorts']['search_api_id']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['sorts']['search_api_id']['field'] = 'search_api_id';
  $handler->display->display_options['sorts']['search_api_id']['order'] = 'DESC';
  /* Sort criterion: Indexed User: Years of Experience */
  $handler->display->display_options['sorts']['field_experience']['id'] = 'field_experience';
  $handler->display->display_options['sorts']['field_experience']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['sorts']['field_experience']['field'] = 'field_experience';
  $handler->display->display_options['sorts']['field_experience']['order'] = 'DESC';
  $handler->display->display_options['sorts']['field_experience']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_experience']['expose']['label'] = 'Experience';
  /* Filter criterion: Search: Fulltext search */
  $handler->display->display_options['filters']['search_api_views_fulltext']['id'] = 'search_api_views_fulltext';
  $handler->display->display_options['filters']['search_api_views_fulltext']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['search_api_views_fulltext']['field'] = 'search_api_views_fulltext';
  $handler->display->display_options['filters']['search_api_views_fulltext']['operator'] = 'OR';
  $handler->display->display_options['filters']['search_api_views_fulltext']['group'] = 1;
  $handler->display->display_options['filters']['search_api_views_fulltext']['exposed'] = TRUE;
  $handler->display->display_options['filters']['search_api_views_fulltext']['expose']['operator_id'] = 'search_api_views_fulltext_op';
  $handler->display->display_options['filters']['search_api_views_fulltext']['expose']['label'] = 'Search';
  $handler->display->display_options['filters']['search_api_views_fulltext']['expose']['operator'] = 'search_api_views_fulltext_op';
  $handler->display->display_options['filters']['search_api_views_fulltext']['expose']['identifier'] = 'search_api_views_fulltext';
  $handler->display->display_options['filters']['search_api_views_fulltext']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
  );
  $handler->display->display_options['filters']['search_api_views_fulltext']['fields'] = array(
    'field_college_university' => 'field_college_university',
    'field_company_size:name' => 'field_company_size:name',
    'field_degree_type:name' => 'field_degree_type:name',
    'field_expertise:name' => 'field_expertise:name',
    'field_first_name' => 'field_first_name',
    'field_industry:name' => 'field_industry:name',
    'field_interests' => 'field_interests',
    'field_job_title:name' => 'field_job_title:name',
    'field_last_name' => 'field_last_name',
    'field_summary' => 'field_summary',
    'field_zip_code' => 'field_zip_code',
    'name' => 'name',
    'profile_evaluation:field_skills_rating:field_skills:name' => 'profile_evaluation:field_skills_rating:field_skills:name',
  );
  /* Filter criterion: Indexed User: Years of Experience */
  $handler->display->display_options['filters']['field_experience']['id'] = 'field_experience';
  $handler->display->display_options['filters']['field_experience']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_experience']['field'] = 'field_experience';
  $handler->display->display_options['filters']['field_experience']['value'] = array();
  $handler->display->display_options['filters']['field_experience']['group'] = 1;
  $handler->display->display_options['filters']['field_experience']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_experience']['expose']['operator_id'] = 'field_experience_op';
  $handler->display->display_options['filters']['field_experience']['expose']['label'] = 'Years of Experience';
  $handler->display->display_options['filters']['field_experience']['expose']['operator'] = 'field_experience_op';
  $handler->display->display_options['filters']['field_experience']['expose']['identifier'] = 'field_experience';
  $handler->display->display_options['filters']['field_experience']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_experience']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_experience']['expose']['reduce'] = 0;
  $handler->display->display_options['filters']['field_experience']['group_info']['label'] = 'Experience';
  $handler->display->display_options['filters']['field_experience']['group_info']['identifier'] = 'field_experience';
  $handler->display->display_options['filters']['field_experience']['group_info']['group_items'] = array(
    1 => array(
      'title' => '5',
      'operator' => '=',
      'value' => '5 Years',
    ),
    2 => array(
      'title' => '4',
      'operator' => '=',
      'value' => '4',
    ),
    3 => array(
      'title' => '3',
      'operator' => '=',
      'value' => '3',
    ),
  );
  /* Filter criterion: Evaluation profile » Hard Skills: Enter Skill (indexed) */
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['id'] = 'profile_evaluation_field_skills_rating_field_skills';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['field'] = 'profile_evaluation_field_skills_rating_field_skills';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['group'] = 1;
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['exposed'] = TRUE;
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['operator_id'] = 'profile_evaluation_field_skills_rating_field_skills_op';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['label'] = 'Skills';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['operator'] = 'profile_evaluation_field_skills_rating_field_skills_op';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['identifier'] = 'profile_evaluation_field_skills_rating_field_skills';
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['profile_evaluation_field_skills_rating_field_skills']['type'] = 'select';
  /* Filter criterion: Indexed User: City */
  $handler->display->display_options['filters']['field_city']['id'] = 'field_city';
  $handler->display->display_options['filters']['field_city']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_city']['field'] = 'field_city';
  $handler->display->display_options['filters']['field_city']['value'] = array();
  $handler->display->display_options['filters']['field_city']['group'] = 1;
  $handler->display->display_options['filters']['field_city']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_city']['expose']['operator_id'] = 'field_city_op';
  $handler->display->display_options['filters']['field_city']['expose']['label'] = 'City';
  $handler->display->display_options['filters']['field_city']['expose']['operator'] = 'field_city_op';
  $handler->display->display_options['filters']['field_city']['expose']['identifier'] = 'field_city';
  $handler->display->display_options['filters']['field_city']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_city']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Indexed User: Company size */
  $handler->display->display_options['filters']['field_company_size']['id'] = 'field_company_size';
  $handler->display->display_options['filters']['field_company_size']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_company_size']['field'] = 'field_company_size';
  $handler->display->display_options['filters']['field_company_size']['value'] = array();
  $handler->display->display_options['filters']['field_company_size']['group'] = 1;
  $handler->display->display_options['filters']['field_company_size']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_company_size']['expose']['operator_id'] = 'field_company_size_op';
  $handler->display->display_options['filters']['field_company_size']['expose']['label'] = 'Company size';
  $handler->display->display_options['filters']['field_company_size']['expose']['operator'] = 'field_company_size_op';
  $handler->display->display_options['filters']['field_company_size']['expose']['identifier'] = 'field_company_size';
  $handler->display->display_options['filters']['field_company_size']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_company_size']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_company_size']['expose']['reduce'] = 0;
  /* Filter criterion: Indexed User: Industry */
  $handler->display->display_options['filters']['field_industry']['id'] = 'field_industry';
  $handler->display->display_options['filters']['field_industry']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_industry']['field'] = 'field_industry';
  $handler->display->display_options['filters']['field_industry']['value'] = array();
  $handler->display->display_options['filters']['field_industry']['group'] = 1;
  $handler->display->display_options['filters']['field_industry']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_industry']['expose']['operator_id'] = 'field_industry_op';
  $handler->display->display_options['filters']['field_industry']['expose']['label'] = 'Industry';
  $handler->display->display_options['filters']['field_industry']['expose']['operator'] = 'field_industry_op';
  $handler->display->display_options['filters']['field_industry']['expose']['identifier'] = 'field_industry';
  $handler->display->display_options['filters']['field_industry']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_industry']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_industry']['expose']['reduce'] = 0;
  /* Filter criterion: Indexed User: College/University */
  $handler->display->display_options['filters']['field_college_university']['id'] = 'field_college_university';
  $handler->display->display_options['filters']['field_college_university']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_college_university']['field'] = 'field_college_university';
  $handler->display->display_options['filters']['field_college_university']['group'] = 1;
  $handler->display->display_options['filters']['field_college_university']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_college_university']['expose']['operator_id'] = 'field_college_university_op';
  $handler->display->display_options['filters']['field_college_university']['expose']['label'] = 'College/University';
  $handler->display->display_options['filters']['field_college_university']['expose']['operator'] = 'field_college_university_op';
  $handler->display->display_options['filters']['field_college_university']['expose']['identifier'] = 'field_college_university';
  $handler->display->display_options['filters']['field_college_university']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Indexed User: Job Title */
  $handler->display->display_options['filters']['field_job_title']['id'] = 'field_job_title';
  $handler->display->display_options['filters']['field_job_title']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_job_title']['field'] = 'field_job_title';
  $handler->display->display_options['filters']['field_job_title']['value'] = array();
  $handler->display->display_options['filters']['field_job_title']['group'] = 1;
  $handler->display->display_options['filters']['field_job_title']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_job_title']['expose']['operator_id'] = 'field_job_title_op';
  $handler->display->display_options['filters']['field_job_title']['expose']['label'] = 'Job Title';
  $handler->display->display_options['filters']['field_job_title']['expose']['operator'] = 'field_job_title_op';
  $handler->display->display_options['filters']['field_job_title']['expose']['identifier'] = 'field_job_title';
  $handler->display->display_options['filters']['field_job_title']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Indexed User: Company Past */
  $handler->display->display_options['filters']['field_company_past']['id'] = 'field_company_past';
  $handler->display->display_options['filters']['field_company_past']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_company_past']['field'] = 'field_company_past';
  $handler->display->display_options['filters']['field_company_past']['group'] = 1;
  $handler->display->display_options['filters']['field_company_past']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_company_past']['expose']['operator_id'] = 'field_company_past_op';
  $handler->display->display_options['filters']['field_company_past']['expose']['label'] = 'Company Past';
  $handler->display->display_options['filters']['field_company_past']['expose']['operator'] = 'field_company_past_op';
  $handler->display->display_options['filters']['field_company_past']['expose']['identifier'] = 'field_company_past';
  /* Filter criterion: Indexed User: Company Present */
  $handler->display->display_options['filters']['field_company_present']['id'] = 'field_company_present';
  $handler->display->display_options['filters']['field_company_present']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_company_present']['field'] = 'field_company_present';
  $handler->display->display_options['filters']['field_company_present']['value'] = array();
  $handler->display->display_options['filters']['field_company_present']['group'] = 1;
  $handler->display->display_options['filters']['field_company_present']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_company_present']['expose']['operator_id'] = 'field_company_present_op';
  $handler->display->display_options['filters']['field_company_present']['expose']['label'] = 'Company Present';
  $handler->display->display_options['filters']['field_company_present']['expose']['operator'] = 'field_company_present_op';
  $handler->display->display_options['filters']['field_company_present']['expose']['identifier'] = 'field_company_present';
  $handler->display->display_options['filters']['field_company_present']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_company_present']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Indexed User: Interests */
  $handler->display->display_options['filters']['field_interests']['id'] = 'field_interests';
  $handler->display->display_options['filters']['field_interests']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_interests']['field'] = 'field_interests';
  $handler->display->display_options['filters']['field_interests']['group'] = 1;
  $handler->display->display_options['filters']['field_interests']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_interests']['expose']['operator_id'] = 'field_interests_op';
  $handler->display->display_options['filters']['field_interests']['expose']['label'] = 'interests';
  $handler->display->display_options['filters']['field_interests']['expose']['operator'] = 'field_interests_op';
  $handler->display->display_options['filters']['field_interests']['expose']['identifier'] = 'field_interests';
  $handler->display->display_options['filters']['field_interests']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  /* Filter criterion: Indexed User: State */
  $handler->display->display_options['filters']['field_expertise']['id'] = 'field_expertise';
  $handler->display->display_options['filters']['field_expertise']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_expertise']['field'] = 'field_expertise';
  $handler->display->display_options['filters']['field_expertise']['value'] = array();
  $handler->display->display_options['filters']['field_expertise']['group'] = 1;
  $handler->display->display_options['filters']['field_expertise']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_expertise']['expose']['operator_id'] = 'field_expertise_op';
  $handler->display->display_options['filters']['field_expertise']['expose']['label'] = 'State';
  $handler->display->display_options['filters']['field_expertise']['expose']['operator'] = 'field_expertise_op';
  $handler->display->display_options['filters']['field_expertise']['expose']['identifier'] = 'field_expertise';
  $handler->display->display_options['filters']['field_expertise']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
  );
  $handler->display->display_options['filters']['field_expertise']['expose']['reduce'] = 0;
  /* Filter criterion: Indexed User: Degree Type */
  $handler->display->display_options['filters']['field_degree_type']['id'] = 'field_degree_type';
  $handler->display->display_options['filters']['field_degree_type']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_degree_type']['field'] = 'field_degree_type';
  $handler->display->display_options['filters']['field_degree_type']['value'] = array();
  $handler->display->display_options['filters']['field_degree_type']['group'] = 1;
  $handler->display->display_options['filters']['field_degree_type']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_degree_type']['expose']['operator_id'] = 'field_degree_type_op';
  $handler->display->display_options['filters']['field_degree_type']['expose']['label'] = 'Degree Type';
  $handler->display->display_options['filters']['field_degree_type']['expose']['operator'] = 'field_degree_type_op';
  $handler->display->display_options['filters']['field_degree_type']['expose']['identifier'] = 'field_degree_type';
  $handler->display->display_options['filters']['field_degree_type']['expose']['multiple'] = TRUE;
  $handler->display->display_options['filters']['field_degree_type']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
  );
  $handler->display->display_options['filters']['field_degree_type']['expose']['reduce'] = 0;
  /* Filter criterion: Indexed User: Relocation */
  $handler->display->display_options['filters']['field_relocation']['id'] = 'field_relocation';
  $handler->display->display_options['filters']['field_relocation']['table'] = 'search_api_index_default_candidate';
  $handler->display->display_options['filters']['field_relocation']['field'] = 'field_relocation';
  $handler->display->display_options['filters']['field_relocation']['value'] = array();
  $handler->display->display_options['filters']['field_relocation']['group'] = 1;
  $handler->display->display_options['filters']['field_relocation']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_relocation']['expose']['operator_id'] = 'field_relocation_op';
  $handler->display->display_options['filters']['field_relocation']['expose']['label'] = 'Relocation';
  $handler->display->display_options['filters']['field_relocation']['expose']['operator'] = 'field_relocation_op';
  $handler->display->display_options['filters']['field_relocation']['expose']['identifier'] = 'field_relocation';
  $handler->display->display_options['filters']['field_relocation']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
  );
  $handler->display->display_options['filters']['field_relocation']['expose']['reduce'] = 0;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['exposed_block'] = TRUE;
  $handler->display->display_options['path'] = 'searchapi-candidate';

  /* Display: Content pane */
  $handler = $view->new_display('panel_pane', 'Content pane', 'panel_pane_1');
  $export['searchapi_candidate'] = $view;

  $view = new view();
  $view->name = 'user_feedback_profile';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'profile';
  $view->human_name = 'User Feedback Profile';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Profile: Profile ID */
  $handler->display->display_options['fields']['pid']['id'] = 'pid';
  $handler->display->display_options['fields']['pid']['table'] = 'profile';
  $handler->display->display_options['fields']['pid']['field'] = 'pid';
  /* Contextual filter: Profile: User uid */
  $handler->display->display_options['arguments']['user']['id'] = 'user';
  $handler->display->display_options['arguments']['user']['table'] = 'profile';
  $handler->display->display_options['arguments']['user']['field'] = 'user';
  $handler->display->display_options['arguments']['user']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['user']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['user']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['user']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Profile: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'profile';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'evaluation' => 'evaluation',
  );

  /* Display: Rules */
  $handler = $view->new_display('views_rules', 'Rules', 'views_rules_1');
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['rules_parameter'] = array(
    'user' => array(
      'enabled' => 1,
      'type' => 'integer',
      'label' => 'Profile: User cand uid',
      'name' => 'field_user_id_target_id',
    ),
  );
  $handler->display->display_options['rules_variables'] = array(
    'pid' => array(
      'enabled' => 1,
      'rendered' => 0,
      'type' => 'profile2',
      'label' => 'Profile ID',
      'name' => 'pid',
    ),
  );
  $export['user_feedback_profile'] = $view;

  $view = new view();
  $view->name = 'wishlist';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Wishlist';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Candidate Wishlist';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'access user profiles';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '10';
  $handler->display->display_options['style_plugin'] = 'grid';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['style_options']['row_class_special'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  /* No results behavior: Global: Text area */
  $handler->display->display_options['empty']['area']['id'] = 'area';
  $handler->display->display_options['empty']['area']['table'] = 'views';
  $handler->display->display_options['empty']['area']['field'] = 'area';
  $handler->display->display_options['empty']['area']['empty'] = TRUE;
  $handler->display->display_options['empty']['area']['content'] = 'No results found. ';
  $handler->display->display_options['empty']['area']['format'] = 'full_html';
  /* Relationship: Flags: wishlist */
  $handler->display->display_options['relationships']['flag_content_rel']['id'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['table'] = 'users';
  $handler->display->display_options['relationships']['flag_content_rel']['field'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['flag_content_rel']['flag'] = 'wishlist';
  $handler->display->display_options['relationships']['flag_content_rel']['user_scope'] = 'any';
  /* Relationship: Flags: User */
  $handler->display->display_options['relationships']['uid']['id'] = 'uid';
  $handler->display->display_options['relationships']['uid']['table'] = 'flagging';
  $handler->display->display_options['relationships']['uid']['field'] = 'uid';
  $handler->display->display_options['relationships']['uid']['relationship'] = 'flag_content_rel';
  $handler->display->display_options['relationships']['uid']['required'] = TRUE;
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['label'] = '';
  $handler->display->display_options['fields']['name']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['name']['alter']['ellipsis'] = FALSE;
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['link_to_user'] = 'user';
  /* Field: Flags: Flag link */
  $handler->display->display_options['fields']['ops']['id'] = 'ops';
  $handler->display->display_options['fields']['ops']['table'] = 'flagging';
  $handler->display->display_options['fields']['ops']['field'] = 'ops';
  $handler->display->display_options['fields']['ops']['relationship'] = 'flag_content_rel';
  /* Contextual filter: User: Uid */
  $handler->display->display_options['arguments']['uid']['id'] = 'uid';
  $handler->display->display_options['arguments']['uid']['table'] = 'users';
  $handler->display->display_options['arguments']['uid']['field'] = 'uid';
  $handler->display->display_options['arguments']['uid']['relationship'] = 'uid';
  $handler->display->display_options['arguments']['uid']['default_action'] = 'not found';
  $handler->display->display_options['arguments']['uid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['uid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['uid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['uid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['uid']['specify_validation'] = TRUE;
  $handler->display->display_options['arguments']['uid']['validate']['type'] = 'user';
  $handler->display->display_options['arguments']['uid']['validate_options']['restrict_roles'] = TRUE;
  $handler->display->display_options['arguments']['uid']['validate_options']['roles'] = array(
    5 => '5',
  );
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'user/%/wishlist';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Candidate Wishlist';
  $handler->display->display_options['menu']['weight'] = '3';
  $handler->display->display_options['menu']['name'] = 'user-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $handler->display->display_options['tab_options']['title'] = 'User Profile';
  $handler->display->display_options['tab_options']['weight'] = '0';
  $export['wishlist'] = $view;

  return $export;
}
