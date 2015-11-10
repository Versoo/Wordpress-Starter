<?php
// Global
define('THEME_DIR',__DIR__);
define('THEME_URI',get_template_directory_uri());
// Assets
define('ASSETS_DIR', __DIR__.'/assets');
define('ASSETS_URI', THEME_URI.'/assets');
// Bower Components
define('BOWER_DIR', __DIR__.'/app/bower_components');
define('BOWER_URI', THEME_URI.'/app/bower_components');
// Required Plugins
define('REQUIRED_PLUGINS_DIR', __DIR__.'/lib/Plugins/vendor');
define('REQUIRED_PLUGINS_URI', THEME_URI.'/lib/Plugins/vendor');

include_scripts();
function include_scripts() {
    $locations = scandir(__DIR__.'/lib/',1);
    foreach($locations as $dir) {
        if($dir == '..')
            continue;
        foreach (glob(__DIR__."/lib/".$dir."/*.php") as $filename) {
            include_once("$filename");
        }
    }
}
