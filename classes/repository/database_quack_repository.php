<?php namespace tenantplugin_quacker\repository;

use \tenantplugin_quacker\models\quacker;
use \moodle_database;
use \coding_exception;

class database_quack_repository implements quack_repository_interface {
    const TABLE = 'tenantplugin_quackers';

    protected moodle_database $db;

    public function __construct(moodle_database $db) {
        $this->db = $db;
    }

    public function create(quacker $quacker) : quacker {
        if(isset($quacker->id) && !empty($quacker->id)){
            throw new coding_exception("Can't recreate a quacker with the same ID!");
        }
        
        $quacker->validate();
        $quacker->id = $this->db->insert_record(self::TABLE, (array) $quacker);

        return $quacker;
    }

    public function get(int $id) : ?quacker {
        if($record = $this->db->get_record(self::TABLE, ['id' => $id])){
            return new quacker((array) $record);
        }
        return null;
    }
}
