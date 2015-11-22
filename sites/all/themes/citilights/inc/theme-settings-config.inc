<?php

/**
 * @file
 * Theme settings .
 */

function citilights_theme_settings_config(&$form, &$form_state) {
    $form['citilights_settings']['config'] = array(
        '#type' 					=> 'fieldset',
        '#weight' 				=> 0,
        '#prefix'  				=> '<div id="md-config" class="md-tabcontent clearfix">',
        '#suffix'        => '</div><!-- / #md-config -->',
    );

    $form['citilights_settings']['config']['config_htmllist'] = array(
        '#markup' 	=> '<div class="md-listleft">
                            <ul>
                                <li><a href="#config-backup">Backup</a></li>
                                <li><a href="#config-restore">Restore</a></li>
                            </ul>
                        </div><div class="md-listcontent">',
        '#weight' 				=> -15,
    );

    $form['citilights_settings']['config']['config_htmllistclose'] = array(
        '#markup' 				=> '</div><!-- /.md-listleft -->',
        '#weight' 				=> 15,
    );

    $form['citilights_settings']['config']['backup'] = array(
        '#type' => 'fieldset',
        '#prefix'  				=> '<div id="config-backup" class="md-tabcontent clearfix"><h3>'.t('Backup Options').'</h3>',
        '#suffix'        => '</div><!-- / #backup -->',
    );
    $form['citilights_settings']['config']['backup']['backup_html'] = array(
        '#markup'     => '<div class="last-backup"></div>',
        '#prefix'     => '<p><strong>You can use button below to backup your current theme settings</strong></p>',
    );
    $form['citilights_settings']['config']['backup']['backup_theme_settings'] = array(
        '#type' => 'submit',
        '#value'    => t('Backup All Settings'),
        '#submit'   => array('citilights_backup_theme_settings'),
    );

    $form['citilights_settings']['config']['restore'] = array(
        '#type' => 'fieldset',
        '#prefix'  				=> '<div id="config-restore" class="md-tabcontent clearfix"><h3>'.t('Restore Options').'</h3>',
        '#suffix'        => '</div><!-- / #restore -->',
    );
    $form['citilights_settings']['config']['restore']['restore_file_path'] = array(
        '#type' => 'textfield',
        '#title' => t('Path to upload restore backup file'),
    );
    $form['citilights_settings']['config']['restore']['restore_file_upload'] = array(
        '#type' => 'file',
    );
    /*
    $form['citilights_settings']['config']['restore']['restore_code'] = array(
        '#type' => 'textarea',
        '#title'    => t('Transfer Theme Options Data'),
        '#default_value' => '',
        '#description' => t('You can transfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Restore Options".')
    );
    */
    $form['citilights_settings']['config']['restore']['restore_theme_settings'] = array(
        '#type' => 'submit',
        '#value'    => t('Restore Settings'),
        '#submit'   => array('citilights_restore_theme_settings'),
    );


}