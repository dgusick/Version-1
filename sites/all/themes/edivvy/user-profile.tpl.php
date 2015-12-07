<?php
  //get current uid from url
  $uid_get = arg(1);
  $user_get = user_load($uid_get);
  //print_r($user_get);
 
 //get user fields 
 if($user_get->field_picture_url)
 {
    $pic = '<img class="img-circle" src="'.$user_get->field_picture_url['und'][0]['value'].'" />';  
 }
 else
 {
     if($user_get->picture->uri){
        $pic = theme_image_style(
            array(
                'style_name' => 'thumbnail',
                'path' => $user_get->picture->uri,
                'attributes' => array(
                 'class' => 'img-circle'
                 )            
            )
        ); 
      }else{ 
        $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
        $pic = '<img class="img-circle" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
      }
 }
 
 
  $full_name = $user_get->name; 
  if (!empty($user_get->field_first_name) && !empty($user_get->field_last_name)) {
    $full_name = $user_get->field_first_name['und'][0]['value'] . ' ' . $user_get->field_last_name['und'][0]['value'];
  }

  //get field_user_about
  if(!empty($user_get->field_user_about)){
    $field_user_about =  $user_get->field_user_about['und'][0]['value'];
  }
  
  //get field_phone
  if(!empty($user_get->field_phone)){
    $field_phone =  $user_get->field_phone['und'][0]['value'];
  }
  
  //get field_skype
  if(!empty($user_get->field_skype)){
    $field_skype =  $user_get->field_skype['und'][0]['value'];
  }
  
  //get field_twitter_account
  if(!empty($user_get->field_twitter_account)){
    $field_twitter_account =  $user_get->field_twitter_account['und'][0]['value'];
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
    $field_corporate_email =  $user_get->field_corporate_email['und'][0]['value'];
  }
  
  //get field_linkedin_user_id
  if(!empty($user_get->field_linkedin_user_id)){
    $field_linkedin_user_id =  $user_get->field_linkedin_user_id['und'][0]['value'];
  }
  
  //get field_agree_term
  if(!empty($user_get->field_agree_term)){
    $field_agree_term =  $user_get->field_agree_term['und'][0]['value'];
  }
      
  //get field_approved_recruiter_uid
  if(!empty($user_get->field_approved_recruiter_uid)){
    $field_approved_recruiter_uid =  $user_get->field_approved_recruiter_uid['und'][0]['value'];
  }
    
  //explode array field_approved_recruiter_uid
  $field_approved_recruiter_uid_explode = explode(",",$field_approved_recruiter_uid);
  if($field_approved_recruiter_uid!=""){
        $total_connection = count($field_approved_recruiter_uid_explode);
  }
  else{
        $total_connection = 0;
  }
    
?>
<div class="col-md-3">

                <div class="ibox-content navy-bg text-center">
                    <h1><?php echo $full_name; ?></h1>
                    <div class="m-b-sm">
                       <!--  <img alt="image" class="img-circle" src="img/a8.jpg"> -->
                       <?php echo $pic; ?>
                    </div>
                    <p class="font-bold"><?php echo $total_connection ?> Total connections</p>

                </div>
                    <div class="ibox-content ">
                        <h4 class="media-heading">About</h4>
                        <p><?php echo $field_user_about ?></p>
                        <br/>
                        <!--
                        <div >
                            <div>
                                <span class="media-heading"><strong>Quality of candidates</strong></span>
                                <small class="pull-right">4.5 / 5</small>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 90%;" class="progress-bar"></div>
                            </div>
                            <br/>
                            <div>
                                <span class="media-heading"><strong>Quality of feedback</strong></span>
                                <small class="pull-right">2.5 / 5</small>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 50%;" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </div>
                        <br/>
                        -->
                        <h4 class="media-heading">Contact</h4>
                            <p><i class="fa fa-phone"></i> <?php echo $field_phone ?></p>
                            <p><i class="fa fa-inbox"></i> <?php echo $user_get->mail ?></p>
                            <p><i class="fa fa-skype"></i> <?php echo $field_skype ?></p>
                            <p><i class="fa fa-twitter"></i> @<?php echo $field_twitter_account ?> (twitter.com/<?php echo $field_twitter_account ?>)</p>
                            <p>
                                <i class="fa fa-map-marker"></i>

                                    <?php echo $field_location; ?>
                            </p>
                        <br/>
                        <h4 class="media-heading">Connections</h4>
                        <div class="team-members">
                            
                            <?php
                                //get list connection
                                if($field_approved_recruiter_uid!="")
                                {
                                    for($i=0;$i<count($field_approved_recruiter_uid_explode);$i++)
                                    {
                                        $recruiter_uid = $field_approved_recruiter_uid_explode[$i];
                                        //load recruiter user
                                        $load_recruiter = user_load($recruiter_uid);
                                        //print_r($load_recruiter);
                                        
                                        if($load_recruiter->field_picture_url)
                                        {
                                            $pic_recruiter = '<img class="img-circle" src="'.$load_recruiter->field_picture_url['und'][0]['value'].'" />';  
                                        }
                                        else
                                        {
                                            if($load_recruiter->picture->uri){
                                              	    $pic_recruiter = theme_image_style(
                                                    array(
                                                    'style_name' => 'thumbnail',
                                                    'path' => $load_recruiter->picture->uri,
                                                    'attributes' => array(
                                                                        'class' => 'img-circle'
                                                                    )            
                                                    )
                                                ); 
                                            }else{ 
                                              	 $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
                                              	 $pic_recruiter = '<img class="img-circle" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
                                            }
                                        }
                                        ?>
                                         <a href="<?php echo url("user/".$load_recruiter->uid) ?>"><?php echo $pic_recruiter ?></a>
                                        <?php
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div> <!-- --> 
                
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-content">
                            <a  class="btn btn-white btn-xs pull-right m-l-sm" href="<?php echo url('user/'.$user_get->uid.'/edit'); ?>"  >Edit profile</a><!-- onclick="edit()" -->
                            <!-- <a  class="btn btn-white btn-xs pull-right" onclick="save()">Save</a> -->
                            <div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> About</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-connectdevelop"></i> Connections</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-clock-o "></i> Timeline</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="full-height-scroll">
                                            <br/>
                                            <h2 class="media-heading"><i class="fa fa-bar-chart"></i>&nbsp;Summary</h2>
                                            <div class="click2edit wrapper p-md">
                                                <?php echo $field_summary ?>
                                            </div>
                                            
                                            <br/>
                                            <h2 class="media-heading"><i class="fa fa-user"></i>&nbsp;Basic Information</h2>
                                            <br/>
                                            <div class="pmbb-view">
                                                <dl class="dl-horizontal">
                                                    <dt>Full Name</dt>
                                                    <dd><?php echo $full_name ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Gender</dt>
                                                    <dd><?php echo $field_gender ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Birthday</dt>
                                                    <dd><?php echo $field_birthday ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Martial Status</dt>
                                                    <dd><?php echo $field_marital_status ?></dd>
                                                </dl>
                                            </div>
                                            <h2 class="media-heading"><i class="fa fa-phone"></i>&nbsp;Contact Information</h2>
                                            <br/>
                                            <div>
                                                <dl class="dl-horizontal">
                                                    <dt>Mobile Phone</dt>
                                                    <dd><?php echo $field_phone ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Corporate Email </dt>
                                                    <dd><?php echo $field_corporate_email ?> |&nbsp;<small class="text-muted">Last validated 18 days ago </small></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Private Email</dt>
                                                    <dd><?php echo $user_get->mail ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Linkedin Profile</dt>
                                                    <dd><?php echo $field_linkedin_user_id ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Twitter</dt>
                                                    <dd>@<?php echo $field_twitter_account ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Skype</dt>
                                                    <dd><?php echo $field_skype ?></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Address</dt>
                                                    <dd><?php echo $field_location ?></dd>
                                                </dl>
                                            </div>
                                            <hr class="hr-line-solid"/>
                                            <div class="form-group">
                                                <div class="col-lg-9">
                                                    <div class="i-checks">
                                                        <?php 
                                                            if($field_agree_term==1)
                                                            {
                                                                $check ="checked";
                                                            }
                                                            else
                                                            {
                                                                $check = "uncheck";
                                                            }
                                                        ?>
                                                        <label>
                                                            <input type="checkbox" <?php echo $check ?> value=""> <i></i> &nbsp; I agree to the <a class="text-info"
                                                            href="#">Terms and conditions</a>. 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane contact-box-content">
                                        <br/>
                                        <div class="row">
                                            
                                            <?php
                                                //get list connection
                                                if($field_approved_recruiter_uid!="")
                                                {
                                                    for($i=0;$i<count($field_approved_recruiter_uid_explode);$i++)
                                                    {
                                                        $recruiter_uid = $field_approved_recruiter_uid_explode[$i];
                                                        //load recruiter user
                                                        $load_recruiter = user_load($recruiter_uid);
                                                        //print_r($load_recruiter);
                                                        
                                                        //get all fields
                                                        //full_name
                                                        $full_name_connection = $load_recruiter->name; 
                                                        if (!empty($load_recruiter->field_first_name) && !empty($load_recruiter->field_last_name)) {
                                                            $full_name_connection = $load_recruiter->field_first_name['und'][0]['value'] . ' ' . $load_recruiter->field_last_name['und'][0]['value'];
                                                        }
                                                        
                                                        //linkedin
                                                        //get field_linkedin_user_id
                                                        if(!empty($load_recruiter->field_linkedin_user_id)){
                                                            $field_linkedin_user_id_connection =  $load_recruiter->field_linkedin_user_id['und'][0]['value'];
                                                        }
                                                        
                                                        if($load_recruiter->field_picture_url)
                                                        {
                                                            $pic_recruiter = '<img class="img-circle m-t-xs img-responsive" src="'.$load_recruiter->field_picture_url['und'][0]['value'].'" />';  
                                                        }
                                                        else
                                                        {
                                                            if($load_recruiter->picture->uri){
                                                              	    $pic_recruiter = theme_image_style(
                                                                    array(
                                                                    'style_name' => 'thumbnail',
                                                                    'path' => $load_recruiter->picture->uri,
                                                                    'attributes' => array(
                                                                                        'class' => 'img-circle m-t-xs img-responsive'
                                                                                    )            
                                                                    )
                                                                ); 
                                                            }else{ 
                                                              	 $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
                                                              	 $pic_recruiter = '<img class="img-circle m-t-xs img-responsive" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
                                                            }
                                                        }
                                                          
                                                          ?>
                                                            <div class="col-lg-4">
                                                                <div class="contact-box">
                                                                    <a href="<?php echo url("user/".$load_recruiter->uid) ?>">
                                                                        <div class="row">
                                                                            <div class="col-sm-4 col-sm-push-4">
                                                                                <div class="text-center">
                                                                                    <?php echo $pic_recruiter ?>
                                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <h3><strong><?php echo $full_name_connection ?></strong></h3>
                                                                                <p><i class="fa fa-linkedin-square"></i> <?php echo $load_recruiter->field_first_name['und'][0]['value'].".".$load_recruiter->field_last_name['und'][0]['value'] ?></p>
                                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:<?php echo $load_recruiter->mail ?>"> <?php echo $load_recruiter->mail ?></a></p>
                                                                                <!--
                                                                                <div>
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
                                                                                </div>
                                                                                -->
                                                                            </div>
                                                                        </div>
                                                                        <!--
                                                                        <div class=" m-t-lg">
                                                                            <div class="col-md-4">
                                                                                <span class="line">5,3,9,6,5,9,7,3,5,2,5,6,7,7,2,2</span>
                                                                                <h5><strong>169</strong> Posts</h5>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                                                                <h5><strong>28</strong> Following</h5>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span class="line">5,3,2,-1,-3,-2,2,3,5,2</span>
                                                                                <h5><strong>24</strong> Followers</h5>
                                                                            </div>
                                                                        </div>
                                                                        -->
                                                                        <div class="col-sm-12">
                                                                            <div class="div-btn-follow btn btn-block btn-outline btn-primary follow-btn">
                                                                                <?php print flag_create_link('follow', $load_recruiter->uid); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </a>
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
                                    </div>
                                    <div id="tab-3" class="tab-pane"></div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
           
 <div class="profile"<?php //print $attributes; ?>>
  <?php //print render($user_profile); ?>
</div>