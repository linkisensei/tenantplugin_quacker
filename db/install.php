<?php

/**
 * Executed on installation of Quacker
 *
 * @return bool
 */
function xmldb_tenantplugin_quacker_install(){
    // Installing tables
    \local_tenant\helpers\database_helper::install_from_xmldb_file(__DIR__ . '/_install.xml');

    set_config('defaultquacks', 1, 'tenantplugin_quacker');

    return true;
}

function xmldb_tenantplugin_quacker_install_recovery(...$args){
    var_dump($args);
}