<?php

/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
 $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
    
?>

 <div class="ibox-content">
 <h2 class="pull-left">Search results  <a href="javascript: void()" onclick="javascript: jQuery('#block-views-saved-search-block-1').toggle();" style="font-size:14px;padding-left: 20px;">View Saved Searches</a></h2>  
 <br>
 <br>
                       <div class="clients-list">
                              
                                <ul class="nav nav-tabs">
                                    <span class="pull-right small text-muted"><?php echo $view->total_rows; ?> results</span>
                                    <!--<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Profiles</a></li> -->
                                    <!--<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Other</a></li>-->
                                </ul>
                                
                                    <div id="tab-1" class="tab-pane active">
                                         <div class="panel panel-default">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?>>
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  
                                                    <tbody>
                                                    
                                                    
                                                    <?php
                                                    	$count_result_search = 0;
                                                    	$num = 0;
                                                    	$already_matched = array(); 
                                                    	
                                                    ?>
                                                    <?php  foreach ($rows as $row_count => $row):
                                                    //foreach ($view->style_plugin->rendered_fields as $delta => $item): ?>
                                                   
                                                    <?php
                                                    //print_R($row); 
                                                        $item = $row; 
                                                         
                                                        if($user->uid != $item['uid'])
                                                        {
                                                    ?>
                                                    
                                                    <?php
                                                    $uid = $item['uid'];
                                                    //echo $uid;
                                                    $item_user_eval  = profile2_load_by_user($uid, 'evaluation'); 
                                                    $eval_ratings = array();
                                                    if($item_user_eval) {
                                                    	if($item_user_eval->field_skills_rating && isset($item_user_eval->field_skills_rating['und']) ) { //hard skills
                                                    	  foreach($item_user_eval->field_skills_rating['und'] as $hard_skill_arr) { 
                                                    	    $hskid = $hard_skill_arr['value']; 
                                                    	    if($hskid) { 
                                                    	       $hsk_items = entity_load('field_collection_item', array($hskid)); 
                                                    	       if($hsk_items){
                                                    	       	  //print_r($hsk_items); 
                                                    	       	  $hsk_item = $hsk_items[$hskid]; 
                                                    	       	  if($hsk_item && $hsk_item->field_skill_1 && $hsk_item->field_skill_1['und']) { 
                                                    	       	    $eval_ratings[] = $hsk_item->field_skill_1['und'][0]['rating']; 
                                                    	       	  	
                                                    	       	  }
                                                    	       }

                                                    	    }
                                                    	  	
                                                    	  }
                                                    	  
                                                    	}
                                                    	
                                                    	if($item_user_eval->field_sskill_1_rating && $item_user_eval->field_sskill_1_rating['und'] ) {
                                                    	  $eval_ratings[] = $item_user_eval->field_sskill_1_rating['und'][0]['rating']; 
                                                    	}
                                                    	if($item_user_eval->field_sskill_2_rating && $item_user_eval->field_sskill_2_rating['und'] ) {
                                                    	  $eval_ratings[] = $item_user_eval->field_sskill_2_rating['und'][0]['rating']; 
                                                    	}
                                                    	if($item_user_eval->field_sskill_3_rating && $item_user_eval->field_sskill_3_rating['und'] ) {
                                                    	  $eval_ratings[] = $item_user_eval->field_sskill_3_rating['und'][0]['rating']; 
                                                    	}
                                                    	if($item_user_eval->field_sskill_4_rating && $item_user_eval->field_sskill_4_rating['und'] ) {
                                                    	  $eval_ratings[] = $item_user_eval->field_sskill_4_rating['und'][0]['rating']; 
                                                    	}
                                                    	if($item_user_eval->field_sskill_5_rating && $item_user_eval->field_sskill_5_rating['und'] ) {
                                                    	  $eval_ratings[] = $item_user_eval->field_sskill_5_rating['und'][0]['rating']; 
                                                    	}
                                                    	
                                                    }
                                                    //print_r($item_user_eval);
                                                    //get node evaluation by field_recruiter_id
                                                    $query = new EntityFieldQuery;
                                                    $query->entityCondition('entity_type', 'node')
                                                      ->entityCondition('bundle', 'evaluation')
                                                      ->fieldCondition('field_user_id', 'target_id', $item['uid'])
                                                      ->fieldCondition('field_recruiter_id', 'value', $user->uid);
                                                    
                                                    $results = $query->execute(); 
                                                    
                                                    $recruiter_id = ""; $evaluated_node_id = ''; 
                                                    $is_evaluated = false; 
                                                    if (isset($results['node']) && count($results['node'])) { //last eval ?
                                                       $is_evaluated = true;
                                                       $list_evaluated_nodes =array_keys($results['node']); 
                                                       $evaluated_node_id = $list_evaluated_nodes[0]; 
                                                       
                                                       //$evnode = node_load($evaluated_node_id); 
                                                       //print_r($evnode); 
                                                    }

                                                    if($is_evaluated == false && isset($item['mail']) && $item['mail'] ) { 
                                                      $query = new EntityFieldQuery; 
                                                       $query->entityCondition('entity_type', 'node')
                                                        ->entityCondition('bundle', 'evaluation')
                                                        ->fieldCondition('field_recruiter_id', 'value', $user->uid)
                                                        ->fieldCondition('field_candidate_email', 'value', $item['mail'] );  
                                                       
                                                       $results = $query->execute(); 
                                                    
                                                        $recruiter_id = ""; $evaluated_node_id = ''; 
                                                        $is_evaluated = false; 
                                                        if ($results && isset($results['node']) && count($results['node'])) {
                                                           $is_evaluated = true; 
                                                           
                                                           $list_evaluated_nodes =array_keys($results['node']); 
                                                           $evaluated_node_id = $list_evaluated_nodes[0]; 
                                                        } 
                                                      }
                                                      //.. 

                                                    //echo $node_id;
                                                    if($item['field_user_picture'] != ''){
                                                        	$url_pic = $item['field_picture_url'];
                                                        }else{ 
                                                        	$url_pic = '<img class="img-responsive img-circle" src="'. $base_theme_url.'/img/default-avatar.png'.'" />';
                                                        }
                                                        
                                                    $compare = strtolower($item['field_skills']);
                                                    $keyword = strtolower($search_value);
                                                    
                                                   	//echo $compare;#contact-1
                                                   	?>
                                                    
                                                    
	                                                    	<tr>
	                                                    
	                                                        <td><div class="media"> <?php echo $url_pic; ?></div> </td>
	                                                        <td><a href="<?php echo url('user/'.$item['uid']); ?>" class="client-link">Edivvy candidate <?php print $item['uid']; //$item['field_first_name']; //name 
	                                                        ?></a></td>
	                                                        <td class="job_title"> <?php print $item['field_job_title']; //job_level 
	                                                        ?> </td>
	                                                        <td class="function_expertise"> <?php print $item['field_expertise'];// role_department 
	                                                        ?> </td>
	                                                        <td><?php if($eval_ratings){ $meval_rating = max($eval_ratings); 
	                                                        	echo $meval_rating/20;
	                                                        } ?>&nbsp;</td>
	                                                        <td class="client-status">
	                                                            <span> <?php // print $item['ops']; ?>  
	                                                                <?php
	                                                                	 
	        															//echo $field_user_candidate_uid;
	        															//echo $item['uid'];
	        															//print_r($field_user_candidate_uid_explode);
	        															
	        															//echo $item['inviter'];
	        															//echo $user->uid;
	        															$has_access = false; $pending_access = false; 
	                                                                $relationships = user_relationships_load(array('requester_id' => $user->uid, 'requestee_id' => $item['uid']));
                                                                     //print_r($relationships); 
                                                                     foreach($relationships as $relation) { 
                                                                         
                                                                         if($relation->approved) { 
                                                                             $has_access = true;  
                                                                         } else { 
                                                                              $pending_access = true;
                                                                         }
                                                                     } 
	        															?>
	        														
	        															<?php 
	        															//check if evaluation exist for this user by this recruiter __ 
	        															 
	        															//if current user is the recruiter that invited the candidate
	        														  if( $has_access && $is_evaluated )
	        															{
	        																?> <a href="<?php echo url('node/'.$evaluated_node_id.'') ?>" type="button"  class="btn btn-xs   btn-success " style="width: 140px;"> View Evaluation </a>  <?php	
	        															} else if( $has_access )
	        															{
	        																?> <a href="<?php echo url('node/add/evaluation/'.$uid.'') ?>" type="button"  class="btn btn-xs   btn-success " style="width: 140px;"> Create New Evaluation </a> <?php	
	        															} else if( $pending_access )
	        															{
	        																?> <a href="#" type="button"  class="btn btn-xs   btn-success " style="width: 140px;"> Request Pending </a> <?php	
	        															} 
	        															else
	        															{ //request-access/'.$uid.''  relationship/204/request/2?destination=user/204 
	                                                                		?> <a href="<?php echo url('relationship/'.$uid.'/request/2', array('query'=>array('destination'=>'searchapi-candidate'))) ?>" type="button" class="btn btn-xs btn-green" style="width: 140px;">Engage </a> <?php 
	                                                                	}
	        															
	                                                                ?>
	                                                                </span>
	                                                                </td>
	                                                                
	                                                                <td>
	                                                                <span>
	                                                                <?php 
	                                                                
	                                                                //echo $recruiter_id;
	                                                                //echo $user->uid;
	                                                                
	                                                               
	                                                                         $wishlist_link = flag_create_link('wishlist', $uid);
	                                                                         
	                                                                         if($wishlist_link  != '' ) { ?>
	                                                                           <div data-toggle="button" type="button" class="btn btn-xs  btn-success wishlist" style="width: 76px;"><i class="fa fa-heart-o"></i>
	                                                                               <?php echo $wishlist_link; ?>
	                                                                            </div>
	                                                                            <?php } 
	                                                                  
	                                                                ?>
	                                                                
	                                                                
	                                                               <!-- <a data-toggle="button" type="button" class="btn btn-xs  btn-danger save-btn"><i class="fa fa-heart-o"></i> Save </a> -->
	                                                               <!-- <a data-toggle="button" type="button"  class="btn btn-xs   btn-success contact-btn "><i class="fa fa-envelope-o"></i> Contact </a> -->
	                                                            </span>
	                                                        </td>
                                                    	</tr>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                               
                             </div>
                            </div>
                            
 