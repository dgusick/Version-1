<article class="noo-agent">
  <!-- START CONTENT TITLE -->
  <h1 class="content-title"><?php print render($content['field_agent_name']); ?></h1>
  <!-- START CONTENT TITLE -->

  <!-- START AGENT SOCIAL -->
  <ul class="social-list agent-social clearfix">
    <?php if (isset($content['field_agent_facebook_url'][0]['#markup'])) : ?>
      <li><a href="<?php print $content['field_agent_facebook_url'][0]['#markup']; ?>" title="Social" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <?php endif; ?>
    <?php if (isset($content['field_agent_twitter_url'][0]['#markup'])) : ?>
      <li><a href="<?php print $content['field_agent_twitter_url'][0]['#markup']; ?>" title="Social" target="_blank"><i class="fa fa-twitter"></i></a></li>
    <?php endif; ?>
    <?php if (isset($content['field_agent_google_plus_url'][0]['#markup'])) : ?>
      <li><a href="<?php print $content['field_agent_google_plus_url'][0]['#markup']; ?>" title="Social" target="_blank"><i class="fa fa-google-plus"></i></a></li>
    <?php endif; ?>
    <?php if (isset($content['field_agent_linkedin_url'][0]['#markup'])) : ?>
      <li><a href="<?php print $content['field_agent_linkedin_url'][0]['#markup']; ?>" title="Social" target="_blank"><i class="fa fa-linkedin"></i></a></li>
    <?php endif; ?>
    <?php if (isset($content['field_agent_pinterest_url'][0]['#markup'])) : ?>
      <li><a href="<?php print $content['field_agent_pinterest_url'][0]['#markup']; ?>" title="Social" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    <?php endif; ?>
  </ul>
  <!-- END AGENT SOCIAL -->

  <!-- START AGENT INFO -->
  <div class="agent-info clearfix">
    <div class="content-featured">
      <div class="content-thumb">
        <img src="<?php print image_style_url('agent_avatar', $content['field_agent_thumbnail'][0]['#item']['uri']); ?>" alt="">
      </div>
    </div>
    <div class="agent-detail">
      <h4 class="agent-detail-title"><?php print t('Contact Info'); ?></h4>
      <div class="agent-detail-info">
        <?php if ($content['field_agent_phone']): ?>
          <div class=""><i class="fa fa-phone"></i>&nbsp;
            <span>Phone:</span><?php print $content['field_agent_phone'][0]['#markup']; ?></div>
        <?php endif; ?>
        <?php if ($content['field_agent_mobile']): ?>
          <div class=""><i class="fa fa-tablet"></i>&nbsp;
            <span>Mobile:</span><?php print $content['field_agent_mobile'][0]['#markup']; ?></div>
        <?php endif; ?>
        <?php if ($content['field_agent_email']): ?>
          <div class=""><i class="fa fa-envelope-square"></i>&nbsp;
            <span>Email:</span><?php print $content['field_agent_email'][0]['#markup']; ?></div>
        <?php endif; ?>
        <?php if ($content['field_agent_skype']): ?>
          <div class=""><i class="fa fa-skype"></i>&nbsp;
            <span>Skype:</span><?php print $content['field_agent_skype'][0]['#markup']; ?></div>
        <?php endif; ?>
      </div>
      <div class="agent-desc">
        <h4 class="agent-detail-title"><?php print t('About Me'); ?></h4>
        <?php print render($content['field_agent_about']); ?>
      </div>
    </div>
  </div>
  <!-- END AGENT INFO -->

  <!-- START CONACT AGENT -->
  <div class="row conact-agent clearfix">
    <h2 class="content-title col-md-12"><?php print t('Contact Me'); ?></h2>
    <?php
    $block = module_invoke('webform', 'block_view', 'client-block-49');
    print render($block['content']);
    ?>
  </div>
  <!-- END CONACT AGENT -->

  <!-- START AGENT PROPERTIES -->
  <?php print views_embed_view('real_estate', 'agent', $elements['#account']->uid); ?>

  <!-- END AGENT PROPERTIES -->
</article>