<?php

/**
 * @file
 * Theme settings .
 */

function citilights_theme_settings_text(&$form, &$form_state) {
	$form['citilights_settings']['text'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -3,
		'#prefix'  				=> '<div id="md-text-typography" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-text-typography -->',
	);
	
	$form['citilights_settings']['text']['text_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
					<li><a href="#tt-text">Text &amp; Links</a></li>
					<li><a href="#tt-typography">Typography</a></li>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	
	$form['citilights_settings']['text']['text_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
	
	/* 1.	Text & link style
	--------------------------------------------------------------------------*/
	$form['citilights_settings']['text']['text_normal'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="tt-text" class="md-tabcontent clearfix">',
		'#suffix'        	=> '</div><!-- / #tt-text -->',
	);
		
		// Text
		$form['citilights_settings']['text']['text_normal']['text_style'] = array(
	        '#type' 					=> 'fieldset',
			'#prefix'  				=> '<h3>'.t('Text style').'</h3>',
	    );
		
			$form['citilights_settings']['text']['text_normal']['text_style']['text_font'] = array(
				'#type'          	=> 'hidden',
				'#default_value' 	=> theme_get_setting('text_font'),
				'#prefix' => '<div id="text-font" class="choosefont clearfix">',
				'#suffix' => '</div>',
			);
			
			$form['citilights_settings']['text']['text_normal']['text_style']['ts_font_color'] = array(
				'#type'          	=> 'textfield',
				'#title'         	=> t('Color'),
				'#default_value' 	=> theme_get_setting('ts_font_color'),
				'#prefix' => '<div class="form-font-color">',
				'#suffix' => '</div>',
				'#attributes' 		=> array(
                                            'class' => array(
                                                'form-colorpicker',
                                            ),
	            ),
			);

		// Text selection
		$form['citilights_settings']['text']['text_normal']['text_selection'] = array(
	    '#type' 					=> 'fieldset',
			'#prefix'  				=> '<h3>'.t('Text selection style').'</h3>',
	    );
			
			$form['citilights_settings']['text']['text_normal']['text_selection']['tss_bgcolor'] = array(
				'#type'          	=> 'textfield',
				'#title'         	=> t('Background color'),
				'#default_value' 	=> theme_get_setting('tss_bgcolor'),
				'#prefix' => '<div class="form-font-color">',
				'#suffix' => '</div>',
				'#attributes' 		=> array(
                                            'class' => array(
                                                'form-colorpicker',
                                            ),
	            ),
			);
			
			$form['citilights_settings']['text']['text_normal']['text_selection']['tss_tcolor'] = array(
				'#type'          	=> 'textfield',
				'#title'         	=> t('Text color'),
				'#default_value' 	=> theme_get_setting('tss_tcolor'),
				'#prefix' => '<div class="form-font-color">',
				'#suffix' => '</div>',
				'#attributes' 		=> array(
                                            'class' => array(
                                                'form-colorpicker',
                                            ),
	            ),
			);
			
		// Link
		$form['citilights_settings']['text']['text_normal']['link_style'] = array(
	    '#type' 					=> 'fieldset',
			'#prefix'  				=> '<h3>'.t('Link style').'</h3>',
			'#description'		=> t('This change will be applied to every link in your website'),
	  );
			
			$form['citilights_settings']['text']['text_normal']['link_style']['link_style_htmllist'] = array(
				'#markup' 				=> '<div id="md-subtabs" class="md-subtabs">
								<div class="md-subtabs-head">
		              <ul class="clearfix">
		                <li class="subtab-item clearfix first"> <a class="subtab-link" href="#link-regular">Regular</a> </li>
		                <li class="subtab-item clearfix"> <a class="subtab-link" href="#link-rollover">Rollover</a> </li>
		                <li class="subtab-item clearfix"> <a class="subtab-link" href="#link-visited">Visited</a> </li>
		                <li class="subtab-item clearfix last"> <a class="subtab-link" href="#link-on">On</a> </li>
		              </ul>
		            </div>',
				'#weight' 				=> -15,
			);
			
			$form['citilights_settings']['text']['text_normal']['link_style']['link_style_htmllistclose'] = array(
				'#markup' 				=> '</div><!-- /#sub-tab -->',
				'#weight' 				=> 15,
			);
			
			// Link regular
			$form['citilights_settings']['text']['text_normal']['link_style']['link_regular'] = array(
				'#type' 					=> 'fieldset',
				'#weight' 				=> -5,
				'#prefix'  				=> '<div id="link-regular" class="md-subtabcontent clearfix">',
				'#suffix'        => '</div><!-- / #link-regular -->',
			);
			
				citilights_prepare_link_style($form,'regular');
			
			// Link rollover
			$form['citilights_settings']['text']['text_normal']['link_style']['link_rollover'] = array(
				'#type' 					=> 'fieldset',
				'#weight' 				=> -4,
				'#prefix'  				=> '<div id="link-rollover" class="md-subtabcontent clearfix">',
				'#suffix'        => '</div><!-- / #link-rollover -->',
			);
			
				citilights_prepare_link_style($form,'rollover');
			
			// Link visited
			$form['citilights_settings']['text']['text_normal']['link_style']['link_visited'] = array(
				'#type' 					=> 'fieldset',
				'#weight' 				=> -3,
				'#prefix'  				=> '<div id="link-visited" class="md-subtabcontent clearfix">',
				'#suffix'        => '</div><!-- / #link-visited -->',
			);
			
				citilights_prepare_link_style($form,'visited');
			
			// Link on
			$form['citilights_settings']['text']['text_normal']['link_style']['link_on'] = array(
				'#type' 					=> 'fieldset',
				'#weight' 				=> -2,
				'#prefix'  				=> '<div id="link-on" class="md-subtabcontent clearfix">',
				'#suffix'        => '</div><!-- / #link-on -->',
			);
			
				citilights_prepare_link_style($form,'on');
	
	/* 2.	Typography
	--------------------------------------------------------------------------*/
	$form['citilights_settings']['text']['text_typography'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="tt-typography" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #tt-typography -->',
	);
    /*--------------------------------- Heading Style -------------------------------------------------*/
    $form['citilights_settings']['text']['text_typography']['typo_heading'] = array(
        '#type' 					=> 'fieldset',
        '#prefix'  				=> '<h3>'.t('Heading').'</h3>',
    );

    $form['citilights_settings']['text']['text_typography']['typo_heading']['typo_heading_style_enable'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Use custom settings for each Heading instead of the default above'),
        '#default_value' => theme_get_setting('typo_heading_style_enable') ? theme_get_setting('typo_heading_style_enable') : 0,
        '#suffix'				=> '<div id="typo-heading-style-custom-typo">',
    );

    for($i=1;$i<=6;$i++){
        $form['citilights_settings']['text']['text_typography']['typo_heading']['typo_heading_h'.$i.''] = array(
            '#type' 					=> 'fieldset',
            '#prefix'  				=> '<h3>'.t('Heading !name', array('!name' => t($i))).'</h3>',
            '#description'		=> t('Change the Heading h'.$i.' font.'),
        );
        $form['citilights_settings']['text']['text_typography']['typo_heading']['typo_heading_h'.$i.'']['typo_heading_h'.$i.'_style'] = array(
            '#type'          	=> 'hidden',
            '#default_value' 	=> theme_get_setting('typo_heading_h'.$i.'_style'),
            '#prefix' => '<div id="typo_heading_h'.$i.'_style" class="choosefont clearfix">',
            '#suffix' => '</div>',
        );

        $form['citilights_settings']['text']['text_typography']['typo_heading']['typo_heading_h'.$i.'']['typo_heading_h'.$i.'_color'] = array(
            '#type'          	=> 'textfield',
            '#title'         	=> t('Color'),
            '#default_value' 	=> theme_get_setting('typo_heading_h'.$i.'_color'),
            '#prefix' => '<div class="form-font-color">',
            '#suffix' => '</div>',
            '#attributes' 		=> array(
                'class' => array(
                    'form-colorpicker',
                ),
            ),
        );
    }


    $form['citilights_settings']['text']['text_typography']['typo_heading']['typo_heading_style_enable_close'] = array(
        '#markup' 				=> '</div>'
    );
}		
	

function citilights_prepare_link_style(&$form, $state) {
	$form['citilights_settings']['text']['text_normal']['link_style']['link_'.$state]['l_'.$state.'_color'] = array(
		'#type'          	=> 'textfield',
		'#title'         	=> t('Text color'),
		'#default_value' 	=> theme_get_setting('l_'.$state.'_color'),
		'#prefix' => '<div class="form-font-color">',
		'#suffix' => '</div>',
		'#attributes' 		=> array(
												'class' => array(
													'form-colorpicker',
												),
		),
	);
	
	$form['citilights_settings']['text']['text_normal']['link_style']['link_'.$state]['l_'.$state.'_st'] = array(
		'#type' => 'checkbox',
		'#title' =>  t('Strikethrough'),
		'#default_value' => theme_get_setting('l_'.$state.'_st'),
		'#prefix' => '<div class="form-text-effect form-item clearfix"><label class="labelleft">'.t('Text Effect').'</label><div class="form-strikethrough">', // Open div
		'#suffix' => '</div>',
	);
	
	$form['citilights_settings']['text']['text_normal']['link_style']['link_'.$state]['l_'.$state.'_hl'] = array(
		'#type' => 'checkbox',
		'#title' =>  t('Highlight'),
		'#default_value' => theme_get_setting('l_'.$state.'_hl'),
		'#prefix' => '<div class="form-highlight">',
		'#suffix' => '</div>',
	);
	
	$form['citilights_settings']['text']['text_normal']['link_style']['link_'.$state]['l_'.$state.'_hlc'] = array(
		'#type'          	=> 'textfield',
		'#default_value' 	=> theme_get_setting('l_'.$state.'_hlc'),
		'#prefix' => '<div class="form-font-color form-link-color">',
		'#suffix' => '</div></div><!-- /.form-text-effect.form-item -->',	// Close div
		'#attributes' 		=> array(
												'class' => array(
													'form-colorpicker',
												),
		),
	);

	$form['citilights_settings']['text']['text_normal']['link_style']['link_'.$state]['l_'.$state.'_ts'] = array(
		'#type' => 'checkboxes',
		'#title' =>  t('Text Style'),
		'#default_value' => is_array(theme_get_setting('l_'.$state.'_ts')) ? theme_get_setting('l_'.$state.'_ts') : array(),
		'#options' => drupal_map_assoc(array(t('bold'), t('italic'), t('underline'))),
		'#prefix' => '<div class="form-text-style clearfix">',
		'#suffix' => '</div>',
	);
}