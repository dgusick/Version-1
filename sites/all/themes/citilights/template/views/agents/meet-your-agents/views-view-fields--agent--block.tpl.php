<article class="hentry has-featured">
  <div class="agent-featured">
    <a class="content-thumb" href="<?php print url("user/" . $fields['uid']->content); ?>">
      <img src="<?php print image_style_url('agent_slider', $fields['field_agent_thumbnail']->content); ?>" alt="" />
    </a>
  </div>
  <div class="agent-wrap">
    <h2 class="agent-title"><a href="<?php print url("user/" . $fields['uid']->content); ?>" title="<?php print $fields['field_agent_name']->content; ?>"><?php print $fields['field_agent_name']->content; ?></a></h2>
    <div class="agent-excerpt">
      <p><?php print strip_tags($fields['field_agent_about']->content); ?></p>
    </div>
    <div class="agent-social-wrap">
      <div class="social-list agent-social">
        <?php if(!empty($fields['field_agent_facebook_url']->content)) ?><a href="<?php print $fields['field_agent_facebook_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-facebook"></i></a>
        <?php if(!empty($fields['field_agent_twitter_url']->content)) ?><a href="<?php print $fields['field_agent_twitter_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-twitter"></i></a>
        <?php if(!empty($fields['field_agent_google_plus_url']->content)) ?><a href="<?php print $fields['field_agent_google_plus_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-google-plus"></i></a>
        <?php if(!empty($fields['field_agent_linkedin_url']->content)) ?><a href="<?php print $fields['field_agent_linkedin_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-linkedin"></i></a>
        <?php if(!empty($fields['field_agent_pinterest_url']->content)) ?><a href="<?php print $fields['field_agent_pinterest_url']->content; ?>" title="Social" target="_blank"><i class="fa fa-pinterest"></i></a>
      </div>
    </div>
  </div>
</article>