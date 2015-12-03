<?php // form class ---   class="m-t" role="form"  ?>
                <div class="form-group">
                   <?php  unset($form['name']);  ?>
                   <input type="email" id="edit-name" placeholder="Username" name="name" value="" size="60" maxlength="60" class="form-control form-text required">
                  
                </div>
                
                <div class="form-group">
                  <?php unset($form['pass']);  ?>
                  <input type="password" id="edit-pass" placeholder="Password" name="pass" size="60" maxlength="128" class="form-control form-text required">
                </div>
                <?php unset($form['actions']);  ?>
                <button type="submit" id="edit-submit" name="op"  class="btn btn-primary block full-width m-b" >Login</button>
                
                <button type="button" onclick="window.location.href='<?php echo url('connect/oauthconnector_linkedin') ?>'" class="btn btn-success btn-facebook block full-width m-b"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;<span class="bold">Sign in using LinkedIn</span></button>


                <a href="<?php echo url('user/password'); ?>"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo url('user/register'); ?>">Create an account</a>


<div class="edivvy-user-login-form-wrapper">
  <?php print drupal_render_children($form) ?>
</div>

<br/>