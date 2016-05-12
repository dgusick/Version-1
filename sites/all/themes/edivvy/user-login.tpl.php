<?php // form class ---   class="m-t" role="form"  ?>
                <div class="form-group has-feedback">
                   <?php  unset($form['name']);  ?>
                   <input type="email" id="edit-name" placeholder="Enter email" name="name" value="" size="60" maxlength="60" class="form-control form-text required">
                  <span class="fa fa-envelope form-control-feedback text-muted"></span>
                </div>
                
                <div class="form-group has-feedback">
                  <?php unset($form['pass']);  ?>
                  <input type="password" id="edit-pass" placeholder="Password" name="pass" size="60" maxlength="128" class="form-control form-text required">
                  <span class="fa fa-lock form-control-feedback text-muted"></span>
                </div>
                
           <?php unset($form['actions']);  ?>               
            <div class="clearfix mt-lg">  
              <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="" name="remember">
                           <span class="fa fa-check"></span>Remember Me</label>
              </div>
               <div class="pull-right">
                <a class="text-muted" href="<?php echo url('user/password'); ?>?destination=user/login">Forgot your password?</a>
               </div>
            </div> 
            <div class="clearfix">
                     <div class="checkbox c-checkbox mt0">
                        <label>
                           <input type="checkbox" value="" required="" name="agreed" data-parsley-multiple="agreed" data-parsley-id="11" checked>
                           <span class="fa fa-check"></span>Agree to <a href="<?php echo url('node/155'); ?>" target="_blank">terms and conditions</a>
                        </label>
                     </div>
            </div>
                <button type="submit" id="edit-submit" name="op"  class="btn btn-block btn-primary mt-lg" >Login</button>
                
                <button type="button" onclick="window.location.href='<?php echo url('connect/oauthconnector_linkedin') ?>'" class="btn btn-success btn-block btn-facebook block full-width m-b mt-lg"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;<span class="bold">Sign in as a Recruiter using LinkedIn<!--Sign in using LinkedIn--></span></button>
        
                 <p class="pt-lg text-center">Need to Signup?</p>
                  <!-- <a class="btn btn-block btn-default" href="<?php echo url('user/register'); ?>">Do not have an account?</a> -->
                 
                  <p class="text-center">
                <?php if(  arg(0) == 'user') {?>
                    <a class="btn btn-block btn-default" href="<?php echo url('candidate/register'); ?>"><span>Register as Candidate</span></a>
                    <?php } 
                      { ?>
                        <a class="btn btn-block btn-default" href="<?php echo url('paid-membership'); ?>"><span>Register as Recruiter</span></a>
                    <?php } ?>
                 </p> 
                 
                
                <?php if(0 && arg(0) == 'user') {?>
                    <a href="<?php echo url('candidate/login'); ?>"><small>Login as Candidate</small></a>
                    <?php } 
                    
                    else if(0) { ?>
                        <a href="<?php echo url('user/login'); ?>"><small>Login as Recruiter</small></a>
                    <?php } ?>

<div class="edivvy-user-login-form-wrapper">
  <?php print drupal_render_children($form) ?>
</div>

<br/>