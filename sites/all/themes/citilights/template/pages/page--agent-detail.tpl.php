<!-- START SITE -->
<div class="site">
  <!-- START HEADER -->
  <header class="noo-header <?php (theme_get_setting('menu_sticky', 'citilights')) ? print 'sticky' : print 'no-sticky'; ?>">
    <!-- START TOP HEADER -->
    <div class="top-header">
      <div class="container">
        <div class="top-header-inner">
          <ul class="social-top">
            	<?php 
					$ft_social = theme_get_setting('ft_social','citilights');
					if(isset($ft_social)) :
						foreach($ft_social as $key => $value) :
							print '<li><a target="_blank" href="'.$ft_social[$key]['link'].'" title=""><i class="fa '.$ft_social[$key]['icon']['icon'].'"></i></a></li>';
						endforeach;
					endif;
				?>
          </ul>
  
          <?php if($page['header']):?>
            <div class="top-header-content">
              <?php print render($page['header']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- END TOP HEADER -->
  
    <!-- START MAIN NAVIGATION WRAP -->
    <div class="main-nav-wrap container">
      <!-- START NAVBAR TOGGLE & LOGO -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="logo">
          <div class="logo-image">
            <a href="<?php print base_path(); ?>" title="<?php print $site_name; ?>"><img src="<?php ($logo_path) ? print $logo_path : print $logo; ?>" alt="Logo"></a>
          </div>
        </div>
      </div>
      <!-- END NAVBAR TOGGLE & LOGO -->
  
      <?php if($page['main_menu']):?>
        <?php print render($page['main_menu']); ?>
      <?php endif; ?>
    </div>
  </header>
  <!-- END HEADER -->

  <!-- START NOO WRAPPER -->
  <div class="noo-wrapper">
    <?php print $messages; ?>
    <!-- START NOO-MAINBODY -->
    <div class="container noo-mainbody">
      <div class="noo-mainbody-inner">
        <div class="row clearfix">
          <?php if ($page['sidebar']) : ?>
          	<div class="noo-content col-xs-12 col-md-8">
              <?php print $messages; ?>
			  <?php print render($page['content']); ?>	
            </div>
            <div class="noo-sidebar noo-sidebar-right col-xs-12 col-md-4">
              <div class="noo-sidebar-inner">
                <?php print render($page['sidebar']); ?>	
              </div>
            </div>
          <?php else : ?>
          	<div class="noo-content col-xs-12 col-md-12">
			  <?php print $messages; ?>
			  <?php print render($page['content']); ?>	
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
   </div>
   <!-- END NOO MAINBODY -->
  </div>
  <!-- END NOO WRAPPER -->

  <!-- START FOOTER -->
  <footer class="footer">
    <?php if($page['footer']):?>
      <!-- START FOOTER NAVIGATION -->
      <div class="footer-nav" style="background-image: url(<?php print(citilights_theme_setting_check_path(theme_get_setting('footer_static_bg_path', 'citilights'))); ?>)">
        <div class="container">
          <div class="row">
            <?php print render($page['footer']); ?>
          </div>
        </div>
      </div>
      <!-- END FOOTER NAVIGATION -->
    <?php endif; ?>
  
    <!-- START COPYRIGHT -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 text-block">
            <?php print theme_get_setting('footer_text', 'citilights'); ?>
          </div>
          <div class="col-xs-12 col-sm-6 logo-block">
            <div class="logo-image">
              <a href="<?php print base_path(); ?>"><img src="<?php print (citilights_theme_setting_check_path(theme_get_setting('footer_logo_path', 'citilights'))); ?>" alt="CitiLights"></a>
            </div>
          </div>
        </div>          
      </div>
     
      <!-- START BACK TO TOP -->
      <div id="back-to-top" class="back-to-top">
        <i class="fa fa-angle-up"></i>
      </div>
      <!-- END BACK TO TOP -->
    </div>
    <!-- END COPYRIGHT -->
  </footer>
  <!-- END FOOTER -->
</div>
<!-- END SITE -->
