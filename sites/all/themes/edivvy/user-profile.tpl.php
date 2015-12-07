<?php
  global $user;  
  $users = user_load($user->uid);
 if($users->picture){
  	 $pic = theme('user_picture', array('account' =>$users));
  }else{ 
  	 $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
  	 $pic = '<img class="img-circle" src="'.$base_theme_url.'/img/default-avatar.png" />';
  }
  $full_name = $user->name; 
  if (!empty($user->field_first_name) && !empty($user->field_last_name)) {
    $full_name = $user->field_first_name['und'][0]['value'] . ' ' . $user->field_last_name['und'][0]['value'];
  }
?>
<div class="col-md-3">

                <div class="ibox-content navy-bg text-center">
                    <h1><?php echo $full_name; ?></h1>
                    <div class="m-b-sm">
                       <!--  <img alt="image" class="img-circle" src="img/a8.jpg"> -->
                       <?php echo $pic; ?>
                    </div>
                    <p class="font-bold">1563 Total connections</p>

                </div>
                    <div class="ibox-content ">
                        <h4 class="media-heading">About</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <br/>
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
                        <h4 class="media-heading">Contact</h4>
                            <p><i class="fa fa-phone"></i> 00971 12345678 9</p>
                            <p><i class="fa fa-inbox"></i> nicki@gmail.com</p>
                            <p><i class="fa fa-skype"></i> nicki.smith</p>
                            <p><i class="fa fa-twitter"></i> @nickis (twitter.com/nickis)</p>
                            <p>
                                <i class="fa fa-map-marker"></i>

                                    10098 ABC Towers, <br>
                                    Dubai Silicon Oasis, Dubai, <br>
                                    United Arab Emirates
                            </p>
                        <br/>
                        <h4 class="media-heading">Connections</h4>
                        <div class="team-members">
                            <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a7.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a8.jpg"></a>
                            <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                        </div>
                    </div>
                </div> <!-- --> 
                
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-content">
                            <a  class="btn btn-white btn-xs pull-right m-l-sm" href="<?php echo url('user/'.$user->uid.'/edit'); ?>"  >Edit profile</a><!-- onclick="edit()" -->
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
                                                <h3>Lorem Ipsum is simply</h3>
                                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                                <br/>
                                                <br/>
                                                <ul>
                                                    <li>Remaining essentially unchanged</li>
                                                    <li>Make a type specimen book</li>
                                                    <li>Unknown printer</li>
                                                </ul>
                                            </div>
                                            
                                            <br/>
                                            <h2 class="media-heading"><i class="fa fa-user"></i>&nbsp;Basic Information</h2>
                                            <br/>
                                            <div class="pmbb-view">
                                                <dl class="dl-horizontal">
                                                    <dt>Full Name</dt>
                                                    <dd>Nicki Smith</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Gender</dt>
                                                    <dd>Female</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Birthday</dt>
                                                    <dd>June 23, 1990</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Martial Status</dt>
                                                    <dd>Single</dd>
                                                </dl>
                                            </div>
                                            <h2 class="media-heading"><i class="fa fa-phone"></i>&nbsp;Contact Information</h2>
                                            <br/>
                                            <div>
                                                <dl class="dl-horizontal">
                                                    <dt>Mobile Phone</dt>
                                                    <dd>00971 12345678 9</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Corporate Email </dt>
                                                    <dd>nicki.smith@corporate.com |&nbsp;<small class="text-muted">Last validated 18 days ago </small></dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Private Email</dt>
                                                    <dd>nicki.smith@gmail.com</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Linkedin Profile</dt>
                                                    <dd>nicki.smith</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Twitter</dt>
                                                    <dd>@nicki</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Skype</dt>
                                                    <dd>malinda.hollaway</dd>
                                                </dl>
                                                <dl class="dl-horizontal">
                                                    <dt>Address</dt>
                                                    <dd>10098 ABC Towers, <br>
                                                        Dubai Silicon Oasis, Dubai, <br>
                                                        United Arab Emirates</dd>
                                                </dl>
                                            </div>
                                            <hr class="hr-line-solid"/>
                                            <div class="form-group">
                                                <div class="col-lg-9">
                                                    <div class="i-checks"><label><input type="checkbox" checked value=""> <i></i> &nbsp; I agree to the <a class="text-info"
                                                            href="#">Terms and conditions</a>. </label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <br/>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a2.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>
                                                        </div>
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
                                                        <div class="col-sm-12">
                                                            <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a1.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>Alex Jonathan</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> Alex.Jonathan</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> alex@gmail.com</a></p>
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
                                                                        <small class="pull-right">4 / 5</small>
                                                                    </div>
                                                                    <div class="progress progress-mini">
                                                                        <div style="width: 85%;" class="progress-bar"></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                    <div class=" m-t-lg">
                                                        <div class="col-md-4">
                                                            <span class="line">5,3,9,6,5,9,7,3,5,2,5,6,7,7,2,2</span>
                                                            <h5><strong>125</strong> Posts</h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                                            <h5><strong>12</strong> Following</h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span class="line">5,3,2,3,1,3,3,5,2</span>
                                                            <h5><strong>54</strong> Followers</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a3.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>Monica Mathews</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> Monica.Mathews</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> monica@gmail.com</a></p>
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
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a4.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a5.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a6.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a6.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="contact-box">
                                                    <a href="rec-profile.html">
                                                        <div class="row">
                                                            <div class="col-sm-4 col-sm-push-4">
                                                                <div class="text-center">
                                                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="img/a6.jpg">
                                                                    <div class="m-t-xs font-bold">Recruiter, Veritas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><strong>John Smith</strong></h3>
                                                                <p><i class="fa fa-linkedin-square"></i> John.Smith</p>
                                                                <p><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> john.smith@gmail.com</a></p>
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
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
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
                                                    <div class="col-sm-12">
                                                        <a data-toggle="button" class="btn btn-block btn-outline btn-primary follow-btn " type="button">Follow</a>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-3" class="tab-pane"></div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
           
 <div class="profile"<?php print $attributes; ?>>
  <?php print render($user_profile); ?>
</div>
