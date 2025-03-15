<?php namespace tenantplugin_quacker;

use \advanced_testcase;
use \tenantplugin_quacker\repository\database_quack_repository;
use \tenantplugin_quacker\repository\cache_quack_repository;
use \tenantplugin_quacker\quacker_factory;
use \tenantplugin_quacker\event\quacker_quacked;

final class quacker_test extends advanced_testcase {

    public function test_create_and_cache_quacker() {
        global $DB;

        $this->resetAfterTest(true);

        $quacker = quacker_factory::make_quacker('Quack!', 3);

        // Persist the quacker in the database using the database repository.
        $dbrepository = new database_quack_repository($DB);
        $persisted = $dbrepository->create($quacker);

        // Ensure the quacker has been assigned an ID after persisting.
        $this->assertNotEmpty($persisted->id, 'Quacker ID should not be empty after persisting.');

        // Retrieve the same quacker from the database.
        $retrieved = $dbrepository->get($persisted->id);
        $this->assertEquals($persisted->quack, $retrieved->quack, 'Quack text should match.');
        $this->assertEquals($persisted->number_of_quacks, $retrieved->number_of_quacks, 'Number of quacks should match.');

        // Put the quacker into the cache using the cache repository.
        $cacheRepository = cache_quack_repository::make_default();
        $cacheRepository->create($persisted);

        // Retrieve the quacker from the cache.
        $fromcache = $cacheRepository->get($persisted->id);
        $this->assertNotEmpty($fromcache, 'Cached quacker should not be empty.');
        $this->assertEquals($persisted->quack, $fromcache->quack, 'Cached quack text should match.');
        $this->assertEquals($persisted->number_of_quacks, $fromcache->number_of_quacks, 'Cached number of quacks should match.');

        
    }

    public function test_quacker(){
        $quacker = quacker_factory::make_quacker('Quack!', 3);
        $quacker->id = 99; // Mocking ID

        $sink = $this->redirectEvents();
        ob_start();
        $quacker->quack();
        $quacks = ob_get_clean();
        $events = $sink->get_events();

        // Testing output
        $this->assertEquals(3, substr_count($quacks, 'Quack!'));

        // Testing event
        $this->assertCount(1, $events);
        $this->assertInstanceOf(quacker_quacked::class, reset($events));
    }

    public function test_capability_exists(){
        $capability = 'tenantplugin/quacker:canquack';
        $cap_info = get_capability_info($capability);
        $this->assertNotFalse($cap_info, "Capability '$capability' doesn't exist");
    }

    public function test_observed_events(){
        $registered_observers = \core\event\manager::get_all_observers();

        include(__DIR__ . '/../db/events.php');

        foreach ($observers as $observer){
            $event = $observer['eventname'];
            $callable = $observer['callback'];

            $this->assertNotEmpty(array_filter(
                $registered_observers[$event],
                function($registered_observer) use ($callable) {
                    return $registered_observer->callable == $callable;
                }
            ));
        }       
    }

    public function test_lib_callbacks(){
        global $CFG;

        $this->assertTrue(isset($CFG->quacker)); // Defined in lib.php

        $plugins = get_plugins_with_function('test_callback', 'lib.php');
        $this->assertArrayHasKey('tenantplugin', $plugins);
        $this->assertNotEmpty($plugins['tenantplugin']);
    }

    public function test_scheduled_tasks(){
        $registered = \core\task\manager::load_default_scheduled_tasks_for_component('tenantplugin_quacker');
        $this->assertNotEmpty($registered);
    }

    public function test_database_tables(){
        global $DB;
        $this->assertTrue($DB->get_manager()->table_exists('tenantplugin_quackers'));
    }
}