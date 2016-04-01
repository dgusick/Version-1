<?php 
$form['field_can_approved_recruiter_uid']['#access'] = false; 

//based on role hide certain fields 

//hide($form['account']['pass']);

hide($form['field_picture_url']);
hide($form['field_linkedin_user_id']);
hide($form['field_user_candidate_uid']);
hide($form['field_approve_link']);

if(isset($form['field_birthday']))
  hide($form['field_birthday']); 
//hide($form['field_gender']); 
//hide($form['field_marital_status']);

if(isset($form['field_user_about']))
  hide($form['field_user_about']); 
  
  hide($form['field_corporate_email']); 
  hide($form['field_specialties']); 
  hide($form['field_job_level']); 
  hide($form['field_specialization']); 
  hide($form['field_role_department']); 
  hide($form['field_job_level']);  
  hide($form['field_certification']); 
  hide($form['field_technology']); 
  hide($form['field_summary']); 
  hide($form['field_company_past']);
  //print_r($form['field_city']); 
   
//field_linkedin_user_id
//field_user_candidate_uid
//field_approve_link

print drupal_render_children($form);  
?>
