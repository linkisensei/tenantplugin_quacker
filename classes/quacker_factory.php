<?php namespace tenantplugin_quacker;

use \tenantplugin_quacker\models\quacker;

class quacker_factory {
    public static function make_quacker(string $quack, int $number_of_quacks = 1) : quacker {
        return new quacker([
            'quack' => $quack,
            'number_of_quacks' => $number_of_quacks,
        ]);
    }
}
