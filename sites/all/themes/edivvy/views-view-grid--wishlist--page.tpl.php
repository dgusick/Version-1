<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */

    $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
    global $user;
    
?>
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
                    	$url_pic = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.$item['field_picture_url'].'" />';  
                    }else{
                        
                        if($user_load->picture->uri){
                        $url_pic = theme_image_style(
                            array(
                                'style_name' => 'thumbnail',
                                'path' => $user_load->picture->uri,
                                'attributes' => array(
                                 'class' => 'img-thumbnail img-circle img-responsive thumb96'
                                 )            
                            )
                        ); 
                      }else{ 
                        $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
                        $url_pic = '<img class="img-thumbnail img-circle img-responsive thumb96" src="'.base_path().'/'.$base_theme_url.'/img/default-avatar.png" />';
                      }
                        
                        //$url_pic = $base_theme_url.'/img/default-avatar.png';
                    }
                    if($user->uid!=$item['uid'])  {
                
                $user_load = user_load($item['uid']);
                $user_link = drupal_get_path_alias('user/' . $item['uid']);
                ?>
                
                <div class="col-lg-4">
                    <div class="contact-box panel widget">
                     <div class="panel-body">
                     
                     <div class="row row-table">
                            <div class="col-xs-5 text-center">
                              <a href="<?php echo $user_link ?>">
                                        <?php echo $url_pic ?></a>
                                       <!-- <div class="m-t-xs font-bold">My Wishlist</div> -->
                                
                            </div>
                            <div class="col-xs-7">
                               <div class="pull-right btn btn-danger"><em class="fa fa-times-circle fa-fw"></em><?php print $item['ops']; ?></div>
                                <h3 class="mt0"><?php print $item['name']; ?></h3>
                                <!-- <p class="mb-sm"><i class="fa fa-inbox"></i> <?php print $item['mail']; ?> <a href="mailto: john.smith@something.com"></a>  </p> -->

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
               <!--  <div class="col-sm-12">
                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> Show More</button>
                </div> -->
            </div>
        </div>