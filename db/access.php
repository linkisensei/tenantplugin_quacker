<?php

defined('MOODLE_INTERNAL') || die();


$capabilities = array(
    'tenantplugin/quacker:canquack' => array(
        'riskbitmask' => RISK_SPAM,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
    ),
);
