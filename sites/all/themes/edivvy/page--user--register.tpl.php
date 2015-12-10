 <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">EDV</h1>

            </div>
            <?php if(  arg(0) == 'user') {?>
           <h3>Register as a recruiter</h3>
                    <?php } 
                    else  { ?>
                      <h3>Register as a candidate</h3>
                    <?php } ?>
            
            
            <p>Create account to see it in action.</p>
            
            <div id="content" class="column"><div class="section">
                <?php if ($tabs): ?><div class="tabs"><?php //print render($tabs); ?></div><?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print $messages; ?>
                <?php print render($page['content']); ?>
                <?php print $feed_icons; ?>
              </div></div> <!-- /.section, /#content -->
              
              
            
            <p class="m-t"> <small>Edivvy &copy; 2015</small> </p>
        </div>
    </div>
    
    
