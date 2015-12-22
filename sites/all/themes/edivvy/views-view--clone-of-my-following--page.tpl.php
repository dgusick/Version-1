<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
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
                                        <div class="m-t-xs font-bold">I'm Following</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <h3><strong><?php print $item['name']; ?></strong></h3>
                             <!--       <p><i class="fa fa-linkedin-square"></i> <?php print $item['field_first_name']; ?>.<?php print $item['field_last_name']; ?></p> -->
                                    <p class="email_row"><i class="fa fa-inbox"></i> <a href="mailto:john.smith@something.com"> <?php print $item['mail']; ?></a></p>

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