<?php

/**
 * Execute the plugin upgrade steps from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_tenantplugin_quacker_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    mtrace("Quacker is updated and getting stronger!");

    return true;
}
