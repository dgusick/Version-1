
    
    <div class="edivvy-user-pass-form-wrapper">
    <p class="text-center">Fill with your mail to receive instructions on how to reset your password.</p>
                  <div class="form-group has-feedback">
                  <?php unset($form['name']);  ?>
                     <label for="resetInputEmail1" class="text-muted">Email address</label>
                     <input id="resetInputEmail1" name="name" type="email" placeholder="Enter email" autocomplete="off" class="form-control">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                             <?php unset($form['actions']);  ?> 
                  <button type="submit" name="op" id="edit-submit" class="btn btn-danger btn-block">Reset</button>
                  
                 <?php print drupal_render_children($form) ?>
                 
                 <br/>
                 <p class="text-center">Remember your password?</p><a class="btn btn-block btn-default" href="<?php echo url('user/login'); ?>">Login</a></p>


                </div>
                