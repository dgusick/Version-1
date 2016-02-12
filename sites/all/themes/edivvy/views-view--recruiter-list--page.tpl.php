<?php
    $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
    global $user;
 
?>
        
        <!--
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-9">
                <h2>List of recruiters</h2>
                <span class="text-muted">You can follow recruiters to be notified of new profiles</span>
            </div>
        </div>
        -->

        <div class="wrapper wrapper-content animated fadeInRight pd-top-content">
            <div class="row">
                
                <?php  foreach ($view->style_plugin->rendered_fields as $delta => $item): ?>
                
                <?php 
                $count_post = (db_query("SELECT COUNT(DISTINCT(n.nid)) FROM {node} n WHERE n.type='requirement' AND n.status=1 and uid = ".$item['uid'])->fetchField());
                
                    //$flags = flag_get_counts('user', $item['uid']); //print_r( $flags);
                    //print flag link                       
                    //print flag_create_link('follow', $item['uid']);
                    $following = $flags ? ($flags['follow']) : 0; 
                    $user_load = user_load($item['uid']); 
                    if($item['field_picture_url'] != ''){
                    	$url_pic = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.$item['field_picture_url'].'" />';  
                    }else{
                        
                        if($user_load->field_user_picture){
                            $field_user_picture = file_create_url($user_load->field_user_picture[LANGUAGE_NONE][0]['uri']);
                            $url_pic = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.$field_user_picture.'" />'; 
                        }else{ 
                        $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
                        $url_pic = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
                      }
                        
                        //$url_pic = $base_theme_url.'/img/default-avatar.png';
                    }
                    if($user->uid!=$item['uid'])
                    {
                
                $user_load = user_load($item['uid']);
                $user_link = drupal_get_path_alias('user/' . $item['uid']);
                ?>
                
                <div class="col-lg-4">
                    <div class="contact-box panel widget">
                     <div class="panel-body">
                       <div class="row  row-table">
                       
                                <div class="col-xs-5 text-center">
                                <a href="<?php echo $user_link ?>">
                                   <?php echo $url_pic ?></a>
                                      
                                        <div class="m-t-xs font-bold">Recruiter</div>
                                   
                                </div>
                                
                                <div class="col-xs-7">
                                   <div class="pull-right">
	                                   <?php print $item['ops']; ?>
	                               </div>
                                      <h4 class="mt0"><?php print $item['name']; ?></h4>
                                       <!--   <p><i class="fa fa-linkedin-square"></i> <?php print $item['field_first_name']; ?>.<?php print $item['field_last_name']; ?></p> -->
                                    <p class="mb-sm"><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> <?php print $item['mail']; ?></a></p>
                                  
                                </div>
                                
                               
                            </div>
                         
                             </div>
                              
                            <?php $flag = flag_get_flag('follow'); ?>
                          
                            <div class="panel-body bg-inverse" style="">
                              <div class="row row-table text-center">
                                <div class="col-xs-4">
                                   <!-- <span class="line">5,3,9,6,5,9,7,3,5,2,5,6,7,7,2,2</span>-->
                                   <p class="m0 h3"><?php echo $count_post; ?></p>
                                    <p class="m0 text-muted">Posts</p> 
                                </div>
                                <div class="col-xs-4">
                                    <!--<span class="line">5,3,9,6,5,9,7,3,5,2</span>-->
                                    <p class="m0 h3"><?php echo $flag->get_user_count($item['uid']);  ?></p>
                                     <p class="m0 text-muted">Following</p> 
                                </div>
                                <div class="col-xs-4">
                                   <!-- <span class="line">5,3,2,-1,-3,-2,2,3,5,2</span>-->
                                   <p class="m0 h3"><?php echo $flag->get_count($item['uid']);  ?></p>
                                    <p class="m0 text-muted">Followers</p> 
                                </div>
                              </div>
                            </div>
                              
                        
                       
                    <div class="clearfix"></div>
                </div>
                </div>
                <?php } ?>
                <?php endforeach; ?>
                
                
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>
                </div>
            </div>
        </div>