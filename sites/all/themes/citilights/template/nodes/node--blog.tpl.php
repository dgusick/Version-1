<?php
$share_url = $GLOBALS['base_url'] . $node_url;
$account = user_load($node->uid);
?>
<div class="single single-post">
  <article class="format-standard hentry has-featured">
    <div class="content-featured">
      <div class="content-thumb">
        <?php if($node->field_blog_multimedia['und'][0]['file']->type == 'video') : ?>
        	<?php $uri = explode('v/',$node->field_blog_multimedia['und'][0]['file']->uri); ?>
            <div class="noo-video-container 16-9-ratio">
              <div class="video-inner">
              	<?php if($node->field_blog_multimedia['und'][0]['file']->filemime == 'video/vimeo') : ?>
                    <iframe src="http://player.vimeo.com/video/<?php print $uri[1]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" ></iframe>
                <?php else : ?>
                	<iframe src="http://www.youtube.com/embed/<?php print $uri[1]; ?>?feature=oembed" ></iframe>
				<?php endif; ?>
              </div>
            </div>
		<?php else : ?>
        	<?php print render($content['field_blog_multimedia']); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="content-wrap">
      <div class="content-share">
        <ul class="noo-social social-share">
          <li><a href="http://www.facebook.com/sharer.php?u=<?php print $share_url;?>&t=<?php print $title;?>" class="noo-share" title="Share on Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="http://twitter.com/home?status=<?php print $title;?> <?php print $share_url;?>" class="noo-share" title="Share on Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php print $share_url;?>/&amp;title=<?php print $title;?>" class="noo-share" title="Share on Google+" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
  
      <header class="content-header">
        <h1 class="content-title"><?php print $title; ?></h1>
        <p class="content-meta">
          <?php if($node->field_blog_multimedia['und'][0]['file']->type == 'image') : ?>
              <i class="fa fa-file-image-o nooicon-file-image-o"></i>
          <?php elseif($node->field_blog_multimedia['und'][0]['file']->type == 'video') : ?>
              <i class="fa fa-file-video-o nooicon-file-video-o"></i>
          <?php else : ?>
              <i class="fa fa-file-audio-o nooicon-file-audio-o"></i>
          <?php endif; ?>
          <span>
            <?php print t('Posted in'); ?>
            <?php $categories = array(); ?>
            <?php if (isset($content['field_blog_categories']['#items'])): ?>
              <?php foreach ($content['field_blog_categories']['#items'] as $item): ?>
                <?php $categories[] = l($item['taxonomy_term']->name, 'taxonomy/term/' . $item['tid'], array('attributes' => array('title' => 'View all posts in: ' . $item['taxonomy_term']->name))); ?>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php print implode(", ", $categories); ?>
          </span>
          <span>
            <?php print t('on'); ?>
            <time class="entry-date" datetime="<?php print date('Y-m-d\TH:i:s', strtotime($node->created)); ?>">
              <?php print format_date($node->created, 'custom', 'F d, Y'); ?>
            </time>
          </span>
          <span>
            <?php print t('by'); ?>
            <?php print l($account->name, 'user/' . $account->uid, array('attributes' => array('title' => 'Posts by admin: ' . $account->name))) ?>
          </span>
          <span><a href="#" title='View all comments on: "<?php print $title ?>"' class="meta-comments"> <?php print $comment_count; ?> Comments</a>
          </span>
        </p>
      </header>
  
      <div class="content">
        <?php print render($content['body']); ?>
      </div>
      <div class="entry-tags">
        <span><?php print t('Tags'); ?>:</span>
        <?php if (isset($content['field_blog_tags']['#items'])): ?>
          <?php foreach ($content['field_blog_tags']['#items'] as $item): ?>
            <?php print l($item['taxonomy_term']->name, 'taxonomy/term/' . $item['tid']); ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  
    <footer class="content-footer">
      <div id="author-bio">
        <div class="author-avatar">
        <?php if (isset($account->picture)): ?>
          <img src="<?php print image_style_url('blog_author', $account->picture->uri); ?>" alt="">
        <?php endif; ?>
        </div>
        <div class="author-info">
          <span><?php print t('About Author'); ?></span>
          <h4><?php print l($account->name, 'user/' . $account->uid, array('attributes' => array('title' => 'Posts by admin: ' . $account->name))) ?></h4>
          <?php if (isset($account->field_user_about['und'][0]['value'])): ?>
            <p><?php print $account->field_user_about['und'][0]['value'];?></p>
          <?php endif;?>
        </div>
      </div>
    </footer>
  </article>
  
  <?php print render($content['comments']); ?>
</div>