 <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            
            <div id="content" class="column"><div class="section">
                <?php if ($tabs): ?><div class="tabs"><?php //print render($tabs); ?></div><?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print $messages; ?>
                <?php print render($page['content']); ?>
                <?php print $feed_icons; ?>
              </div></div> <!-- /.section, /#content -->
              
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>