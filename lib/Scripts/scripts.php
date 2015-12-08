<?php
/**
 * Created by PhpStorm.
 * User: Versoo
 * Date: 09.11.15
 * Time: 22:19
 */

add_action('wp_enqueue_scripts', 'register_scripts');
function register_scripts()
{
    if (!is_admin()) {
        // Deregister WordPress jQuery
        wp_deregister_script('jquery');

        // Vendor.js - All Vendors
        wp_register_script('vendor', ASSETS_URI . '/js/vendor.js', null, null, TRUE);
        wp_enqueue_script('vendor');
        // App.js - All Page Scripts
        wp_register_script('app', ASSETS_URI . '/js/app.js', null, null, TRUE);
        wp_enqueue_script('app');
    }
}

add_filter('clean_url', 'clean_scripts_url', 11, 1);

function clean_scripts_url($url)
{
    if (!is_admin()) {
        if (FALSE === strpos($url, '.js')) { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' async='async";
    }
    return $url;
}