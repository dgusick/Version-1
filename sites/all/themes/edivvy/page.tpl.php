<?php

if($user->uid)
 $user_load = user_load($user->uid); 
else
 $user_load = $user; 
 
 $paid_rec = false;
  if(isset($user_load->roles[5])) { 
  	$is_rec = true; $is_rec_inactive = true;  
    $paid_rec = true;
  } 
  if(isset($user_load->roles[6])) {$is_can = true;  
  $paid_rec = true; 
  	
  } 
 
 if($is_rec && !empty($user_load->field_recruiter_status)){
    $field_recruiter_status =  $user_load->field_recruiter_status['und'][0]['value'];
   	
   	if($field_recruiter_status=="Active" )
   	{
   	 $is_rec_inactive = false; 	
   	} 
 }
 

$preq_fields = array('field_first_name', 'field_last_name', 'field_city', 'field_zip_code', 'field_experience', 'field_job_title', 
 	   'field_expertise', 'field_degree_type', 'field_company_size', 'field_company_present', 'field_industry'); 
 $is_my_profile_complete = true; 
 
 foreach($preq_fields  as $preq_field ) { 
   	  if( isset($user_load->{$preq_field}['und']) && $user_load->{$preq_field}['und'][0]  ) { 
   	  } else {
   	  	$is_my_profile_complete = false; 
   	  	break; 
   	  }
   }
   

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
  //$filepath = variable_get('user_picture_default', ''); 
  //$pic = theme('image', array('path' => $filepath, 'alt' => 'Image', 'title' => $alt)); //img-circle 
  
  global $user;
  $users = user_load($user->uid);
  $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
  
  if($users->field_picture_url)
     {
        $pic = '<img class="img-thumbnail img-circle" src="'.$users->field_picture_url['und'][0]['value'].'" />';  
     }
  else
     {
        if($users->field_user_picture){
            $field_user_picture = file_create_url($users->field_user_picture[LANGUAGE_NONE][0]['uri']);
            $pic = '<img class="img-thumbnail img-circle" src="'.$field_user_picture.'" />'; 
        }else{ 
            
            $pic = '<img class="img-thumbnail img-circle" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
        }
     }
         
  $full_name = $users->name; 
   $first_name = $users->name; 
  if (!empty($users->field_first_name) ) {//&& !empty($users->field_last_name)
    $full_name = $users->field_first_name['und'][0]['value'] . ' ' . $users->field_last_name['und'][0]['value'];
    $first_name = $users->field_first_name['und'][0]['value']; 
  }
  
  
?>
  <div class="wrapper">
  <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="<?php if(isset($user->roles[5])  && !$is_rec_inactive ) {  echo url('searchapi-candidate'); } else { echo $front_page; } ?>" class="navbar-brand"> 
                  <div class="brand-logo">
                  
                      <img style="display:none;" src="<?php echo $logo; ?>" alt="App Logo" class="img-responsive">  
                   <h4 class="" style="color: #FFF; font-size: 22px; margin-top: 5px;"> Edivvy</h4>
                  </div>
                  <div class="brand-logo-collapsed">
                     <h4 class="" style="color: #FFF; font-size: 22px; margin-top: 5px;">EDV</h4>
                     <img style="display:none;" src="img/logo-single.png" alt="App Logo" class="img-responsive">
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            
            <!-- START Nav wrapper-->
            <div class="nav-wrapper"  >
               <!-- START Left navbar-->
               <ul class="nav navbar-nav" style="<?php if(!$user->uid) echo 'display:none;';  ?>">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  
                  <!-- START User avatar toggle-->
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <!-- END User avatar toggle-->
                   <?php if(isset($user->roles[5])  && !$is_rec_inactive ) { //rec. menu  ?>
                    <li>
	                    <a href="<?php echo url('invite/add/invite_by_email'); ?>"><span class="nav-label">Invite Candidate</span></a>
	                </li>
	                <li>
	                    <a href="<?php echo url('invite/add/invite_recruiter'); ?>"><span class="nav-label">Invite Recruiter</span></a>
	                </li>
                     <?php } ?>
                     
                     
                     <li>
	                    <a href="<?php echo url('node/136'); ?>"><span class="nav-label">How Does This Work ?</span></a>
	                </li>
	               <li>
	                    <a href="<?php echo url('node/137'); ?>"><span class="nav-label">Recruiters </span></a>
	                </li>
	                <li><a href="<?php echo url('node/138'); ?>"><span class="nav-label">Candidates</span> </a></li>
                
               </ul>
               
               <!-- END Left navbar-->
                  
               
               <ul class="nav navbar-nav navbar-right" style="<?php if($user->uid && $paid_rec) echo 'display:none;';  ?>">
                  <!-- Search icon-->
                  
                  <li>
                     <a href="<?php echo url('paid-membership'); ?>" >
                         Membership Plans
                     </a>
                  </li>
                  <li>
                     <a href="<?php echo url('cart'); ?>" >
                        <em class="fa fa-shopping-cart"></em> Checkout
                     </a>
                  </li>
                  
               </ul>
               <!-- START Right Navbar-->
               
              
                
               <ul class="nav navbar-nav navbar-right" style="<?php if(!$user->uid) echo 'display:none;';  ?>">
                 <!-- LinkedIn" icon-->
                   
                  <li>
                     <a href="https://www.linkedin.com/" target="_blank" data-linkedin-open="">
                       <em class="fa fa-linkedin"></em>
                     </a>
                  </li>  
                  <!-- Search icon-->
            <!--      <li>
                     <a href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                     </a>
                  </li>  -->
                   <!-- Fullscreen (only desktops)-->
            <!--      <li class="visible-lg">
                     <a href="#" data-toggle-fullscreen="">
                        <em class="fa fa-expand"></em>
                     </a>
                  </li>
                 <!-- START Alert menu-->
                  <li class="dropdown dropdown-list">
                     <a href="mailto: ?Subject=Hello%20again" target="_top"> <!-- data-toggle="dropdown"-->
                        <em class="icon-envelope"></em>  <!--icon-bell-->
                      <!--  <div class="label label-danger">0</div>  -->
                     </a>
                     <!-- START Dropdown menu-->
                <!--     <ul class="dropdown-menu animated flipInX">
                        <li style="display:none;">
                           <!-- START list group-->
                <!--           <div class="list-group">
                              <!-- list item-->
                <!--              <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-twitter fa-2x text-info"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New followers</p>
                                       <p class="m0 text-muted">
                                          <small>1 new follower</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                <!--              <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-envelope fa-2x text-warning"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">New e-mails</p>
                                       <p class="m0 text-muted">
                                          <small>You have 10 new emails</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- list item-->
                 <!--             <a href="#" class="list-group-item">
                                 <div class="media-box">
                                    <div class="pull-left">
                                       <em class="fa fa-tasks fa-2x text-success"></em>
                                    </div>
                                    <div class="media-box-body clearfix">
                                       <p class="m0">Pending Tasks</p>
                                       <p class="m0 text-muted">
                                          <small>11 pending task</small>
                                       </p>
                                    </div>
                                 </div>
                              </a>
                              <!-- last list item -->
                <!--              <a href="#" class="list-group-item">
                                 <small>More notifications</small>
                                 <span class="label label-danger pull-right">14</span>
                              </a>
                           </div>
                           <!-- END list group-->
                <!--        </li>
                     </ul>
                     <!-- END Dropdown menu-->
                  </li>
                  <!-- END Alert menu-->
                    <li>
                     <a href="<?php echo url('messages'); ?>" title="inbox">
                       <em class="fa fa-inbox"></em>
                     </a>
                  </li> 
                  <!-- START Offsidebar button-->
              <!--    <li>
                     <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                        <em class="icon-notebook"></em>
                     </a>
                  </li>  -->
                  <!-- END Offsidebar menu-->
               </ul>
               <!-- END Right Navbar-->
               
                 <ul class="nav navbar-nav navbar-right">
                 <li>
	                    <a href="<?php echo url('node/134'); ?>"><span class="nav-label">About</span></a>
	                </li>
	                <li>
	                    <a href="<?php echo url('node/135'); ?>"><span class="nav-label">Help</span></a>
	                </li>
                  
                </ul>
                
            </div>
            <!-- END Nav wrapper-->
            
            <!-- START Search form-->
            <form style="<?php if(!$user->uid) echo 'display:none;';  ?>" role="search" action="search.html" class="navbar-form">
               <div class="form-group has-feedback">
                  <input type="text" placeholder="Type and hit enter ..." class="form-control">
                  <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
               </div>
               <button type="submit" class="hidden btn btn-default">Submit</button>
            </form>
            <!-- END Search form-->
         </nav>
         
         <!-- END Top Navbar-->
      </header>
      
      <!-- sidebar-->
          <?php if($user->uid) { ?>
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <!-- START sidebar nav-->
               <ul class="nav metismenu skin-2" id="side-menu">
               
               <!-- START user info-->
                  <li class="has-user-block">
                    <div id="user-block" class="collapse">
                    <div class="item user-block">
                           
                           <!-- User picture-->
                           <div class="user-block-picture">
                              <div class="user-block-status">
                                 <!-- <img src="img/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">-->
                                 <?php echo $pic; ?>  
                                 <div class="circle circle-success circle-lg"></div>
                              </div>
                           </div>
                           <!-- Name and Job-->
                             
                             
                           <div class="user-block-info">
                              <span class="user-block-name">Hello, <?php echo $first_name; ?></span>
                               
                               <span class="user-block-role"><?php if(isset($user->roles[5])) { echo 'Recruiter'; } else if(isset($user->roles[6])) { echo 'Candidate'; } else {  } ?> </span>
                               
                           </div>
                           
                        </div>
                         
                    </div>
                     
                  </li>
                  <!-- END user info-->
                  
               <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Menu Navigation</span> </li>
                  
                <li <?php if(arg(0) == "") echo 'active';?>>
                    <a href="<?php if(isset($user->roles[5])  && !$is_rec_inactive ) {  echo url('searchapi-candidate'); } else { echo url('user'); } ?>"><em class="icon-home"></em> <span class="nav-label">Home</span></a> <!--<em class="fa fa-home"></em>-->
                </li>
                
                <li class="<?php if( (arg(0) == "user"  || $_GET['q'] == 'messages' ) &&  arg(2) != "invites" ) echo 'active';?>" ><a href="#profilesNav" data-toggle="collapse" ><em class="icon-user"></em>
                <span data-localize="sidebar.nav.PROFILE">Profile</span></a> <!--data-toggle="collapse" -->
                  
                  
               <ul id="profilesNav" class="nav sidebar-subnav collapse <?php if( (arg(0) == "user" || $_GET['q'] == 'messages' ) &&  arg(2) != "invites" ) echo 'in';?>">
                   <li><a class="<?php echo ($_GET['q'] == 'user' ? 'active' : ''); ?>" href="<?php echo url('user'); ?>"><em class="fa fa-user"></em>My Profile</a></li>
                <?php if(isset($user->roles[5]) && !$is_rec_inactive ): //rec. menu <?php echo url('user');  ?>
                <li style="" class="<?php echo ($_GET['q'] == 'user/'.$user->uid.'/wishlist' ? 'active' : ''); ?>"><a href="<?php echo url('user/'.$user->uid.'/wishlist'); ?>" ><em class="icon-heart"></em>My Saved List</a></li>
                <li class="<?php echo ($_GET['q'] == 'user/'.$user->uid.'/recurring-fees' ? 'active' : ''); ?>"><a href="<?php echo url('user/'.$user->uid.'/recurring-fees'); ?>" ><em class="icon-basket"></em>My Subscription</a></li>
                
                <li class="<?php echo ($_GET['q'] == 'user/'.$user->uid.'/my_following' ? 'active' : ''); ?>"><a href="<?php echo url('user/'.$user->uid.'/my_following'); ?>"><em class="icon-user-following"></em>I'm Following</a></li>
                <li class="<?php echo ($_GET['q'] == 'user/'.$user->uid.'/my_followers' ? 'active' : ''); ?>"><a href="<?php echo url('user/'.$user->uid.'/my_followers'); ?>"><em class="icon-user-follow"></em>My Followers</a></li>
                <li class="<?php echo ($_GET['q'] == 'messages' ? 'active' : ''); ?>"><a href="<?php echo url('messages'); ?>"><em class="icon-envelope"></em>Mailbox</a></li>
                <?php endif; ?>
                
                <?php if(isset($user->roles[6])) { //candidate menu ?>
                <li><a href="<?php echo url('messages'); ?>"><em class="icon-envelope"></em>Mailbox</a></li>
                <?php } ?>
                
				
                <li><a href="<?php echo url('user/logout'); ?>"> <em class="icon-logout"></em>Logout</a></li>
                </ul>
                
                
                </li>
               
                
                
                
                <?php if(isset($user->roles[5])  && !$is_rec_inactive ) { //rec. menu  ?>
                <!-- <li>
                    <a href="<?php echo url('candidate-search'); ?>"><i class="fa fa-search"></i> <span class="nav-label">Search</span></a>
                </li>-->
                
                <li class="<?php if(arg(0) == "searchapi-candidate") echo 'active';?>">
                    <a href="<?php echo url('searchapi-candidate'); ?>"><em class="fa fa-search"></em> <span class="nav-label">Search</span></a>
                </li>
             <!--   <li>
                    <a href="<?php echo url('user/'.$user->uid.'/saved-searches'); ?>"><i class="fa fa-search"></i> <span class="nav-label">My Saved Search</span></a>
                </li> -->
                
                <li class="<?php if(arg(0) == "invite" || arg(2) == "invites" ) echo 'active';?>">
                  <a href="#profilesInvite" data-toggle="collapse" ><em class="icon-people"></em>
                	<span >Invite </span></a>
                
	                 <ul id="profilesInvite" class="nav sidebar-subnav collapse <?php if(arg(0) == "invite" || arg(2) == "invites" ) echo 'in';?>">
	                 
	                 <li>
	                    <a href="<?php echo url('invite/add/invite_by_email'); ?>"><em class="fa fa-user-plus"></em> <span class="nav-label">Invite Candidate</span></a>
	                </li>
	                <li>
	                    <a href="<?php echo url('invite/add/invite_recruiter'); ?>"><em class="fa fa-user-plus"></em> <span class="nav-label">Invite Recruiter</span></a>
	                </li>
	                <li>
	                    <a href="<?php echo url('user/'.$user->uid.'/invites'); ?>"><em class="icon-share"></em> <span class="nav-label">Invited List</span></a> <!--<em class="fa fa-search"></em>-->
	                </li>
	                </ul>
                </li>    
                
                
            <!--    <li>
                    <a href="<?php echo url('relationships/sent'); ?>"><i class="fa fa-group"></i> <span class="nav-label">Pending Requests</span></a>
                </li> -->
                <li class="<?php if(arg(0) == "candidates-access-request") echo 'active';?>">
                    <a href="<?php echo url('candidates-access-request'); ?>"><em class="icon-lock-open"></em> <span class="nav-label">Access Requests</span></a>  <!--<em class="fa fa-group"></em> -->
                </li>
          <!--  <li>
                    <a href="<?php echo url('access-request'); ?>"><i class="fa fa-group"></i> <span class="nav-label">Access Requests</span></a>
                </li> -->
                
                <li class="<?php if(arg(0) == "recruiter-list") echo 'active';?>">
                    <a href="<?php echo url('recruiter-list'); ?>"><em class="icon-list"></em> <span class="nav-label">Recruiters</span></a> <!--<em class="fa fa-list"></em>-->
                </li>
                <!-- <li>
                    <a href="<?php echo url('node/add/requirement'); ?>"><i class="fa fa-user-plus"></i> <span class="nav-label">Add Requirement</span></a>
                </li> -->
                <?php } ?>
                                
                <?php if(isset($user->roles[6])) { //candidate menu ?>
                <li>
                    <!--<a href="<?php echo url('user/'.$user->uid.'/approved'); ?>#tab-2"><i class="fa fa-user-plus"></i> <span class="nav-label">Approved recruiter</span></a>-->
                    <a href="<?php echo url('profile-main/'.$user->uid.'/edit'); ?>"><em class="fa fa-edit "></em> <span class="nav-label">Edit My Skills</span></a>
                    <!-- <a href="<?php echo url('approved-recruiter-list'); ?>"><i class="fa fa-user-plus"></i> <span class="nav-label">Approved recruiters</span></a>-->
                    <a href="<?php echo url('relationships/received'); ?>"><em class="icon-user-follow"></em> <span class="nav-label">New Requests</span></a>
                    <a href="<?php echo url('recruiter-access-request'); ?>"><em class="icon-like"></em> <span class="nav-label">Approved Requests</span></a>
                    <!--  <a href="<?php echo url('all-access'); ?>"><i class="fa fa-user-plus"></i> <span class="nav-label">Approved Requests</span></a> -->
                    
                </li>
                
                
                <?php } ?>
                
                
                

                
            </ul> 
               <!-- END sidebar nav-->
            </nav>
            
            
      
         </div>
         <!-- END Sidebar (left)-->
      </aside>
      
      <!-- offsidebar-->
      <aside class="offsidebar hide">
         <!-- START Off Sidebar (right)-->
         <nav>
            <div role="tabpanel">
               <!-- Nav tabs-->
               <ul role="tablist" class="nav nav-tabs nav-justified">
                  <li role="presentation" class="active">
                     <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                        <em class="icon-equalizer fa-lg"></em>
                     </a>
                  </li>
                  <li role="presentation">
                     <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                        <em class="icon-user fa-lg"></em>
                     </a>
                  </li>
               </ul>
               <!-- Tab panes-->
               <div class="tab-content">
                  <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                     <h3 class="text-center text-thin">Settings</h3>
                     <div class="p">
                        <h4 class="text-muted text-thin">Themes</h4>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-a.css">
                                    <input type="radio" name="setting-theme" checked="checked">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info"></span>
                                       <span class="color bg-info-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-b.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green"></span>
                                       <span class="color bg-green-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-c.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple"></span>
                                       <span class="color bg-purple-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-d.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger"></span>
                                       <span class="color bg-danger-light"></span>
                                    </span>
                                    <span class="color bg-white"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="table-grid mb">
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-e.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-info-dark"></span>
                                       <span class="color bg-info"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-f.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-green-dark"></span>
                                       <span class="color bg-green"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-g.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-purple-dark"></span>
                                       <span class="color bg-purple"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                           <div class="col mb">
                              <div class="setting-color">
                                 <label data-load-css="<?php echo base_path().'/'.$base_theme_url; ?>/css/theme-h.css">
                                    <input type="radio" name="setting-theme">
                                    <span class="icon-check"></span>
                                    <span class="split">
                                       <span class="color bg-danger-dark"></span>
                                       <span class="color bg-danger"></span>
                                    </span>
                                    <span class="color bg-gray-dark"></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Layout</h4>
                        <div class="clearfix">
                           <p class="pull-left">Fixed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Boxed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">RTL</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-rtl" type="checkbox">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="p">
                        <h4 class="text-muted text-thin">Aside</h4>
                        <div class="clearfix">
                           <p class="pull-left">Collapsed</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Float</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-float" type="checkbox" data-toggle-state="aside-float">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Hover</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="clearfix">
                           <p class="pull-left">Show Scrollbar</p>
                           <div class="pull-right">
                              <label class="switch">
                                 <input id="chk-hover" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar">
                                 <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="app-chat" role="tabpanel" class="tab-pane fade">
                     <h3 class="text-center text-thin">Connections</h3>
                     <ul class="nav" style="display:none;">
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">ONLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/05.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Juan Sims</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-success circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/06.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Maureen Jenkins</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-danger circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/07.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Billie Dunn</strong>
                                    <br>
                                    <small class="text-muted">Designeer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-warning circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/08.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tomothy Roberts</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <!-- START list title-->
                        <li class="p">
                           <small class="text-muted">OFFLINE</small>
                        </li>
                        <!-- END list title-->
                        <li>
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/09.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Lawrence Robinson</strong>
                                    <br>
                                    <small class="text-muted">Developer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                           <!-- START User status-->
                           <a href="#" class="media-box p mt0">
                              <span class="pull-right">
                                 <span class="circle circle-lg"></span>
                              </span>
                              <span class="pull-left">
                                 <!-- Contact avatar-->
                                 <img src="img/user/10.jpg" alt="Image" class="media-box-object img-circle thumb48">
                              </span>
                              <!-- Contact info-->
                              <span class="media-box-body">
                                 <span class="media-box-heading">
                                    <strong>Tyrone Owens</strong>
                                    <br>
                                    <small class="text-muted">Designer</small>
                                 </span>
                              </span>
                           </a>
                           <!-- END User status-->
                        </li>
                        <li>
                           <div class="p-lg text-center">
                              <!-- Optional link to list more users-->
                              <a href="#" title="See more contacts" class="btn btn-purple btn-sm">
                                 <strong>Load more..</strong>
                              </a>
                           </div>
                        </li>
                     </ul>
                     <!-- Extra items-->
                     <div class="p" style="display:none;">
                        <p>
                           <small class="text-muted">Tasks completion</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-success progress-80">
                              <span class="sr-only">80% Complete</span>
                           </div>
                        </div>
                     </div>
                     
                     <div class="p" style="display:none;">
                        <p>
                           <small class="text-muted">Upload quota</small>
                        </p>
                        <div class="progress progress-xs m0">
                           <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-warning progress-40">
                              <span class="sr-only">40% Complete</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <!-- END Off Sidebar (right)-->
      </aside>
      
          <?php } ?>
      
  <section >
   

    
    
      
    
    
    <?php if($user->uid) { ?>
    <!--   <div class="row border-bottom">
            <nav class="navbar navbar-static-top grey-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <?php if(0): ?>
                    <form role="search" class="navbar-form-custom" action="<?php echo url('candidate-search-top'); ?>">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                   <?php endif;?>
                </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <a href="<?php echo url('user/logout'); ?>">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
         -->
         <?php } ?> 
         
        <!-- <div class="row wrapper border-bottom white-bg page-heading">
		        <div class="col-lg-10"> -->
		         <!--  </div>
		        </div>  -->
		        
	<div class="content-wrapper" id="page-wrapper" class="gray-bg" style="min-height: 490px;">	        
		        <?php print render($title_prefix); ?>
		        <?php if ($title): ?><h3 class="title" id="page-title"><?php print $title; ?></h3><?php endif; ?>
		        <?php print render($title_suffix); ?>
		     
         
           <div class="row">
             <div class="<?php if ($page['sidebar_first']) echo 'col-lg-9'; else echo 'col-lg-12';  ?>">
             
            <?php if(arg(0) != 'user' || (arg(0) == 'user' && arg(1) != '' && arg(2) == 'edit' ) ) {  ?>
            <div class="col-md-12"><div class="ibox float-e-margins"><div class="ibox-content">
             <div class="content-padding">
             <?php } ?>
            <!-- -->
            <?php if (($main_menu || $secondary_menu) && $user->uid): ?>
		      <div id="navigation"><div class="section">
		        <?php //print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
		        <?php //print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
		      </div></div> <!-- /.section, /#navigation -->
		    <?php endif; ?>
		
		    <?php if ($breadcrumb && $user->uid): ?>
		      <div id="breadcrumb"><?php //print $breadcrumb; ?></div>
		    <?php endif; ?>
		
		    <?php print $messages; ?>
		
		    <div id="main-wrapper"><div id="main" class="clearfix">
		
		      <div id="content" class="column"><div class="section">
		        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
		        <a id="main-content"></a>
		        <?php  ?>
		         <?php if(!$is_my_profile_complete && arg(0) != 'user'  && $user->uid)  {  ?><p class="pending_ractivation"><?php echo '<a href="'.url('user/'.$user->uid.'/edit').'">Please complete your profile before being added to the system.</a>'; ?></p><?php 
		         }
		         else if($is_rec && $is_rec_inactive )  {  ?><p class="pending_ractivation">Your profile is pending Activation. Once approved you will be able to use all features.</p><?php }
		            
		         ?>
		         <?php if( arg(0) != 'paid-membership' && !$paid_rec  && arg(0) != 'cart'  && $user->uid)  {  ?><p class="pending_ractivation">Your profile is not active YET. <?php echo l("Become a paid member", 'paid-membership'); ?> to activate your account.</p><?php } ?>
		         
		         
		        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
		        <?php print render($page['help']);// print_r($action_links); ?>
		        
		        <?php if( count($action_links) && $action_links[0]['#link']['path'] == 'messages/new'  ) {
		            $action_links[0]['#link']['title'] = '<em class="fa fa-pencil"></em><span>Compose</span>';
		            $action_links[0]['#link']['localized_options']['html'] = true;
                    $action_links[0]['#link']['localized_options']['attributes']['class'] = array('btn btn-purple btn-sm mb-compose-button');       
		            
		        } ?>
		        <?php if ($action_links): ?><ul class="action-links col-md"><?php print render($action_links); ?></ul><?php endif; ?>
		        
		        <?php print render($page['content']); ?>
		        
		        <?php print $feed_icons; ?>
		      </div></div> <!-- /.section, /#content -->
		 
				<?php if ($page['sidebar_second']): ?>
		       
		        <div id="sidebar-second" class="column sidebar"><div class="section">
		          <?php print render($page['sidebar_second']); ?>
		        </div></div> <!-- /.section, /#sidebar-second -->
		       
		      <?php endif; ?>
		      
		
		    </div></div> <!-- /#main, /#main-wrapper -->
		    
		    <?php if(arg(0) != 'user' || (arg(0) == 'user' && arg(1) != '' && arg(2) == 'edit' ) ) {  ?>
		  </div></div> <!-- /.row -->
		  </div>
		  </div>
		  <?php } ?>
		  
		   
          
		    </div>  
		    
		    <?php if ($page['sidebar_first']): ?>
		   <div class="col-lg-3">
		    
            <div id="sidebar-first" class="column "><div class="section">
              <?php print render($page['sidebar_first']); ?>
            </div></div> <!-- /.section, /#sidebar-first -->
             </div>
          <?php endif; ?>
		      
		  </div> <!-- row -->

         
        
      </div>
    

  </section>
  
  <footer >
		    <?php print render($page['footer']); ?>
		    
            
            <span>
                <small>Edivvy &copy; <?php echo date('Y'); ?></small> 
            </span>
        </footer>
  
  </div> <!-- /#page, /#-wrapper -->


