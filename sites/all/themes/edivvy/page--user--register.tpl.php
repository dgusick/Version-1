<div class="wrapper">

        <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                       <a href="#" style="color:white; font-size: 22px; margin-top: 0; font-weight: bold;">Edivvy
                       <img style="display:none;" src="<?php echo $logo; ?>" alt="Image" class="block-center img-rounded">
                        </a>
                </div>
            	<div class="panel-body">     
            		<?php if(  arg(0) == 'user') :?>
           			<h4 class="text-center">Register as a recruiter</h4>
                    <?php   
                    else :  ?>
                      <h4 class="text-center">Register as a candidate</h4>
                    <?php endif; ?>
            
            
            <p class="text-center pv">Create account to see it in action.</p>
            
            <div id="content" class="column"><div class="section">
                <?php if ($tabs): ?><div class="tabs"><?php //print render($tabs); ?></div><?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print $messages; ?>
                <?php print render($page['content']); ?>
                <?php print $feed_icons; ?>
              </div></div> <!-- /.section, /#content -->
              
         
                </div> <!-- panel-body-->
        </div> 
        
         <div class="p-lg text-center">
            <p class="m-t"> <small>Edivvy &copy; <?php echo date('Y'); ?></small> </p>
         </div>
    
     </div>  <!--block-center mt-xl wd-xl -->

    </div>  <!--wrapper close -->
