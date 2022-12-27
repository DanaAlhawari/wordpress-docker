<?php

// adderar funktioner för att hämta stylesheets

function load_stylesheets()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


//custom post type överförd till plugin

add_theme_support('post-thumbnails');
