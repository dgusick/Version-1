<article class="hentry">
  <div class="agent-featured">
    <a class="content-thumb" href="<?php print url("user/" . $fields['uid']->content); ?>" title="<?php print $fields['field_agent_name']->content; ?>">
      <img src="<?php print $fields['field_agent_thumbnail']->content; ?>" class="attachment-agent-thumb" alt="">
    </a>
  </div>
  <div class="agent-wrap">
    <div class="agent-summary">
      <div class="agent-info">
        <div><i class="fa fa-phone"></i>&nbsp;<?php print $fields['field_agent_mobile']->content; ?></div>
        <div><i class="fa fa-tablet"></i>&nbsp;<?php print $fields['field_agent_phone']->content; ?></div>
        <div><i class="fa fa-envelope-square"></i>&nbsp;<?php print $fields['field_agent_email']->content; ?></div>
        <div><i class="fa fa-skype"></i>&nbsp;<?php print $fields['field_agent_skype']->content; ?></div>
      </div>
      <div class="agent-desc">
        <ul class="social-list agent-social clearfix">
          <?php if(!empty($fields['field_agent_facebook_url']->content)) ?><li><a href="<?php print $fields['field_agent_facebook_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <?php if(!empty($fields['field_agent_twitter_url']->content)) ?><li><a href="<?php print $fields['field_agent_twitter_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <?php if(!empty($fields['field_agent_google_plus_url']->content)) ?><li><a href="<?php print $fields['field_agent_google_plus_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          <?php if(!empty($fields['field_agent_linkedin_url']->content)) ?><li><a href="<?php print $fields['field_agent_linkedin_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          <?php if(!empty($fields['field_agent_pinterest_url']->content)) ?><li><a href="<?php print $fields['field_agent_pinterest_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-pinterest"></i></a></li>
        </ul>
        <div class="agent-action">
          <a href="<?php print url("user/" . $fields['uid']->content); ?>"><?php print $fields['field_agent_name']->content; ?></a>
        </div>
      </div>
    </div>
  </div>
</article>