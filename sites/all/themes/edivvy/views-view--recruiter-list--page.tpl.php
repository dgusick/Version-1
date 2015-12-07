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
                    
                    //print flag link                       
                    //print flag_create_link('follow', $item['uid']);
                    
                    $flag = flag_get_flag('follow');

                    //count number of followers
                    if ($flag) {
                      //print $flag->get_count($item['uid']);
                    }
                    
                    //count number of following
                    if ($flag) {
                      //print flag_get_user_flag_counts($flag, $item['uid']);
                    }
                    
                    $user_load = user_load($item['uid']);
                    if($item['field_picture_url'] != ''){
                    	$url_pic = '<img class="img-circle m-t-xs img-responsive" src="'.$item['field_picture_url'].'" />';  
                    }else{
                        
                        if($user_load->picture->uri){
                        $url_pic = theme_image_style(
                            array(
                                'style_name' => 'thumbnail',
                                'path' => $user_load->picture->uri,
                                'attributes' => array(
                                 'class' => 'img-circle m-t-xs img-responsive'
                                 )            
                            )
                        ); 
                      }else{ 
                        $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
                        $url_pic = '<img class="img-circle m-t-xs img-responsive" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
                      }
                        
                        //$url_pic = $base_theme_url.'/img/default-avatar.png';
                    }
                    if($user->uid!=$item['uid'])
                    {
                
                $user_load = user_load($item['uid']);
                $user_link = drupal_get_path_alias('user/' . $item['uid']);
                ?>
                
                <div class="col-lg-3">
                    <div class="contact-box">
                        <a href="<?php echo $user_link ?>">
                            <div class="row">
                                <div class="col-sm-4 col-sm-push-4">
                                    <div class="text-center">
                                        <?php echo $url_pic ?>
                                        <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3><strong><?php print $item['name']; ?></strong></h3>
                                    <p><i class="fa fa-linkedin-square"></i> <?php print $item['field_first_name']; ?>.<?php print $item['field_last_name']; ?></p>
                                    <p class="email_row"><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> <?php print $item['mail']; ?></a></p>
                                    <!--<div>
                                        <div>
                                            <span>Quality of candidates</span>
                                            <small class="pull-right">4.5 / 5</small>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 90%;" class="progress-bar"></div>
                                        </div>

                                        <div>
                                            <span>Quality of feedback</span>
                                            <small class="pull-right">2.5 / 5</small>
                                        </div>
                                        <div class="progress progress-mini">
                                            <div style="width: 50%;" class="progress-bar progress-bar-danger"></div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class=" m-t-lg" style="display:none;">
                                <div class="col-md-4">
                                    <!--<span class="line">5,3,9,6,5,9,7,3,5,2,5,6,7,7,2,2</span>
                                    <h5><strong>16Image9</strong> Posts</h5> -->
                                </div>
                                <div class="col-md-4">
                                    <!--<span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                    <h5><strong>28</strong> Following</h5>-->
                                </div>
                                <div class="col-md-4">
                                    <!--<span class="line">5,3,2,-1,-3,-2,2,3,5,2</span>
                                    <h5><strong>30</strong> Followers</h5>-->
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="div-btn-follow btn btn-block btn-outline btn-primary follow-btn"><?php print $item['ops']; ?></div>
                            </div>
                            <div class="clearfix"></div>
                        </a>
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