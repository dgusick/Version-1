<?php //  class="m-t" role="form"  
//print_r(array_keys($form)); 
//print_r(array_keys($form['account']))?>
				<div class="form-group has-feedback">
				   <?php unset($form['field_first_name']); ?>
                    
                    <input required="" class="form-control required" placeholder="Name" type="text" id="edit-field-first-name-und-0-value" name="field_first_name[und][0][value]" >
                </div>
                
                <div class="form-group has-feedback">
                  <?php unset($form['account']['mail']); ?>
                  <input type="email" id="edit-mail"  placeholder="Enter email" name="mail" value="<?php echo isset($form['account']['mail']['#default_value']) ? $form['account']['mail']['#default_value'] : '' ; ?>" size="60" maxlength="254" class="form-control form-text required">
                  <span class="fa fa-envelope form-control-feedback text-muted"></span>
                </div>
                <div class="form-group has-feedback">
                  <?php unset($form['account']['pass']); ?>
                   <input type="password" id="edit-pass"  placeholder="Password" name="pass" size="25" maxlength="128" class="form-control form-text required">
                   <span class="fa fa-lock form-control-feedback text-muted"></span>
                </div>
                <div class="clearfix">
                 <?php  //field_agree_term 
                 unset($form['field_agree_term']);   ?>
                        <div class="checkbox c-checkbox pull-left mt0"><label> <input type="checkbox" id="edit-field-agree-term-und" name="field_agree_term[und]" value="1"  class="form-checkbox required"><span class="fa fa-check"></span> Agree the terms and policy </label></div>
                </div>
                
                <?php unset($form['actions']); ?>
                <button type="submit" id="edit-submit" name="op"  class="form-submit btn btn-primary block full-width m-b" >Create new account</button>
                
                
                <button class="btn btn-success btn-block btn-facebook mt-lg" type="button" onclick="window.location.href='<?php echo url('connect/oauthconnector_linkedin') ?>'" ><i class="fa fa-linkedin"></i>&nbsp;&nbsp;<span class="bold">Sign up with LinkedIn</span></button>
                <br/>
                <p class="text-center">Have an account?</p><a class="btn btn-block btn-default" href="<?php echo url('user/login'); ?>">Already have an account?</a></p>

                <p class="text-center">
                <?php if(  arg(0) == 'user') {?>
                    <a href="<?php echo url('candidate/register'); ?>"><span>Register as Candidate</span></a>
                    <?php } 
                    else  { ?>
                        <a href="<?php echo url('paid-membership'); ?>"><span>Register as Recruiter</span></a>
                    <?php } ?>
                 </p>   
   
           
<div class="edivvy-user-register-form-wrapper">
  <?php print drupal_render_children($form) ?>
</div>
<br>