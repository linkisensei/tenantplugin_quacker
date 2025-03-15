<?php
defined('MOODLE_INTERNAL') || die();

$observers = [
    [
        'eventname'   => '\core\event\user_loggedin',
        'callback'    => '\tenantplugin_quacker\observer::user_loggedin_quack',
        'priority'    => 9999,
        'internal'    => false,
    ],
];