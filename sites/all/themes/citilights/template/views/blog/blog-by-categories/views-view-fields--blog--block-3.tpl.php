<article class="hentry format-standard has-featured">
  <div class="content-wrap">
    <header class="content-header">
      <h2 class="content-title">
        <a href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>"><?php print $fields['title']->content; ?></a>
      </h2>
      <p class="content-meta">
        <?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'image') : ?>
        	<i class="fa fa-file-image-o nooicon-file-image-o"></i>
        <?php elseif($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'video') : ?>
        	<i class="fa fa-file-video-o nooicon-file-video-o"></i>
        <?php else : ?>
        	<i class="fa fa-file-audio-o nooicon-file-audio-o"></i>
		<?php endif; ?>
        <span>
          <?php print t('Posted in'); ?>
          <?php print $fields['field_blog_categories']->content; ?>
        </span>
        <span>
          <?php print t('on'); ?>
          <time class="entry-date">
            <?php print $fields['created']->content; ?>
          </time>
        </span>
        <span>
          <?php print t('by'); ?>
          <?php print $fields['name']->content; ?>
        </span>
        <span><a href="#" title="" class="meta-comments"><i class="fa fa-comments fa fa-comments nooicon-comments"></i>  <?php print $fields['comment_count']->content; ?> <?php print t('comments'); ?></a>
        </span>
      </p>
    </header>
    <div class="content-featured">
        <?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'video') : ?>
        	<?php $uri = explode('v/',$row->field_field_blog_multimedia[0]['rendered']['#file']->uri); ?>
            <div class="noo-video-container 16-9-ratio">
              <div class="video-inner">
              	<?php if($row->field_field_blog_multimedia[0]['rendered']['#file']->filemime == 'video/vimeo') : ?>
                    <iframe src="http://player.vimeo.com/video/<?php print $uri[1]; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ec155a" ></iframe>
                <?php else : ?>
                	<iframe src="http://www.youtube.com/embed/<?php print $uri[1]; ?>?feature=oembed" ></iframe>
				<?php endif; ?>
              </div>
            </div>
		<?php elseif($row->field_field_blog_multimedia[0]['rendered']['#file']->type == 'audio') : ?>
        	<?php print $fields['field_blog_multimedia']->content; ?>
		<?php else : ?>
        	<a class="content-thumb" href="<?php print $fields['path']->content; ?>" title="<?php print $fields['title']->content; ?>">
				<?php print $fields['field_blog_multimedia']->content; ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="content-excerpt">
      <p><?php print $fields['body']->content; ?></p>
      <div><a href="<?php print $fields['path']->content; ?>" class="read-more"><?php print t('Read More'); ?> <i class="fa fa-arrow-circle-o-right"></i></a>
      </div>
    </div>
  </div>
</article>