<?php

/**
 * @file
 * Theme settings .
 */

function citilights_theme_settings_display(&$form, &$form_state) {
	$options = array();
    foreach (icon_bundles() as $bundle_name => $bundle) {
        if (!$bundle['status']) {
            continue;
        }
        foreach ($bundle['icons'] as $icon_key => $icon_value) {
            $icon_name = is_string($icon_key) ? $icon_key : $icon_value;
            if (is_array($icon_value) && isset($icon_value['name'])) {
                $icon_name = $icon_value['name'];
            }
            $icon_title = is_string($icon_value) ? $icon_value : $icon_name;
            if (is_array($icon_value) && isset($icon_value['title'])) {
                $icon_title = $icon_value['title'];
            }
            $options[$bundle['title']][$bundle['name'] . '|' . $icon_name] = $icon_title;
        }
    $icon_default_value = $options;
    }
    $icon_mark_up = '';
    $icon_fake_markup = '<ul class="list-icon">';
    foreach($icon_default_value as $key => $value) {
        $icon_mark_up .= '<option selected="selected" value="">- No Icon -</option><optgroup label="'.$key.'">';
        foreach ($icon_default_value[$key] as $key2 => $value2) {
            $fake_icon_explode = explode("|",$key2);
            $icon_fake_markup .= '<li><a href="javascript:;" class="fake-icon" icon-name="'.$fake_icon_explode[1].'" data-icon="'.$key2.'"><i class="'.$fake_icon_explode[0].' '.$fake_icon_explode[1].'"></i></a></li>';
            $icon_mark_up .= '<option value="'.$key2.'">'.$value2.'</option>';
        }
        $icon_mark_up .= '</optgroup>';
    }
    $icon_fake_markup .= '</ul>';
    drupal_add_js(array('iconMarkUp' => $icon_mark_up),'setting');
    drupal_add_js(array('iconFakeMarkUp' => $icon_fake_markup),'setting');

    $form['citilights_settings']['display'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -1,
		'#prefix'  				=> '<div id="md-display" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-display -->',
	);
	$form['citilights_settings']['display']['display_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
					<li><a href="#s-footer">Footer & Contact Info</a></li>
                    <li><a href="#s-column">Footer Cols & Background</a></li>
                    <li><a href="#s-flogo">Footer Logo</a></li>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	$form['citilights_settings']['display']['display_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
    

    $form['citilights_settings']['display']['display_footer'] = array(
        '#type'             => 'fieldset',
        '#weight'               => -8,
        '#prefix'               => '<div id="s-footer" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="footer-social"><h3>Custom Detail Information</h3>',
        '#suffix'   => '</div>',
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-detail-acc-wrapper">',
        '#suffix'   => '</div>',
        '#attributes'   => array(
            'class' => array('ft-detail-acc-wrapper'),
        )
    );
    $max_num = theme_get_setting('ft_detail_max_num','citilights') ? theme_get_setting('ft_detail_max_num','citilights') : 1;
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="ft_detail_preview" data-max-num="'.$max_num.'" href="#ft-detail-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft_detail_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview']['ft_detail_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview']['ft_detail_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('ft_detail_max_num','citilights') ? theme_get_setting('ft_detail_max_num','citilights') : 1,
    );
    $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview']["ft_detail_preview_openhtml"] = array(
        '#markup'   => '<ul id="ft_detail_sortable" class="sortable">'
    );
    if(theme_get_setting('ft_detail','citilights') && count(theme_get_setting('ft_detail','citilights')) > 1) {
        $social_acc = theme_get_setting('ft_detail','citilights');
        foreach(theme_get_setting('ft_detail','citilights') as $key => $value){
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $social_icon = $social_acc[$key]['icon'];
            $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="ft-detail-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="ft-detail-sortable-no'.substr($num,2).'">'
            );
            $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key]['ft_detail_icon_'.$num] = array(
                '#type' => 'icon_selector',
                '#title'    => 'Icon',
                '#default_bundle' => isset($social_icon['bundle']) ? $social_icon['bundle'] : '',
                '#default_icon' => $social_icon['icon'],
                '#attributes'   => array(
                    'class' => array('icon-select'),
                    'id'    => array('footer-detail-'.$num.'')
                )
            );

            $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key]['ft_detail_des_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Detail Description',
                '#attributes' => array(
                    'class' => array('ft_detail_des'),
                ),
                '#default_value' => $social_acc[$key]['des'],
                '#maxlength' => 1000,
            );
            $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $social_icon_1 = theme_get_setting('ft_detail_icon_1','citilights');
        $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key.'_openhtml'] = array(
            '#markup' => '<li id="ft-detail-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="ft-detail-sortable-no1">'
        );
        $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview']['ft_detail_icon_no1'] = array(
            '#type' => 'icon_selector',
            '#title'    => 'Social Icon',
            '#default_bundle' => isset($social_icon_1['bundle']) ? $social_icon_1['bundle'] : '',
            '#default_icon' => $social_icon_1['icon'],
            '#attributes'   => array(
                'class' => array('icon-select'),
                'id'    => array('footer-detail-no1')
            )
        );
        $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview']['ft_detail_des_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Detail Description',
            '#attributes' => array(
                'class' => array('ft_detail_des'),
            ),
            '#default_value' => theme_get_setting('ft_detail_des_no1','citilights'),
            '#maxlength' => 1000,
        );
        $form['citilights_settings']['display']['display_footer']['footer_detail']['detail_wrapper']['ft_detail_preview'][$key.'_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }

    $form['citilights_settings']['display']['display_footer']['footer_content_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-content-wrapper">',
        '#suffix'   => '</div>'
    );
    $form['citilights_settings']['display']['display_footer']['footer_content_wrapper']['footer_text'] = array(
        '#type' => 'textarea',
        '#format' => 'full_html',
        '#title'    => 'Footer Text Display',
        '#resizable'    => false,
        '#default_value'    => theme_get_setting('footer_text') ? theme_get_setting('footer_text') : '&copy; 2014 CitiLights. All Rights Reserved.
              <br />
              <span>Designed by <a title="Visit Nootheme.com!" href="http://www.nootheme.com/" target="_blank">NooTheme.com</a>.</span>
              <br>'
    );

    $form['citilights_settings']['display']['display_footer_col'] = array(
        '#type'             => 'fieldset',
        '#weight'               => -8,
        '#prefix'               => '<div id="s-column" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['citilights_settings']['display']['display_footer_col']['col_num'] = array(
        '#type'          => 'select',
        '#title'         => t('Number of Columns'),
        '#default_value' => theme_get_setting('col_num','citilights') ? theme_get_setting('col_num','citilights') : '3',
        '#options'       => array(
            '12'         => t('1 Column'),
            '6'          => t('2 Columns'),
            '4'          => t('3 Columns'),
            '3'          => t('4 Columns'),
        ),
    );
    $form['citilights_settings']['display']['display_footer_col']['footer_static_bg_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to static background image'),
        '#default_value' =>  theme_get_setting('footer_static_bg_path'),
        '#prefix' => '<div>',
        '#maxlength' => 1000,
    );
    $form['citilights_settings']['display']['display_footer_col']['footer_static_bg_upload'] = array(
        '#type' => 'file',
        '#suffix' => '</div>'
    );

    $form['citilights_settings']['display']['display_footer_logo'] = array(
        '#type'             => 'fieldset',
        '#weight'               => -8,
        '#prefix'               => '<div id="s-flogo" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['citilights_settings']['display']['display_footer_logo']['footer_logo_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to logo image'),
        '#default_value' =>  theme_get_setting('footer_logo_path'),
        '#prefix' => '<div>',
        '#maxlength' => 1000,
    );
    $form['citilights_settings']['display']['display_footer_logo']['footer_logo_upload'] = array(
        '#type' => 'file',
        '#suffix' => '</div>'
    );
}