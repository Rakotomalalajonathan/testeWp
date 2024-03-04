<?php
/**
 * Plugin Name: Demo Plugin
 */
# pour savoir si un oluging est active
register_activation_hook(__FILE__,function(){
    touch(__DIR__.'/demo');
});
register_deactivation_hook(__FILE__,function(){
    unlink(__DIR__.'/demo');
});
var_dump(plugin_dir_url(__FILE__));