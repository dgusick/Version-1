<div class="noo-control-group">
  <div class="group-title">
  	<?php if(isset($form['profile_agent']['#entity']->field_agent_name['und'])) : ?>
		<?php print t('Welcome back, @name', array('@name' => $form['profile_agent']['#entity']->field_agent_name['und'][0]['value'])); ?>
    <?php endif; ?>
  </div>
  <div class="group-container row">
    <div class="form-message">
    </div>
    <div class="col-md-12">
      <div class="form-group s-profile-title">
        <?php print render($form['profile_agent']['field_agent_name']); ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group s-profile-position">
        <?php print render($form['profile_agent']['field_agent_position']); ?>
      </div>
      <div class="form-group s-profile-email">
        <?php print render($form['profile_agent']['field_agent_email']); ?>
      </div>
      <div class="form-group s-profile-phone">
        <?php print render($form['profile_agent']['field_agent_phone']); ?>
      </div>
      <div class="form-group s-profile-mobile">
        <?php print render($form['profile_agent']['field_agent_mobile']); ?>
      </div>
      <div class="form-group s-profile-skype">
        <?php print render($form['profile_agent']['field_agent_skype']); ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group s-profile-desc">
        <?php print render($form['profile_agent']['field_agent_about']); ?>
      </div>
      <div id="upload-container">
        <?php print render($form['profile_agent']['field_agent_thumbnail']); ?>
<!--        <label>Avatar</label>
        <div id="aaiu-upload-container" class="row">
          <div class="col-md-6 col-xs-12">
            <div id="aaiu-upload-imagelist">
              <ul id="aaiu-ul-list" class="aaiu-upload-list"></ul>
            </div>
            <div id="uploaded-images">
              <div class="uploaded-img">
                <img src="images/agent/agent5.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <p>Recommended size: 370x500</p>
            <input type="hidden" name="avatar" id="avatar" value="6609">
            <div class="moxie-shim moxie-input moxie-shim-html5">
              <label for="input-upload" class="btn btn-secondary btn-lg">Select Images</label>
              <input id="input-upload" type="file" multiple="" accept="image/jpeg,image/gif,image/png">
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</div>
<div class="noo-control-group">
  <div class="group-title"><?php print t('Social Network'); ?></div>
  <div class="group-container row">
    <div class="col-md-6">
      <div class="form-group s-profile-facebook">
        <?php print render($form['profile_agent']['field_agent_facebook_url']); ?>
      </div>
      <div class="form-group s-profile-twitter">
        <?php print render($form['profile_agent']['field_agent_twitter_url']); ?>
      </div>
      <div class="form-group s-profile-google_plus">
        <?php print render($form['profile_agent']['field_agent_google_plus_url']); ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group s-profile-linkedin">
        <?php print render($form['profile_agent']['field_agent_linkedin_url']); ?>
      </div>
      <div class="form-group s-profile-pinterest">
        <?php print render($form['profile_agent']['field_agent_pinterest_url']); ?>
      </div>
    </div>
    <div class="col-md-12">
      <div class="noo-submit">
        <?php print render($form['actions']); ?>
      </div>
      
    </div>
  </div>
</div>

<?php print drupal_render_children($form); ?>
