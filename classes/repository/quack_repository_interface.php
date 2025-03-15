<?php namespace tenantplugin_quacker\repository;

use \tenantplugin_quacker\models\quacker;

interface quack_repository_interface {
    public function create(quacker $quacker) : quacker;
    public function get(int $id) : ?quacker;
}
