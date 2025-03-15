<?php

function tenantplugin_quacker_after_config(){
    global $CFG;
    $CFG->quacker = "The Quacker is flapping its wings!";
}


function tenantplugin_quacker_test_callback() {
    return;
}