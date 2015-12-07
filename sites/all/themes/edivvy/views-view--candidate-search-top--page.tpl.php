<?php
    $base_theme_url = drupal_get_path('theme',$GLOBALS['theme']);
    global $user;
    $search_value = $_GET['top-search'];
    $count_result_search = 0;
    $num = 0;
    $already_matched = array(); 
?>
		<!--
		<div class="row wrapper  white-bg page-heading">
            <div class="col-lg-12">
                <h2>Search Candidates</h2>
                <p class="text-muted">Choose a Title, A Skill, and Location</p>
            </div>

        </div>
        -->

        <div class="row wrapper white-bg form-inline pd-top-content">
            
            <?php
                $exposed_form = $view->display_handler->get_plugin('exposed_form');
                print $exposed_form->render_exposed_form(true);
            ?>
             <?php if ($attachment_after): ?>
		    <div class="attachment attachment-after">
		      <?php print $attachment_after; ?>
		    </div>
		  <?php endif;    ?>
		  <?php if ($attachment_before): ?>
		    <div class="attachment attachment-before">
		      <?php print $attachment_before; ?>
		    </div>
		  <?php endif;   ?>
		  
        </div>
        
        <div class="wrapper wrapper-content  animated fadeInRight pd-top-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h2 class="pull-left">Search results</h2>
                            <span class="pull-right"><a type="button" class="btn btn-w-m btn-xs btn-white save-search-btn"><i class="fa fa-save"></i>&nbsp; Save search</a></span>
                            <br/>
                            <br/>
                            <div class="clients-list">
                                <ul class="nav nav-tabs">
                                    
                                    <?php  foreach ($view->style_plugin->rendered_fields as $delta => $item): ?>
                                    
                                    <?php
                                        //get count of search results
                                        $compare = strtolower($item['field_skills']);
                                        $keyword = strtolower($search_value);
                                                    
                                        $uid = $item['uid'];
                                            
                                        if(strpos($compare, $keyword) !== false){
                                            $count_result_search++;
                                        }
                                    ?>  
                                        
                                    <?php endforeach; ?>
                                    
                                    <span class="pull-right small text-muted"><?php echo $count_result_search; ?> results</span>
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Profiles</a></li>
                                    <!--<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Other</a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="full-height-scroll">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <tbody>
                                                    
                                                    
                                                    
                                                    <?php  foreach ($view->style_plugin->rendered_fields as $delta => $item): ?>
                                                   
                                                    <?php
                                                        
                                                        
                                                        if($item['field_picture_url'] != ''){
                                                        	$url_pic = $item['field_picture_url'];
                                                        }else{
                                                        	$url_pic = $base_theme_url.'/img/default-avatar.png';
                                                        }
                                                        if($user->uid!=$item['uid'])
                                                        {
                                                    ?>
                                                    
                                                    <?php
                                                    
                                                    $compare = strtolower($item['field_skills']);
                                                    $keyword = strtolower($search_value);
                                                    
                                                   	//echo $compare;	
                                                   
                                                    $uid = $item['uid'];
                                            
                                                    if(strpos($compare, $keyword) !== false){
                                                    	?>
                                                    		<tr>
                                                    	<?php
                                                    }
                                                    else if($keyword==""){
                                                    	?>
                                                    		<tr>
                                                    	<?php
                                                    }
                                                    else
                                                    {
                                                        ?>
	                                                    	<tr style="display:none">
	                                                    <?php
                                                    }
                                                    ?>
	                                                        <td class="client-avatar"><img alt="image" src="<?php echo $url_pic ?>"> </td>
	                                                        <td><a data-toggle="tab" href="#contact-1" class="client-link"><?php print $item['name']; ?></a></td>
	                                                        <td> <?php print $item['field_job_level']; ?> </td>
	                                                        <td> <?php print $item['field_role_department']; ?> </td>
	                                                        <td class="client-status">
	                                                            <span>
	                                                                <a data-toggle="button" type="button" class="btn btn-xs btn-outline btn-danger save-btn"><i class="fa fa-heart-o"></i> Save </a>
	                                                                <a data-toggle="button" type="button"  class="btn btn-xs btn-outline  btn-success contact-btn "><i class="fa fa-envelope-o"></i> Contact </a>
	                                                            </span>
	                                                        </td>
                                                    	</tr>
                                                    <?php } ?>
                                                    <?php endforeach; ?>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <?php
                            	//echo $view->get_items_per_page();
                            	//echo $count_result_search;
                            	
                            	if($count_result_search>$view->get_items_per_page() or !isset($search_value) or ($search_value==""))
                            	{
                            		echo theme('pager'); 
                            	}
                            ?>
                            <!--
                            <div class="hr-line-dashed"></div>
                            <div class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-white" type="button"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-white">1</button>
                                    <button class="btn btn-white  active">2</button>
                                    <button class="btn btn-white">3</button>
                                    <button class="btn btn-white">4</button>
                                    <button class="btn btn-white">5</button>
                                    <button class="btn btn-white">6</button>
                                    <button class="btn btn-white">7</button>
                                    <button class="btn btn-white" type="button"><i class="fa fa-chevron-right"></i> </button>
                                </div>
                            </div>
                            -->

                        </div>
                    </div>
                </div>
                </div>