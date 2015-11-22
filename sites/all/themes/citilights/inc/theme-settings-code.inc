<?php

/**
 * @file
 * Theme settings .
 */

function citilights_theme_settings_code(&$form, &$form_state) {
	$form['citilights_settings']['code'] = array(
		'#type' 					=> 'fieldset',
		'#weight' 				=> 0,
		'#prefix'  				=> '<div id="md-custom-code" class="md-tabcontent clearfix">',
		'#suffix'        => '</div><!-- / #md-custom-code -->',
	);
	
	$form['citilights_settings']['code']['code_htmllist'] = array(
		'#markup' 				=> '<div class="md-listleft">
				<ul>
					<li><a href="#code-header">Header Code</a></li>
					<li><a href="#code-footer">Footer Code</a></li>
					<li><a href="#code-css">Custom CSS Code</a></li>			</ul>
			</div><div class="md-listcontent">',
		'#weight' 				=> -15,
	);
	
	$form['citilights_settings']['code']['code_htmllistclose'] = array(
		'#markup' 				=> '</div><!-- /.md-listleft -->',
		'#weight' 				=> 15,
	);
	
	$form['citilights_settings']['code']['header_code'] = array(
		'#type' => 'textarea',
		'#resizable' => FALSE,
		'#rows' => 10,
		'#default_value' => theme_get_setting('header_code'),
		'#description' => t('The following code will be added in the &lt;head&gt; tag. Useful if you want to add additional script such as CSS or JS'),
		'#prefix'  				=> '<div id="code-header" class="md-tabcontent clearfix"><h3>'.t('Header Code').'</h3>',
		'#suffix'        => '</div><!-- / #code-header -->',
	);
	
	$form['citilights_settings']['code']['footer_code'] = array(
		'#type' => 'textarea',
		'#resizable' => FALSE,
		'#rows' => 10,
		'#default_value' => theme_get_setting('footer_code'),
		'#description' => t('The following code will be added before the &lt;/body&gt; tag.'),
		'#prefix'  				=> '<div id="code-footer" class="md-tabcontent clearfix"><h3>'.t('Footer Code').'</h3>',
		'#suffix'        => '</div><!-- / #code-footer -->',
	);
	
	$form['citilights_settings']['code']['custom_css'] = array(
		'#type' => 'textarea',
		'#resizable' => FALSE,
		'#rows' => 10,
		'#default_value' => theme_get_setting('custom_css'),
		'#description' => t('Insert custom CSS code in here (without &lt;/style&gt; tag). This overrides any other stylesheets. eg: a.button{color:green}'),
		'#prefix'  				=> '<div id="code-css" class="md-tabcontent clearfix"><h3>'.t('Custom CSS Code').'</h3>',
		'#suffix'        => '</div><!-- / #code-css -->',
	);
}