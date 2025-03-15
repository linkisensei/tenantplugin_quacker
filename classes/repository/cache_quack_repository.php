<?php namespace tenantplugin_quacker\repository;

use \tenantplugin_quacker\models\quacker;
use \cache;
use \coding_exception;

class cache_quack_repository implements quack_repository_interface {
    const AREA = 'quackers';

    protected cache $cache;

    public function __construct(cache $cache) {
        $this->cache = $cache;
    }

    public function create(quacker $quacker) : quacker {
        if(!isset($quacker->id)){
            throw new coding_exception("The cache_quack_repository only accepts already persisted quackers");
        }

        $quacker->validate();
        $this->cache->set((string) $quacker->id, $quacker);

        return $quacker;
    }

    public function get(int $id) : ?quacker {
        return $this->cache->get((string) $id) ?: null;
    }

    public static function make_default() : static {
        $cache = cache::make('tenantplugin_quacker', self::AREA);
        return new static($cache);
    }
}
