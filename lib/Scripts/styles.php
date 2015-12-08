<?php
/**
 * Created by PhpStorm.
 * User: Versoo
 * Date: 09.11.15
 * Time: 22:19
 */

remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_action( 'get_footer', 'register_styles' );

function register_styles() {
    // Deregister
    wp_deregister_style('open-sans');
    // Main CSS
    wp_register_style('main',ASSETS_URI.'/styles/main.css');
    wp_enqueue_style( 'main');
}

