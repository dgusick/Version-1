<?php
  global $user;
  $user_load = user_load($user->uid); 
  //print_r($user->uid); 
  //get current uid from url
  if(arg(1)!= '') { 
  $uid_get = arg(1); 
  
  $user_get = user_load($uid_get); 
  } else {
  	$user_get = $user_load; 
  }
  
  //print_r($user_get);
  $is_rec = false; $logged_is_rec = false; 
  $is_can = false; $logged_is_can = false; 
  
  $is_my_profile = false; 
  if( $user_load->uid == $user_get->uid ) { $is_my_profile = true;  } 
  $contact_display = true; 
 
 if(isset($user_load->roles[5])) {$logged_is_rec = true;  } 
 if(isset($user_load->roles[6])) {$logged_is_can = true;  } 
 
 $can_evaluations = array(); 
 if(isset($user_get->roles[5])) {$is_rec = true;  } 
 if(isset($user_get->roles[6])) {$is_can = true; $contact_display = false; 
 
 	$my_inviter = db_query("select uid from {invite} where invitee =  ".$user_get->uid)->fetchField(); //logged in user 
 	
 	
 	$query = new EntityFieldQuery;
        $query->entityCondition('entity_type', 'node')
          ->entityCondition('bundle', 'evaluation')
          ->fieldCondition('field_user_id', 'value', $user_get->uid); // 
        $results = $query->execute(); 
        if($results && $results['node'] ) {  
          $can_evaluations = array_keys($results['node']); 
        } 
 } 
 
    /* 
 //check if connected -- 
 $field_approved_recruiter_uid = ''; 
 //print_r($field_approved_recruiter_uid); 
 //get field_approved_recruiter_uid
  if(!empty($user_get->field_approved_recruiter_uid)){
    $field_approved_recruiter_uid =  $user_get->field_approved_recruiter_uid['und'][0]['value'];
  }
  
  if(isset($my_inviter) && $my_inviter) 
   $field_approved_recruiter_uid = $my_inviter.','.$field_approved_recruiter_uid; 
   
  //explode array field_approved_recruiter_uid
  $field_approved_recruiter_uid_explode = array_filter (explode(",",$field_approved_recruiter_uid));
  
  //explode array field_approved_recruiter_uid
  $field_user_candidate_uid_explode = array_filter (explode(",",$user_load->field_user_candidate_uid['und'][0]['value']));
  
  //get count connection without own profile
if($field_approved_recruiter_uid!="")
    {
        $count_connection = 0;
        for($i=0;$i<count($field_approved_recruiter_uid_explode);$i++)
            {
                $recruiter_uid = $field_approved_recruiter_uid_explode[$i];

                //check if list contains user own account
                if($recruiter_uid!=$user_load->uid)
                    {
                        $count_connection++;
                    }
            }
        $total_connection = $count_connection;
    }
 else{
    $total_connection = 0;
 }
	
  //echo $user_get->uid;
  //field_user_candidate_uid_explode
  //print_r($field_user_candidate_uid_explode);
  
  if(in_array($user->uid, $field_approved_recruiter_uid_explode) or $user_load->uid == $user_get->uid or in_array($user_get->uid, $field_user_candidate_uid_explode)) { 
  	$contact_display = true; //this recruiter is in candidates connection__ 
  }  
  
  $has_access = false; $pending_access = false; 
  //logged in requester -- means recruiter logged in __ 
    $relationships_logged_in_rec = user_relationships_load(array('requester_id' => $user->uid, 'requestee_id' => $user_get->uid )); 
     //print_r($relationships); 
     foreach($relationships_logged_in_rec as $relation) { 
         
         if($relation->approved) { 
             $has_access = true;  
             $contact_display = true; 
         } else { 
              $pending_access = true;
         }
     }
     
 //get user fields  
 if($user_get->field_picture_url)
 {
    $pic = '<img class="img-circle" src="'.$user_get->field_picture_url['und'][0]['value'].'" />';  
 }
 else
 {
     if($user_get->field_user_picture){
            $field_user_picture = file_create_url($user_get->field_user_picture[LANGUAGE_NONE][0]['uri']);
            $pic = '<img class="img-circle" src="'.$field_user_picture.'" />'; 
     }else{ 
        $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
        $pic = '<img class="img-circle" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
      }
 }
 
  //get full_name
  $full_name = $user_get->name; 
  if (!empty($user_get->field_first_name) ) { //&& !empty($user_get->field_last_name) 
    $full_name = $user_get->field_first_name['und'][0]['value'] . ' ' . $user_get->field_last_name['und'][0]['value'];
  }
  if( !$contact_display ) { 
  	$full_name = substr($full_name , 0, 3) .'..'; 
  }
  //get field_user_about
  if(!empty($user_get->field_user_about)){
    $field_user_about =  $user_get->field_user_about['und'][0]['value'];
  }
  
  //get field_phone
  if(!empty($user_get->field_phone)){
    $field_phone =  $contact_display ? $user_get->field_phone['und'][0]['value'] : 'Hidden';
  }
  
  //get field_skype
  if(!empty($user_get->field_skype)){
    $field_skype =  $contact_display ? $user_get->field_skype['und'][0]['value'] : 'Hidden';
  }
  
  //get field_twitter_account
  if(!empty($user_get->field_twitter_account)){
    $field_twitter_account =  $contact_display ? $user_get->field_twitter_account['und'][0]['value'] : 'Hidden';
  }
  
  //get field_location
  if(!empty($user_get->field_location)){
    $field_location =  $user_get->field_location['und'][0]['value'];
  }
  
  //get field_summary
  if(!empty($user_get->field_summary)){
    $field_summary =  $user_get->field_summary['und'][0]['value'];
  }
  
  //get field_gender
  if(!empty($user_get->field_gender)){
    $field_gender =  $user_get->field_gender['und'][0]['value'];
  }
  
  //get field_birthday
  if(!empty($user_get->field_birthday)){
    $field_birthday =  $user_get->field_birthday['und'][0]['value'];
  }
  
  //get field_marital_status
  if(!empty($user_get->field_marital_status)){
    $field_marital_status =  $user_get->field_marital_status['und'][0]['value'];
  }
  
  //get field_corporate_email
  if(!empty($user_get->field_corporate_email)){
    $field_corporate_email = $contact_display ? $user_get->field_corporate_email['und'][0]['value'] : 'Hidden'; 
  }
  
  //get field_linkedin_user_id
  if(!empty($user_get->field_linkedin_user_id)){
    $field_linkedin_user_id =  $contact_display ? $user_get->field_linkedin_user_id['und'][0]['value']  : 'Hidden'; 
  }
  
  //get field_agree_term
  if(!empty($user_get->field_agree_term)){
    $field_agree_term =  $user_get->field_agree_term['und'][0]['value'];
  }
  
  //field_private_email
  $field_private_email = $contact_display ? $user_get->mail : 'Hidden';
  
  //setting hidden to Basic Information fields
  
    
    
     
     if(!empty($user_load->field_recruiter_status)){
    $field_recruiter_status =  $user_load->field_recruiter_status['und'][0]['value'];
   	
   	if($field_recruiter_status=="Inactive" and ($user_load->uid != $user_get->uid) and ($contact_display == false) )
   	{ //$my_inviter != $user_load->uid 
   		$full_name = "Hidden";
   		$field_gender = "Hidden";
   		$field_birthday = "Hidden";
   		$field_marital_status = "Hidden";
   		$field_phone = "Hidden";
   		$field_corporate_email = "Hidden";
   		$field_private_email = "Hidden";
   		$field_linkedin_user_id = "Hidden";
   		$field_twitter_account = "Hidden";
   		$field_skype = "Hidden";
   		
   	
   	}
  }
   */
  
  $relationships_profile_conn_list = false;  
                            
    if($is_rec) { 
      $relationships_profile_conn_list = user_relationships_load(array('requester_id' => $user_get->uid )); 
      //'requestee_id' => $user_get->uid requester_id
    } else { 
      $relationships_profile_conn_list = user_relationships_load(array('requestee_id' => $user_get->uid )); 
      
    } 
    
?>

    <div class="wrapper wrapper-content animated fadeInRight pd-top-content">
       <div class="row">
              <?php
                                                //get list connection
                                                 if($relationships_profile_conn_list != "")
                                {
                                    foreach($relationships_profile_conn_list as $req_data) 
                                    {
                                       if($is_rec) {
                                       	   $recruiter_uid = $req_data->requestee_id; 
                             
                                       } else {
                                       	$recruiter_uid = $req_data->requester_id;  
                                       	}
                                       
                                             
                                                        //load recruiter user
                                                        $load_recruiter = user_load($recruiter_uid);
                                                        //print_r($load_recruiter);
                                                        
                                                        //check if list contains user own account
				                                          
	                                                        //get all fields
	                                                        //full_name
	                                                        $full_name_connection = $load_recruiter->name; 
	                                                        if (!empty($load_recruiter->field_first_name) ) { //&& !empty($load_recruiter->field_last_name)
	                                                            $full_name_connection = $load_recruiter->field_first_name['und'][0]['value'] . ' ' . $load_recruiter->field_last_name['und'][0]['value'];
	                                                        }
	                                                        
	                                                        //linkedin
	                                                        //get field_linkedin_user_id
	                                                        if(!empty($load_recruiter->field_linkedin_user_id)){
	                                                            $field_linkedin_user_id_connection =  $load_recruiter->field_linkedin_user_id['und'][0]['value'];
	                                                        }
	                                                        
	                                                        if($load_recruiter->field_picture_url)
	                                                        {
	                                                            $pic_recruiter = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.$load_recruiter->field_picture_url['und'][0]['value'].'" />';  
	                                                        }
	                                                        else
	                                                        {
	                                                            if($load_recruiter->field_user_picture){
	                                                              	   $field_user_picture = file_create_url($load_recruiter->field_user_picture[LANGUAGE_NONE][0]['uri']);
                                                                       $pic_recruiter = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.$field_user_picture.'" />'; 
	                                                            }else{ 
	                                                              	 $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
	                                                              	 $pic_recruiter = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
	                                                            }
	                                                        }
	                                                          
	                                                          ?>
	                                                            <div class="col-lg-4">
	                                                                <div class="contact-box panel widget" style="min-height: 195px;">
	                                                                 <div class="panel-body">
	                                                                  <div class="row row-table">
	                                                                    <div class="col-xs-6 text-center">
	                                                                        <a href="<?php echo url("user/".$load_recruiter->uid) ?>"><?php echo $pic_recruiter ?></a>
	                                                                                    <div class="m-t-xs font-bold"><?php if($is_rec)  { echo 'Candidate'; } else { echo 'Recruiter'; } ?><!-- , Veritas --></div>
	                                                                     </div>
	                                                                      <div class="col-xs-6">
	                                                                        <h3 class="mt0"><a href="<?php echo url("user/".$load_recruiter->uid) ?>"><?php echo $full_name_connection ?></a></h3>
	                                                                        	                                                                               <!-- <p><i class="fa "></i> <?php echo $load_recruiter->field_first_name['und'][0]['value'].".".$load_recruiter->field_last_name['und'][0]['value'] ?></p> -->
	                                                                                <?php if( $is_my_profile && $req_data->approved ) { //fa-linkedin-square  ?>
	                                                                                <p class="mb-sm"><em class="fa fa-envelope fa-fw"></em> <a href="mailto:<?php echo $load_recruiter->mail ?>"> <?php echo $load_recruiter->mail ?></a></p>
	                                                                                <?php }
	                                                                                
	                                                                                if( !$req_data->approved && $is_my_profile) { echo 'Approval pending'; } ?>
	                                                                                
	                                                                                 <?php
	                                                                                  $has_access = false; $pending_access = false; 
	                                                                                 if($req_data->approved) { 
                                                                             $has_access = true;  
                                                                         } else { 
                                                                              $pending_access = true;
                                                                         }
                                                                         
                                                                         
	                                                                                
	                                                                                  $query = new EntityFieldQuery;
                                                    $query->entityCondition('entity_type', 'node')
                                                      ->entityCondition('bundle', 'evaluation')
                                                      ->fieldCondition('field_user_id', 'target_id', $load_recruiter->uid)
                                                      ->fieldCondition('field_recruiter_id', 'value', $user->uid);
                                                    
                                                    $results = $query->execute();
                                                    
                                                    $recruiter_id = ""; $evaluated_node_id = ''; 
                                                    $is_evaluated = false; 
                                                    if (isset($results['node']) && count($results['node'])) {
                                                       $is_evaluated = true;
                                                       $list_evaluated_nodes =array_keys($results['node']); 
                                                       $evaluated_node_id = $list_evaluated_nodes[0]; 
                                                       
                                                    }
                                                    
                                                                    if( $has_access && $is_evaluated )
	        															{
	        																?> <a href="<?php echo url('node/'.$evaluated_node_id.'') ?>" type="button"  class="btn btn-xs  btn-success " style="width: 140px;"> View Evaluation </a>  <?php	
	        															} else if( $has_access )
	        															{
	        																?> <a href="<?php echo url('node/add/evaluation/'.$load_recruiter->uid.'') ?>" type="button"  class="btn btn-xs   btn-success " style="width: 140px;"> Create New Evaluation </a> <?php	
	        															}  
	        															
                                                    
	                                                                                 ?>
	                                                                      </div>
	                                                                   </div>
	                                                                        
	                                                                       
	                                                                    
	                                                                     </div>
	                                                                      <div class="clearfix"></div>
	                                                                </div>
	                                                            </div>
	                                                          <?php
				                                        
                                                    }
                                                }
                                            ?>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary btn-block m-t btn-read-more"><i class="fa fa-arrow-down"></i> Show More</button>
                                            </div>
                                 </div>
                                   