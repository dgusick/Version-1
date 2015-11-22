<?php

/**
 * @file
 * Theme settings general.
 */

function citilights_theme_settings_general(&$form, &$form_state) {
    $form['logo']['settings']['logo_normal'] = array(
        '#prefix'   => '<div id="logo-normal-settings">',
        '#title'    => t('Logo Normal Settings'),
        '#type'     => 'container',
    );
    $logo_normal_path = theme_get_setting('logo_normal_path');
    $logo_normal_scheme = file_uri_scheme($logo_normal_path);
    if ($logo_normal_scheme == 'public') {
        $logo_normal_path = file_uri_target($logo_normal_path);
    }
    $form['logo']['settings']['logo_normal']['logo_normal_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to custom logo normal'),
        '#description' => t('The file path you use as logo for normal display'),
        '#default_value' =>  $logo_normal_path,
    );
    $form['logo']['settings']['logo_normal']['logo_normal_upload'] = array(
        '#type'             => 'file',
    );

    /*$form['logo']['settings']['logo_retina'] = array(
        '#prefix'   => '<div id="logo-retina-settings">',
        '#title'    => t('Logo Retina Settings'),
        '#type'     => 'container',
    );
    $logo_retina_path = theme_get_setting('logo_retina_path');
    $logo_retina_scheme = file_uri_scheme($logo_retina_path);
    if ($logo_retina_scheme == 'public') {
        $logo_retina_path = file_uri_target($logo_retina_path);
    }
    $form['logo']['settings']['logo_retina']['logo_retina_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to custom logo retina'),
        '#description' => t('The file path you use as logo for retina display'),
        '#default_value' =>  $logo_retina_path,
    );
    $form['logo']['settings']['logo_retina']['logo_retina_upload'] = array(
        '#type'             => 'file',
    );*/

    $form['favicon']['#collapsible'] = FALSE;
    $form['favicon']['settings']['favicon_file'] = array(
        '#prefix'   => '<div id="favicon-settings">',
        '#title'    => t('Favicon Settings'),
        '#type'     => 'container',
    );
    $favicon_path = theme_get_setting('fvicon_path');
    $favicon_scheme = file_uri_scheme($favicon_path);
    if ($favicon_scheme == 'public') {
        $favicon_path = file_uri_target($favicon_path);
    }
    $form['favicon']['settings']['favicon_file']['fvicon_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to custom favicon'),
        '#description' => t('The file path you use as your site favicon'),
        '#default_value' =>  $favicon_path,
    );
    $form['favicon']['settings']['favicon_file']['fvicon_upload'] = array(
        '#type'             => 'file',
    );

	$form['citilights_settings']['general'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="md-general-settings" class="md-tabcontent clearfix">',
		'#suffix'        	=> '</div><!-- / #md-general-settings -->',
	);

	$form['citilights_settings']['general']['general_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
					<li><a href="#general-settings">Settings</a></li>
					<li><a href="#favicon-webclip">Logo, Favicon &amp; Webclip</a></li>
					<li><a href="#custom-font">Custom Font</a></li>
				</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	$form['citilights_settings']['general']['general_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
	/* 1.	General Settings
	--------------------------------------------------------------------------*/
	$form['citilights_settings']['general']['general_settings'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="general-settings" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #general-settings -->',
	);

	$form['citilights_settings']['general']['general_settings']['css3_textarea'] = array(
		'#type' => 'checkbox',
		'#title' =>  t('Use the "resize" CSS3 property'),
		'#description'   => t('Check this if you wish to replace Drupal\'s textarea by resize CSS3 property'),
		'#default_value' => theme_get_setting('css3_textarea'),
	);
	$themes = list_themes();
	$features = $themes['citilights']->info['features'];
	if(in_array('favicon', $features)) {
        $form['citilights_settings']['general']['general_settings']['general_setting_content']['theme_settings']['toggle_fvicon'] = array(
            '#type' => 'checkbox',
            '#default_value' => theme_get_setting('toggle_fvicon' , 'citilights'),
            '#field_suffix' => '<label class="label-checkbox" for="edit-toggle-fvicon">Shortcut Icon</label>',
            '#attributes'   => array(
                'class' => array('input-checkbox')
            ),
        );
    }

	/* 2.	Logo, Favicon & Webclip
	--------------------------------------------------------------------------*/

	$form['citilights_settings']['general']['favicon_webclip'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="favicon-webclip" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #favicon-webclip -->',
	);
	
		$webclip_path = theme_get_setting('webclip_path');
		if (file_uri_scheme($webclip_path) == 'public') {
			$webclip_path = file_uri_target($webclip_path);
		}
		 
		$form['citilights_settings']['general']['favicon_webclip']['webclip_path'] = array(
			'#type' 					=> 'textfield',
			'#title'					=> t('Path to custom Webclip'),
			'#description'   	=> t('A webclip is the icon that appears on a user\'s iPhone, iPad or Android device if they save your website to their home screen.<br />Upload an image at least <em>114x114px</em>'),
			'#default_value' 	=>  $webclip_path,
			'#prefix'					=> '<h3>Web Clip Settings</h3>',
		);
		
		$form['citilights_settings']['general']['favicon_webclip']['webclip_upload'] = array(
			'#type' => 'file',
		);
		
		$form['citilights_settings']['general']['favicon_webclip']['webclip_precomp'] = array(
	    '#type' => 'checkbox',
	    '#title' => t('Use the default precomposed iOS touch icon.'),
	    '#default_value' => theme_get_setting('default_touch_icon_precomp'),
	    '#tree' => FALSE,
	    '#description' => t('Using a &apos;precomposed&apos; touch icon allows more control over the icon&apos;s appearance. iOS devices do not apply any special effects to these icons.'),
	  );

	/* 3.	Custom font
	--------------------------------------------------------------------------*/
	$form['citilights_settings']['general']['custom_font'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> -5,
		'#prefix'  				=> '<div id="custom-font" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #custom-font -->',
	);

		$form['citilights_settings']['general']['custom_font']['googlewebfonts'] = array(
			'#type' 					=> 'textarea',
			'#title'         => t('@import'),
			'#resizable' => FALSE,
			'#rows' => 1,
			'#description' => t("For example: http://fonts.googleapis.com/css?family=Kavoon|Hanalei+Fill"),
			'#default_value' 	=>  theme_get_setting('googlewebfonts'),
			'#prefix'					=> '<h3>Google Web Fonts</h3>
		<ul class="steps">
			<li>Go to <a href="http://www.google.com/webfonts" target="_blank">www.google.com/webfonts</a>, choose your fonts and add to collection</li>
      <li>Click &quot;Use&quot; in the bottom bar after choose fonts</li>
      <li>Find &quot;Integrate the fonts into your CSS&quot;, copy all code from that field and paste it below to activate.</li>
		</ul>',
		);
		
		$form['citilights_settings']['general']['custom_font']['typekit_id'] = array(
			'#type' 					=> 'textfield',
			'#title'         => t('Typekit'),
			'#description'   	=> t('<strong>* Note:</strong> Your kit must contain fonts and be published before entering your Typekit ID below. Check out <a href="http://help.typekit.com/customer/portal/articles/6780-adding-fonts-to-your-site" target="_blank">this article at Typekit\'s Help Center</a> for detailed information on how to add fonts to your kit. (Make sure you skip the part about adding CSS selectors, and remember to republish your kit after making any changes.)'),
			'#default_value' 	=>  theme_get_setting('typekit_id'),
			'#prefix'					=> '<h3>Enter Your Typekit ID</h3>
		<ul class="steps">
			<li>Go to <a href="http://typekit.com/" target="_blank">www.typekit.com</a> and Log in to your account</li>
			<li>In the top bar of the Typekit website, click the green &quot;Launch Kit Editor&quot; button.</li>
			<li>In the top bar of the popup that appears, click the &quot;Kit Settings&quot; link and paste your domain. Once you\'ve done this, click &quot;Save Settings.&quot;</li>
			<li>In the same top bar of the popup, click the &quot;embed code&quot; link.</li>
			<li>In the overlay that appears, there is a line at the   bottom that says, &quot;If you are using a plugin or service that asks for a   Typekit ID, use this: ____.&quot; This is your Typekit ID. Paste it below to activate.</li>
		</ul>',
		);
		
		
	/* Hidden input
	--------------------------------------------------------------------------*/
	$form['citilights_settings']['general']['savedcolor1'] = array(
		'#type'         	=> 'hidden',
		'#default_value' 	=> theme_get_setting('savedcolor1'),
		'#attributes' => array(
				'id' => 'savedcolor1',
			),
	);
}