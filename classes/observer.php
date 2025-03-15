<?php namespace tenantplugin_quacker;

defined('MOODLE_INTERNAL') || die();

class observer{

    /**
     * Observer for the user_loggedin event.
     *
     * @param \core\event\user_loggedin $event The event data.
     */
    public static function user_loggedin_quack(\core\event\user_loggedin $event) {
        $user = $event->get_record_snapshot('user', $event->objectid);
        debugging("The user {$user->username} just logged in and is ready to make some quacks!", DEBUG_DEVELOPER);
    }
}
