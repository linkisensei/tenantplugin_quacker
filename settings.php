<?php

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig){
    $settings = new admin_settingpage('tenantplugin_quacker', get_string('pluginname', 'tenantplugin_quacker'));
    
    $settings->add(new admin_setting_configtext(
        'tenantplugin_quacker/defaultquacks',
        get_string('defaultquacks', 'tenantplugin_quacker'),
        get_string('defaultquacks_desc', 'tenantplugin_quacker'),
        1,
        PARAM_INT
    ));
    
    $ADMIN->add('localplugins', $settings);
}