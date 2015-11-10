<?php
/**
 * Created by PhpStorm.
 * User: Versoo
 * Date: 09.11.15
 * Time: 22:19
 */


add_action( 'get_footer', 'register_styles' );

function register_styles() {
    // Main CSS
    wp_register_style('main',ASSETS_URI.'/styles/main.css');
    wp_enqueue_style( 'main');

}

