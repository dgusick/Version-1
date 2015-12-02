<?php //  class="m-t" role="form"  

//print_r(array_keys($form['account']))?>
				<div class="form-group">
				   
                    <input type="text" class="form-control" placeholder="Name" required="">
                </div>
                <div class="form-group">
                  <?php unset($form['account']['mail']); ?>
                  <input type="email" id="edit-mail"  placeholder="Email" name="mail" value="" size="60" maxlength="254" class="form-control form-text required">
                </div>
                <div class="form-group">
                <?php unset($form['account']['pass']); ?>
                   <input type="password" id="edit-pass"  placeholder="Password" name="pass" size="25" maxlength="128" class="form-control form-text required">
   
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <?php unset($form['actions']); ?>
                <button type="submit" id="edit-submit" name="op"  class="form-submit btn btn-primary block full-width m-b" >Create new account</button>
                
                
                <button class="btn btn-success btn-facebook" type="button"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;<span class="bold">Sign up with LinkedIn</span></button>
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo url('user/login'); ?>">Login</a>
                
                
   
           
<div class="edivvy-user-register-form-wrapper">
  <?php print drupal_render_children($form) ?>
</div>
<br>