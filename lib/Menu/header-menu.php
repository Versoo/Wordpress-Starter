<?php
/***
 * Register Header Menu
 */

add_action('after_setup_theme', 'register_header_menu');

function register_header_menu()
{
    register_nav_menu('header_menu', __('Header Menu', THEME_SLUG));
}
