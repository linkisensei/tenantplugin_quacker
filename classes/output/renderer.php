<?php

class tenantplugin_quacker_renderer extends \plugin_renderer_base {

    public function render_index(){
        $data = [
            'quack_text' => "Quack! Quack!",
        ];
        echo parent::render_from_template('tenantplugin_quacker/index', $data);
    }    
}