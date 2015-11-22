<?php

/**
 * @file
 * Theme settings .
 */

function citilights_theme_settings_design(&$form, &$form_state) {
    global $base_url;
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

	$form['citilights_settings']['design'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -4,
		'#prefix'  				=> '<div id="md-design" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-design -->',
	);
	
	$form['citilights_settings']['design']['design_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
				    <li><a href="#ds-skin">Skins</a></li>
                    <li><a href="#ds-menu">Menu</a></li>
                    <li><a href="#ds-sidebar">Sidebar</a></li>
                    <li><a href="#ds-header">Header</a></li>
                    <li><a href="#ds-footer">Social Icons</a></li>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	$form['citilights_settings']['design']['design_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
    $form['citilights_settings']['design']['design_general'] = array(
        '#type' 					=> 'fieldset',
        '#weight' 				=> -5,
        '#prefix'  				=> '<div id="ds-general" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-general -->',
    );

    /* 1.   Site Skins
     --------------------------------------------------------------------------*/
    $form['citilights_settings']['design']['design_general'] = array(
        '#type'                     => 'fieldset',
        '#weight'               => -5,
        '#prefix'               => '<div id="ds-skin" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-general -->',
    );

    $skins = array();
    $path_data_dir = drupal_get_path('theme', 'citilights') . '/css/color';
    $files = file_scan_directory($path_data_dir, '/.css$/');
    foreach ($files as $file) {
        $skins[$file->name] = $file->name;
    }
    $form['citilights_settings']['design']['design_general']['skins'] = array(
        '#type'          => 'select',
        '#title'         => t('Choose color'),
        '#default_value' => theme_get_setting('skins'),
        '#options'       => $skins,
        '#prefix' => '<div id="design-skins" class="clearfix">',
        '#suffix' => '</div>',
    );
    $form['citilights_settings']['design']['design_general']['theme'] = array(
        '#type'             => 'select',
        '#title'            => t('Choose skin'),
        '#default_value'    => theme_get_setting('theme', 'citilights'),
        '#options'          => array(
            'light-style'   => t('Light'),
            'dark-style'    => t('Dark'),
        ),
        '#prefix' => '<div id="design-theme" class="clearfix">',
        '#suffix' => '</div>',
    );
    $form['citilights_settings']['design']['design_general']['layout'] = array(
        '#type'             => 'select',
        '#title'            => t('Choose layout'),
        '#default_value'    => theme_get_setting('layout', 'citilights'),
        '#options'          => array(
            'wide-layout'   => t('Wide'),
            'boxed-layout'  => t('Boxed'),
        ),
        '#prefix' => '<div id="design-layout" class="clearfix">',
        '#suffix' => '</div>',
    );
    $form['citilights_settings']['design']['design_general']['layout_bg'] = array(
        '#type'                             => 'select',
        '#default_value'                    => theme_get_setting('layout_bg', 'citilights'),
        '#options'                          => array(
            'bright_squares'                => t('Bright Squares'),
            'random_grey_variations'        => t('Random Grey Variations'),
            'wild_oliva'                    => t('Wild Oliva'),
            'denim'                         => t('Denim'),
            'subtle_grunge'                 => t('Subtle Grunge'),
            'az_subtle'                     => t('Az Subtle'),
            'straws'                        => t('Straws'),
            'textured_stripes'              => t('Textured Stripes'),
        ),
        '#prefix' => '<div id="design-layout-bg" class="clearfix">',
        '#suffix' => '</div>',
        '#states'   => array(
            // Hide the logo settings when using the default logo.
            'visible' => array(
                ':input[name="layout"]' => array(
                    array('value' => 'boxed-layout'),
                ),
            ),
        ),
    );

    /* 2.   Menu
    --------------------------------------------------------------------------*/
    $form['citilights_settings']['design']['design_menu'] = array(
        '#type'                     => 'fieldset',
        '#weight'               => -5,
        '#prefix'               => '<div id="ds-menu" class="md-tabcontent clearfix"><h3>Menu Configuration</h3>',
        '#suffix'        => '</div><!-- / #ds-general -->',
    );
    $form['citilights_settings']['design']['design_menu']['menu_sticky'] = array(
        '#type' => 'checkbox',
        '#title'    => 'Enable Menu Sticky',
        '#default_value'    => theme_get_setting('menu_sticky')
    );

    /* 3.Sidebar
    --------------------------------------------------------------------------*/
    $form['citilights_settings']['design']['design_sidebar'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -5,
        '#prefix'  				=> '<div id="ds-sidebar" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    $form['citilights_settings']['design']['design_sidebar']['sidebar_position'] = array(
        '#type'          => 'select',
        '#title'         => t('Sidebar position'),
        '#default_value' => theme_get_setting('sidebar_position','citilights') ? theme_get_setting('sidebar_position','citilights') : 'right',
        '#options'       => array(
            'no'        => t('No sidebar'),
            'left'      => t('Left'),
            'right' 	=> t('Right'),
        ),
    );

    /* 4.   Header
    --------------------------------------------------------------------------*/
    $form['citilights_settings']['design']['design_header'] = array(
        '#type'             => 'fieldset',
        '#weight'               => -6,
        '#prefix'               => '<div id="ds-header" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );


    $form['citilights_settings']['design']['design_header']['header_content'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="header-image-wrapper"><h2>Custom Header Slide</h2>',
        "#suffix"   => '</div>',
    );
	
	$form['citilights_settings']['design']['design_header']['header_content_ids'] = array(
        '#type' => 'textfield',
        '#title'    => 'Property Items',
        '#description' => 'Enter ID of property into this textfield. Each ID will be seperated by comma.',
        '#default_value'    => theme_get_setting('header_content_ids','citilights'),
    );

    /*$form['citilights_settings']['design']['design_header']['header_content']['header_content_wrapper'] = array(
        '#type' => ' fieldset',
        '#title' => 'Header Content Display',
        '#prefix'   => '<div id="header-content-wrapper">',
        '#suffix'   => '</div>'
    );

    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper'] = array(
        '#type' => 'fieldset',
    );
    $max_num = theme_get_setting('hd_slide_max_num') ? theme_get_setting('hd_slide_max_num') : 1;
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="hd_slide_preview" data-max-num="'.$max_num.'" href="#hd-slide-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="hd_slide_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('hd_slide_max_num') ? theme_get_setting('hd_slide_max_num') : 1,
    );
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']["hd_slide_preview_openhtml"] = array(
        '#markup'   => '<ul id="hd_slide_sortable" class="sortable">'
    );
    if(theme_get_setting('hd_slide') && count(theme_get_setting('hd_slide')) > 1) {
        $hd_slide = theme_get_setting('hd_slide');
        foreach($hd_slide as $key => $value) {
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="hd-slide-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="hd-slide-sortable-no'.substr($num,2).'">'
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_image_path_'.$num.''] = array(
                '#type' => 'textfield',
                '#title' => t('Path to custom background image'),
                '#default_value' =>  $hd_slide[$key]['image'],
                '#prefix' => '<div>',
                '#maxlength' => 1000,
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_image_upload_'.$num.''] = array(
                '#type' => 'file',
                '#suffix' => '</div>'
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_title_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Title',
                '#default_value'    => $hd_slide[$key]['title'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_subtitle_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Sub-Title',
                '#default_value'    => $hd_slide[$key]['subtitle'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_area_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Area',
                '#default_value'    => $hd_slide[$key]['area'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_bedroom_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Bedrooms',
                '#default_value'    => $hd_slide[$key]['bedroom'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_bathroom_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Bathrooms',
                '#default_value'    => $hd_slide[$key]['bathroom'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_price_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Price',
                '#default_value'    => $hd_slide[$key]['price'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_button_text_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Button Text',
                '#default_value'    => $hd_slide[$key]['button_text'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key]['hd_slide_button_link_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Button Link',
                '#default_value'    => $hd_slide[$key]['button_link'],
            );
            $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_sortable_no1_openhtml'] = array(
            '#markup' => '<li id="hd-slide-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="hd-slide-sortable-no1">'
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_image_path_no1'] = array(
            '#type' => 'textfield',
            '#title' => t('Path to custom background image'),
            '#default_value' =>  theme_get_setting('hd_slide_image_path_no1'),
            '#prefix' => '<div>',
            '#maxlength' => 1000,
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_image_upload_no1'] = array(
            '#type' => 'file',
            '#suffix' => '</div>'
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_title_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Title',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('hd_slide_title_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_subtitle_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Sub-Title',
            '#default_value'    => theme_get_setting('hd_slide_subtitle_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_area_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Area',
            '#default_value'    => theme_get_setting('hd_slide_area_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_bedroom_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Bedrooms',
            '#resizable'    => FALSE,
            '#default_value'    => theme_get_setting('hd_slide_bedroom_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_bathroom_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Bathrooms',
            '#default_value'    => theme_get_setting('hd_slide_bathroom_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_price_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Price',
            '#default_value'    => theme_get_setting('hd_slide_price_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_button_text_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Button Text',
            '#default_value'    => theme_get_setting('hd_slide_button_text_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_button_link_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Button Link',
            '#default_value'    => theme_get_setting('hd_slide_button_link_no1')
        );
        $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']['hd_slide_sortable_no1_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }
    $form['citilights_settings']['design']['design_header']['header_content']['hd_slide_content_wrapper']['hd_slide_preview']["hd_slide_preview_closehtml"] = array(
        '#markup'   => '</ul>'
    );*/


   // 5. ---------------------------------- Footer --------------------------------------------
    $form['citilights_settings']['design']['design_footer'] = array(
        '#type'             => 'fieldset',
        '#weight' 				=> -8,
        '#prefix'  				=> '<div id="ds-footer" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #ds-block -->',
    );
    
    $form['citilights_settings']['design']['design_footer']['footer_social'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="footer-social"><h3>Custom Social Account</h3>',
        '#suffix'   => '</div>',
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft-social-acc-wrapper">',
        '#suffix'   => '</div>',
        '#attributes'   => array(
            'class' => array('ft-social-acc-wrapper'),
        )
    );
    $max_num = theme_get_setting('ft_social_max_num','citilights') ? theme_get_setting('ft_social_max_num','citilights') : 1;
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_add_wrapper'] = array(
        '#markup'   => '<a class="add-more" data-preview="ft_social_preview" data-max-num="'.$max_num.'" href="#ft-social-sortable-no'.$max_num.'">Add More</a>',
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_popup_close_wrapper'] = array(
        '#markup' => '</div>'
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'] = array(
        '#type' => 'fieldset',
        '#prefix'   => '<div id="ft_social_preview" class="data-container"><div class="popup-wrapper"></div>',
        '#sufix'    => '</div>'
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_order'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-order'
        ),
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_max_num'] = array(
        '#type' => 'hidden',
        '#attributes' => array(
            'class'    => 'hidden-num'
        ),
        '#default_value' => theme_get_setting('ft_social_max_num','citilights') ? theme_get_setting('ft_social_max_num','citilights') : 1,
    );
    $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']["ft_social_preview_openhtml"] = array(
        '#markup'   => '<ul id="ft_social_sortable" class="sortable">'
    );
    if(theme_get_setting('ft_social','citilights') && count(theme_get_setting('ft_social','citilights')) > 1) {
        $social_acc = theme_get_setting('ft_social','citilights');
        foreach(theme_get_setting('ft_social','citilights') as $key => $value){
            $explode = explode("_",$key);
            end($explode);
            $num = current($explode);
            if(isset($social_acc[$key]['icon'])) {
                $social_icon = $social_acc[$key]['icon'];
            }
            $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_openhtml'] = array(
                '#markup' => '<li id="ft-social-sortable-'.$num.'" class="draggable-item sortable-item toggle-item" data-num="'.substr($num,2).'" data-id="ft-social-sortable-no'.substr($num,2).'">'
            );
            $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_icon_'.$num] = array(
                '#type' => 'icon_selector',
                '#title'    => 'Social Icon',
                '#default_bundle' => isset($social_icon['bundle']) ? $social_icon['bundle'] : '',
                '#default_icon' => $social_icon['icon'],
                '#attributes'   => array(
                    'class' => array('icon-select'),
                    'id'    => array('footer-social-'.$num.'')
                )
            );

            $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key]['ft_social_link_'.$num] = array(
                '#type' => 'textfield',
                '#title'    => 'Social Link',
                '#attributes' => array(
                    'class' => array('social_link'),
                ),
                '#default_value' => $social_acc[$key]['link'],
                '#maxlength' => 1000,
            );
            $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_closehtml'] = array(
                '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
            );
        }
    } else {
        $social_icon_1 = theme_get_setting('ft_social_icon_1','citilights');
        $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_openhtml'] = array(
            '#markup' => '<li id="ft-social-sortable-no1" class="draggable-item sortable-item toggle-item" data-num="1" data-id="ft-social-sortable-no1">'
        );
        $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_icon_no1'] = array(
            '#type' => 'icon_selector',
            '#title'    => 'Social Icon',
            '#default_bundle' => isset($social_icon_1['bundle']) ? $social_icon_1['bundle'] : '',
            '#default_icon' => $social_icon_1['icon'],
            '#attributes'   => array(
                'class' => array('icon-select'),
                'id'    => array('footer-social-no1')
            )
        );

        $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview']['ft_social_link_no1'] = array(
            '#type' => 'textfield',
            '#title'    => 'Social Link',
            '#attributes' => array(
                'class' => array('ft_social_link'),
            ),
            '#default_value' => theme_get_setting('ft_social_link_no1','citilights'),
            '#maxlength' => 1000,
        );
        $form['citilights_settings']['design']['design_footer']['footer_social']['social_acc_wrapper']['ft_social_preview'][$key.'_closehtml'] = array(
            '#markup' => '<div class="preview-controls"><input class="remove form-submit" value="Remove"></div><div class="preview-demo"></div></li>'
        );
    }

}