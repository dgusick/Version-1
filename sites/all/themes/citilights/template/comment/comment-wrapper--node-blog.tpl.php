<?php
/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 *
 * @ingroup themeable
 */
?>
<div id="comments" class="comments-area">
  <?php if($node->comment_count > 0) : ?>
    <h2 class="comments-title"><?php print t('There are'); ?><span>&nbsp;<?php print $node->comment_count; ?> <?php print t('Comment(s)'); ?>&nbsp;</span><?php print t('in this post'); ?></h2>
  <?php endif; ?>
  <?php print render($content['comments']); ?>

  <div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title"><?php print t('Leave'); ?><span>&nbsp;<?php print t('Your thought'); ?>&nbsp;</span><?php print t('on this post'); ?></h3>
    <?php print render($content['comment_form']); ?>
  </div>
</div>