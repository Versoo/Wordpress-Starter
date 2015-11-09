<?php


//Add thumbnail, automatic feed links and title tag support
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');

foreach (glob("lib/**/*.php") as $filename) {
    include_once("$filename");
}
