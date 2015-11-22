<?php $obj = node_load(arg(1)); ?>
<?php $agent = profile2_load_by_user(user_load($obj->uid), 'agent'); ?>
<?php if ($agent): ?>
  <!-- START AGENT PROPERTY -->
  <div class="agent-property">
	<div class="agent-property-title">
	  <h3><?php print t('Contact Agent'); ?></h3>
	</div>
	<div class="agents grid clearfix">
	  <article class="hentry">
		<div class="agent-featured">
		  <a class="content-thumb" href="<?php print url('user/' . $agent->uid); ?>">
			<img src="<?php print image_style_url('agent_avatar', $agent->field_agent_thumbnail['und'][0]['uri']); ?>" class="attachment-agent-thumb" alt="">
		  </a>
		</div>
		<div class="agent-wrap">
		  <div class="agent-summary">
			<div class="agent-info">

			  <div>
				<i class="fa fa-phone"></i>
				&nbsp;
				<?php if(isset($agent->field_agent_phone['und'])) print $agent->field_agent_phone['und'][0]['value']; ?>
			  </div>
			  <div>
				<i class="fa fa-tablet"></i>
				&nbsp;
				<?php if(isset($agent->field_agent_mobile['und'])) print $agent->field_agent_mobile['und'][0]['value']; ?>
			  </div>
			  <div>
				<i class="fa fa-envelope-square"></i>
				&nbsp;
				<?php if(isset($agent->field_agent_email['und'])) print $agent->field_agent_email['und'][0]['email']; ?>
			  </div>
			  <div>
				<i class="fa fa-skype"></i>
				&nbsp;
				<?php if(isset($agent->field_agent_skype['und'])) print $agent->field_agent_skype['und'][0]['value']; ?></div>
			</div>
			<div class="agent-desc">
			  <ul class="social-list agent-social clearfix">
				<li><a href="<?php print $agent->field_agent_facebook_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?php print $agent->field_agent_twitter_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="<?php print $agent->field_agent_google_plus_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="<?php print $agent->field_agent_linkedin_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="<?php print $agent->field_agent_pinterest_url['und'][0]['value']; ?>" title="Social" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			  </ul>
			  <div class="agent-action">
				<?php if(isset($agent->field_agent_name['und'])) print l($agent->field_agent_name['und'][0]['value'], 'user/' . $agent->uid); ?>
			  </div>
			</div>

		  </div>
		</div>
	  </article>
	  <div class="conact-agent">
		<?php
		$block = module_invoke('webform', 'block_view', 'client-block-49');
		print render($block['content']);
		?>
	  </div>
	</div>
  </div>
  <!-- START AGENT PROPERTY -->
<?php endif; ?>