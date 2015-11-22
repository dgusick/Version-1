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
  	<?php $obj = menu_get_object(); ?>
    <?php if($obj->field_real_display['und'][0]['value'] == "style-2") : ?>
    	<div class="property-header">
			<?php if(isset($obj->field_real_slider_image['und'])) : ?>
            	<img src="<?php print file_create_url($obj->field_real_slider_image['und'][0]['uri']); ?>" class="img-responsive" alt="header_image">
            <?php endif; ?>
            <div class="overlay"></div>
            <div class="property-caption">
                <div class="property-caption-info">
                  <h3>
                  	<?php print $title; ?><br />
                    <?php if(isset($obj->field_real_address['und'])) : ?>
                    	<small><?php print $obj->field_real_address['und'][0]['value']; ?></small>
                    <?php endif; ?>
                  </h3>
                  <div class="info-summary">
                    <div class="container">
                        <div class="socials">
                            <ul class="social-list property-share clearfix">
                                <li><a href="http://www.facebook.com/sharer.php?u=<?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>&t=<?php print $title; ?>" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://twitter.com/home?status=<?php print $title; ?> <?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php print base_path().drupal_get_path_alias("node/$node->nid"); ?>/&amp;title=<?php print $title; ?>" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="size">
                        	<?php if(isset($obj->field_real_area['und'])) : ?>
								<span><?php print number_format($obj->field_real_area['und'][0]['value']); ?> <?php print t('sqft'); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="bathrooms">
                        	<?php if(isset($obj->field_real_bathrooms['und'])) : ?>
								<span><?php print $obj->field_real_bathrooms['und'][0]['value']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="bedrooms">
                        	<?php if(isset($obj->field_real_bedrooms['und'])) : ?>
								<span><?php print $obj->field_real_bedrooms['und'][0]['value']; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="property-price">
                            <?php if(isset($obj->field_real_price['und'])) : ?>
								<span><span class="amount">$<?php print number_format($obj->field_real_price['und'][0]['value']); ?></span></span>
                            <?php endif; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($page['sidebar']) : ?>
        <!-- START NOO MAINBODY -->
        <div class="container noo-mainbody">
          <div class="noo-mainbody-inner">
            <div class="row clearfix">
              <?php if(theme_get_setting('sidebar_position','citilights') == "left") : ?>
                <!-- START SIDEBAR -->
                <div class="noo-sidebar noo-sidebar-left col-xs-12 col-md-4">
                  <div class="noo-sidebar-inner">
                      <?php print render($page['sidebar']); ?> 
                  </div>
                </div>
                <!-- END SIDEBAR -->
              <?php endif; ?>
              
              <?php if(theme_get_setting('sidebar_position','citilights') == "no") : ?>
                <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                <?php print $messages; ?>
				<?php print render($page['content']); ?>
              <?php else : ?>
                <!-- START MAIN CONTENT -->
                <div class="noo-content col-xs-12 col-md-8">
                    <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                    <?php print $messages; ?>
					<?php print render($page['content']); ?>                        
                </div>        
                <!-- END MAIN CONTENT -->
              <?php endif; ?>
  
              <?php if(theme_get_setting('sidebar_position','citilights') == "right") : ?>
                <!-- START SIDEBAR -->
                <div class="noo-sidebar noo-sidebar-right col-xs-12 col-md-4">
                  <div class="noo-sidebar-inner">
                      <?php print render($page['sidebar']); ?> 
                  </div>
                </div>
                <!-- END SIDEBAR -->
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- END NOO MAINBODY -->
    <?php else : ?>
        <!-- START NOO-MAINBODY -->
        <div class="container noo-mainbody">
          <div class="noo-mainbody-inner">
              <div class="row clearfix">
                  <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                  <?php print $messages; ?>
				  <?php print render($page['content']); ?>	
              </div>
          </div>
        </div>
    <?php endif; ?>
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