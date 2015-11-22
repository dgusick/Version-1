<?php

include_once './' . drupal_get_path('theme', 'citilights') . '/inc/template.process.inc';
include_once './' . drupal_get_path('theme', 'citilights') . '/inc/template.node.process.inc';

/**
 * Global $base_url
 */
function base_url() {
  global $base_url;
  return $base_url;
}

/**
 * Implements theme_menu_tree().
 */
function citilights_menu_tree__main_menu($variables) {
	return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_menu_link__[MENU NAME].
 */
function citilights_menu_link__main_menu($variables) {

  $element = $variables['element'];
  $sub_menu = '';   

  // set the global variable in order to use it in hook_menu_tree()
  // I called it "level" to avoid confusing with the $depth
  global $level;

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
	$sub_menu = str_replace('class="nav navbar-nav"','class="dropdown-menu"',$sub_menu);
    $level = 1; // set the level as first for each list with submenu
  }
  else {
    $level = $element['#original_link']['depth'];
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  $string = drupal_attributes($element['#attributes']);
  $class = "";
  if (preg_match('/expanded/',$string)) {
	  if($element['#original_link']['depth'] == '1') {
	  	$class = 'dropdown';
		//$output = '<a href="'.str_replace('<front>','',$element['#href']).'">'.strip_tags($output).' <span class="caret"></span></a>';
		$output = l($element['#title'].'<span class="caret"></span>', url($element['#href']),  array( 'external' => TRUE, 'html' => TRUE));
	  	return '<li class="' . $class . '">' . $output . $sub_menu . "</li>\n";
	  } else {
	  	$class = 'dropdown-submenu';
		$output = '<a href="javascript:void(0)">'.strip_tags($output).'</a>';
	  	return '<li class="' . $class . '">' . $output . $sub_menu . "</li>\n";
	  }
  }
  else {
  	  $arr = $element['#localized_options'] ;
	  if(drupal_is_front_page()) {
	  	if(isset($arr['fragment']) && $arr['fragment'] ) {
			$output = l($element['#title'], '',  array('fragment' => $arr['fragment'], 'external' => TRUE));
			return '<li class="' . $class . '">' . $output . $sub_menu . "</li>\n";
		}
		else {
			return '<li ' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";	
		}
	  }
	  else {
	  	return '<li ' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
	  }
  }
}

function citilights_menu_link__menu_top_menu($variables) {

  $element = $variables['element'];
  $sub_menu = '';  

  $arr = $element['#localized_options'] ;
  
  if(isset($element['#attributes']['icon'])) {
	  if (strpos($element['#href'], 'user') !== FALSE)
		$output = l('<i class="fa '.$element['#attributes']['icon'][0].'"></i> '.$element['#title'], base_path().$element['#href'], array('external' => TRUE, 'html' => TRUE));
	  else
		$output = l('<i class="fa '.$element['#attributes']['icon'][0].'"></i> '.$element['#title'], $element['#href'], array('external' => TRUE, 'html' => TRUE));
  }
  else {
	  if (strpos($element['#href'], 'user') !== FALSE)
		$output = l($element['#title'], base_path().$element['#href'], $element['#localized_options']);
	  else
		$output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  
  return '<li class="content-item">' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements theme_field__field_type().
 */
function citilights_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // With raw options we render data without wrapper.
  if (isset($variables['element']['#raw']) && $variables['element']['#raw']) {
    $terms = array();
    foreach ($variables['items'] as $delta => $item) {
      $terms[] = drupal_render($item);
    }
    $output .= implode(', ', $terms);
  }
  else {
    // Render the items.
    $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
    foreach ($variables['items'] as $delta => $item) {
      $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
    }
    $output .= '</ul>';
    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';
  }
  return $output;
}

/**
 * Override of theme('textarea').
 * Deprecate misc/textarea.js in favor of using the 'resize' CSS3 property.
 */
function citilights_textarea($variables) {
  $element = $variables['element'];
  $element['#attributes']['name'] = $element['#name'];
  $element['#attributes']['id'] = $element['#id'];
  $element['#attributes']['cols'] = $element['#cols'];
  $element['#attributes']['rows'] = $element['#rows'];
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  // Add resizable behavior.
  if (!empty($element['#resizable'])) {
    $wrapper_attributes['class'][] = 'resizable';
  }

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element['#attributes']) . '>' . check_plain($element['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

/**
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function citilights_form_alter(&$form, &$form_state, $form_id) {
  if (strpos($form_id, "webform_client_form") === false) {
    switch ($form_id) {
      case 'user_login':
        $form['name']['#attributes']['class'][] = 'form-control input-lg';
        $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['name']['#suffix'] = '</div>';
        $form['pass']['#attributes']['class'][] = 'form-control input-lg';
        $form['pass']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['pass']['#suffix'] = '</div>';
        $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
        $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
        break;
      case 'user_register_form':
        $form['account']['name']['#attributes']['class'][] = 'form-control input-lg';
        $form['account']['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['account']['name']['#suffix'] = '</div>';
        $form['account']['mail']['#attributes']['class'][] = 'form-control input-lg';
        $form['account']['mail']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['account']['mail']['#suffix'] = '</div>';
        $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
        $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
        break;
      case 'user_login_block':
        $form['name']['#attributes']['class'][] = 'form-control input-lg';
        $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['name']['#suffix'] = '</div>';
        $form['pass']['#attributes']['class'][] = 'form-control input-lg';
        $form['pass']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['pass']['#suffix'] = '</div>';
        $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
        $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
        break;
      case 'user_pass':
        $form['name']['#attributes']['class'][] = 'form-control input-lg';
        $form['name']['#prefix'] = '<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">';
        $form['name']['#suffix'] = '</div>';
        $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
        $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
        break;
	  case 'search_block_form':
	  	if($form['#id'] == "search-block-form") {
		  $form['#attributes']['class'][] = 'header-search';
		  $form['search_block_form']['#title'] = '<i class="fa fa-search"></i>';
		  $form['search_block_form']['#title_display'] = 'before';
		  $form['search_block_form']['#attributes']['class'][] = 'form-control';
		  $form['search_block_form']['#attributes']['placeholder'] = t('Search');
		  $form['actions']['submit']['#attributes'] = array(
			  'class' => array('btn btn-primary hidden'),
		  );
		}
		if($form['#id'] == "search-block-form--2") {
		  $form['#attributes']['class'][] = 'form-horizontal form-search-sidebar';
		  $form['search_block_form']['#title_display'] = 'invisible';
		  $form['search_block_form']['#attributes']['class'][] = 'form-control';
		  $form['search_block_form']['#attributes']['placeholder'] = t('Search');
		  $form['actions']['submit']['#attributes'] = array(
			  'class' => array('btn btn-primary'),
		  );
		}
		break;
      case 'simplenews_block_form_14':
        $form['#attributes']['class'][] = 'form mc4wp-form';
        $form['mail']['#title_display'] = 'invisible';
        $form['mail']['#attributes']['placeholder'] = t('Your email address');
        $form['#prefix'] = '<div class="form-sign-up"><div class="form-sign-up-inner">';
        $form['#suffix'] = '</div></div>';

        $form['submit']['#attributes']['class'][] = 'f-primary-b';
        $form['submit']['#value'] = t('Sign Up');
        break;
    }
  }
  else {
    $form['#attributes']['class'][] = 'element-inline';
    $form['actions']['submit']['#prefix'] = '<div class="row">
							<div class="col-md-12 text-center">
									<div class="action mybutton medium"><span>';
    $form['actions']['submit']['#suffix'] = '</span></div>
							</div>
						</div>';
  }
  
  // Pass agent email into webform receiver mail.
  if ($form_id == 'webform_client_form_49') {
    if (($node = menu_get_object()) && $node->type == 'real_estate') {
      $agent = user_load($node->uid);
      $form['submitted']['agent_email']['#value'] = $agent->mail;
    }
    if (($user = menu_get_object('user')) && user_is_agent($user)) {
      $form['submitted']['agent_email']['#value'] = $user->mail;
    }
    $form['submitted']['your_name']['#title_display'] = 'invisible';
    $form['submitted']['your_name']['#attributes'] = array('placeholder' => t('Your Name *'), 'class' => array('form-control'));
    $form['submitted']['your_email']['#title_display'] = 'invisible';
    $form['submitted']['your_email']['#attributes'] = array('placeholder' => t('Your Email *'), 'class' => array('form-control'));
    $form['submitted']['message']['#title_display'] = 'invisible';
    $form['submitted']['message']['#attributes'] = array('placeholder' => t('Message *'), 'class' => array('form-control'));
  }
}

/**
 * Process variables for comment.tpl.php.
 *
 * @see comment.tpl.php
 */
function citilights_preprocess_comment(&$variables) {
  $comment = $variables['elements']['#comment'];
  $node = $variables['elements']['#node'];
  $variables['comment'] = $comment;
  $variables['node'] = $node;
  $variables['author'] = theme('username', array('account' => $comment));

  $variables['created'] = date('d F Y', $comment->created);

  // Avoid calling format_date() twice on the same timestamp.
  if ($comment->changed == $comment->created) {
    $variables['changed'] = $variables['created'];
  }
  else {
    $variables['changed'] = format_date($comment->changed);
  }

  $variables['new'] = !empty($comment->new) ? t('new') : '';
  $variables['picture'] = theme_get_setting('toggle_comment_user_picture') ? theme('user_picture', array('account' => $comment)) : '';
  $variables['signature'] = $comment->signature;

  $uri = entity_uri('comment', $comment);
  $uri['options'] += array('attributes' => array('class' => 'permalink', 'rel' => 'bookmark'));

  $variables['title'] = l($comment->subject, $uri['path'], $uri['options']);
  $variables['permalink'] = l(t('Permalink'), $uri['path'], $uri['options']);
  $variables['submitted'] = t('!username  on !datetime', array('!username' => $variables['author'], '!datetime' => date('d F Y', $comment->created)));

  // Preprocess fields.
  field_attach_preprocess('comment', $comment, $variables['elements'], $variables);

  // Helpful $content variable for templates.
  foreach (element_children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }

  // Set status to a string representation of comment->status.
  if (isset($comment->in_preview)) {
    $variables['status'] = 'comment-preview';
  }
  else {
    $variables['status'] = ($comment->status == COMMENT_NOT_PUBLISHED) ? 'comment-unpublished' : 'comment-published';
  }

  // Gather comment classes.
  // 'comment-published' class is not needed, it is either 'comment-preview' or
  // 'comment-unpublished'.
  if ($variables['status'] != 'comment-published') {
    $variables['classes_array'][] = $variables['status'];
  }
  if ($variables['new']) {
    $variables['classes_array'][] = 'comment-new';
  }
  if (!$comment->uid) {
    $variables['classes_array'][] = 'comment-by-anonymous';
  }
  else {
    if ($comment->uid == $variables['node']->uid) {
      $variables['classes_array'][] = 'comment-by-node-author';
    }
    if ($comment->uid == $variables['user']->uid) {
      $variables['classes_array'][] = 'comment-by-viewer';
    }
  }
}

/**
 * template_preprocess_user_picture()
 */
function citilights_preprocess_user_picture(&$variables) {
  $variables['user_picture'] = '';
  if (variable_get('user_pictures', 0)) {
    $account = $variables['account'];
    if (!empty($account->picture)) {
      // @TODO: Ideally this function would only be passed file objects, but
      // since there's a lot of legacy code that JOINs the {users} table to
      // {node} or {comments} and passes the results into this function if we
      // a numeric value in the picture field we'll assume it's a file id
      // and load it for them. Once we've got user_load_multiple() and
      // comment_load_multiple() functions the user module will be able to load
      // the picture files in mass during the object's load process.
      if (is_numeric($account->picture)) {
        $account->picture = file_load($account->picture);
      }
      if (!empty($account->picture->uri)) {
        $filepath = $account->picture->uri;
      }
    }
    elseif (variable_get('user_picture_default', '')) {
      $filepath = variable_get('user_picture_default', '');
    }
    if (isset($filepath)) {
      $alt = t("@user's picture", array('@user' => format_username($account)));
      // If the image does not have a valid Drupal scheme (for eg. HTTP),
      // don't load image styles.
      if (module_exists('image') && file_valid_uri($filepath) && $style = variable_get('user_picture_style', '')) {
        $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt, 'attributes' => array('class' => array('thumb img-rounded'))));
      }
      else {
        $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
      }
      if (!empty($account->uid) && user_access('access user profiles')) {
        $attributes = array(
          'attributes' => array('title' => t('View user profile.')),
          'html' => TRUE,
        );
        $variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
      }
    }
  }
}

/**
 * @param $variables
 * @return string
 * theme_links()
 */
function citilights_links($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading.
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page())) && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
 * Remove N/A options
 */
function citilights_form_element($variables) {
  $element = $variables['element'];
  // Disable radio button N/A
  if ($element['#type'] == 'radio' && $element['#return_value'] === '_none') {
    $variables['element']['#attributes']['disabled'] = TRUE;
  }
  return theme_form_element($variables);
}

/**
 * Check file path upload in theme setting
 */
function citilights_theme_setting_check_path($path) {
  $path_scheme = file_uri_scheme($path);
  if ($path_scheme == 'public') {
    $return_path = file_create_url($path);
  }
  else if (($path_scheme == 'http') || ($path_scheme == 'https')) {
    $return_path = $path;
  }
  else {
    $return_path = file_create_url(file_build_uri($path));
  }
  return $return_path;
}

function citilights_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
}

/**
 * Override contact form template
 */
function citilights_form_webform_client_form_50_alter(&$form, &$form_state) {
  $form['submitted']['name']['#title_display'] = 'invisible';
  $form['submitted']['name']['#attributes'] = array('placeholder' => t('Your Name*'), 'required' => 'required');
  $form['submitted']['name']['#attributes']['class'][] = 'form-control';
  $form['submitted']['name']['#prefix'] = '<div class="form-group form-control-wrap your-name">';
  $form['submitted']['name']['#suffix'] = '</div>';

  $form['submitted']['email']['#title_display'] = 'invisible';
  $form['submitted']['email']['#attributes'] = array('placeholder' => t('Your Email*'), 'required' => 'required');
  $form['submitted']['email']['#attributes']['class'][] = 'form-control';
  $form['submitted']['email']['#prefix'] = '<div class="form-group form-control-wrap your-email">';
  $form['submitted']['email']['#suffix'] = '</div>';
  
  $form['submitted']['subject']['#title_display'] = 'invisible';
  $form['submitted']['subject']['#attributes'] = array('placeholder' => t('Subject'));
  $form['submitted']['subject']['#attributes']['class'][] = 'form-control';
  $form['submitted']['subject']['#prefix'] = '<div class="form-group form-control-wrap your-subject">';
  $form['submitted']['subject']['#suffix'] = '</div>';

  $form['submitted']['message']['#title_display'] = 'invisible';
  $form['submitted']['message']['#attributes'] = array('placeholder' => t('Your Message'));
  $form['submitted']['message']['#attributes']['class'][] = 'form-control';
  $form['submitted']['message']['#prefix'] = '<div class="form-group form-control-wrap your-message">';
  $form['submitted']['message']['#suffix'] = '</div>';

  $form['actions']['submit']['#value'] = 'Send Message';
  $form['actions']['submit']['#attributes']['class'][] = 'submit';
}

/**
 * @see template_preprocess_block().
 * @param type $variables
 */
function citilights_preprocess_block(&$vars) {
  $block = $vars['block'];
  $name = $block->module . '-' . $block->delta;
  $vars['subtitle'] = variable_get($name, '');
}

function citilights_form_comment_form_alter(&$form, &$form_state) {
	unset($form['actions']['preview']);
	$form['#attributes']['class'][] = 'comment-form';
	
	$form['author']['name']['#attributes'] = array('placeholder' => t('Name*'), 'required' => 'required');
	$form['author']['_author']['#title_display'] = 'invisible';
	$form['author']['name']['#title_display'] = 'invisible';
	$form['author']['name']['#attributes']['class'][] = 'form-control';
	$form['author']['name']['#prefix'] = '<p class="comment-notes">'.t('Your email address will not be published. Required fields are marked').'<span class="required">&#42;</span></p><div class="row comment-form-input"><div class="form-group comment-form-author col-xs-12 col-sm-6">';
	$form['author']['name']['#suffix'] = '</div>';
	
	$form['field_comment_email']['und'][0]['email']['#attributes'] = array('placeholder' => t('Email*'), 'required' => 'required');
	$form['field_comment_email']['und'][0]['email']['#title_display'] = 'invisible';
	$form['field_comment_email']['und'][0]['email']['#attributes']['class'][] = 'form-control';
	$form['field_comment_email']['und'][0]['email']['#prefix'] = '<div class="form-group comment-form-email col-xs-12 col-sm-6">';
	$form['field_comment_email']['und'][0]['email']['#suffix'] = '</div>';
	
	$form['subject']['#prefix'] = '<div class="form-group comment-form-url col-xs-12">';
	$form['subject']['#suffix'] = '</div></div>';
	$form['subject']['#attributes']['class'][] = 'form-control';
	$form['subject']['#attributes'] = array('placeholder' => t('Subject'));
	$form['subject']['#title_display'] = 'invisible';
	
	$form['comment_body']['und'][0]['value']['#attributes'] = array('placeholder' => t('Message'));
	$form['comment_body']['und'][0]['value']['#title_display'] = 'invisible';
	$form['comment_body']['und'][0]['value']['#attributes']['class'][] = 'form-control';
	$form['comment_body']['und'][0]['value']['#prefix'] = '<div class="row comment-form-textarea"><div class="form-group comment-form-comment col-xs-12">';
	$form['comment_body']['und'][0]['value']['#suffix'] = '</div></div>';
	
	$form['actions']['submit']['#value'] = 'Comments';
	$form['actions']['submit']['#attributes']['class'][] = 'submit';
	$form['actions']['submit']['#prefix'] = '<div class="form-submit">';
	$form['actions']['submit']['#suffix'] = '</div>';
	
}

function citilights_check_feature($feature, $field_name) {
  return isset($feature->{$field_name}[LANGUAGE_NONE][0]['value']) && $feature->{$field_name}[LANGUAGE_NONE][0]['value'] ? 'has' : 'no-has';
}

function citilights_check_feature_icon($feature, $field_name) {
  $status = citilights_check_feature($feature, $field_name);
  return $status == 'has' ? 'fa-check-circle' : 'fa-times-circle';
}

function citilights_preprocess_user_profile(&$vars) {
  $account = $vars['elements']['#account'];
  if (user_is_agent($account) && $agent = profile2_load_by_user($account, 'agent')) {
    $vars['theme_hook_suggestions'][] = 'user_profile__agent';
    $profiles = entity_view('profile2', array($agent));

    $vars['content'] = $profiles['profile2'][$agent->pid];
    foreach ($vars['content'] as &$content_field) {
      if (is_array($content_field) && isset($content_field['#theme']) && $content_field['#theme'] == 'field') {
        $content_field['#raw'] = TRUE;
      }
    }
  }
}

/**
 * Implement hook_theme().
 */
function citilights_theme($existing, $type, $theme, $path) {
  return array(
//    'noo_citilights_change_password_form' => array(
//      'render element' => 'form',
//      'template' => 'noo-citilights-change-password-form',
//      'path' => drupal_get_path('theme', 'citilights') . '/templates/form', 
  );
}

/**
 * @see template_preprocess_panels_pane().
 */
function citilights_preprocess_panels_pane(&$vars) {
  $pane = $vars['pane'];
  $display = $vars['display'];
  $vars['subtitle'] = variable_get("subtitle__{$display->uuid}_{$pane->subtype}", '');
  $vars['map_location'] = variable_get("map_location__{$display->uuid}_{$pane->subtype}", '');
  $vars['contact_info_display'] = variable_get("contact_info_display__{$display->uuid}_{$pane->subtype}", '');
  $vars['map_contact_info_display'] = variable_get("map_contact_info_display__{$display->uuid}_{$pane->subtype}", '');
  $vars['bg_style'] = variable_get("bg_style__{$display->uuid}_{$pane->subtype}", '');
  $bg_image = variable_get("bg_image__{$display->uuid}_{$pane->subtype}", '');
  if($bg_image) {
  	$vars['bg_image'] = noo_citilights_theme_setting_check_path($bg_image['bg_image_path']);
  } else {
  	$vars['bg_image'] = "";
  }
}

/**
 * template preprocess
 */
function citilights_preprocess_real_estate_sort(&$vars) {
  $params = drupal_get_query_parameters();
  $vars['params'] = $params;
  $sort_order = isset($params['sort_order']) ? $params['sort_order'] : 'DESC';
  
  drupal_add_js(array('citilights' => array('query' => $params, 'sort_order' => $sort_order)), 'setting');
  drupal_add_js(drupal_get_path('theme', 'citilights') .'/js/citilights.js');
}