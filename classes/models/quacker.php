<?php namespace tenantplugin_quacker\models;

use \tenantplugin_quacker\event\quacker_quacked;
use \coding_exception;

class quacker {
    public ?int $id = null;
    public string $quack;
    public int $number_of_quacks;

    public function __construct(array $data = []){
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    public function quack(){
        if(empty($this->id)){
            throw new coding_exception("A quacker can't quack until it is properly stored!");
        }

        $this->validate();
        
        echo str_repeat($this->quack, $this->number_of_quacks);

        quacker_quacked::create([
            'userid' => 1,
            'objectid' => $this->id,
            'context'  => \context_system::instance(),
        ])->trigger();
    }

    public function validate(){
        if(!isset($this->number_of_quacks) || $this->number_of_quacks < 1){
            throw new coding_exception("Invalid number of quacks!");
        }

        if(!isset($this->quack) || empty($this->quack)){
            throw new coding_exception("Invalid quack!");
        }
    }
}
