<?php
    global $user;
    global $base_url;
    $current_user = user_load($user->uid);
    
    //check user's role
    if(array_key_exists(5, $user->roles))
    {
        $user_role = "recruiter";
    }
    if(array_key_exists(6, $user->roles))
    {
        $user_role = "candidate";
    }
    
    ?>
    <div class="content page-user">
    
        <table class="views-table cols-12" >
            <thead>
                <tr>
                  <th class="views-field views-field-created" >
                        No.          </th>
                  <th class="views-field views-field-invite-accept-link" >
                        Request Link          </th>
                  <th class="views-field views-field-joined" >
                        Status          </th>
              </tr>
    </thead>
    <?php
                        $i = 1;
                        $field_approve_link = $current_user->field_approve_link['und']['0']['value'];

                        if($field_approve_link!="")
                        {
                            if($user_role=="recruiter" or $user_role=="candidate")
                            {    
                                $field_approve_link_explode = explode(",",$field_approve_link);
                                for($j=0;$j<count($field_approve_link_explode);$j++)
                                {
                                    //echo $field_approve_link_explode[$j];
                                    //$user_request_uid = arg(1);
        		                    //$user_candidate_uid = arg(2);
        		                    //$user_approve_uid = arg(3);
        		                    $link_with_status = $field_approve_link_explode[$j];
        		                    $link_with_status_explode = explode("=",$link_with_status);
        		                    $link_no_status = $link_with_status_explode[0];
        		                    $status = $link_with_status_explode[1];
                                    
                                    //echo $link_with_status;
                                    //print_r($link_with_status_explode);
                                    
                                    ?>
                                    <tbody>
                                        <tr class="odd views-row-first">
                                            <td class="views-field views-field-created" >
                                                <?php echo $i; $i++; ?>
                                            </td>
                                            <td class="views-field views-field-invite-accept-link" >
                                                <?php echo $base_url."/request-access/".$link_no_status; ?> 
                                            </td>
                                            <td class="views-field views-field-joined" >
                                                <?php
                                                    if ($status==1){
                                                        echo "Accepted";
                                                    }
                                                    else
                                                    {
                                                        echo "Pending";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    
                                }
                            }
                        }
                        else
                        {
                        	echo "You don't have any access request	";
                        }

                        ?>

    </table>
    </div>
