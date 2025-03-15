<?php
namespace tenantplugin_quacker\task;

use \core\task\scheduled_task;
use \tenantplugin_quacker\quacker_factory;

class the_quacking_task extends scheduled_task {

    /**
     * Returns the name of the task.
     *
     * @return string
     */
    public function get_name() {
        return get_string('thequackingtask', 'tenantplugin_quacker');
    }

    /**
     * Executes the scheduled task.
     */
    public function execute() {
        $default_number = get_config('tenantplugin_quacker', 'defaultquacks');
        if (empty($default_number)) {
            $default_number = 1;
        }
        
        $quacker = quacker_factory::make_quacker('Quaaaack!', (int)$default_number);
        $quacker->quack();
    }
}
