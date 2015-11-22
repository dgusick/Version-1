<?php
/**
 * Override or insert vars into the node template.
 */
function citilights_preprocess_node(&$vars) {

    $themepath = drupal_get_path('theme', 'citilights');
    if (theme_get_setting('extra_article_classes')) {
        if (module_exists('translation')) {
            if ($vars['node']->language) {
                global $language;
                $vars['classes_array'][] = 'article-lang-'. $vars['node']->language;
            }
        }
    }

    $vars['classes_array'][] = $vars['zebra'];

    $vars['submitted'] = t('Published by !username on !datetime', array('!username' => $vars['name'], '!datetime' => $vars['date']));

    if ($vars['view_mode'] == 'full' && node_is_page($vars['node'])) {
        $vars['classes_array'][] = 'node-full';
    }

    if ($vars['view_mode'] == 'teaser') {
        $vars['classes_array'][] = "node-".$vars['node']->type."-teaser";
    }

    $vars['nodeurl'] = url("node/".$vars['node']->nid, array('absolute' => TRUE));

    $node_content_type = (theme_get_setting('node_enable') == 1) ? $vars['node']->type : 'default';

        /*===================== Prepare node variable each content type =========================*/
    $node = $vars['node'];
    if($node->type == 'blog'){
        $author = user_load($node->uid);
        if(isset($author->field_team_social[$node->language])) {
            $author_social_info = $author->field_team_social[$node->language];
            $author_social = array(
            );
            foreach($author_social_info as $key => $value){
                $field_collection = entity_load('field_collection_item', array($value['value']));
                $idx = $value['value'];
                $author_social_icon = $field_collection[$idx]->field_social_icon[$node->language][0]['icon'];
                $author_social_account = $field_collection[$idx]->field_social_account['und'][0]['value'];
                $author_social[] = array('social_icon' => $author_social_icon,'social_account' => $author_social_account);
            }
            $vars['author_social'] = $author_social;
            $vars['author_description'] = $author->field_user_description[$node->language][0]['safe_value'];
        }
    }
}
