<?php

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
  $filepath = variable_get('user_picture_default', ''); 
  $pic = theme('image', array('path' => $filepath, 'alt' => 'Image', 'title' => $alt)); //img-circle 
?>
 
  <div id="wrapper">
  <div id="page">
    <?php if($user->uid) { ?>
     <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu skin-2" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                           <?php echo $pic; ?>  
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Recruiter <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo url('user'); ?>">Profile</a></li>

                                <li><a href="<?php echo url('user/logout'); ?>">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo url('user'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                </li>
                <li>
                    <a href="<?php echo url('search'); ?>"><i class="fa fa-search"></i> <span class="nav-label">Search</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo url('user'); ?>"><i class="fa fa-group"></i> <span class="nav-label">Recruiters</span></a>
                </li>
                <li>
                    <a href="<?php echo url('user'); ?>"><i class="fa fa-user-plus"></i> <span class="nav-label">Add Profile</span></a>
                </li>

                <li>
                    <a href="<?php echo url('user'); ?>"><i class="fa fa-user-plus"></i> <span class="nav-label">Add Requirement</span></a>
                </li>
            </ul>

        </div>
    </nav>
    <?php } ?>
    
    <div id="page-wrapper" class="gray-bg" style="min-height: 490px;">
    <?php if($user->uid) { ?>
       <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    
                    <form role="search" class="navbar-form-custom" action="search.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>

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
         <?php } ?>
         
        <div class="wrapper wrapper-content"> 
           <div class="row">
             <div class="col-md-12">
            <!-- -->
            <?php if (($main_menu || $secondary_menu) && $user->uid): ?>
		      <div id="navigation"><div class="section">
		        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
		        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
		      </div></div> <!-- /.section, /#navigation -->
		    <?php endif; ?>
		
		    <?php if ($breadcrumb && $user->uid): ?>
		      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
		    <?php endif; ?>
		
		    <?php print $messages; ?>
		
		    <div id="main-wrapper"><div id="main" class="clearfix">
		
		      <div id="content" class="column"><div class="section">
		        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
		        <a id="main-content"></a>
		        <?php print render($title_prefix); ?>
		        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
		        <?php print render($title_suffix); ?>
		        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
		        <?php print render($page['help']); ?>
		        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
		        <?php print render($page['content']); ?>
		        <?php print $feed_icons; ?>
		      </div></div> <!-- /.section, /#content -->
		
		      <?php if ($page['sidebar_first']): ?>
		        <div id="sidebar-first" class="column sidebar"><div class="section">
		          <?php print render($page['sidebar_first']); ?>
		        </div></div> <!-- /.section, /#sidebar-first -->
		      <?php endif; ?>
		
		      <?php if ($page['sidebar_second']): ?>
		        <div id="sidebar-second" class="column sidebar"><div class="section">
		          <?php print render($page['sidebar_second']); ?>
		        </div></div> <!-- /.section, /#sidebar-second -->
		      <?php endif; ?>
		
		    </div></div> <!-- /#main, /#main-wrapper -->
		    
		  </div>
		  </div>

        </div>
        <div class="footer">
		    <?php print render($page['footer']); ?>
		    
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            
            <div>
                <strong>Copyright</strong> Example Company © 2014-2015
            </div>
        </div>
      </div>
    
    
    
    

  </div></div> <!-- /#page, /#-wrapper -->


