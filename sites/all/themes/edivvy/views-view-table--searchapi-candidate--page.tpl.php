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
?>
<div class="clients-list">
                                <ul class="nav nav-tabs">
                                    <span class="pull-right small text-muted"><?php echo $view->total_rows; ?> results</span>
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Profiles</a></li>
                                    <!--<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Other</a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="full-height-scroll">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
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
                                                    
                                                    //get node evaluation by field_recruiter_id
                                                    $query = new EntityFieldQuery;
                                                    $query->entityCondition('entity_type', 'node')
                                                      ->entityCondition('bundle', 'evaluation')
                                                      ->fieldCondition('field_user_id', 'value', $item['uid'])
                                                      ->fieldCondition('field_recruiter_id', 'value', $user->uid);
                                                    
                                                    $results = $query->execute();
                                                    
                                                    $recruiter_id = ""; $evaluated_node_id = ''; 
                                                    $is_evaluated = false; 
                                                    if (isset($results['node']) && count($results['node'])) {
                                                       $is_evaluated = true;
                                                       $list_evaluated_nodes =array_keys($results['node']); 
                                                       $evaluated_node_id = $list_evaluated_nodes[0]; 
                                                       
                                                    }

                                                    //echo $node_id;
                                                    
                                                    $compare = strtolower($item['field_skills']);
                                                    $keyword = strtolower($search_value);
                                                    
                                                   	//echo $compare;	?>
                                                    
                                                    
	                                                    	<tr style="">
	                                                    
	                                                        <td class="client-avatar"> <?php $row['field_user_picture']; ?>  </td>
	                                                        <td><a data-toggle="tab" href="#contact-1" class="client-link"><?php print $item['name']; ?></a></td>
	                                                        <td> <?php print $item['field_job_level']; ?> </td>
	                                                        <td> <?php print $item['field_role_department']; ?> </td>
	                                                        
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
	        																?> <a href="<?php echo url('node/'.$evaluated_node_id.'') ?>" type="button"  class="btn btn-xs btn-outline  btn-success " style="width: 140px;"> View Evaluation </a>  <?php	
	        															} else if( $has_access )
	        															{
	        																?> <a href="<?php echo url('node/add/evaluation/'.$uid.'') ?>" type="button"  class="btn btn-xs btn-outline  btn-success " style="width: 140px;"> Create New Evaluation </a> <?php	
	        															} else if( $pending_access )
	        															{
	        																?> <a href="#" type="button"  class="btn btn-xs btn-outline  btn-success " style="width: 140px;"> Request Pending </a> <?php	
	        															} 
	        															else
	        															{ //request-access/'.$uid.''  relationship/204/request/2?destination=user/204 
	                                                                		?> <a href="<?php echo url('relationship/'.$uid.'/request/2', array('query'=>array('destination'=>'candidate-search'))) ?>" type="button" class="btn btn-xs btn-outline btn-danger" style="width: 140px;"> Request Access </a> <?php 
	                                                                	}
	        															
	                                                                ?>
	                                                                
	                                                                
	                                                                
	                                                                <?php 
	                                                                
	                                                                //echo $recruiter_id;
	                                                                //echo $user->uid;
	                                                                
	                                                                ?>
	                                                                
	                                                                
	                                                                <a data-toggle="button" type="button" class="btn btn-xs btn-outline btn-danger save-btn"><i class="fa fa-heart-o"></i> Save </a>
	                                                                <a data-toggle="button" type="button"  class="btn btn-xs btn-outline  btn-success contact-btn "><i class="fa fa-envelope-o"></i> Contact </a>
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
                            
 