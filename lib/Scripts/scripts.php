<?php
/**
 * Created by PhpStorm.
 * User: Versoo
 * Date: 09.11.15
 * Time: 22:19
 */

add_action('wp_enqueue_scripts', 'register_scripts');

function register_scripts() {
    wp_deregister_script('jquery');
    // jQuery
    wp_register_script('jquery', BOWER_URI.'/jquery/dist/jquery.min.js',null,null,false);
    wp_enqueue_script('jquery');
    // Modernizr
    wp_register_script('modernizr',BOWER_URI.'/modernizr/modernizr.js',null,null,true);
    wp_enqueue_script('modernizr');
    // Boostrap
    wp_register_script('boostrap-js',BOWER_URI.'/bootstrap-sass-official/assets/javascripts/bootstrap.min.js',null,null,true);
    wp_enqueue_script('boostrap-js');
    // App.js - All Page Scripts
    wp_register_script('app',ASSETS_URI.'/js/app.js',null,null,true);
    wp_enqueue_script('app');
}