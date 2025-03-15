<?php

defined('MOODLE_INTERNAL') || die();

$tasks = [
    [
        'classname' => 'tenantplugin_quacker\task\the_quacking_task',
        'blocking' => 0,
        'minute' => 'R',
        'hour' => '*',
        'day' => '*',
        'dayofweek' => '*',
        'month' => '*' 
    ]
];